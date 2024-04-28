<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
session_start();
$uid = $_SESSION["uid"];
if ($uid) {
    include_once("./partials/dbconnection.php");
    include_once("./partials/header.php");
    $querry = "SELECT * FROM users WHERE userid = '$uid';";
    $result = mysqli_query($db, $querry);
    $row = mysqli_fetch_assoc($result);

    $firstname = $row["firstname"];
    $middlename = $row["middlename"];
    $lastname = $row["lastname"];
    $contact = $row["contact"];
    $gender = $row["gender"];
    $email = $row["email"];
    $userid = $row["userid"];
?>
    <h1 class="p-2"> Edit Profile </h1>
    <p class="p-2">Your user ID is <?php echo $userid ?><br></p>
    <div class="container">
        <form action="./editprofile.inc.php" method="post">
            <label class="form-label" for="fullname">firstname</label>
            <input class=" form-control" for="fullname" name="firstname" type="text" id="name" placeholder="<?php echo $firstname ?>" value="<?php echo $firstname ?>">

            <label class="form-label" for="fullname">Middlename</label>
            <input class=" form-control" for="fullname" name="middlename" type="text" id="name" placeholder="<?php echo $middlename ?>" value="<?php echo $middlename ?>">
            
            <label class="form-label" for="fullname">Lastname</label>
            <input class=" form-control" for="fullname" name="lastname" type="text" id="name" placeholder="<?php echo $lastname ?>" value="<?php echo $lastname ?>">
            <div class="row">
                <div class="col">
                    <label for="gender" class="form-check-label">Gender</label>
                    &nbsp;&nbsp;
                    <label class="form-check-label" class="label">male</label>
                    <input type="radio" class="form-check form-check-inline" name="gender" value="male" id="gender" <?php if($gender == "male") echo "checked"; ?>>
                    <label class="form-check-label" class="label">female</label>
                    <input type="radio" class="form-check form-check-inline" name="gender" value="female" id="gender" <?php if($gender == "female") echo "checked"; ?>>
                </div>
            </div>
            
            <br>
            <p>Reset your password <a href="./passwordreset.php?p=2">here</a></p>
            <input class="btn btn-outline-success" type="submit" name="submit" value="Change">
            <input class="btn btn-outline-secondary" type="reset" value="Reset">
        </form>
    </div>
<?php
    include_once("./partials/footer.php");
} else {
    header("Location: /includes/login.php");
}
