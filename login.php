<!DOCTYPE html>
<html>
<body>

<?php

// Start the session
session_start();

// ligacao á base de dados
include "openconn.php";

// variaveis com informacao proveniente do log in de utilizador
//$emailUser = mysqli_real_escape_string( $conn ,$_POST["email"]);
$emailUser = $_POST["email"];
$passUser =  $_POST["pwd"];

$_SESSION["email"] = $emailUser ;


$selectUserPass = "SELECT palavraPasse, tipo FROM utilizador WHERE email = '$emailUser' OR nickname = '$emailUser' ";

if (mysqli_query($conn, $selectUserPass)) {
  $resultado =  mysqli_query($conn, $selectUserPass);

  if (mysqli_num_rows($resultado) > 0) {
    while ($row = $resultado->fetch_assoc()) {
      $hash = $row['palavraPasse'];
      $tipo = $row['tipo'];
      #print($tipo);
      #print($hash);
    }

    if (password_verify($passUser, $hash)) {

      if ($tipo == "consumidor") {
      
        echo '<script>alert("Login efetuado com sucesso!"); </script>';
        echo '<script>window.location.assign("welcome_consumidor.php"); </script>';

      } else {

        echo '<script>alert("Login efetuado com sucesso!"); </script>';
        echo '<script>window.location.assign("welcome.php"); </script>';
      }

    } else {
      echo '<script>alert("Password invalida"); </script>';
      echo '<script>window.location.assign("index.html"); </script>';
    }
  } else {
      echo '<script>alert("Dados inválidos"); </script>';
      echo '<script>window.location.assign("index.html"); </script>';
  }
}


/* $row = mysqli_fetch_assoc($resultado);

if (mysqli_num_rows($resultado)  > 0) {
      //echo "boaaa";
      if ($row['tipo'] == "consumidor") {


        echo '<script>alert("Login efetuado com sucesso!"); </script>';
        echo '<script>window.location.assign("welcome_consumidor.php"); </script>';
        }
      else{
        echo '<script>alert("Login efetuado com sucesso!"); </script>';
        echo '<script>window.location.assign("welcome.php"); </script>';
      }
    }

  else {
      //echo "errado";
      echo '<script>alert("Os dados que inseriu são inválidos"); </script>';
      echo '<script>window.location.assign("index.html"); </script>';
    } */

//fecha a ligacao à base de dados
mysqli_close($conn);




?>

</body>
</html>
