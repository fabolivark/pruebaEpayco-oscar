<?php

require 'vendor/autoload.php';

$descripcion = $_REQUEST['descripcion'];
$precio = $_REQUEST['precio'];
$tipodoc = $_REQUEST['tipodoc'];
$documento = $_REQUEST['documento'];
$nombre = $_REQUEST['nombre'];
$apellido = $_REQUEST['apellido'];
$email = $_REQUEST['email'];
$celular = $_REQUEST['celular'];
$direccion = $_REQUEST['direccion'];
$targeta = $_REQUEST['targeta'];
$anio = $_REQUEST['anio'];
$mes = $_REQUEST['mes'];
$cvc = $_REQUEST['cvc'];


  // echo $descripcion."<br>";
  // echo $precio."<br>";
  // echo $tipodoc."<br>";
  // echo $documento."<br>";
  // echo $nombre."<br>";
  // echo $apellido."<br>";
  // echo $email."<br>";
  // echo $celular."<br>";
  // echo $direccion."<br>";
  // echo $targeta."<br>";
  // echo $anio."<br>";
  // echo $mes."<br>";
  // echo $cvc."<br>";

$numtargeta = strval($targeta);
$expanio = strval($anio);
$expmes = strval($mes);
$codseguridad = strval($cvc);

// echo "$numtargeta";
// echo "$expanio";
// echo "$expmes";
// echo "$codseguridad";


 $epayco = new Epayco\Epayco(array(
     "apiKey" => "45b960805ced5c27ce34b1600b4b9f54",
     "privateKey" => "5c4773856f296c674685209bbfd11f92",
     "lenguage" => "ES",
     "test" => true
 ));

 $token = $epayco->token->create(array(
     "card[number]" => "$numtargeta",
     "card[exp_year]" => "$expanio",
     "card[exp_month]" => "$expmes",
     "card[cvc]" => "$codseguridad"
 ));

      $customer = $epayco->customer->create(array(
     "token_card" => $token->id,
     "name" => "$nombre",
     "email" => "$email",
     "phone" => "$celular",
     "default" => true
     ));


     $pay = $epayco->charge->create(array(
     "token_card" => $token->id,
     "customer_id" => $customer->data->customerId,
     "doc_type" => "$tipodoc",
     "doc_number" => "$documento",
     "name" => "$nombre",
     "last_name" => "$apellido",
     "email" => "$email",
     "bill" => "OR-1234",
     "description" => "$descripcion",
     "value" => "$precio",
     "tax" => "0",
     "tax_base" => "0",
     "currency" => "COP",
     "dues" => "12",
     "country" => "CO",
     "city" => "medellin",
     "invoice" => "fac123",
     "url_response"=>"https:secure.payco.co/restpagos/pagos",
     "url_confirmation" => "https:secure.payco.co/restpagos/pagos",
     "method_confirmation" => "POST"

     ));


    $pay = $epayco->charge->transaction($pay->data->ref_payco);

echo  json_encode($pay);


?>
