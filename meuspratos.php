<?php
// Start the session
session_start();
// ligacao á base de dados
include "openconn.php";
 ?>

<!DOCTYPE html>
<html lang="pt">


<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Welcome</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link type="text/css" href="css/cssProject.css" rel="stylesheet">


  <style>

  img {
    border-radius: 8px;
  }


div.gallery {

  margin: 10px;

}

div.gallery:hover {
  transform: scale(1.05);
  transition: transform .2s;
  border-radius: 8px;

}

div.gallery img {
  width: 100%;
  height: auto;
}

div.desc {
  padding: 15px;
  text-align: center;
}

* {
  box-sizing: border-box;
}

.responsive {
  padding: 0 6px;
  float: left;
  width: 24.99999%;
}

@media only screen and (max-width: 700px) {
  .responsive {
    width: 49.99999%;
    margin: 6px 0;
  }
}

@media only screen and (max-width: 500px) {
  .responsive {
    width: 100%;
  }
}

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}
</style>


</head>



<body class="fundo_cor">


  <!-- Navigation bar-->
  <nav class="navbar navbar-expand-lg static-top nav_color">
    <div class="container">
      <a class="navbar-brand font_nav" href="index.html">MyFoodApp</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto navbar-right">
          <li class="nav-item">
            <a class="nav-link font_nav" href="#" data-toggle="modal" data-target="#modal_ajuda3">Ajuda <span class="glyphicon glyphicon-question-sign"></span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link font_nav" href="logout.php" > Logout <span class="	glyphicon glyphicon-log-out	"></span></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Modal para a ajuda-->
  <div id="modal_ajuda3" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">My Food App</h3>
        </div>
        <div class="modal-body">
          <p>Nesta página é possivel visualizar todos os pratos disponibilizados pelo utilizador</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="mt-5 titulos">Conheça os nossos pratos !</h1><br>




        <div id="masterContainer" class="container">
          <div class="container">



            <div class="compras">


            <?php


            $userEmail = $_SESSION["email"];


            $sql = "SELECT img_prato, nome , utilizadorID, preco, data_disponibilidade,quantidade  FROM prato WHERE utilizadorID = (SELECT utilizadorID FROM utilizador WHERE email='$userEmail' or nickname='$userEmail' ) ";
            $result = mysqli_query($conn, $sql );



            while ($row = mysqli_fetch_assoc($result)) {

                  $userId = $row['utilizadorID'];

                  $sql2 = "SELECT avatar FROM utilizador WHERE utilizadorID = $userId ";
                  $result2 = mysqli_query($conn, $sql2);
                  $row2 = mysqli_fetch_row($result2);



                  echo" <div class='responsive'>";
                  echo"    <div class='gallery'>";

                  echo"<a href='' data-toggle='modal' data-target='#modal_comida'>
                      <img src=profilePrato/{$row['img_prato']} >


                  </a>";
                          echo"<img src='profileImagem/{$row2[0]} ' alt='useravatar'style='width:50px;height:50px;border-radius:4px;'  class='useravatar'> {$row['nome']} - {$row['preco']} €" ;
                          echo"</div>" ;

                          // <!-- Modal para as informações de comida-->
                        echo  "<div id='modal_comida' class='modal fade' role='dialog'>
                             <div class='modal-dialog'>
                                  <!-- Modal content-->
                                  <div class='modal-content'>
                                      <div class='modal-header'>
                                          <h3 class='modal-title'>Informação sobre o prato</h3>
                                      </div>

                                      <div class='modal-body'>
                                        <img class='useravatar' src='profilePrato/{$row['img_prato']}' height='100' width='100'>
                                        <p class='color_p'>".$row['nome']."</p>
                                        <p class='color_p'><span class=\"glyphicon glyphicon-star\"></span> ".$row['rating']."</p>
                                        <p class='color_p'><span class=\"glyphicon glyphicon-euro\"></span> ".$row['preco']."</p>
                                        <p class='color_p'><span class=\"glyphicon glyphicon-calendar\"></span> ".$row['data_disponibilidade']."</p>
                                        <p class='color_p'>Doses disponiveis: ".$row['quantidade']."</p>
                                        <button class='btn btn-primary btn-sm btn-block' data-toggle=\"collapse\" data-target=\"#demo\">Alterar as quantidades</button>
                                            <div id='demo' class='collapse'><br>
                                                <form action='alterQuant.php' method='post' enctype='multipart/form-data' class=''>
                                                    <p class='color_p'>Introduza a quantidade disponivel</p>
                                                    <input name='quantidades' type='text' class='form-control' id='pwd' placeholder='1' required><br>
                                                    <button class='btn btn-primary btn-sm'data-toggle=\"collapse\" data-target=\"#demo\">Confirmar alteração</button>
                                                </form>
                                            </div>
                                      </div>
                                      <div class='modal-footer'>
                                          <button type='button' class='btn btn-default' data-dismiss='modal'>Fechar</button>
                                     </div>
                               </div>
                          </div>
                        </div>
                    </div>" ;



            }

            ?>
            </div>
            </div>
            </div>

            </div>
            </div>
            </div>


      </div>

        </div>
      </div>
    </div>
  </div><br>

  <div class="container">
    <div class="row">
      <!-- Default form register -->
      <div class="col-md-4 col-md-offset-4 text-center">

      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="page-footer font-small blue">
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">
     <h5>@ 2020 copyright: Aplicações e Serviços na Web | Grupo 014</h5>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>
</html>
