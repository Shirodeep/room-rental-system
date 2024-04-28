<?php
$addReferenceLink = array(
    array("facebook", "primary", "#"),
    array("github", "light", "#"),
    array("twitter", "primary", "#"),
    array("youtube", "danger", "#"),
);
?>
<div class="container-fluid bg-dark text-light">
    <div class="row pt-3">
        <div class="col-8">Contact us</div>
        <?php
        foreach ($addReferenceLink as $items) {
            echo "<div class='col'><a href='$items[2]'><i class='bi bi-$items[0] text-$items[1] pl-100'></i><hr style='width:4vh;'></a></div>";
        }
        ?>
    </div>
    <div class="row">
        <div class="col-7">It typically includes features for property owners to list available rooms<br><a href="../index.php" style="text-decoration:none;"><p class="display-4 " style="padding-left:5vh;color:yellowgreen;">RoomRentalSystem</p></a></div>
        <div class="col-5"> <a href="/includes/faq.php" style="text-decoration:none;">FAQ</a></div>
    </div>
    <div class="row text-align-center"><div class="col">&copy; Copyright all rights reserved</div></div>
</div>