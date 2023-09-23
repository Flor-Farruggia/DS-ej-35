<?php

require_once '../../modelo/direccion.php';
require_once '../../modelo/titular.php';
require_once 'responses/nuevoResponse.php';
require_once 'request/nuevoRequest.php';

header('Content-Type: application/json');
$resp = new NuevoResponse();
$json = file_get_contents('php://input',true);
$req = json_decode($json);

$val = 0;
$msj="";

if ($req->Direccion == " ") {
    $resp->IsOk=false;
    $resp->Mensaje="la dirección es obligatoria";
    $msj=$resp->Mensaje;
    $val=$val+1;
} else {
    $resp->IsOk=true;
    $resp->Mensaje="-";
    $msj=$resp->Mensaje;
    $val=0;
}

$val2=0;
$msj2="";

if ($req->NroDocumento == nule && $req->ApellidoNombre  != nule) {
    $resp->IsOk=false;
    $resp->Mensaje="el numero documento es obligatorio";
    $msj2=$resp->Mensaje;
    $val2=$val2+1;
} elseif ($req->ApellidoNombre == nule && $req->NroDocumento  != nule) {
    $resp->IsOk=false;
    $resp->Mensaje="el Apellido Nombre es obligatorio";
    $msj2=$resp->Mensaje;
    $va2=$val2+1;
} elseif ($req->NroDocumento == nule && $req->ApellidoNombre == nule) {
    $resp->IsOk=false;
    $resp->Mensaje="el Apellido Nombre y documento es obligatorio";
    $msj2=$resp->Mensaje;
    $va2=$val2+1;
} else {
    $resp->IsOk=true;
    $resp->Mensaje="-";
    $val2=0;
}

if ($val<=1 && $va2<=1){
    $resp->Mensaje="";
}
/**En la acción, si no se cumplen más de una validación, el mensaje debe contener el mensaje de todas las validaciones separadas por “-“ 
*(guión medio.)
*En la acción si esta todo ok devolver
*IsOk: true
*Mensaje : “Titular agregado correctamente” */





echo json_encode($resp);