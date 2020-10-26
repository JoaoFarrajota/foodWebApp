<?php
require_once "lib/nusoap.php";
$client = new nusoap_client(
 'http://appserver-01.alunos.di.fc.ul.pt/~asw014/claudia/reformulaacao_proj_2/WS_realizaCompra/ws_realizaCompra_serv.php');

$id = $_POST['pratoID'];
echo $id . ' ID que vai buscar ao form';
$error = $client->getError();
echo 'passou aquiii';
$result = $client->call('realizaCompra', array('id' => $id));
echo 'passou depois do result do client';
$result = json_decode($result);

//handle errors
if ($client->fault) {
 //check faults
}
else {
 $error = $client->getError();
 //handle errors

 echo $result;
}
?>