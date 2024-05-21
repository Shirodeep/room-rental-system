<?php
session_start();
include_once("./partials/dbconnection.php");
include_once("./partials/header.php");
$itemid = $_GET["id"];

$qrr = "SELECT * FROM rooms WHERE roomid=$itemid;";
$result = mysqli_query($db, $qrr);
$result = mysqli_fetch_assoc($result);

$rentpermonth = $result["rentpermonth"];
$roomsize = $result["roomsize"];
$rstatus = $result["rstatus"];
$rprice = $result["rtype"];
$rlocation = $result["rlocation"];
$rentpermonth = $result["rentpermonth"];
$rimage = $result["rimage"];
$roomid = $result["roomid"];
$rlandmark = $result["rlandmark"];
$nobedroom = $result["nobedroom"];
?>
<div class="container my-5">
    <div class="row">
        <div class="col-lg-6  col-sm-6"><img src="<?php echo "../public/images/uploaded/".$rimage ?>" height="100%" width="100%"></div>
        <div class="col-lg-6  col-sm-6 ">
            <form action="./addtocart.php">
                <input type="text" value="<?php echo $roomid ?>" name="roomid" hidden>

                <div class="row p-3">
                    <div class="col">
                        <h4><?php echo $rlandmark ?>&nbsp;<?php echo $rlocation ?></h4>
                        <hr>
                    </div>
                </div>
                <div class="row p-1">
                    <div class="col">
                    <spam class="text-secondary"> रु <?php echo $rentpermonth ?> per month</spam>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col">
                        <spam class="text-secondary">Rooms: <?php echo $nobedroom ?></spam>

                    </div>
                </div>
                <div class="row p-2">
                    <div class="col">
                        <spam class="text-secondary">Size: <?php echo $roomsize ?> ft</spam>

                    </div>
                </div>
                <div class="row p-2">
                    <div class=" col">Status :<?php
                                                    if ($rstatus == 0)
                                                        echo " Available";
                                                    else
                                                        echo "Booked";
                                                    ?></div>
                </div>
                <div class="row p-2">
                    <div class=" col">Price is <?php 
                                    if ($rprice == 0)
                                        echo "Fixed...";
                                    else
                                        echo "Negotiable..."; 
                                ?></div>
                </div>
                <div class="row-sm p-2 d-flex justify-content-between">
                    <div class="col-2"></div>
                    <a class="col-3" href="./buy.php?id=<?php echo $roomid?>&transid=<?php echo mt_rand(3888, 987777)?>"><button class=" btn btn-warning" name="Book" type="button" style="width: 100%">Book</button></a>
                    <a class="col-3"><button class=" btn btn-outline-success" type="submit" name="cart" value="1<?php echo mt_rand(323121, 927188) ?>1" style="width: 100%">Comment</button></a>
                    <div class="col-2"></div>
                </div>
            </form>
        </div>
    </div>
    <div class="row bg-secondary text-warning text-center " style="height: 50vh;padding-top: 15vh">
        <h1>Rating + FeedBack Available Soon...</h1>
    </div>

</div>
<?php include_once("./partials/footer.php"); ?>

<script src="../js/alljs.js">
</script>