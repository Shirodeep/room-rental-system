<?php
include_once("./partials/dbconnection.php");

$loginId = $_POST["loginid"];
$loginPasswords = $_POST["password"];
checkUserExist($db, $loginId, $loginPasswords);
function checkUserExist($db, $loginId, $loginPassword)
{
    $loginQuery = "SELECT * FROM users WHERE email = ?;";
    $statement = mysqli_stmt_init($db);
    //preparing the statement 
    if (!mysqli_stmt_prepare($statement, $loginQuery)) {
        header("Location: ./login.php?error=statementerror");
        exit();
    }
    // to bind the parameters with query  "ss" as ss are two char for two input as string 
    mysqli_stmt_bind_param($statement, "s", $loginId);
    mysqli_stmt_execute($statement);
    $logindata = mysqli_stmt_get_result($statement);

    $row = mysqli_fetch_assoc($logindata);
    $password = $row["password_hash"];
    if (password_verify($loginPassword, $password)) {
        //setting session after  login
        session_start();
        $_SESSION["uname"] = $row["firstname"] ." ". $row["lastname"];
        $_SESSION["uid"] = $row["userid"];
        echo "logined";
        header("Location: /index.php?logined=true");
        exit();
    }
    mysqli_stmt_close($statement);
    header("Location: ./login.php?error=true");
    exit();
}
