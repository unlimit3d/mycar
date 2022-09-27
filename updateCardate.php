<?php
require_once 'db.php';
FIX_PHP_CORSS_ORIGIN();
// $_POST[''];
$postData = file_get_contents("php://input");
$car = json_decode($postData, true);
// print_r($car);
//echo $car['name']
$id = $car['id'];
$name = $car['name'];
$model = $car['model'];
$price = $car['price'];
$vat = $car['vat'];

// exit();
if ($id) {

    $conn = CON_CARDATA();
    $sql = "UPDATE tb_cars SET
            name = '$name',
            model = '$model',
            price = '$price',
            vat = '$vat'
            WHERE id = '$id'
           ";
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
