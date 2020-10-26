<?php
// Start the session
session_start();
// ligacao á base de dados
include "openconn.php";

$userEmail = $_SESSION["email"];
$quant = $_POST["quantidades"];



$sql2 ="SELECT pratoID FROM prato WHERE utilizadorID = (SELECT utilizadorID FROM utilizador WHERE email='$userEmail' or nickname='$userEmail')";

$resultado2 =  mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_row($resultado2);
$pratoID = $row2[0];
echo"prato id:   " . $pratoID ;




$sql1 = "SELECT quantidade  FROM prato WHERE pratoID = '$pratoID' ";

$resultado1 =  mysqli_query($conn, $sql1);
$row = mysqli_fetch_row($resultado1);
$quantidade_a_somar = $row[0];

echo"quantidade a somar:     " . $quantidade_a_somar;
$quantidade_a_somar = $quantidade_a_somar + $quant;

$sql = "UPDATE prato SET quantidade = '$quantidade_a_somar' WHERE pratoID = '$pratoID' ";
$resultado =  mysqli_query($conn, $sql);

echo '<script>alert("Quantidade alterada com sucesso"); </script>';
echo '<script>window.location.assign("meuspratos.php"); </script>';


 ?>
