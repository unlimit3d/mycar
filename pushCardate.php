<?php
require_once 'db.php';
FIX_PHP_CORSS_ORIGIN();
// $_POST[''];
$postData = file_get_contents("php://input");
$car = json_decode($postData, true);
// print_r($car);
//echo $car['name']
$name = $car['name'];
$model = $car['model'];
$price = $car['price'];
$vat = $car['vat'];

// exit();
if ($name != '') {

    $conn = CON_CARDATA();
    $sql = "INSERT INTO tb_cars (name, model, price, vat)
            VALUES ('$name', '$model', '$price', '$vat')";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        // if ($conn->query($sql) === true) {
        // echo "New record created successfully";
        echo json_encode("{'success',true}");
    } else {
        echo json_encode("{'success',false}");
    }
    // $result = $conn->query($sql);

    // CloseCON_CARDATA($conn);

} else {
    echo json_encode("{'success',false}");
    // echo "-b-";
}
