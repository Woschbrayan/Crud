<!DOCTYPE html>
<?php
//iniciando sessão
  session_start();
  ob_start();

//Verificando msg de erro/sucesso da function delete
  isset($_SESSION['msg']);
  $msg = $_SESSION['msg'] ?? null;
  unset($_SESSION['msg']); 


?>
<html lang="PT-BR">
<head>   
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <link rel="stylesheet" href="./cadastrar.css">
  <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<title>Cadastrar Produto</title>
  <style>

  </style>
</head>
<body>
<?php
//Filtrando Form pelo input
  $formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

  if (!empty($formData['addProduto'])) {

//Instanciando function de cadastro 
    require'./Helpers/Create.php';
    $created = new Create();
    $created->formData = $formData;
    $value = $created->criar();
  }

?>
<!--Formulario de Cadastro de Produtos-->
<div class="CadProduto">
 <div class="cabecalhoCad"> <p>Cadastrar Produtos</p></div>    
 <?php
      if(!empty($msg)){
          echo $msg;
      }
  ?>
<form class="row g-3" action="" method="post">

<!--Input nome do produto-->
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label" >Produto</label>
    <input type="text" class="form-control" id="inputEmail4" name="produto" placeholder="Nome do Produto" required>
  </div>

<!--Input nome do produto-->
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label" >Descrição</label>
    <input type="text" class="form-control" id="inputPassword4" name="descricao" placeholder="Descrição do produto" required>
  </div>

<!--Input nome do produto-->    
  <div class="col-md-6">
    <label for="inputAddress2" class="form-label" >Valor</label>
    <input type="number" class="form-control" id="inputAddress2" name="valor" required>
  </div>

<!--Input nome do produto-->    
<div class="col-md-6">
  <label for="inputCity" class="form-label">Quantidade</label>
  <input type="number" class="form-control" id="inputCity" placeholder="00" name="qtd" required>
</div>

<!--Input nome do produto-->   
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Tipo</label>
      <select class="form-control" name="tipo" id="selectTipo" required>
        <option value=""></option>
        <option value="eletronicos">Eletronico</option>
        <option value="alimento">Alimento</option>
        <option value="moda">Moda</option>
      </select>       
  </div>

<!--Input nome do produto-->
    <div class="col-md-6">
      <label for="inputPassword4" class="form-label" >Detalhes</label>
      <input type="text" class="form-control" id="inputPassword4" name="detalhes" placeholder="Detalhes do Produto" required>
     
    </div>

<!--Grupo de Botões-->
<div class="grpBtn">
    <input type="submit" name="addProduto" value= "Cadastrar" class="btn btn-primary">
    <button type="" class="btn btn-primary"><a href="./home.php"> Voltar</button> </a>  
    </div>
</form>
</div>

</body>
</html>