<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
header("Content-type: application/json; charset=utf-8");

$unique_name = strtr(base64_encode(openssl_random_pseudo_bytes(16)), "+/=", "XXX");
/* $arr = explode(".", $_FILES["file_1"]['name']);
$extension = $arr[count($arr)-1];

$archivoTmp = $_FILES['file_1']['tmp_name'];
move_uploaded_file($archivoTmp, getcwd().'/uploads/'.$unique_name.'.'.$extension); */

$data = [
    "mensaje" => "Hola mensaje",
    "posts" => $_POST,
    "gets" => $_GET,
    "files" => $_FILES,
    "name_random"=>$unique_name
];

echo json_encode($data);
