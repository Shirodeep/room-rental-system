<html>
<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
session_start();
$title = "Thikxa";
include_once("./includes/partials/header.php");
include_once("./includes/partials/dbconnection.php");
?>

<body>
    <div class="container-fluid p-3" id="collections">
        <div class="row ">    
            <h1>Our Collections</h1>
            <div class="d-flex flex-row-reverse" style="height: max-content;z-index: 999;">
                <div class=""><a href="./itemdisplay.php"><button class="btn btn-warning">Show more</button></a></div>
            </div>
        </div>
        <div class=" d-flex flex-wrap" style="height: max-content;">
        <?php
                $itemsQrr = "SELECT * from rooms;";
                $items = mysqli_query($db, $itemsQrr);
                $rowCount = 7;
                while ($row = mysqli_fetch_assoc($items)) {
                    $rentpermonth = $row["rentpermonth"];
                    $rstatus = $row["rstatus"];
                    $rprice = $row["rtype"];
                    $rlocation = $row["rlocation"];
                    $rentpermonth = $row["rentpermonth"];
                    $rimage = $row["rimage"];
                    $srcrimage = "./public/images/uploaded/". $rimage;
                    $roomid = $row["roomid"];
                    if ($rowCount >= 1) {
                        ?>
                    <a class="items m-2" href="./includes/itemsdescription.php?id=<?php  echo $roomid?>" style="color:black; text-decoration: none;border: 1px solid gray; border-radius: 15px;height:max-content;width:30vh">
                    <img src='<?php echo $srcrimage; ?>' height="150" width="200">
                    <div class="row p-1">
                    <div class="col"> <?php echo $rlocation ?> </div>
                    </div>
                    <div class="row p-1">
                    <div class="col">रु <?php echo $rentpermonth ?></div>
                    </div>
                    <div class="row p-1">
                    <div class="col"><div class="row">
                            <div class="col">
                                <?php 
                                    if ($rprice == 0)
                                        echo "Fixed";
                                    else
                                        echo "Negotiable"; 
                                ?>
                            </div>
                        </div></div>
                    </div>
                    </a>
                    <?php }
                    else{
                        break;
                    }
                    $rowCount--;
                } ?>
        </div>
    </div>
    </div>
    <?php include("./includes/partials/footer.php"); ?>
</body>

</html>