<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
session_start();

$uid = $_SESSION["uid"];
date_default_timezone_set("Asia/Kathmandu");

if ($uid) {
    include_once("./partials/dbconnection.php");
    $errorUpdatingIntoDatabase = false;
    if (isset($_POST['submit'])) {
        $plocation = $_POST['location'];
        $neighbour = $_POST['landmark'];
        $roomsize = $_POST['rsize'];
        $nobedroom = $_POST['nobedroom'];
        $rentpermonth = $_POST['rentpermonth'];
        $price = $_POST['price'];
        
        $ramneties = "";
        foreach($_POST["amenties"] as $amnetie){
            $ramneties .=" " .$amnetie;
        }
        $rstatus = $_POST["status"];
        $rtype = $_POST["type"];
        $rdesc = $_POST["rdesc"];

        $image = $_FILES["image"];
        $imageName = $image["name"];
        $imageFullPath = $image["full_path"];
        $imageType = $image["type"];
        $imageTmpName = $image["tmp_name"];
        $imageError = $image["error"];
        $imageSize = $image["size"];
        $image_name = date("y-m-d h-i-sa") . $imageName;
        $image_path = "../public/images/uploaded/".$image_name;
        echo " ";
        echo "</pre>";

        if (move_uploaded_file($imageTmpName, $image_path)) {
            $qrr = "INSERT INTO rooms (rlocation, rlandmark, roomsize, nobedroom, rentpermonth, rprice, ramneties, rstatus, rtype, rdesc, rimage, r_userid) VALUES ( '$plocation', '$neighbour', '$roomsize', '$nobedroom', '$rentpermonth', '$price', '$ramneties', '$rstatus', '$rtype', '$rdesc', '$image_name', '$uid');";
            $result = mysqli_query($db, $qrr);
            header("location: ./profile.php?p=1");
        } else {
            header("location: ./additems.php?p=0");
        }
    }
}
