<?php

require 'vendor/autoload.php';

$descripcion = $_REQUEST['descripcion'];
$precio = $_REQUEST['precio'];
$tipodoc = $_REQUEST['tipodoc'];
$entidad = $_REQUEST['entidad'];
$documento = $_REQUEST['documento'];
$nombre = $_REQUEST['nombre'];
$apellido = $_REQUEST['apellido'];
$email = $_REQUEST['email'];
$celular = $_REQUEST['celular'];
$direccion = $_REQUEST['direccion'];


$epayco = new Epayco\Epayco(array(
    "apiKey" => "45b960805ced5c27ce34b1600b4b9f54",
    "privateKey" => "5c4773856f296c674685209bbfd11f92",
    "lenguage" => "ES",
    "test" => true
));

$cash = $epayco->cash->create("$entidad", array(
        "invoice" => "1472050778",
        "description" => "$descripcion",
        "value" => "$precio",
        "tax" => "0",
        "tax_base" => "0",
        "currency" => "COP",
        "country" => "CO",
        "type_person" => "0",
        "doc_type" => "$tipodoc",
        "doc_number" => "$documento",
        "name" => "$nombre",
        "last_name" => "$apellido",
        "email" => "$email",
        "cell_phone" => "$celular",
        "end_date" => "2018-05-27",
        "url_response" => "https:/secure.payco.co/restpagos/testRest/endpagopse.php",
        "url_confirmation" => "https:/secure.payco.co/restpagos/testRest/endpagopse.php",
        "method_confirmation" => "POST",
));

$cash = $epayco->cash->transaction($cash->data->ref_payco);

echo json_encode($cash);



 ?>
