<?php
include_once('./partials/dbconnection.php');
$id = $_GET['id'];
$query = "select * from rooms where roomid=$id";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);

$total_amount = $row['rentpermonth'];
$transaction_uuid = $id . $_GET['transid'];

$product_code = "EPAYTEST";
$data = "total_amount=$total_amount,transaction_uuid=$transaction_uuid,product_code=$product_code";
$s = hash_hmac('sha256', $data, '8gBm/:&EnhH.1/q', true);
$encoded =  base64_encode($s);
include_once('./partials/header.php');
?>

<body>
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-6 text-center">

                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="../public/images/esewa.png" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Confirm Payment</h5>
                        <p class="card-text">By submitting you are going to pay via esewa </p>
                        <form action="https://rc-epay.esewa.com.np/api/epay/main/v2/form" method="POST">
                            <input type="hidden" id="amount" name="amount" value="<?php echo $total_amount ?>" required>
                            <input type="hidden" id="tax_amount" name="tax_amount" value="0" required>
                            <input type="hidden" id="total_amount" name="total_amount" value="<?php echo $total_amount ?>" required>
                            <input type="hidden" id="transaction_uuid" name="transaction_uuid" value="<?php echo $transaction_uuid ?>" required>
                            <input type="hidden" id="product_code" name="product_code" value="EPAYTEST" required>
                            <input type="hidden" id="product_service_charge" name="product_service_charge" value="0" required>
                            <input type="hidden" id="product_delivery_charge" name="product_delivery_charge" value="0" required>
                            <input type="hidden" id="success_url" name="success_url" value="http://localhost/includes/partials/success_url.php" required>
                            <input type="hidden" id="failure_url" name="failure_url" value="http://localhost/includes/partials/failure_url.php" required>
                            <input type="hidden" id="signed_field_names" name="signed_field_names" value="total_amount,transaction_uuid,product_code" required>
                            <input type="hidden" id="signature" name="signature" value="<?php echo $encoded ?>" required>
                            <input value="Submit" class="btn btn-success" type="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include_once('./partials/footer.php');
    ?>
</body>