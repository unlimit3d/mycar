<?php
require_once('function.php');
FIX_PHP_CORSS_ORIGIN();

$postData = file_get_contents("php://input");
$obj = json_decode($postData, true);
// print_r($obj) ;
//echo $obj['name']

$name = $obj['name'];
$model = $obj['model'];
$price = $obj['price'];



if ($name != '') {
 
    $conn = CON_CARDATA();
    $sql = "INSERT INTO test.cars (name, model, price)
            VALUES ('$name', '$model', '$price')";

            if ($conn->query($sql) === TRUE) {
                // echo "New record created successfully"; 
                echo json_encode("{'success',true}");
            } else {
                echo json_encode("{'success',false}");
            }
    $result = $conn->query($sql);

    CloseCON_CARDATA($conn);

}else{
    echo "-b-";    
}


?>