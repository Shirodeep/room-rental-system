<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// session_start();
// phpinfo();
$host = "127.0.0.1";
$username= "carlous";
$password = "lala123";
$database = "dbname";

try {
    $db = mysqli_connect($host, $username, $password, $database);
} catch (\Throwable $th) {
    print_r($th);
}

if(!$db){
    echo "<p>error establishing connection with database</p>"; 
    die("Connection Failed");
}
?>