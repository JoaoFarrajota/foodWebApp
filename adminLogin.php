<!DOCTYPE html>
<html>
<body>

<?php
// variaveis com informacao proveniente do log in de admin
$nomeAdm = $_POST["selected"];
$passAdm = $_POST["pass"];

// ligacao á base de dados
include "openconn.php";

// interrogacao à base de dados
$sql = "SELECT * FROM administrador WHERE administradorID='$nomeAdm' AND palavraPasse='$passAdm' ";
$result = mysqli_query($conn, $sql);

//
if (mysqli_num_rows($result) > 0) {
      //echo "boaaa";
      echo '<script>alert("Login efetuado com sucesso!"); </script>';
      echo '<script>window.location.assign("adminPage.php"); </script>';
    } else {
      //echo "errado";
      echo '<script>alert("Os dados que inseriu são inválidos"); </script>';
      echo '<script>window.location.assign("adminLogin.html"); </script>';
    }

//fecha a ligacao à base de dados
mysqli_close($conn);
?>

</body>
</html>
