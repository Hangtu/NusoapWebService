<?php
// ini_set("soap.wsdl_cache_enabled", 0);
// $cliente = new SoapClient("http://url.php?wsdl");
// $parametros = array("name"=>"Hang Tu","last"=>"Hang Tu","age"=>"23");
// $datos = $cliente->__soapCall('consult_name', array('params' => $parametros));

// echo "<pre>";
// print_r($datos);
// echo "</pre>";


$opts = array ('encoding' => 'UTF-8', 'verifypeer' => false, 'verifyhost' => false, 'soap_version' => SOAP_1_1, 'trace' => 1, 'exceptions' => 1, "connection_timeout" => 180, 'stream_context' => stream_context_create($opts) );


$wsdl = "https://test.test.com.mx/WebService/WebService.asmx?WSDL";


$client = new SoapClient($wsdl,$opts); 


//METODO 1
 // $params->param = 'DATA NAME';
 // $res = $client->consulta_method1($params)->consulta_methodResult; 


//METODO 2
 // $params->param = 'DATA NAME';
 // $res = $client->consulta_method2($params)->consulta_methodResult;

// METODO 3
//$params->param = 'DATA NAME';
//$res = $client->consulta_method3($params)->consulta_methodResult; 

$params->param1 = 'data';
$params->param2 = 'data';

try{
	$res = $client->consulta_method1($params); 
	echo "<pre>";
	print_r($res);
	echo "</pre>";
}catch (SoapFault $e){
	echo "Error: {$e}";
}


?>
