<?php

include_once 'lib/nusoap.php';

$servicio = new nusoap_client("http://url.php?wsdl");
$parametros = array("name"=>"Hang Tu","last"=>"Hang Tu","age"=>"23");
$respuesta = $servicio->call("consulta_name",$parametros);
print_r($respuesta);
echo '<h2>Request</h2><pre>' . htmlspecialchars($servicio->request, ENT_QUOTES) . '</pre>';
echo '<h2>Response</h2><pre>' . htmlspecialchars($servicio->response, ENT_QUOTES) . '</pre>';
echo '<h2>Debug</h2><pre>' . htmlspecialchars($servicio->debug_str, ENT_QUOTES) . '</pre>';

?>