<!DOCTYPE html>
<?php
//Instanciando function editar 
   require'./Helpers/Editar.php';
   $value = new Editar();

//recebendo valores da url 
   $id_produto = $_GET['numproduto'] ??  NULL;
   $value->id = $id_produto;
   $infoProd = $value->listarUsuarioUnico();
   
                      
?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="./detalhes.css">
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <title>Detalhes</title>
</head>
<body>
  <div class="containerPrincipal">

    <div class="cabecalhoDetalhes"> <p style="text-align: center; color:white; font-size:25px;">Detalhes</p></div> 
      <div class="inContainer">
<!--Descrição do nome do produto-->
    <div class="col-md-6">
      <label for="inputEmail4" class="form-label" >Produto:</label>
      <?php  echo $infoProd['nome_produto'];  ?></br>

<!--Descrição do Descrição do produto-->
      <label for="inputPassword4" class="form-label" >Descrição:</label>
      <?php  echo $infoProd['descricao_produto'];  ?></br>

<!--Descrição do Tipo do produto-->
      <label for="inputCity" class="form-label">Tipo:</label>
      <?php  echo $infoProd['tipo_produto'];  ?></br>

<!--Descrição do Detalhes do produto-->
      <label for="inputPassword4" class="form-label" >Detalhes:</label>
      <?php  echo $infoProd['detalhes_produto'];  ?></br>
    </div>

    <div class="col-md-6">
<!--Descrição do Valor do produto-->
      <label class="form-label" >Valor:</label>
      <?php  echo $infoProd['valor_produto'];  ?></br>
    
<!--Descrição do Quantidade do produto-->
      <label class="form-label">Qtde:</label>
      <?php  echo $infoProd['quantidade_produto'];  ?></br>
<!--Descrição da data do produto-->
      <label class="form-label">Data:</label>
      <?php  echo $infoProd['data_registro'] ?></br>

    </div>


       
      </div>
      <a href="./home.php" style="width: 10%;"><button type="submit" class="btn btn-primary" style="margin:5%;"> Voltar</button> </a> 
      </div>
    
  </div>
</body>
</html>