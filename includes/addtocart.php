<?php
session_start();
$uname = $_SESSION["uname"];
$no = false;
if (isset($uname)) {
    if (isset($_GET["cart"])) {
        $id = $_GET["itemid"];
        $quantity = $_GET["quantity"];
        $name = $_GET["itemname"];
        $xxyyzz = $_GET["xxyyzz"];
        $price = $_GET["price"];
        foreach ($_SESSION["cart"] as $items) {
            if ($items[4] == $id) {
                header("location: ./itemsdescription.php?id=$id&isOnCart=1");
                exit();
            }
        }
        $_SESSION["cart"][] = array("$price", "$quantity", "$name", "$xxyyzz", "$id");
        header("location: ./itemsdescription.php?id=$id&isOnCart=0");
        exit();
    }
} else {
    header("location: ./login.php");
    exit();
}
