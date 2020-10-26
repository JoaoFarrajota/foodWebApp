<?php
// Start the session
session_start();

         $userEmail = $_SESSION["email"];

         $avatarUploaded = $_SESSION["avatarUploaded"];


         // ligacao á base de dados
         include "openconn.php";

         // interrogacao à base de dados para opter Nome proprio do utilizador
         $sql = "SELECT nomeProprio, apelido , utilizadorID , nickname , sexo , concelho , distrito, pais, tipo , avatar, saldo FROM utilizador WHERE email='$userEmail' or nickname='$userEmail' ";
         $result = mysqli_query($conn, $sql );

         $row = mysqli_fetch_row($result);
         $nomeProprio = $row[0];
         $apelido = $row[1];
         $userId = $row[2];
         $userNickname = $row[3];
         $userSexo = $row[4];
         $userConcelho = $row[5];
         $userDistrito = $row[6];
         $userPais = $row[7];
         $userTipo = $row[8];
         $userAvatar = $row[9];
         $userSaldo = $row[10];


         // interrogacao à base de dados para opter Nome proprio do utilizador
         $sqlImagem = "SELECT fileLocation , fileName FROM imagem WHERE utilizadorID='$userId' ";
         $resultado = mysqli_query($conn, $sqlImagem );
         //$row2 = mysqli_fetch_row($resultado);

         $localAvatar = "profileImagem/" . $userAvatar ;

         $testeImage = "uploads/adepto.jpg" ;

 ?>

<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Pagina para comprar a comida</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link type="text/css" href="css/cssProject.css" rel="stylesheet">
    <link type="text/css" href="css/cssFoodPage.css" rel="stylesheet">

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
            <a class="nav-link font_nav" href="welcome.php" > Perfil <span class="glyphicon glyphicon-user"></span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link font_nav" href="#" data-toggle="modal" data-target="#modal_ajuda3">Ajuda <span class="glyphicon glyphicon-question-sign"></span></a>
          </li>

          <li class="nav-item">
            <a class="nav-link font_nav" href="#" data-toggle="modal" data-target="#modal_saldo">Saldo: <?php echo $userSaldo; ?><span class="glyphicon glyphicon-euro	"></span></a>
          </li>

          <li class="nav-item">
            <a class="nav-link font_nav" href="logout.php" > Logout <span class="	glyphicon glyphicon-log-out	"></span></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Modal para o login-->
  <div id="modal_login" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Iniciar Sessão</h3>
        </div>
        <div class="modal-body">
          <form action="login.php" method="post">
              <input name="selected" type="text" class="form-control" id="email" placeholder="Username/Email" required><br>
              <input name="pass" type="password" class="form-control" id="pwd" placeholder="Password" required><br>
              <button type="submit" class="btn btn-primary play">Enviar</button>
          </form>
         <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>
</div>

  <!-- Modal para a ajuda-->
  <div id="modal_ajuda" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">My Food App</h3>
        </div>
        <div class="modal-body">
          <p>Bem vindo ao MyFoodApp, uma aplicação onde poderá ver e encomendar as nossas ofertas gastronomicas.
            Através de um simples registo poderá encomendar qualquer prato que apeteça no momento</p><br>
          <p>Navegue na nossa página e procure o prato que deseja!</p>
          <p>Poderá procurar pelos nossos vendedores ou pratos. Gosta de algum ingrediente especifico? Pesquise por ele!</p>
          <p>O rating é muito importante para si? Nós dispomos um serviço de rating por prato e vendedor. Venha descobrir!</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>



  <!-- Modal para o saldo-->
  <div id="modal_saldo" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Carregar Saldo</h3>
        </div>
        <div class="modal-body">

          Insira os dados do seu cartão e o valor que deseja carregar no seu saldo
          <br>
          <br>
          <form action="carregar_saldo2.php" method="post" enctype="multipart/form-data" class="">

          <label for="numero_cartao">Número de cartão de crédito:</label>
            <input type="text" class="form-control" id="numero_cartao" name="numero_cartao" placeholder="0000-0000-0000-0000" required>
          <br>
          <label for="saldo">Valor: </label>
            <input type="text" class="form-control" id="saldo" name="saldo" value="" placeholder="0.00" required><br>

          <button class="btn btn-primary btn-sm" name="carregar_saldo" type="submit">Submeter</button>
          </form>

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
        <h1 class="mt-5 titulos">Bem vindo!</h1><br>
        <h3 class="mt-5">Aqui poderá consultar a nossa lista de pratos e vendedores</h3><br>
        <div class="col-lg-12 text-center">
          <p>Selecione uma das opções</p>
          <form action="foodpage.php" name="select" method="post">

            <select name="select" class="limpar">
                <optgroup label="Consultar pratos">
                    <option value="pratos">Ver todos os pratos</option>
                    <option value="o_preco">Por preço</option>
                    <option value="o_disponibilidade">Por disponibilidade</option>
                </optgroup>
                <optgroup label="Pesquisa avancada buscar pratos">
                    <option value="ingredientes">Ver pratos por ingredientes</option>
                    <option value="categoria">Ver pratos por tipo de comida</option>
                    <option value="quantidade">Ver pratos por quantidade</option>
                </optgroup>
                <optgroup label="Consultar vendedores">
                    <option value="vendedores">Ver todos os vendedores</option>
                </optgroup>
            </select><br><br>

            <input name="palavraChave" type="text" placeholder="Palavra-chave">
            <button class="btn btn-primary btn-sm" type="submit" name="submit">Procurar</button>
          </form><br>

          <form action="foodpage.php">
            <button class="btn btn-primary btn-sm limpar" type="submit">Limpar pesquisa</button>
          </form>
        </div>
      </div>
    </div>
  </div><br>

  <!-- pesquisa -->
  <div class="container">
      <div class="row">
          <div class="col-lg-12 text-center">

              <div id="masterContainer" class="container">
                  <div class="container">
                      <div class="compras">

                          <?php
                          if(isset($_POST['submit'])) {
                              // ligacao á base de dados
                              include "openconn.php";

                              // variaveis guardadas da informaca da pesquisa
                              $select = $_POST["select"];
                              $valor = $_POST["palavraChave"];

                              // funcao para escrever o resultado das queries do prato
                              function display_prato($conn, $select) {
                                  $result = mysqli_query($conn, $select);
                                  $resultCheck = mysqli_num_rows($result);

                                  echo "<h3 class='mt-5'>Resultado da pesquisa</h3><br>";

                                  if ($resultCheck > 0) {

                                    while ($row = mysqli_fetch_array($result)) {

                                        $userId = $row['utilizadorID'];

                                        $sql2 = "SELECT avatar FROM utilizador WHERE utilizadorID = '$userId' ";
                                        $result2 = mysqli_query($conn, $sql2);
                                        $row2 = mysqli_fetch_row($result2);

                                        //para tentar sacar os nomes dos ingredientes
                                        $sql3 = "SELECT nome FROM ingredientes WHERE pratoID = (SELECT pratoID FROM prato WHERE utilizadorID = '$userId') ";
                                        $result3 = mysqli_query($conn, $sql3);
                                        $row3 = mysqli_fetch_row($result3);

                                        $nomes = array();
                                        foreach ($row3 as $value) {
                                            $nomes[] = $value;
                                        }

                                        $nomes2 = implode(",",$nomes);


                                        echo "<div class='responsive'>
                                                   <div class='gallery'>
                                                        <div class='desc'>
                                                            <a href='' data-toggle='modal' data-target='#myModal1{$row['pratoID']}'>
                                                                <img src=profilePrato/{$row['img_prato']}>
                                                            </a>
                                                            <div class='desc'> <img src='profileImagem/{$row2[0]} ' alt='useravatar'style='width:50px;height:50px;border-radius:4px;'  class='useravatar'></div>                                                                                     
                                                            <p class='color_p'>".$row['nome']."</p>
                                                            <p class='color_p'><span class=\"glyphicon glyphicon-star\"></span> ".$row['rating']."</p>
                                                            <p class='color_p'><span class=\"glyphicon glyphicon-euro\"></span> ".$row['preco']."</p>
                                                            <p class='color_p'><span class=\"glyphicon glyphicon-calendar\"></span> ".$row['data_disponibilidade']."</p>
                                                          </div>
                                                      </div> 
                                                 </div>  
                                                <!-- Modal para as informações de comida-->
                                                 <div id='myModal1{$row['pratoID']}' class='modal fade' role='dialog'>
                                                     <div class='modal-dialog'>
                                                          <!-- Modal content-->
                                                          <div class='modal-content'>
                                                              <div class='modal-header'>
                                                                  <h3 class='modal-title'>Informação sobre o prato: ".$row['nome']."</h3>
                                                              </div>
                                                              <div class='modal-body'>
                                                                <img class='useravatar' src='profilePrato/{$row['img_prato']}' height='100' width='100'>                                                                  
                                                                <p class='color_p'>".$row['nome']."</p>
                                                                <p class='color_p'><span class=\"glyphicon glyphicon-star\"></span> ".$row['rating']."</p>
                                                                <p class='color_p'><span class=\"glyphicon glyphicon-euro\"></span> ".$row['preco']."</p>
                                                                <p class='color_p'><span class=\"glyphicon glyphicon-calendar\"></span> ".$row['data_disponibilidade']."</p>
                                                                <p class='color_p'>Doses disponiveis: ".$row['quantidade']."</p>
                                                                <p class='color_p'>Ingredientes: ".$nomes2."</p>
                                                                                                                     
                                                                <button class='btn btn-primary btn-sm btn-block' data-toggle=\"collapse\" data-target=\"#demo\">Comprar</button>
                                                                    <div id='demo' class='collapse'><br>
                                                                        <form action='compra.php' method='post' enctype='multipart/form-data' class=''>
                                                                            <p class='color_p'>Agendar a sua entrega</p>
                                                                            <input name='data_entrega' type='datetime-local' class='form-control' id='data_entrega' placeholder='Data de entrega' required><br>
                                                                            <input name='quantidades_a_tirar' type='text' class='form-control' id='quantidades_a_tirar' placeholder='1' required><br>
                                                                            <button class='btn btn-primary btn-sm'data-toggle=\"collapse\" data-target=\"#demo\">Confirmar compra</button>
                                                                        </form>
                                                                    </div>
                                                              </div>
                                                              <div class='modal-footer'>
                                                                  <button type='button' class='btn btn-default' data-dismiss='modal'>Fechar</button>
                                                             </div>
                                                          </div>
                                                     </div>
                                                 </div>";
                                      }
                                  } else {
                                      echo "<script>alert('Não foi encontrado o registo que pretende.');</script>";
                                  }
                              }

                              // funcao para escrever o resultado das queries para o vendedor
                              function display_vendedor($conn, $select) {
                                  $result = mysqli_query($conn, $select);
                                  $resultCheck = mysqli_num_rows($result);

                                  echo "<h3 class='mt-5'>Resultado da pesquisa</h3><br>";

                                  if ($resultCheck > 0) {
                                      while ($row = mysqli_fetch_array($result)) {

                                          $userId = $row['utilizadorID'];

                                          $sql2 = "SELECT avatar FROM utilizador WHERE utilizadorID = '$userId' ";
                                          $result2 = mysqli_query($conn, $sql2);
                                          $row2 = mysqli_fetch_row($result2);

                                          //para escrever os pratos
                                          $sql3 = "SELECT nome FROM prato WHERE utilizadorID = '$userId' ";
                                          $result3 = mysqli_query($conn, $sql3);
                                          $row3 = mysqli_fetch_row($result3);

                                          $nomes = array();
                                          foreach ($row3 as $value) {
                                                $nomes[] = $value;
                                          }

                                          $nomes2 = implode(",",$nomes);
                                          //echo $teste2;

                                          echo "<div class='responsive'>
                                                      <div class='gallery'>
                                                        <div class='desc'>                                                                            
                                                            <div class='desc'> <img src='profileImagem/{$row2[0]} ' alt='useravatar'style='width:200px;height:200px;border-radius:4px;'  class='useravatar'></div> 
                                                             <p class='color_p'>Vendedor ".$row['vendedorID']."</p>
                                                             <p class='color_p'><span class=\"glyphicon glyphicon-star\"></span></p>
                                                             <p class='color_p'>Especialidade: ".$row['especialidade']."</p>
                                                             <p class='color_p'>Categoria(s): ".$row['tipoComida']."</p>
                                                             <p class='color_p'>Pratos disponiveis: ".$nomes2."</p>
                                                             <p class='color_p'>Período de fornecimento: ".$row['periodo']."</p>
                                                          </div>
                                                      </div>
                                                </div>";
                                      }
                                  } else {
                                      echo "<script>alert('Não foi encontrado o registo que pretende.');</script>";
                                  }
                              }


                              // queries de busca para a base de dados
                              if ($select == "pratos") {
                                  $select = "SELECT * FROM prato";
                                  display_prato($conn, $select);

                              } elseif ($select == "ingredientes") {
                                  $select = "SELECT * FROM prato WHERE pratoID = (SELECT pratoID FROM ingredientes WHERE nome = '$valor')";
                                  display_prato($conn, $select);

                              } elseif ($select == "categoria") {
                                  $select = " SELECT * FROM prato WHERE pratoID = (SELECT pratoID FROM categoria WHERE pratoID = pratoID AND nome = '$valor')";
                                  display_prato($conn, $select);

                              } elseif ($select == "quantidade") {
                                  $select = "SELECT * FROM prato WHERE quantidade = '$valor' ";
                                  display_prato($conn, $select);


                              } elseif ($select == 'o_preco') {
                                  $select = "SELECT * FROM prato ORDER BY preco ASC ";
                                  display_prato($conn, $select);

                              } elseif ($select == 'o_disponibilidade') {
                                  $select = "SELECT * FROM prato WHERE estado = 'disponivel' ORDER BY data_disponibilidade ASC ";
                                  display_prato($conn, $select);

                              } elseif ($select == 'vendedores') {
                                  $select = "SELECT * FROM vendedor";
                                  display_vendedor($conn, $select);

                              } else {
                                  echo "<script>alert('Não foi encontrado o registo que pretende.');</script>";
                                  echo "<script>window.location.assign('foodpage.php'); </script>";
                              }

                              //fecha a ligacao à base de dados
                              mysqli_close($conn);
                          }
                          ?>

                        </div>
                  </div>
              </div>
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
