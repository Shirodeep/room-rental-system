<?php
session_start();
$uname = $_SESSION["uname"];
if ($uname) {
    include_once("./partials/header.php");
?>
    <h1>Privacy Settings</h1>
<p>    reset your password <a href="./passwordreset.php?p=2">here</a></p>
<?php
    include_once("./partials/footer.php");
}else{
    header("Location: ./index.php");
}
?>