<?php
include('../inc/config.php');
include('../inc/cart_functions.php');

header('Content-Type: application/json');

$action = isset($_POST['action']) ? $_POST['action'] : '';

switch ($action) {
    case 'add':
        $id = isset($_POST['id']) ? $_POST['id'] : 0;
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $price = isset($_POST['price']) ? floatval($_POST['price']) : 0;
        $image = isset($_POST['image']) ? $_POST['image'] : '';
        $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;

        if ($id && $name && $price) {
            add_to_cart($id, $name, $price, $quantity, $image);
            echo json_encode([
                'status' => 'success', 
                'message' => 'Produs adaugat in cos',
                'cart_count' => get_cart_count(),
                'cart_total' => get_cart_total()
            ]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Date invalide']);
        }
        break;

    case 'remove':
        $id = isset($_POST['id']) ? $_POST['id'] : 0;
        if ($id) {
            remove_from_cart($id);
            echo json_encode([
                'status' => 'success', 
                'message' => 'Produs sters din cos',
                'cart_count' => get_cart_count(),
                'cart_total' => get_cart_total()
            ]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'ID invalid']);
        }
        break;

    case 'update':
        $id = isset($_POST['id']) ? $_POST['id'] : 0;
        $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 0;
        if ($id) {
            update_cart_quantity($id, $quantity);
            echo json_encode([
                'status' => 'success', 
                'message' => 'Cantitate actualizata',
                'cart_count' => get_cart_count(),
                'cart_total' => get_cart_total()
            ]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'ID invalid']);
        }
        break;
        
    case 'clear':
        clear_cart();
        echo json_encode([
            'status' => 'success', 
            'message' => 'Cosul a fost golit',
            'cart_count' => 0,
            'cart_total' => 0
        ]);
        break;

    default:
        echo json_encode(['status' => 'error', 'message' => 'Actiune invalida']);
        break;
}
