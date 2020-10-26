<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Pagina do Administrador</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<link type="text/css" href="css/cssProject.css" rel="stylesheet">
  </head>

  <body class="fundo_cor">

    <!-- Navigation bar-->
    <nav class="navbar-custom navbar navbar-expand-lg static-top nav_color">
      <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml navbar-right">
            <li class="nav-item">
              <a class="nav-link font_nav" href="index.html">Terminar Sessão <span class="glyphicon glyphicon-log-out"></span></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h1 class="mt-5 titulos">Welcome!</h1><br>
          <h3 class="mt-5">Consultar informação sobre os utilizadores registados</h3><br>
        </div>
      </div>
    </div>

    <!-- Acesso á base de dados -->
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <p>Selecione uma das opções</p>
          <form action="adminPage.php" name="select" method="post">
              <select name="select" class="limpar">
                <option value="todos">Todos os utilizadores</option>

                <optgroup label="LogIn">
                  <option value="nick">Nickname</option>
                  <option value="email">Email</option>
                </optgroup>

                <optgroup label="Local">
                  <option value="pais">País</option>
                  <option value="concelho">Concelho</option>
                  <option value="distrito">Distrito</option>
                </optgroup>

                <optgroup label="Faixa Etária">
                  <option value="0">&lt;18</option>
                  <option value="1">18 - 30</option>
                  <option value="2">31 - 50</option>
                  <option value="3">51 - 70</option>
                  <option value="4">&gt;70</option>
                </optgroup>

                //novooooo para o proj 2
                <optgroup label="informaçao vendas">
                    <option value="vendedores">Todos os vendedores</option>
                    <option value="pratos">Todos os pratos disponiveis</option>
                    <option value="vendas">Historico de vendas</option>
                </optgroup>
                
                // project 3
                <optgroup label="Estatistica de vendas">
                    <option value="egerais">Estatisticas gerais</option>
                    <option value="evendedor">Por vendedor</option>                
                </optgroup>


              </select><br><br>
              <input name="palavraChave" type="text" placeholder="Procurar palavra-chave">
            <button class="btn btn-primary btn-sm" type="submit" name="submit">Procurar</button>
          </form><br>

          <form action="adminPage.php">
              <button class="btn btn-primary btn-sm limpar" type="submit">Nova Pesquisa</button>
          </form>
        </div>
      </div>
    </div>
    <br>

    <!-- pesquisa -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">

                <?php
                if(isset($_POST['submit'])) {
                    // ligacao á base de dados
                    include "openconn.php";

                    // variaveis guardadas da informaca da pesquisa
                    $select = $_POST["select"];
                    $valor = $_POST["palavraChave"];


                    // pedidos à base de dados
                    function tabela($conn, $select) {
                        $result = mysqli_query($conn, $select);
                        $resultCheck = mysqli_num_rows($result);

                        if ($resultCheck > 0) {
                            while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                                $cabecalho = "<h3 class='mt-5'>Resultado da pesquisa</h3><br><tr>
                                <th>ID do utilizador</th>
                                <th>Nome de Utilizador (Nickname)</th>
                                <th>Nome Próprio</th>
                                <th>Apelido</th>
                                <th>Email</th>
                                <th>Sexo</th>
                                <th>Data de nascimento</th>
                                <th>Morada</th>
                                <th>Concelho</th>
                                <th>Distrito</th>
                                <th>País</th>
                                <th>Avatar</th>
                                <th>Tipo de Utilizador</th>
                                <th>Pass</th>
                                <th>Idade</th>
                                <th>Saldo disponivel</th>
                            </tr>";
                                $html[] = "<tr><td>" .
                                    implode("</td><td>", $row) . "</td></tr>";
                            }
                        } else {
                            echo "<script>alert('Não foi encontrado o registo que pretende.');</script>";
                        }

                        $html = "<div class='table-responsive'><table class='table' cellspacing='2' border='2' font-size: 14px;'>" . $cabecalho . implode($html) . "</table></div>";
                        echo $html;
                    }

                    function tabela_prato($conn, $select) {
                        $result = mysqli_query($conn, $select);
                        $resultCheck = mysqli_num_rows($result);

                        if ($resultCheck > 0) {
                            while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                                $cabecalho = "<h3 class='mt-5'>Resultado da pesquisa</h3><br><tr>
                                <th>ID do prato</th>
                                <th>Nome</th>
                                <th>Preço</th>
                                <th>Quantidade</th> 
                                <th>Data disponivel</th>
                                <th>Imagem do prato</th>
                                <th>Estado</th>
                                <th>Rating</th>
                                <th>Vendedor ID</th>
                                <th>Utilizador ID</th>
                            </tr>";
                                $html[] = "<tr><td>" .
                                    implode("</td><td>", $row) . "</td></tr>";
                            }
                        } else {
                            echo "<script>alert('Não foi encontrado o registo que pretende.');</script>";
                        }

                        $html = "<div class='table-responsive'><table class='table' cellpadding='2' cellspacing='2' border='2' font-size: 14px;'>" . $cabecalho . implode($html) . "</table></div>";
                        echo $html;
                    }

                    function historico_vendas($conn, $select) {
                        $result = mysqli_query($conn, $select);
                        $resultCheck = mysqli_num_rows($result);

                        if ($resultCheck > 0) {
                            while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                                $cabecalho = "<h3 class='mt-5'>Resultado da pesquisa</h3><br><tr>
                                <th>Venda ID</th>
                                <th>Data entrega</th>
                                <th>Quantidade comprada</th>
                                <th>Preço</th>
                                <th>Prato</th>
                                <th>Vendedor</th>
                                <th>Comprador</th>
                            </tr>";
                                $html[] = "<tr><td>" .
                                    implode("</td><td>", $row) . "</td></tr>";
                            }
                        } else {
                            echo "<script>alert('Não foi encontrado o registo que pretende.');</script>";
                        }

                        $html = "<div class='table-responsive'><table class='table' cellpadding='2' cellspacing='2' border='2' font-size: 14px;'>" . $cabecalho . implode($html) . "</table></div>";
                        echo $html;
                    }

                    function estatistica_geral($conn, $select) {
                        $result = mysqli_query($conn, $select);
                        $resultCheck = mysqli_num_rows($result);

                        if ($resultCheck > 0) {
                            while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {                              

                                //para buscar as médias dos precos do prato
                                $select2 = "SELECT AVG(preco) FROM hVendas";
                                $result2 = mysqli_query($conn, $select2);
                                $row2 = mysqli_fetch_row($result2);

                                //para contar o numero de compradores
                                $select3 = "SELECT COUNT(DISTINCT comprador) FROM hVendas";
                                $result3 = mysqli_query($conn, $select3);
                                $row3 = mysqli_fetch_row($result3);

                                echo "<h3 class='mt-5'>Estatistica de vendas gerais</h3>";
                                echo "<h4 class='mt-5'>Número total de pratos comprados: {$row[0]}</h4>";
                                echo "<h4 class='mt-5'>Média dos preços de pratos comprados: {$row2[0]}</h4>";
                                echo "<h4 class='mt-5'>Número total de compradores diferentes: {$row3[0]}</h4>";
                               
                            }
                        } else {
                            echo "<script>alert('Não foi encontrado o registo que pretende.');</script>";
                        }

                        $html = "<div class='table-responsive'><table class='table' cellpadding='2' cellspacing='2' border='2' font-size: 14px;'>" . $cabecalho . implode($html) . "</table></div>";
                        echo $html;
                    }

                    function estatistica_vendedor($conn, $select) {
                        $result = mysqli_query($conn, $select);
                        $resultCheck = mysqli_num_rows($result);
                        
                        
                        if ($resultCheck > 0) {
                            while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
               
                                $cabecalho = "<h3 class='mt-5'>Historico de compras do vendedor ID{$row[5]}</h3><br><tr>
                                <th>Venda ID</th>
                                <th>Data entrega</th>
                                <th>Quantidade comprada</th>
                                <th>Preço</th>
                                <th>Prato</th>
                                <th>Vendedor</th>
                                <th>Comprador</th>
                            </tr>";
                                $html[] = "<tr><td>" .
                                    implode("</td><td>", $row) . "</td></tr>"; 
                                
                                
                                //Total de pratos comprados daquele vendor
                                $select1 = "SELECT SUM(quant_comprada) FROM hVendas WHERE vendedor = '$row[5]' ";
                                $result1 = mysqli_query($conn, $select1);
                                $row1 = mysqli_fetch_row($result1);
                                

                                //Média dos precos praticado pelo vendor
                                $select2 = "SELECT AVG(preco) FROM hVendas WHERE vendedor = '$row[5]' ";
                                $result2 = mysqli_query($conn, $select2);
                                $row2 = mysqli_fetch_row($result2);

                                //Número total de compradores diferentes
                                $select3 = "SELECT COUNT(DISTINCT comprador) FROM hVendas WHERE vendedor = '$row[5]' ";
                                $result3 = mysqli_query($conn, $select3);
                                $row3 = mysqli_fetch_row($result3);

                                echo "<h3 class='mt-5'>Estatistica de compras do vendedor ID{$row[5]}</h3>";
                                echo "<h4 class='mt-5'>Número total de pratos comprados: {$row1[0]}</h4>";
                                echo "<h4 class='mt-5'>Média dos preços de pratos comprados: {$row2[0]}</h4>";
                                echo "<h4 class='mt-5'>Número total de compradores diferentes: {$row3[0]}</h4>";
                                
                            }
                        } else {
                            echo "<script>alert('Não foi encontrado o registo que pretende.');</script>";
                        }

                        $html = "<div class='table-responsive'><table class='table' cellpadding='2' cellspacing='2' border='2' font-size: 14px;'>" . $cabecalho . implode($html) . "</table></div>";
                        echo $html;

                       
                        
                        
                    }


                    if ($select == "todos") {

                        $select = "SELECT * FROM utilizador";
                        tabela($conn, $select);


                    } elseif ($select == "nick") {
                        $select = "SELECT * FROM utilizador WHERE nickname = '$valor' ";
                        tabela($conn, $select);

                    } elseif ($select == "nomeProprio") {
                        $select = "SELECT * FROM utilizador WHERE nomeProprio = '$valor' ";
                        tabela($conn, $select);

                    } elseif ($select == "apelido") {
                        $select = "SELECT * FROM utilizador WHERE apelido = '$valor' ";
                        tabela($conn, $select);


                    } elseif ($select == "email") {
                        $select = "SELECT * FROM utilizador WHERE email = '$valor' ";
                        tabela($conn, $select);

                    } elseif ($select == "sexo") {
                        $select = "SELECT * FROM utilizador WHERE sexo = '$valor' ";
                        tabela($conn, $select);

                    } elseif ($select == "dataNascimento") {
                        $select = "SELECT * FROM utilizador WHERE dataNascimento = '$valor' ";
                        tabela($conn, $select);

                    } elseif ($select == "morada") {
                        $select = "SELECT * FROM utilizador WHERE morada = '$valor' ";
                        tabela($conn, $select);

                    } elseif ($select == "concelho") {
                        $select = "SELECT * FROM utilizador WHERE concelho = '$valor' ";
                        tabela($conn, $select);

                    } elseif ($select == "distrito") {
                        $select = "SELECT * FROM utilizador WHERE distrito = '$valor' ";
                        tabela($conn, $select);

                    } elseif ($select == "pais") {
                        $select = "SELECT * FROM utilizador WHERE pais = '$valor' ";
                        tabela($conn, $select);

                    } elseif ($select == "tipo") {
                        $select = "SELECT * FROM utilizador WHERE tipo = '$valor' ";
                        tabela($conn, $select);


                    } elseif ($select == '0') {
                        $select = "SELECT * FROM utilizador WHERE idade <'18' ";
                        tabela($conn, $select);

                    } elseif ($select == '1') {
                        $select = "SELECT * FROM utilizador WHERE idade BETWEEN '18' AND '30' ";
                        tabela($conn, $select);

                    } elseif ($select == '2') {
                        $select = "SELECT * FROM utilizador WHERE idade BETWEEN '31' AND '50' ";
                        tabela($conn, $select);

                    } elseif ($select == '3') {
                        $select = "SELECT * FROM utilizador WHERE idade BETWEEN '51' AND '70' ";
                        tabela($conn, $select);

                    } elseif ($select == '4') {
                        $select = "SELECT * FROM utilizador WHERE idade > '70' ";
                        tabela($conn, $select);

                    } elseif ($select == 'vendedores') {
                        $select = "SELECT * FROM utilizador WHERE tipo = 'vendedor' or tipo = 'ambos' ";
                        tabela($conn, $select);

                    } elseif ($select == 'pratos') {
                        $select = "SELECT * FROM prato";
                        tabela_prato($conn, $select);

                    } elseif ($select == 'vendas') {
                        $select = "SELECT * FROM hVendas";
                        historico_vendas($conn, $select);

                    } elseif ($select == 'egerais') {
                        $select = "SELECT SUM(quant_comprada) FROM hVendas";
                        estatistica_geral($conn, $select); 
                    
                    } elseif ($select == 'evendedor') {
                        $select = "SELECT * FROM hVendas WHERE vendedor = '$valor' ";
                        estatistica_vendedor($conn, $select);    
                        
                    } else {
                        echo "<script>alert('Não foi encontrado o registo que pretende.');</script>";
                        echo "<script>window.location.assign('adminPage.php'); </script>";
                    }

                    //fecha a ligacao à base de dados
                    mysqli_close($conn);
                }
                ?>
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
  </body>
</html>
