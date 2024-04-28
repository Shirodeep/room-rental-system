<?php
$title = "Profile";
session_start();
$uname = $_SESSION["uname"];
$uid = $_SESSION["uid"];
if ($uname) {
    include_once("./partials/dbconnection.php");
    include_once("./partials/header.php");
    $itemsqrr = "SELECT * FROM rooms WHERE r_userid = '$uid';";
    $result = mysqli_query($db, $itemsqrr);
?>
    <h1>Profile Dashboard</h1>
    <div class="container-fluid">
        <!-- <div class="row">
            <h5 class="container-sm"><?php echo "I am " . $uname ?></h5>
        </div> -->
        <div class="row align-items-center p-2">
            <div class="col-8 col-md-10 " style="font-size:30">Your Items</div>
            <div class="col">
                <a href="./editprofile.php" class="btn btn-secondary">Edit profile</a>
            </div>
        </div>
        <div class="container-fluid d-flex flex-row flex-wrap">
            <?php
            if (!mysqli_num_rows($result)) {
            ?>
                <div class="row">
                    <div class="h3">No items to show <a href="./additems.php">add items here</a></div>
                </div>
            <?php
            } else {
            ?>

                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    $rimage = $row["rimage"];
                    $rentpermonth = $row["rentpermonth"];
                    $rstatus = $row["rstatus"];
                    $rprice = $row["rtype"];
                    $srcrimage = "../public/images/uploaded/". $rimage;
                ?>

                    <a class="items p-1 m-1" href="#" style="color:black; text-decoration: none;border: 1px solid gray; border-radius: 15px;">
                        <img src="<?php echo $srcrimage ?>" height="150" width="150" alt="image">
                        <div class="row">
                            <div class="col">
                                <?php 
                                    if ($rprice == 0)
                                        echo "Fixed";
                                    else
                                        echo "Negotiable"; 
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <?php 
                                    if ($rstatus == 0)
                                        echo "Available";
                                    else
                                        echo "Booked"; 
                                ?></div>
                        </div>
                        <div class="row">
                            <div class="col"><strong>रु</strong><?php echo $rentpermonth ?></div>
                        </div>
                    </a>


            <?php
                }
            }
            ?>
        </div>
    </div>
<?php
    include_once("./partials/footer.php");
} else {
    header("Location: ./login.php");
}
?>