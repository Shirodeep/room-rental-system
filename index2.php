<?php

include_once('./routes/partials/dbCon.php');

$sqlGetData = "SELECT * FROM useroauth;";

$getData = mysqli_query($conn, $sqlGetData);

while($data = mysqli_fetch_assoc($getData)){
    echo $data['contact'].'<br>';
    echo $data['gender'].'<br>';
}