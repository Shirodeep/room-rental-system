<?php
session_start();
$uname = $_SESSION["uname"];
if (isset($uname)) {
    include_once("./partials/dbconnection.php");
    include_once("./partials/header.php");
    $cartItems = $_SESSION["cart"];

?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-7 p-2 ">
                <?php
                if (isset($cartItems)) {

                    foreach ($cartItems as $items) {
                        $imagepath = openssl_decrypt($items[3], "AES-128-CTR", "LALA!@#");
                ?>
                        <div class="container-fluid p-3" style="background-color:whitesmoke">
                            <div class="row">
                                <div class="col">
                                    <img src="<?php echo $imagepath ?>" alt="" height="100%" width="100%">

                                </div>
                                <div class="col">

                                    <form action="/includes/cart.php?action=Delete&id=<?php $items[4] ?>">
                                        <div class="col">
                                            <div class="row p-2 ">
                                                <h3 class="col"><?php echo $items[2] ?></h3>
                                            </div>
                                            <div class="row p-2 ">
                                                <div class="col">Price : <?php echo $items[0] ?></div>
                                            </div>
                                            <div class="row p-2">
                                                <div class="col">
                                                    <spam class="text-secondary">Quantity: </spam>
                                                    <button class="btn btn-outline-primary" type="button" onclick="addDelete('-', 'quantity<?php echo $items[4] ?>');">-</button>
                                                    <input type="text" id="quantity<?php echo $items[4] ?>" name="quantity" value="<?php echo $items[1] ?>" readonly style="width: 5vh; text-align: center">
                                                    <button class="btn btn-outline-primary" type="button" onclick="addDelete('+', 'quantity<?php echo $items[4] ?>');">+</button>
                                                    <?php $items[1] = '<script>document.getElementById("quantity<?php echo $items[4])</script>' ?>
                                                </div>
                                            </div>
                                            <div class="row d-flex flex-end">
                                                <button class="btn btn-primary" type="button">Delete</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                } else {
                    ?>
                    <h2 class="text-secodary px-5">Add items in cart <a href="index.php" style="color: blue;text-decoration:none">browse more... </a></h2>
                <?php
                }
                ?>
            </div>
            <div class="col">
                <div class="row p-3  text-center">
                    <div class="col">Order Summary</div>
                </div>
                <?php
                if ($_)
                ?>
                <div class="row p-3 ">

                    <div class="col text-secondary">Total Quantity:
                    <?php
                        $totalItems = count($cartItems);
                        echo $totalItems;
                    ?>
                    </div>
                </div>
                <div class="row p-3">
                    <div class="col text-secondary">Total Price:
                        <?php
                        $totalPrice = 0;
                        foreach ($cartItems as $items) {
                            $a = $items[0];
                            $totalPrice = $totalPrice + $a;
                        }
                        echo $totalPrice;
                        ?>
                    </div>
                    </div>
                    <div class="row p-3 ">
                        <div class="col text-secondary">Shipping Fee: 120</div>
                    </div>
                    <div class="row px-3  py-2 d-flex flex-row-reverse">
                    <a class="col-2 "href="./buy.php?price"><button class="btn btn-primary" type="button">Buy</button></a>
                    </div>
                </div>
            </div>
        </div>
    <?php
    include_once("./partials/footer.php");
} else {
    header("location: ./index.php");
}
    ?>
    <script>
        function addDelete(compare, id) {
            console.log(compare, id);
            let x = document.getElementById(id);
            if (compare == '-' && x.value > 1) {
                x.value--;

            }
            if (compare == '+' && x.value < 5) {
                x.value++;
            }
        }
    </script>