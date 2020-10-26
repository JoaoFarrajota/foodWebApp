<?php

include "openconn.php";

if(isset($_POST["submit"])){

  $rePassword =$_POST["rePasswd"];

  $password=$_POST["passwd"];


if ($password==$rePassword) {

  $password =  $_POST["passwd"];
  $nproprio = $_POST['nproprio'];
  $apelido = $_POST['apelido'];
  $email =  $_POST['email'];
  $sexo = $_POST['sexo'];
  $datadenascimento = $_POST['datadenascimento'];
  $morada = $_POST['morada'];
  $concelho = $_POST['concelho'];
  $ditrito = $_POST['distrito'];
  $pais = $_POST['pais'];
  $tipo = $_POST['tipo'];
  $nick = $_POST['nick'];
  //Para colocar aqui a img avatar.
  $avatar =$_POST['avatar'];


  //foi usado o algoritmo has para incriptar com custo na operação
  $options = [
    'cost' => 12, 
  ];
  
  $password = password_hash($password, PASSWORD_BCRYPT, $options);

  // Para calcular a idade para se depois usar no Admin
  function getAge($bday) {
      $dateToday = new DateTime();
      $diff = $dateToday->diff(new DateTime($bday));

      return $diff->y;
  }

  $idade = getAge($datadenascimento);



  $query = "INSERT INTO utilizador (nickname, nomeProprio, apelido, email, sexo, dataNascimento, morada, concelho, distrito, pais, tipo, palavraPasse , avatar , idade ) VALUES
  ( '$nick', '$nproprio', '$apelido', '$email', '$sexo', '$datadenascimento', '$morada', '$concelho', '$ditrito', '$pais', '$tipo', '$password', '$avatar' , '$idade' )";


    // testar se o user existe
    $sql2 = "SELECT * FROM utilizador WHERE nickname='$nick' ";
    $check2 = mysqli_query($conn, $sql2);

    // testar se o email existe
    $sql3 = "SELECT * FROM utilizador WHERE email='$email' ";
    $check3 = mysqli_query($conn, $sql3);

if (mysqli_num_rows($check2) < 1) {

  if (mysqli_num_rows($check3) < 1) {



    $res = mysqli_query($conn, $query);
    if ($res) {

        if ($_POST["tipo"]=="consumidor") {

            $queryUserId = "SELECT utilizadorID FROM utilizador WHERE nickname ='$nick' and email ='$email'and tipo = '$tipo' ";
            $resultUserId = mysqli_query($conn, $queryUserId);

            $row= mysqli_fetch_row($resultUserId);
            $userId = $row[0];


            $queryC = "INSERT INTO consumidor ( utilizadorID ) VALUES ('$userId')" ;
            $resultConsu = mysqli_query($conn, $queryC);
            mysqli_close($conn);
        }

        elseif ($_POST["tipo"]=="vendedor"){

            $tipoComida = $_POST["tipoComida"];
            $tempoFornecer = $_POST["tempoFornecer"];
            $periodo = $_POST["periodo"];
            $especialidade = $_POST["especialidade"];

            $queryUserId = "SELECT utilizadorID FROM utilizador WHERE nickname='$nick' and email ='$email'and tipo = '$tipo' ";
            $resultUserId = mysqli_query($conn, $queryUserId);

            $row = mysqli_fetch_row($resultUserId);
            $userId = $row[0];

            $queryVend = "INSERT INTO vendedor (tipoComida, tempoFornecer, periodo, especialidade, utilizadorID ) VALUES ( '$tipoComida', '$tempoFornecer', '$periodo', '$especialidade' , '$userId' )";
            $resultVend = mysqli_query($conn, $queryVend);
            mysqli_close($conn);

        }

        else{

            $tipoComida = $_POST["tipoComida"];
            $tempoFornecer = $_POST["tempoFornecer"];
            $periodo = $_POST["periodo"];
            $especialidade = $_POST["especialidade"];

            $queryUserId = "SELECT utilizadorID FROM utilizador WHERE nickname='$nick' and email ='$email'and tipo = '$tipo' ";
            $resultUserId = mysqli_query($conn, $queryUserId);

            $row = mysqli_fetch_row($resultUserId);
            $userId = $row[0];

            $queryVend = "INSERT INTO vendedor (tipoComida, tempoFornecer, periodo, especialidade, utilizadorID ) VALUES ( '$tipoComida', '$tempoFornecer', '$periodo', '$especialidade' , '$userId' )";
            $resultVend = mysqli_query($conn, $queryVend);

            $queryC = "INSERT INTO consumidor ( utilizadorID ) VALUES ('$userId')" ;
            $resultConsu = mysqli_query($conn, $queryC);
            mysqli_close($conn);

        }
        echo '<script>alert("Registo efetuado com sucesso!"); </script>';
        echo "<script>window.location.assign('index.html'); </script>";

        } else {
        echo "Erro: " . $query . "<br>" . mysqli_error($conn);
    }


    } else {

    echo '<script>alert("Email já existente!"); </script>';
    echo "<script>window.location.assign('signin.html'); </script>";
    }

} else {

    echo '<script>alert("Nome de utilizador/Nickname, já existente!"); </script>';
    echo "<script>window.location.assign('signin.html'); </script>";
    }

  } else {

    echo '<script>alert("As passwords que escreveu não são iguais entre si."); </script>';
    echo "<script>window.location.assign('signin.html'); </script>";
 }

}


?>
