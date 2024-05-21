<html>
<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
session_start();
$title = "RRS";
include_once("./includes/partials/header.php");
include_once("./includes/partials/dbconnection.php");
?>

<body> 
    <div class="container-fluid p-3" id="collections" style="gap:16px;">
        <div class="d-flex flex-row" style="height: max-content;z-index: 999; justify-content:space-between;">    
            <p style="font-size:24px; font-weight:500;">Our Collections</p>
            <a href="./itemdisplay.php"><button class="btn btn-warning">Show more</button></a>
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
                    <a class="items m-2" href="./includes/itemsdescription.php?id=<?php  echo $roomid?>" style="color:black; text-decoration: none;border: 1px solid gray; border-radius: 12px;height:15.6rem;width:30vh">
                    <img src='<?php echo $srcrimage; ?>' height="150" width="200">
                    <div class="row p-1">
                    <div class="col" style="font-size: 16px; font-weight:600;"> <?php echo $rlocation ?> </div>
                    </div>
                    <div class="row p-1">
                    <div class="col" style="font-size: 18px; font-weight:bold;">रु <?php echo $rentpermonth ?></div>
                    </div>
                    <div class="row p-1">
                    <div class="col"><div class="row">
                            <div class="col text-dark" style="font-size:10px;color:gray;">
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