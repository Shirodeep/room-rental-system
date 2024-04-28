<?php
include_once("./partials/dbconnection.php");
if (isset($_POST['submit'])) {
    $firstname = $_POST["firstname"] ;
    $middlename = $_POST["middlename"];
    $lastname =  $_POST["lastname"];
    $contact = $_POST["contact"];
    $gender = $_POST["gender"];
    $email = $_POST["email"];
    $passwords = $_POST["password"];
    $hashPassword = password_hash($passwords, PASSWORD_DEFAULT);
    $forUsernameCheck = "SELECT email, contact FROM useroauth;";
    // $isInDb = mysqli_query($db, $forUsernameCheck);
    // to check if user already exists
    // while ($checkName = mysqli_fetch_assoc($isInDb)) {
        // $checkContact = $checkName['contact'];
        // $checkEmail = $checkName['email'];
        // if ($checkContact == $contact) {
        //     header("Location: ./register.php?q=0");
        //     exit();
        // }
        // if ($checkEmail == $email) {
        //     header("Location: ./register.php?q=0");
        //     exit();
        // }
    //  }
    $sqlquerry = "INSERT INTO users (firstname, lastname, middlename, contact, gender, email, password_hash) VALUES ('$firstname', '$lastname', '$middlename',  '$contact', '$gender', '$email', '$hashPassword');";
    $insert = mysqli_query($db, $sqlquerry);
    header("Location: ./register.php?q=1");
    exit();
}
header("Location: /index.php");
