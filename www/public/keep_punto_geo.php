<?php
/* ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); */

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
header("Content-type: application/json; charset=utf-8");

//include('geolocs_models.php');
// Parámetros de conexión
$host = "mysql";
$usuario = "root";
$password = "pass";
$base_de_datos = "perritos_ci";

// Crear la conexión
$conexion = mysqli_connect($host, $usuario, $password, $base_de_datos);

// Verificar la conexión
if (!$conexion) {
    die("La conexión ha fallado: " . mysqli_connect_error());
}
$file_id = null;
// Insertar File Data
if(isset($_FILES["file_1"])){
    $unique_name = strtr(base64_encode(openssl_random_pseudo_bytes(16)), "+/=", "XXX");
    // Vincular los parámetros
    $arr = explode(".", $_FILES["file_1"]['name']);
    $extension = $arr[count($arr)-1];
    $stmt_file = mysqli_prepare($conexion, "INSERT INTO uploaded_files (client_name, client_extention, real_name, url_file, dir_file ) VALUES (?, ?, ?, ?, ?)");
    
    $client_name = $_FILES['file_1']['name'];
    $real_name = $unique_name.'.'.$extension;
    $file_url = 'uploads/'.$unique_name.'.'.$extension;
    $file_ubi = getcwd().'/'.'uploads/'.$unique_name.'.'.$extension;

    mysqli_stmt_bind_param($stmt_file, "sssss", 
                                        $client_name,
                                        $extension, 
                                        $real_name,
                                        $file_url,
                                        $file_ubi
                                    );


    if(mysqli_stmt_execute($stmt_file)){
        $file_id = mysqli_insert_id($conexion);    
        $archivoTmp = $_FILES['file_1']['tmp_name'];

        move_uploaded_file($archivoTmp, getcwd().'/uploads/'.$unique_name.'.'.$extension);
        mysqli_stmt_close($stmt_file);

    }else{
        echo json_encode(mysqli_stmt_error($stmt_file));
    }

}


// Preparar la consulta SQL con marcadores de posición
$stmt = mysqli_prepare($conexion, "INSERT INTO geo_location (name, email, longitud, latitud, last_update, id_file) VALUES (?, ?, ?, ?, NOW(), ?)");

// Vincular los parámetros
mysqli_stmt_bind_param($stmt, "ssssi", $_POST['name'], $_POST['email'],$_POST['longitud'],$_POST['latitud'], $file_id);


$geoloc_keep_obj = [];

// Ejecutar la consulta
if (mysqli_stmt_execute($stmt)) {
    $geoloc_keep_obj = [
        "mensaje" => "Nuevo registro creado exitosamente",
        "data_post" => $_POST,
        "files_uploded" => $_FILES
    ];
} else {
    $geoloc_keep_obj = [
        "mensaje" => "Fallo el proceso",
        "error" => mysqli_stmt_error($stmt)
    ];
}


echo json_encode($geoloc_keep_obj);

mysqli_stmt_close($stmt);

mysqli_close($conexion);
?>