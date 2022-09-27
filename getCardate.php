<?php
error_reporting(0);
require_once 'db.php';

try {
    $conn = CON_CARDATA();
    //code...
    $sql = "SELECT * FROM tb_cars";

    $result = mysqli_query($conn, $sql);
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    // echo json_encode($data);
    echo json_encode(array('error' => '', 'data' => $data));
} catch (Exception $e) {
    //throw $th;
    echo json_encode(array('error' => $e->getMessage . 'Error select ข้อมูลไม่ได้'));
}

exit();

// mysql_query($conn, )

FIX_PHP_CORSS_ORIGIN();
$datacar = array();

// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
//   }
//   echo "Connected successfully";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        // echo "name: " . $row["name"]. " - model: " . $row["model"]. " price" . $row["price"]. "<br>";
        $datacar[] = $row;
    }
//   for ($datacar = array (); $row = $result->fetch_assoc(); $datacar[] = $row);
    //   print_r($datacar);
    echo json_encode($datacar);
} else {
    echo "{'results':0'}";
}
CloseCON_CARDATA($conn);
