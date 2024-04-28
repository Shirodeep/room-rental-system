<?php
session_start();
$uname = $_SESSION["uname"];

if ($uname) {
    include_once("./partials/header.php");
    include_once("./partials/dbconnection.php");
?>
    <div class="row">
        <div class="col">
            <a href="./settings.php" style="color:black;text-decoration:none"><i class="bi bi-arrow-return-left display-1"></i></a>
        </div>
    </div>
    <?php if ($_GET["p"] == 0 and $_GET["p"] != "") { ?>
        <div class="row alert alert-warning alert-dismissible fade show" role="alert">
            <strong class="col-11">Check Your password!</strong>
            <button type="button" class="col btn btn-outline-warning" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        <?php } ?>
        <?php if ($_GET["p"] == 1 and $_GET["p"] != "") { ?>
            <div class="row alert alert-success alert-dismissible fade show" role="alert">
                <strong class="col-11">Changed Sucessfully!</strong>
                <button type="button" class="btn btn-outline-success col" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            <?php } ?>
            </div>
            <div class="container" style="background-color: whitesmoke; width: 50%;height: auto ">
                <div class="row text-center">
                    <h1 class="col">RESET PASSWORD</h1>
                </div>
                <form action="./passwordreset.inc.php" method="post">
                    <div class="form-group p-2">
                        <label class="p-1" for="password">Old Password</label>
                        <input name="password" type="text" class="form-control p-1" id="password" placeholder="Old Password" required>
                    </div>
                    <div class="form-group p-2">
                        <label class="p-1" for="newpassword">New Password</label>
                        <input name="newpassword" type="text" class="form-control p-1" id="password" placeholder="New Password" required>
                    </div>
                    <div class="form-group p-2">
                        <label class="p-1" for="confirmpassword">Confirm New Password</label>
                        <input name="confirmpassword" type="text" class="form-control p-1" id="confirmpassword" placeholder="Confirm New Password" required>
                    </div>
                    <input class="btn btn-outline-success" name="submit" type="submit" value="SUBMIT">
                    <button class="btn btn-outline-secondary" type="reset">RESET</button>
                </form>
            </div>
            <br>
        <?php
            include_once("./partials/footer.php");
    } else {
        header("Location: ./index.php");
    }
        ?>