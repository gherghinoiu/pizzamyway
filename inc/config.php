<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Auto-detect base URL
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
$host = $_SERVER['HTTP_HOST'];
// Determine if we are in a subdirectory (e.g. /pizzamyway/)
// We assume the file structure is root -> inc -> config.php, so we are at root level.
// However, REQUEST_URI might contain subdirectories.
// A simple way is to use the path to the script script minus the filename.
// But $adresa seems to be used as a prefix for assets.

// For local XAMPP, if accessed as localhost/pizzamyway/, then adresa should be that.
// If accessed as localhost/, then it should be root.

// Let's try to deduce it from the script name location relative to document root.
// If this file is included, we can't rely on __FILE__.

// The user had: $adresa = "http://pizzamyway.ro/";
// We want to make it dynamic.

$script_dir = dirname($_SERVER['SCRIPT_NAME']);
// Ensure trailing slash
if (substr($script_dir, -1) !== '/') {
    $script_dir .= '/';
}
// If script_dir is just /, it's fine. If it is /api/, we need to go up.
// But pizza.php is in root. api/cart.php is in api/.
// If we access api/cart.php, $script_dir will be /api/.
// But we want the site root.

// Let's hardcode a check for local environment vs production
if ($host === 'localhost' || $host === '127.0.0.1') {
     // Usually XAMPP puts projects in subfolders.
     // We can try to guess based on where the file is located.
     // But simpler: just use "/" if we assume they setup vhost or run from root.
     // Or, if they use localhost/pizzamyway, we need to detect 'pizzamyway'.

     // Let's use a smarter detection.
     // We know 'inc/config.php' is the location of this file.
     // We can find the relative path from DOCUMENT_ROOT to this file's directory, then go up one level.

     $current_file_path = str_replace('\\', '/', __DIR__);
     $doc_root = str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']);

     $rel_path = str_replace($doc_root, '', $current_file_path);
     // rel_path is like /pizzamyway/inc
     $site_root = dirname($rel_path); // /pizzamyway

     if ($site_root === '/' || $site_root === '\\') {
         $site_root = '';
     }

     $adresa = $protocol . "://" . $host . $site_root . '/';
     // Ensure double slashes are removed if any (except protocol)
     // But simpler approach:
     // If user is accessing via localhost/pizzamyway/, the REQUEST_URI starts with /pizzamyway/.
     // This seems complicated to get perfect without config.
     // Let's stick to what might work for standard XAMPP setup:
     // If the user didn't change folder name, it is likely 'pizzamyway' or just in root.

     // Let's look at the original .htaccess. It had "RewriteBase /pizzamyway/".
     // This suggests the user likely has it in a folder named 'pizzamyway'.
     // So let's try to detect if that folder exists in the URI.

     if (strpos($_SERVER['REQUEST_URI'], '/pizzamyway/') === 0) {
         $adresa = $protocol . "://" . $host . '/pizzamyway/';
     } else {
         // Fallback to root or just empty string so relative paths work?
         // If we use absolute paths for assets, we need the full URL.
         // If we use relative paths, we don't need $adresa, but the code uses it.
         // Let's default to root.
          $adresa = $protocol . "://" . $host . '/';
     }

} else {
    $adresa = "http://pizzamyway.ro/";
}

// Database configuration
$username = "root";
$password = "";
$database = "pizzamyway_nou";
$hostname = "localhost";

$link = mysqli_connect($hostname, $username, $password, $database);

if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

// Set charset to UTF8
mysqli_set_charset($link, "utf8");

?>
