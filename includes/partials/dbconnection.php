<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// session_start();
// phpinfo();
$host = "sql302.epizy.com";
$username= "epiz_30656595";
$password = "vuuy9bS2HBLsa";
$database = "epiz_30656595_dbname";

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