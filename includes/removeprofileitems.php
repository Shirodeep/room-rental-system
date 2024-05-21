<?php
include_once("./partials/dbconnection.php");
session_start();
include("./partials/header.php");
$uid = $_SESSION["uid"];
$rid = $_GET["id"];
$querry = "select * from rooms where roomid='$rid';";
$result = mysqli_query($db, $querry);
$row = mysqli_fetch_assoc($result);

$location = $row['rlocation'];
$neighbour = $row['rlandmark'];
$roomsize = $row['roomsize'];
$nobedroom = $row['nobedroom'];
$rentpermonth = $row['rentpermonth'];
$price = $row['rprice'];

$rstatus = $row["rstatus"];
$rtype = $row["rtype"];
$rdesc = $row["rdesc"];
$rimage = $row["rimage"];
$userid = $row["r_userid"];
?>
<div class="container " style="height: 100%;background-color:whitesmoke;width:60%; border-radius: 5%">
    <form action="./additems.inc.php" method="post" enctype="multipart/form-data">


        <div class="row p-2">
            <div class="col">

                <label class="form-label" for="location">Enter your property location:</label><br>
                <input class="form-control" type="text" id="lclass" name="location" placeholder="<?php echo $location ?>">
            </div>
        </div>

        <div class="row p-2">
            <div class="col">

                <label class="form-label" for="neighbour">Neighbourhood/Landmark:</label><br>
                <input class="form-control" type="text" id="rclass" name="landmark" placeholder="<?php echo $neighbour ?>">
            </div>
        </div>

        <div class="row p-2">
            <div class="col">

                <label class="form-label" for="rsize">Enter room size:</label><br>
                <input class="form-control" type="text" id="lclass" name="rsize" placeholder="<?php echo $roomsize ?>">
            </div>
        </div>

        <div class="row p-2">
            <div class="col">
                <label class="form-label" for="rent">Total number of bedroom:</label><br>
                <select class="form-control" name="nobedroom" id="rclass" default>
                    <?php
                    for ($i = 1; $i < 6; $i++) {
                        if ($nobedroom == $i) {

                    ?>
                            <option value=<?php echo $nobedroom ?> selected><?php echo $nobedroom ?></option>
                        <?php
                        } else { ?>
                            <option value=<?php echo $i ?>><?php echo $i ?></option>
                        <?php }
                        ?>
                    <?php
                        
                    }
                    ?>
                    <option value=6>5+</option>
                </select>
            </div>
        </div>

        <div class="row p-2">
            <div class="col">
                <label class="form-label" for="rpmonth">Rent per month (Rs):</label><br>
                <input class="form-control" type="number" id="lclass" name="rentpermonth" placeholder="<?php echo $rentpermonth ?>">
            </div>
        </div>

        <div class="row p-2">
            <div class="col">
                <label class="form-label" for="price">Price:</label><br>
                <select class="form-control" name="price" id="rclass">
                    <?php if($price == 0){
                        ?>
                        <option value=0 selected>Fixed</option>
                        <option value=1 >Negotiable</option>

                        <?php
                    }else{
                        ?>
                        <option value=1 selected>Negotiable</option>
                        <option value=0 >Fixed</option>

                        <?php
                    }?>
                </select>
            </div>
        </div>

        <div class="row p-2">
            <div class="col">
                <label class="form-label" for="">Property Amenties:</label> &nbsp;
                <input type="checkbox" id="check" name="amenties[]" value="Wifi">
                <label for="amenties">Wifi</label>
                <input type="checkbox" id="check" name="amenties[]" value="24hr water">
                <label for="amenties">24hr water</label>
                <input type="checkbox" id="check" name="amenties[]" value="parking">
                <label for="amenties">parking</label>
                <input type="checkbox" id="check" name="amenties[]" value="waste management">
                <label for="amenties">Waste Management</label>
            </div>
        </div>

        <div class="row p-2">
            <div class="col">

                <label class="form-label" for="status">Property Status:</label><br>
                <select class="form-control" name="status" id="lclass">
                    <option value=0>Available</option>
                    <option value=1>Booked</option>
                </select>
            </div>
        </div>

        <div class="row p-2">
            <div class="col">
                <label class="form-label" for="ptype">Property Type</label><br>
                <select class="form-control" name="type" id="rclass">
                    <option value=0>Room</option>
                    <option value=1>Flat</option>
                </select>
            </div>
        </div>

        <div class="row p-2">
            <div class="col">

                <label class="form-label" for="desc">Property description:</label><br>
                <input class="form-control" type="textarea" id="long" name="rdesc" placeholder="Some details about room">
            </div>
        </div>

        <div class="row p-2">
            <div class="col">
                <label for="itemimage" class="form-label ">House Front Image</label>
                <input type="file" id="itemimage" name="image" class="form-control">
            </div>
        </div>
        <div class="row p-2">
            <div class="col">
                <input class="btn btn-success" type="submit" value="SUBMIT" name="submit">
                <button class="btn btn-secondary" type="reset">RESET</button>
            </div>
        </div>
    </form>
</div>
<?php
include_once("./partials/footer.php")
?>