<?php
include("inc/header.php");
include("inc/cart_functions.php");

header('Content-Type: application/json');

$code = isset($_POST['code']) ? trim($_POST['code']) : '';
$total = isset($_POST['total']) ? floatval($_POST['total']) : 0;

if (!$code) {
    echo json_encode(['valid' => false, 'message' => 'Introduceti un cod.']);
    exit();
}

$query = "SELECT * FROM coupons WHERE code = '" . mysqli_real_escape_string($link, $code) . "' AND is_active = 1";
$result = mysqli_query($link, $query);

if ($coupon = mysqli_fetch_assoc($result)) {
    // Check expiry
    if ($coupon['expiry_date'] && strtotime($coupon['expiry_date']) < time()) {
         echo json_encode(['valid' => false, 'message' => 'Codul a expirat.']);
         exit();
    }
    
    $discount = 0;
    if ($coupon['discount_type'] == 'percent') {
        $discount = ($total * $coupon['discount_value']) / 100;
    } else {
        $discount = $coupon['discount_value'];
    }
    
    // Ensure discount doesn't exceed total
    if($discount > $total) $discount = $total;
    
    echo json_encode([
        'valid' => true,
        'discount_amount' => number_format($discount, 2),
        'new_total' => number_format($total - $discount, 2)
    ]);
} else {
    echo json_encode(['valid' => false, 'message' => 'Cod invalid.']);
}
?>
