<?php
error_reporting(0);
// require_once 'function.php';
require_once 'db.php';
FIX_PHP_CORSS_ORIGIN();
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
