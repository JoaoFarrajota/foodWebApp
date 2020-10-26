<?php
// Start the session
session_start();
// ligacao á base de dados
include "openconn.php";

$userEmail = $_SESSION["email"];
$saldo = $_POST["saldo"];





$sql1 = "SELECT saldo FROM utilizador WHERE nickname = '$userEmail' or email= '$userEmail'  ";
$resultado1 =  mysqli_query($conn, $sql1);
$row = mysqli_fetch_row($resultado1);
$saldo_a_somar = $row[0];

$soma_saldo = $saldo_a_somar + $saldo;

$sql = "UPDATE utilizador SET saldo = '$soma_saldo' WHERE nickname = '$userEmail'  ";
$resultado =  mysqli_query($conn, $sql);

echo '<script>alert("Saldo carregado com sucesso"); </script>';
echo '<script>window.location.assign("foodpage.php"); </script>';

 ?>
