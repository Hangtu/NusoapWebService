<?php
include_once 'lib/nusoap.php';

$namespace = "http://url.php?wsdl";
$server = new soap_server();
$server->configureWSDL("WEBSERVICE");
$server->wsdl->schemaTargetNamespace = $namespace;



//REGISTRO DE FUNCIONES 
$server->register("consulta_name",// nombre de la funcion
	array('localidad' => 'xsd:string', 'patente' => 'xsd:string', 'no_expediente' => 'xsd:string'), // parametros de la funcion 
    array('return' => 'tns:nanmeRespuesta'), $namespace); // respuesta de la funcion
//TERMINAN REGISTRO DE FUNCIONES


//DATOS QUE SERAN DEVUELTOS AL USARIO
$server->wsdl->addComplexType(
	'nanmeRespuesta',
	'complexType',
	'struct',
	'all',
	'',
	array(
		'folio_receta' => array('name' => 'folio_receta', 'type' => 'xsd:string'),
		'localidad' => array('name' => 'localidad', 'type' => 'xsd:string'),
		'fecha' => array('name' => 'fecha', 'type' => 'xsd:date'),
		'cedula' => array('name' => 'cedula', 'type' => 'xsd:string'),
		'nombre_medico' => array('name' => 'nombre_medico', 'type' => 'tns:medico'),
		'patente' => array('name' => 'patente', 'type' => 'xsd:string'),
		'no_expediente' => array('name' => 'no_expediente', 'type' => 'xsd:string'),
		'nombre_afiliado' => array('name' => 'nombre_afiliado', 'type' => 'tns:afiliado'),
		'nombre_paciente' => array('name' => 'nombre_paciente', 'type' => 'tns:paciente'),
		'claves' => array('name' => 'claves','type' => 'tns:clavesToArray'),
		'estatus' => array('name' => 'estatus', 'type' => 'xsd:string'),
		'vigencia' => array('name' => 'vigencia', 'type' => 'xsd:string'),
		'diagnosticos' => array('name' => 'diagnosticos','type' => 'tns:diagnosticoToArray')
		)
	);
//TERMINA DATOS QUE SERAN DEVUELTOS AL USUARIO




//TIPOS COMPLEXTYPE//

$server->wsdl->addComplexType(
	'medico',
	'complexType',
	'struct',
	'all',
	'',
	array(
		'nombre' => array('name' => 'nombre', 'type' => 'xsd:string'),
		'paterno' => array('name' => 'paterno', 'type' => 'xsd:string'),
		'materno' => array('name' => 'materno', 'type' => 'xsd:string'),
		)
	);

$server->wsdl->addComplexType(
	'afiliado',
	'complexType',
	'struct',
	'all',
	'',
	array(
		'nombre' => array('name' => 'nombre', 'type' => 'xsd:string'),
		'paterno' => array('name' => 'paterno', 'type' => 'xsd:string'),
		'materno' => array('name' => 'materno', 'type' => 'xsd:string'),
		'parentesco' => array('name' => 'parentesco', 'type' => 'xsd:string'),
		'sexo' => array('name' => 'sexo', 'type' => 'xsd:int'),
		'fecha_nacimiento' => array('name' => 'fecha_nacimiento', 'type' => 'xsd:date'),
		)
	);


$server->wsdl->addComplexType(
	'paciente',
	'complexType',
	'struct',
	'all',
	'',
	array(
		'nombre' => array('name' => 'nombre', 'type' => 'xsd:string'),
		'paterno' => array('name' => 'paterno', 'type' => 'xsd:string'),
		'materno' => array('name' => 'materno', 'type' => 'xsd:string'),
		'parentesco' => array('name' => 'parentesco', 'type' => 'xsd:string'),
		'sexo' => array('name' => 'sexo', 'type' => 'xsd:int'),
		'fecha_nacimiento' => array('name' => 'fecha_nacimiento', 'type' => 'xsd:date'),
		)
	);

//**ARREGLO DE DIAGNOSTICOS**//
$server->wsdl->addComplexType('diagnosticoToArray','complexType','array','','SOAP-ENC:Array',
	array(),
	array(
		array(
			'ref' => 'SOAP-ENC:arrayType',
			'wsdl:arrayType' => 'tns:diagnostico[]'
			)
		)
	);

$server->wsdl->addComplexType(
	'diagnostico',
	'complexType',
	'struct',
	'all',
	'',
	array(
		'clave' => array('name' => 'clave', 'type' => 'xsd:string'),
		'descripcion' => array('name' => 'descripcion', 'type' => 'xsd:string'),
		)
	);
//** TERMINA ARREGLO DE DIAGNOSTICOS**//


//**ARREGLO DE CLAVES**//
$server->wsdl->addComplexType('clavesToArray','complexType','array','','SOAP-ENC:Array',
	array(),
	array(
		array(
			'ref' => 'SOAP-ENC:arrayType',
			'wsdl:arrayType' => 'tns:clave[]'
			)
		)
	);

$server->wsdl->addComplexType(
	'clave',
	'complexType',
	'struct',
	'all',
	'',
	array(
		'clave' => array('name' => 'clave', 'type' => 'xsd:string'),
		'descripcion' => array('name' => 'descripcion', 'type' => 'xsd:string'),
		'cantidad_pedida' => array('name' => 'cantidad_pedida', 'type' => 'xsd:int'),
		'cantidad_surtida' => array('name' => 'cantidad_surtida', 'type' => 'xsd:int'),
		'cantidad_surtida_abastecedora' => array('name' => 'cantidad_surtida_abastecedora', 'type' => 'xsd:int'),
		)
	);
//** TERMINA ARREGLO DE CLAVES**//


//TERMINA TIPOS COMPLEXTYPE//

function consulta_paciente($localidad, $patente, $no_expediente){
	$arr = array();
	$arr['field'] = "00001";
	$arr['field'] = 'Guadalajara';
	$arr['field'] = '2016-05-09';
	$arr['field'] = 'cedula 1234';
	$arr['field'] = array('nombre' => 'Hang', 'paterno' => 'Wong Ley', 'materno' => 'materno');
	$arr['field'] = 'test';
	$arr['field'] = '56165165';
	$arr['field'] = array('nombre' => 'Afiliado1', 'paterno' => 'Paterno1', 'materno' => 'Materno1', 'sexo'=>'0', 'parentesco' => 'hijo',  'fecha_nacimiento' => '1993-06-23');
	$arr['field'] = array('nombre' => 'Paciente1', 'paterno' => 'Paterno2', 'materno' => 'Materno2', 'sexo'=>'1', 'parentesco' => 'madre', 'fecha_nacimiento' => '1993-06-23');

	$claves = array();
	$clave1 = array('clave' => '321', 'descripcion' => 'descripcion1', 'cantidad_pedida' => 1 , 'quantity' => 1 , 'quantity_two' => 4);
	$clave2 = array('clave' => '556', 'descripcion' => 'descripcion2', 'cantidad_pedida' => 2 , 'quantity' => 2 , 'quantity_two' => 4);
	array_push($claves,$clave1);
	array_push($claves,$clave2);
	$arr['field'] = $claves;

	$arr['field'] = 'true';
	$arr['field'] = 'manana';
	
	$diagnosticos = array();
	$diagnostico1 = array('clave' => 'clave1', 'descripcion' => 'descripcion1');
	$diagnostico2 = array('clave' => 'clave2', 'descripcion' => 'descripcion2');
	array_push($diagnosticos,$diagnostico1);
	array_push($diagnosticos,$diagnostico2);
	$arr['field'] = $diagnosticos;

	return $arr;
}

//MANDA LA RESPUESTA
$server->service(file_get_contents("php://input"));
//


?>