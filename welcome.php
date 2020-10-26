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

   //testar a interrogação $resultCheck = mysqli_num_rows($result);
   // echo $resultCheck;

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


         //$localImagem = $row2[0];
         //$fileName = $row2[1];
         //echo $localImagem;
         //echo $fileName;

         $localAvatar = "profileImagem/" . $userAvatar ;

         $testeImage = "uploads/adepto.jpg" ;
       //  echo $testeImage;
       // echo "<img src= ".$testeImage."/>";
       //  echo "<img src=".$localImagem."/>";

   //testar a interrogação        $resultCheck = mysqli_num_rows($resultado);
   // echo $resultCheck;
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
  <script >

  function openForm() {
document.getElementById("myPopUp").style.display = "block";
}

function closeForm() {
document.getElementById("myPopUp").style.display = "none";

}
  </script>

</head>

<style >

.botoes{

  text-align: right;
  margin-right : 6%;
  margin-bottom: 4%;
}

.table td {
   text-align: center;
}

.table th {
   text-align: center;
   overflow-y:auto;
}

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  border: 4px outset #936039;
	background-image: linear-gradient( #dbe86d, #9fd0a3);
	color: #540d22;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 38px;
  width: 220px;
}

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  bottom: 80px;
  right: 38px;
  z-index: 9;
  border: 4px outset #936039;
	background-image: linear-gradient( #dbe86d, #9fd0a3);
	color: #540d22;
  height: 90%;
  overflow: auto;
  max-width: 25%;
}

/* CSS PARA O CHAT */



.stretch-card>.card {
    width: 100%;
    min-width: 100%
}

body {
    background-color: #f9f9fa
}

.flex {
    -webkit-box-flex: 1;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto
}

@media (max-width:991.98px) {
    .padding {
        padding: 1.5rem
    }
}

@media (max-width:767.98px) {
    .padding {
        padding: 1rem
    }
}

.padding {
    padding: 3rem
}

.box.box-warning {
    border-top-color: #f39c12
}

.box {
    position: relative;
    border-radius: 3px;
    background: #ffffff;
    border-top: 3px solid #d2d6de;
    margin-bottom: 20px;
    width: 100%;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1)
}

.box-header.with-border {
    border-bottom: 1px solid #f4f4f4
}

.box-header.with-border {
    border-bottom: 1px solid #f4f4f4
}

.box-header {
    color: #444;
    display: block;
    padding: 10px;
    position: relative
}

.box-header:before,
.box-body:before,
.box-footer:before,
.box-header:after,
.box-body:after,
.box-footer:after {
    content: "";
    display: table
}

.box-header {
    color: #444;
    display: block;
    padding: 10px;
    position: relative
}

.box-header>.fa,
.box-header>.glyphicon,
.box-header>.ion,
.box-header .box-title {
    display: inline-block;
    font-size: 18px;
    margin: 0;
    line-height: 1
}

.box-header>.box-tools {
    position: absolute;
    right: 10px;
    top: 5px
}

.box-header>.box-tools [data-toggle="tooltip"] {
    position: relative
}

.bg-yellow,
.callout.callout-warning,
.alert-warning,
.label-warning,
.modal-warning .modal-body {
    background-color: #f39c12 !important
}

.bg-yellow {
    color: #fff !important
}

.btn {
    border-radius: 3px;
    -webkit-box-shadow: none;
    box-shadow: none;
    border: 1px solid transparent
}

.btn-box-tool {
    padding: 5px;
    font-size: 12px;
    background: transparent;
    color: #97a0b3
}

.direct-chat .box-body {
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
    position: relative;
    overflow-x: hidden;
    padding: 0
}

.box-body {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    padding: 10px
}

.box-header:before,
.box-body:before,
.box-footer:before,
.box-header:after,
.box-body:after,
.box-footer:after {
    content: "";
    display: table
}

.direct-chat-messages {
    -webkit-transform: translate(0, 0);
    -ms-transform: translate(0, 0);
    -o-transform: translate(0, 0);
    transform: translate(0, 0);
    padding: 10px;
    height: 250px;
    overflow: auto
}

.direct-chat-messages,
.direct-chat-contacts {
    -webkit-transition: -webkit-transform .5s ease-in-out;
    -moz-transition: -moz-transform .5s ease-in-out;
    -o-transition: -o-transform .5s ease-in-out;
    transition: transform .5s ease-in-out
}

.direct-chat-msg {
    margin-bottom: 10px
}

.direct-chat-msg,
.direct-chat-text {
    display: block
}

.direct-chat-info {
    display: block;
    margin-bottom: 2px;
    font-size: 12px
}

.direct-chat-timestamp {
    color: #999
}

.btn-group-vertical>.btn-group:after,
.btn-group-vertical>.btn-group:before,
.btn-toolbar:after,
.btn-toolbar:before,
.clearfix:after,
.clearfix:before,
.container-fluid:after,
.container-fluid:before,
.container:after,
.container:before,
.dl-horizontal dd:after,
.dl-horizontal dd:before,
.form-horizontal .form-group:after,
.form-horizontal .form-group:before,
.modal-footer:after,
.modal-footer:before,
.modal-header:after,
.modal-header:before,
.nav:after,
.nav:before,
.navbar-collapse:after,
.navbar-collapse:before,
.navbar-header:after,
.navbar-header:before,
.navbar:after,
.navbar:before,
.pager:after,
.pager:before,
.panel-body:after,
.panel-body:before,
.row:after,
.row:before {
    display: table;
    content: ""
}

.direct-chat-img {
    border-radius: 50%;
    float: left;
    width: 40px;
    height: 40px
}

.direct-chat-text {
    border-radius: 5px;
    position: relative;
    padding: 5px 10px;
    background: #d2d6de;
    border: 1px solid #d2d6de;
    margin: 5px 0 0 50px;
    color: #444
}

.direct-chat-msg,
.direct-chat-text {
    display: block
}

.direct-chat-text:before {
    border-width: 6px;
    margin-top: -6px
}

.direct-chat-text:after,
.direct-chat-text:before {
    position: absolute;
    right: 100%;
    top: 15px;
    border: solid transparent;
    border-right-color: #d2d6de;
    content: ' ';
    height: 0;
    width: 0;
    pointer-events: none
}

.direct-chat-text:after {
    border-width: 5px;
    margin-top: -5px
}

.direct-chat-text:after,
.direct-chat-text:before {
    position: absolute;
    right: 100%;
    top: 15px;
    border: solid transparent;
    border-right-color: #d2d6de;
    content: ' ';
    height: 0;
    width: 0;
    pointer-events: none
}

:after,
:before {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box
}

.direct-chat-msg:after {
    clear: both
}

.direct-chat-msg:after {
    content: "";
    display: table
}

.direct-chat-info {
    display: block;
    margin-bottom: 2px;
    font-size: 12px
}

.right .direct-chat-img {
    float: right
}

.direct-chat-warning .right>.direct-chat-text {
    background: #f39c12;
    border-color: #f39c12;
    color: #fff
}

.right .direct-chat-text {
    margin-right: 50px;
    margin-left: 0
}

.box-footer {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    border-top: 1px solid #f4f4f4;
    padding: 10px;
    background-color: #fff
}

.box-header:before,
.box-body:before,
.box-footer:before,
.box-header:after,
.box-body:after,
.box-footer:after {
    content: "";
    display: table
}

.input-group-btn {
    position: relative;
    font-size: 0;
    white-space: nowrap
}

.input-group-btn:last-child>.btn,
.input-group-btn:last-child>.btn-group {
    z-index: 2;
    margin-left: -1px
}

.btn-warning {
    color: #fff;
    background-color: #f0ad4e;
    border-color: #eea236
}



</style>

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
            <a class="nav-link font_nav" href="foodpage.php" > Pratos Disponíveis <span class="	glyphicon glyphicon-cutlery	"></span></a>
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

  <!-- Modal para a ajuda-->
  <div id="modal_ajuda3" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">My Food App</h3>
        </div>
        <div class="modal-body">
          <p>Página de confirmação do login</p>
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
          <form action="carregar_saldo.php" method="post" enctype="multipart/form-data" class="">

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

  <!-- Modal para o Live Chat-->
  <div id='modal_LiveChat' class='modal fade  ' role='dialog'>

        <div class='modal-dialog modal-md'>
          <!-- Modal content-->
          <div class='modal-content'>
                <div class='box box-warning direct-chat direct-chat-warning'>

                    <div class='box-body'>
                        <div class='direct-chat-messages'>
                            <div class='direct-chat-msg'>
                                <div class='direct-chat-text'> For what reason would it be advisable for me to think about business content? </div>
                            </div>
                            <div class='direct-chat-msg right'>
                                <div class='direct-chat-text'> Thank you for your believe in our supports </div>
                            </div>
                            <div class='direct-chat-msg'>
                                <div class='direct-chat-text'> For what reason would it be advisable for me to think about business content? </div>
                            </div>
                            <div class='direct-chat-msg right'>
                                <div class='direct-chat-text'> I would love to. </div>
                            </div>
                        </div>
                    </div>
                    <div class='box-footer'>
                        <form action='#' method='post'>
                            <div class='input-group'>
                              <input type='text' name='message' placeholder='Escreva a sua mensagem ...' class='form-control'> <span class='input-group-btn'> <button type='button' class='btn btn-primary btn-md'>Enviar</button> </span>
                             </div>
                        </form>
                    </div>
                </div>


        <div class='modal-footer'>
          <button type='button' class='btn btn-primary btn-sm' data-dismiss='modal'>Fechar</button>
        </div>
      </div>
    </div>
  </div>


  <!-- Modal para o Histórico de vendas-->
  <div id="modal_Hvendas" class="modal fade  " role="dialog">
    <div class="modal-dialog modal-lg">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Histórico de vendas</h3>
        </div>
        <div class="modal-body">
          <?php

          $sql2 = "SELECT data_entrega , nome_prato , preco , quant_comprada FROM hvendas WHERE vendedor ='$userId' ";
          $result2 = mysqli_query($conn, $sql2);
          $resultCheck = mysqli_num_rows($result2);
          $counter = 1 ;

          echo "
          <div class='tabela'>

            <table class='table'>
              <thead class='thead-dark'>
           <tr>

             <th scope='col'>#</th>
             <th>Data da Entrega</th>
             <th>Prato</th>
             <th>Preço por dose</th>
             <th>Quantidade</th>
             <th>Custo Total</th>

           </tr>
             </thead>

             <tbody>




          " ;

            while ($row = mysqli_fetch_array($result2)) {

              $custo_total = $row['preco'] * $row['quant_comprada'];
              $custo_com_cents = number_format($custo_total, 2, '.', '');
              echo "

              <tr>

                <th scope='row'>{$counter}</th>
                <td> {$row['data_entrega']}  </td>
                <td> {$row['nome_prato']} </td>
                <td> {$row['preco']} € </td>
                <td> {$row['quant_comprada']}  </td>
                <td> {$custo_com_cents} € </td>


              </tr>


              ";

            $counter = $counter + 1 ;
            }

            echo "
            </tbody>
            </table>

            ";
           ?>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>
  </div>


<?php


      function chat($de_quem,$para_quem) {




        $sql_conversa = "SELECT mensagem FROM chat WHERE de_userID = '$de_quem' or de_userID = '$para_quem'  and para_userID ='$para_quem' or para_userID ='$de_quem' order by tempo asc  ";
        $result_conversa = mysqli_query($conn, $sql_conversa);
        $result_conversa_Check = mysqli_num_rows($result_conversa);



          while ($row_conversa = mysqli_fetch_array($result_conversa)) {




                echo "<!-- Modal para o Live Chat-->
                <div id='modal_LiveChat' class='modal fade  ' role='dialog'>


                  <td> {$row_conversa['mensagem']}  </td>

                      <div class='modal-dialog modal-md'>
                        <!-- Modal content-->
                        <div class='modal-content'>
                              <div class='box box-warning direct-chat direct-chat-warning'>

                                  <div class='box-body'>
                                      <div class='direct-chat-messages'>
                                          <div class='direct-chat-msg'>
                                              <div class='direct-chat-text'> For what reason would it be advisable for me to think about business content? </div>
                                          </div>
                                          <div class='direct-chat-msg right'>
                                              <div class='direct-chat-text'> Thank you for your believe in our supports </div>
                                          </div>
                                          <div class='direct-chat-msg'>
                                              <div class='direct-chat-text'> For what reason would it be advisable for me to think about business content? </div>
                                          </div>
                                          <div class='direct-chat-msg right'>
                                              <div class='direct-chat-text'> I would love to. </div>
                                          </div>y
                                      </div>
                                  </div>
                                  <div class='box-footer'>
                                      <form action='#' method='post'>
                                          <div class='input-group'>
                                            <input type='text' name='message' placeholder='Escreva a sua mensagem ...' class='form-control'> <span class='input-group-btn'> <button type='button' class='btn btn-primary btn-md'>Enviar</button> </span>
                                           </div>
                                      </form>
                                  </div>
                              </div>


                      <div class='modal-footer'>
                        <button type='button' class='btn btn-primary btn-sm' data-dismiss='modal'>Fechar</button>
                      </div>
                    </div>
                  </div>
                </div>";


}}
?>






  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="mt-5 titulos">Bem vindo!</h1><br>
        <div id="masterContainer" class="container">
          <div class="container">





            <div class="tagsDaInfo">




                  <img src=<?php echo $localAvatar; ?> alt="useravatar" height="160" width="160" class="useravatar" >

                <img src=<?php echo $avatarUploaded; ?> alt="" height="160" width="160" class="Uploadeduseravatar" >



                  <form action="upload.php" method="post" enctype="multipart/form-data"><br>
                      Upload de imagem:
                      <input type="file" name="fileToUpload" id="fileToUpload">
                      <input type="submit" value="Upload Imagem" name="submit">
                  </form>

                  <h3>Nome de utilizador : <?php echo $userNickname ?> </h3>
                  <h3>Nome Completo : <?php echo $nomeProprio . " " . $apelido ?> </h3>
                  <h3>Género : <?php echo $userSexo ?> </h3>
                  <h3>País de habitação : <?php echo $userPais ?> </h3>
                  <h3>Distrito : <?php echo $userDistrito ?> </h3>
                  <h3>Concelho : <?php echo $userConcelho ?> </h3>

                <div class="botoes">


                  <button class="btn btn-primary btn-sm" onclick="window.location.href= 'pratoCreator.html';" > Criar Prato </button>
                  <br>
                  <br>
                  <button class="btn btn-primary btn-sm" onclick="window.location.href= 'meuspratos.php';"> Os meus pratos </button>
                  <br>
                  <br>
                  <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_Hvendas"> Histórico de vendas </button>
                  <br>
                  <br>

              </div>






              </div>




            </div>

            <button class="open-button" onclick="openForm()" onclick="closeForm()">Chat</button>

            <div class="form-popup" id="myPopUp">

            <?php

            $sqlzorro = "SELECT nickname FROM utilizador WHERE tipo !='vendedor'  ";
            $resultorro = mysqli_query($conn, $sqlzorro);
            $resultCheck = mysqli_num_rows($resultorro);


            echo "
            <div class='tabela'>

              <table class='table'>
                <thead class='thead-dark'>
             <tr>


               <th>Nickname</th>
               <th>Live Chat</th>


             </tr>
               </thead>

               <tbody>




            " ;

              while ($rowzorro = mysqli_fetch_array($resultorro)) {


                echo "

                <tr>


                  <td> {$rowzorro['nickname']}  </td>

                  <th><button class='btn btn-primary btn-sm' data-toggle='modal' data-target='#modal_LiveChat'> Live chat </button></th>





                </tr>


                ";

 ?>
















<?php
              }

              echo "
              </tbody>
              </table>
              </div>
              ";
             ?>
             <button type="submit" class="btn cancel" onclick="closeForm()">Close</button>

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
