<?php
ini_set("soap.wsdl_cache_enabled", 0);
$cliente = new SoapClient("http://url.php?wsdl");
$parametros = array("name"=>"Hang Tu","last"=>"Hang Tu","age"=>"23");
$datos = $cliente->__soapCall('consult_name', array('params' => $parametros));

echo "<pre>";
print_r($datos);
echo "</pre>";

?>
