<?php
require_once"lib/nusoap.php";

echo infoPrato(1);

function realizaCompra($id) { 
	echo $id . ' ******************';
	
	// Criar uma ligação
	$dbhost="appserver-01.alunos.di.fc.ul.pt";
	$dbuser="asw014";	
	$dbpass="grupo014";	
	$dbname="asw014";

	//Cria a ligação à BD
	$conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

	//Verifica a ligação à BD
	if (mysqli_connect_error()) {
		die ("Database connection failed:".mysqli_connect_error());
	} else {
		print('Fez ligação com a base de dados!!');
	}

	//Interrogação à base de dados
	$query = "SELECT * FROM prato WHERE pratoID = '$id' ";
	echo 'passei aquiiii depois da query';
	$result=mysqli_query($conn, $query);
	
	$row=mysqli_fetch_assoc($result);

	if (mysql_num_rows($result) > 0) {
		while ($row = mysqli_fetch_row($result)) {
			echo "Nome do prato: {$row[0]}";
			echo "Preço do prato: {$row[1]}";
		}
	}

	#return $row[0];
}

$server = new soap_server();
$server->configureWSDL('cumpwsdl', 'urn:cumpwsdl');
$server->register("realizaCompra", // nome metodo
array('id' => 'xsd:integer'), // input
array('return' => 'xsd:string'), // output
	'uri:cumpwsdl', // namespace
	'urn:cumpwsdl#infoPrato', // SOAPAction
	'rpc', // estilo
	'encoded' // uso
);

@$server->service(file_get_contents("php://input"));

?>