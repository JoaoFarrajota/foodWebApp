<?php

// Start the session
session_start();


 // ligacao á base de dados
 include "openconn.php";


  if(isset($_POST["submitPrato"])){


    $category =array();
    $cater= $_POST["categoria"];

    $cat="";
    $ingredients = explode(', ', $_POST["ingredient"]);



    foreach($cater as $cat1) {

      array_push($category, $cat1);


    }

    if (count($category)>0 and count($ingredients)>0 ) {

      $nome = $_POST["nome"];
      $preco = $_POST["preco"];
      $Quantidade = $_POST["Quantidade"];
      $categoria = $_POST["categoria"];
      $active = $_POST["active"];


      $userEmail = $_SESSION["email"];



      // interrogacao à base de dados para opter Nome proprio do utilizador
      $sql3 = "SELECT  utilizadorID  FROM utilizador WHERE email='$userEmail' or nickname='$userEmail' ";
      $result3 = mysqli_query($conn, $sql3 );

//testar a interrogação $resultCheck = mysqli_num_rows($result);
// echo $resultCheck;

      $row = mysqli_fetch_row($result3);

      $utilizadorID = $row[0];



      $queryUserId = "SELECT vendedorID  FROM vendedor WHERE utilizadorID='$utilizadorID' ";
      $resultUserId = mysqli_query($conn, $queryUserId);
      $row = mysqli_fetch_row($resultUserId);
      $vendedorID = $row[0];


      if ($active=="disponivel") {
        $date = date('Y-m-d H:i:s');
        $query = "INSERT INTO prato (nome, preco, quantidade, data_disponibilidade, estado, vendedorID,utilizadorID) values ('$nome', '$preco', '$Quantidade', '$date', '$active', '$vendedorID', '$utilizadorID')";
      }else{

        $query = "INSERT INTO prato (nome, preco, quantidade, estado, vendedorID,utilizadorID) values ('$nome', '$preco', '$Quantidade','$active', '$vendedorID', '$utilizadorID' )";
      }


      // testar se o nome do prato existe
      $sql2 = "SELECT * FROM prato WHERE nome='$nome' ";
      $check2 = mysqli_query($conn, $sql2);

      if (mysqli_num_rows($check2) < 1) {

        $res = mysqli_query($conn, $query);
        if ($res) {


          $queryPratoId = "SELECT pratoID FROM prato WHERE vendedorID='$vendedorID' and nome= '$nome'";
          $resultPratoId = mysqli_query($conn, $queryPratoId);
          $row = mysqli_fetch_row($resultPratoId);
          $pratoID = $row[0];


          ///Codigo de upload///

          $FileNombre = $_POST["fileToUpload"];



          $target_dir = "profilePrato/";
          $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
          $bdimg = basename($_FILES["fileToUpload"]["name"]);
          $strbdimg = strval($bdimg);
          $uploadOk = 1;
          $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

          // Check if image file is a actual image or fake image
          $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
          if($check !== false) {
              echo "File is an image - " . $check["mime"] . ".";
              $uploadOk = 1;
          } else {
              echo "File is not an image.";
              $uploadOk = 0;
          }

          // Check if file already exists
          if (file_exists($target_file)) {
              echo "Sorry, file already exists.";
              $uploadOk = 0;
          }

          // Check file size
          if ($_FILES["fileToUpload"]["size"] > 500000) {
              echo "Sorry, your file is too large.";
              $uploadOk = 0;
          }

          // Allow certain file formats
          if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
          && $imageFileType != "gif" ) {
              echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
              $uploadOk = 0;
          }

          // Check if $uploadOk is set to 0 by an error
          if ($uploadOk == 0) {
              echo "Sorry, your file was not uploaded.";


          // if everything is ok, try to upload file
          } else {
              if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

                $_SESSION["avatarUploaded"] = $target_file ;

                ///Atualização da base de dados.///


                $queryImg = "UPDATE prato SET img_prato ='$bdimg' WHERE pratoID = '$pratoID' ";
                $resImg = mysqli_query($conn, $queryImg);



                ///............................///

                echo '<script>alert("Upload de imagem efetuado com sucesso!"); </script>';


              } else {

                  echo "Sorry, there was an error uploading your file.";
                  echo "<script>window.location.assign('pratoCreator.html'); </script>";
              }
          }
  

          for ($i=0; $i < count($category) ; $i++) {

              $catma = $category[$i];
              $queryCat = "INSERT INTO categoria (nome , pratoID) values ('$catma', '$pratoID')";




              $resCat = mysqli_query($conn, $queryCat);

          }

          //Ingredients

            for ($j=0; $j < count($ingredients) ; $j++) {

              $Inga = $ingredients[$j];
              $queryIng = "INSERT INTO ingredientes (nome, pratoID) values ('$Inga', '$pratoID')";
              $resIng = mysqli_query($conn, $queryIng);


              echo "<script>alert('Prato criado com sucesso!'); </script>";
              echo "<script>window.location.assign('welcome.php'); </script>";



          }

        } else {
          echo "Erro: " . $query . "<br>" . mysqli_error($conn);
        }
      } else {
        echo '<script>alert("Nome do prato já existente!"); </script>';
        echo "<script>window.location.assign('pratoCreator.html'); </script>";
      }

    } else {
      echo('<script>alert("No Ingredients or categories chosen"); </script>');
      echo "<script>window.location.assign('pratoCreator.html'); </script>";
    }


}






?>
