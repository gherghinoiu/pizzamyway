<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/animate.css">
<link rel="icon" href="assets/images/favicon.png" type="image/png">
<?php
//$adresa = "http://pizzamyway.ro/";

$adresa = "http://pizzamyway.ro/";

$request_uri = $_SERVER['REQUEST_URI']; 

	$username="root";
	$password="";
	$database="pizzamyway_nou";
	$hostname="localhost";
        
        
//        mysql_connect($hostname,$username,$password);
//	mysql_select_db($database);
        
 
	mysqli_connect($hostname,$username,$password);
	mysqli_select_db(mysqli_connect($hostname,$username,$password),$database);
//	       echo 'aaasadddaaaasdasddd';
        $link = mysqli_connect('localhost', 'root', '', 'pizzamyway_nou');
//        print_r($link);

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

