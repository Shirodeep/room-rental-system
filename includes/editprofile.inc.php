<?php
session_start();
$uid = $_SESSION["uid"];
if ($uid) {
    include_once("./partials/dbconnection.php");
    if (isset($_POST['submit'])) {
        $gender = $_POST["gender"];

        $firstname = $row["firstname"];
        $middlename = $row["middlename"];
        $lastname = $row["lastname"];

        $forRecurrentUserDataCheck = "SELECT * FROM users WHERE userid = '$uid';";
        $isRecurrentInDb = mysqli_query($db, $forRecurrentUserDataCheck);

        while ($row = mysqli_fetch_assoc($isRecurrentInDb)) {
            $newName = $row["fullname"];
            $newGender = $row["gender"];
            if ($name  == $newName and  $gender  == $newGender) {
                header("Location: ./editprofile.php?q=0");
                exit();
            }
        }
        $sqlquerry = "UPDATE users SET firstname = '$firstname', middlename = '$middlename', lastname = '$lastname', WHERE userid = $uid;";
        $insert = mysqli_query($db, $sqlquerry);
        $_SESSION["uname"] = $firstname . " ". $middlename. "". $lastname;
        // header("Location: ./editprofile.php?q=1");
        // exit();
    }
} else {
    // header("Location: /index.php");
}
