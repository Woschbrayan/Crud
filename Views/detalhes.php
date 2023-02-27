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
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <title>Detalhes</title>
  <style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
  body{
    font-family: 'Poppins';         
    margin: 0;           
    padding: 0; 
  }

  .containerPrincipal{
    position: relative;
    left: 20%;
    margin-top: 1%;
    width: 50%;
    height: 38%;
    border-radius: 6px;
    box-shadow: 2px 5px 10px 2px rgb(0 0 0 / 30%);
  }
  
  .inContainer{
    position: relative;
    display: flex;
    padding: 2%;
  }
  label{
    color: #1572a1;
    margin: 2%;
  }
  .cabecalhoDetalhes{
    background-color: #1572a1;
  }
  button{
    margin: 5%;
  }

  </style>
</head>
<body>
  <div class="containerPrincipal">

    <div class="cabecalhoDetalhes"> <h1 style="text-align: center; color:white;">Detalhes</h1></div> 
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
      <a href="./home.php"><button type="submit" class="btn btn-primary"> Voltar</button> </a> 
      </div>
    
  </div>
</body>
</html>