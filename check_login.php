<?php

require 'db.php';
require 'vendor/autoload.php';

use \Firebase\JWT\JWT;

$postData = file_get_contents("php://input");
$data = json_decode($postData, true);
$username = $data['username'];
$password = $data['password'];

// check user ana password
if ($username == 'admin' && $password == '123456') {

    $privateKey = SECRET_KEY;
    $iss = date('Y-m-d H:i:s');
    $token = array(
        "name" => "wissarut kamto",
        "iss" => $iss,
        "exp" => date('Y-m-d H:i:s', strtotime("+1 day", strtotime($iss))),
    );

// print_r($token);

    $jwt = JWT::encode($token, $privateKey, 'HS256');

// echo $jwt . "\n";
    $token['jwt'] = $jwt;

    echo json_encode($token);
} else {
    echo json_encode(array('error' => 'username หรือ password ไม่ถูกต้อง'));

}
