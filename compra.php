<?php


// Start the session
session_start();
// ligacao á base de dados
include "openconn.php";


$userEmail = $_SESSION["email"];
$prato_nome = $_SESSION['id_prato'];

$quant = $_POST['quantidade_a_tirar'];

echo $prato_nome . "            " ;
echo "  quantidade que se vai comprar :  " . $quant;

$sql2 ="SELECT pratoID FROM prato WHERE utilizadorID = (SELECT utilizadorID FROM utilizador WHERE email='$userEmail' or nickname='$userEmail')";
$resultado2 =  mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_row($resultado2);
$pratoID = $row2[0];
echo "  do prato id:   " . $pratoID ;




$sql1 = "SELECT quantidade , preco ,utilizadorID FROM prato WHERE pratoID = '$pratoID' ";
$resultado1 =  mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_row($resultado1);

$quantidade_total = $row1[0];
$preco = $row1[1];
$id_vendedor = $row1[2];

echo"  quantidade total do prato antes de tirar a quant comprada :     " . $quantidade_total;
$quantidade_total = $quantidade_total - $quant;
echo"  quantidade total do prato depois de tirar a quant comprada :     " . $quantidade_total;
 // $sql = "UPDATE prato SET quantidade = '$quantidade_total' WHERE pratoID = '$pratoID' ";
 // $resultado =  mysqli_query($conn, $sql);




$sql3 = "SELECT saldo FROM utilizador WHERE nickname = '$userEmail' or email= '$userEmail'  ";
$resultado3 =  mysqli_query($conn, $sql3);
$row3 = mysqli_fetch_row($resultado3);
$saldo_total = $row3[0];

echo "   saldo total antes de fzr a compra:   " . $saldo_total;
$saldo_total = $saldo_total - ($preco * $quant);

echo "   saldo total depois de se fzr a compra:   " . $saldo_total;

 // $sql4 = "UPDATE utilizador SET saldo = '$saldo_total' WHERE nickname = '$userEmail'  ";
 // $resultado4 =  mysqli_query($conn, $sql4);

$saldo_a_carregar_a_vendedor  = $preco * $quant;

echo "     saldo a carregar na conta do vendedor :     " . $saldo_a_carregar_a_vendedor;
echo "     ID do vendedor :  " . $id_vendedor ;

 $sql5 = "SELECT saldo FROM utilizador WHERE utilizadorID = '$id_vendedor'  ";
 $resultado5 =  mysqli_query($conn, $sql5);
 $row5 = mysqli_fetch_row($resultado5);
 $saldo_total_vendedor = $row5[0];

 echo "      saldo do vendedor antes de lhe comprarem pratos :     " . $saldo_total_vendedor;
 $saldo_total_vendedor = $saldo_total_vendedor + $saldo_a_carregar_a_vendedor;
 echo "      saldo do vendedor depois de lhe comprarem pratos" . $saldo_total_vendedor  ;

 // $sql6 = "UPDATE utilizador SET saldo = '$saldo_total' WHERE nickname = '$userEmail'  ";
 // $resultado6 =  mysqli_query($conn, $sql6);

 ?>
 <!-- echo '<script>alert("Quantidade alterada com sucesso"); </script>';
 echo '<script>window.location.assign("meuspratos.php"); </script>'; -->
