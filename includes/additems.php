<?php
session_start();
$uname =  $_SESSION["uname"];
if($uname){

include_once("./partials/header.php");
include_once("./partials/dbconnection.php");

?>
<div class="row p-2 text-center">
    <h1 class="col">Add items</h1>
</div>
<div class="container " style="height: 100%;background-color:whitesmoke;width:60%; border-radius: 5%">
    <form action="./additems.inc.php" method="post" enctype="multipart/form-data">


        <div class="row p-2">
            <div class="col">

                <label class="form-label" for="location">Enter your property location:</label><br>
                <input class="form-control" type="text" id="lclass" name="location" placeholder="full address city,street">
            </div>
        </div>

        <div class="row p-2">
            <div class="col">

                <label class="form-label" for="neighbour">Neighbourhood/Landmark:</label><br>
                <input class="form-control" type="text" id="rclass" name="landmark" placeholder="Eg.office name, educational institute.etc">
            </div>
        </div>

        <div class="row p-2">
            <div class="col">

                <label class="form-label" for="rsize">Enter room size:</label><br>
                <input class="form-control" type="text" id="lclass" name="rsize" placeholder="Enter size of room in feet.eg: 20*50ft">
            </div>
        </div>

        <div class="row p-2">
            <div class="col">
                <label class="form-label" for="rent">Total number of bedroom:</label><br>
                <select class="form-control" name="nobedroom" id="rclass">
                    <option value=1>1</option>
                    <option value=2>2</option>
                    <option value=3>3</option>
                    <option value=4>4</option>
                    <option value=5>5</option>
                    <option value=6>5+</option>
                </select>
            </div>
        </div>

        <div class="row p-2">
            <div class="col">
                <label class="form-label" for="rpmonth">Rent per month (Rs):</label><br>
                <input class="form-control" type="number" id="lclass" name="rentpermonth" placeholder="Rent price in Rs">
            </div>
        </div>

        <div class="row p-2">
            <div class="col">
                <label class="form-label" for="price">Price:</label><br>
                <select class="form-control" name="price" id="rclass">
                    <option value=0>Fixed</option>
                    <option value=1>Negotiable</option>
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
                <input type="file" id="itemimage" name="image" class="form-control" >
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
<br>
<?php
    include_once("./partials/footer.php");
}else{
    header("Location: /index.php");
}
?>