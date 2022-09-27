<?php
function CON_CARDATA()
{
    $dbhost = "127.0.0.1"; // localhost
    $dbuser = "root";
    $dbpass = "";
    $db = "mycar_db";
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n" . mysqli_error());
    // $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n" . $conn->error);
    // echo 'db connected';
    return $conn;
}

function CloseCON_CARDATA($conn)
{
    $conn->close();
}
