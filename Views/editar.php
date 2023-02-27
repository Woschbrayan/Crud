<?php
//iniciando sessão
session_start();
ob_start();

/*Recebendo A ID pela url e instancianto para pegar valores do Database*/
  require'./Helpers/Editar.php';


  $value = new Editar();
  $id_produto = $_GET['numproduto'] ??  NULL;
  $value->id = $id_produto;
  $infoProd = $value->listarUsuarioUnico();


  /*Recebendo alterações pelo Post*/
  $formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);
  
  /*Recebendo e instanciando valores para a Função UPDATE*/
    if (!empty($formData['sendEdit'])) {

      $edit = new Editar();
      $edit->formData = $formData;
      $valores = $edit->editarProduto();
      
    
       
      isset($_SESSION['msg']);
      $msg = $_SESSION['msg'];
      unset($_SESSION['msg']); 

  /*Recebendo A ID pela url e instancianto para pegar valores do Database*/
    
      $value = new Editar();
      $id_produto = $_GET['numproduto'] ??  NULL;
      $value->id = $id_produto;
      $infoProd = $value->listarUsuarioUnico();
      
      
     }

/*Recebendo e instanciando valores para a Função DELETAR*/
    if(!empty($formData['sendDelete'])){
      require'./Helpers/Deletar.php';
      $delete = new Deletar();
      $delete->formData = $formData;
      $value = $delete->deletarProduto();

      
    }

     
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link rel="stylesheet" href="./editar.css">
    <title>Editar</title>

</head>
<body>
  <div class="containerPrincipal">
    <div class="cabecalhoEdit">
       <p style="color: white; font-size: 25px;">Editar Produto</p>
    </div> 

    <div class="EditarProduto">
    <?php
          if(!empty($msg)){
            echo $msg;
        }
    ?>

<form class="row g-3" action="" method="POST">
    
 <!--Input ID DO PRODUTO-->       
  <div  class="col-md-6" style="height: 13px;">
      <label for="idProduto" class="form-label">ID do Produto <br> <?php echo $infoProd['id_produto']; ?></label>
      <input style="visibility: hidden;" type="text" class="form-control" id="idProduto" name="idProduto"  value="<?php echo $infoProd['id_produto']; ?>">
  </div>

 <!--Input NOME DO PRODUTO--> 
  <div class="col-md-6">
        <label for="EditProduto" class="form-label">Nome do Produto</label>
        <input type="text" class="form-control" id="EditProduto" name="EditProduto"  value="<?php echo $infoProd['nome_produto']; ?>">
  </div>

 <!--Input DESCRIÇÃO DO PRODUTO--> 
  <div class="col-md-6">
        <label for="EditDescricao" class="form-label" >Descrição do Produto</label>
        <input type="text" class="form-control" id="EditDescricao" name="EditDescricao" value="<?php echo $infoProd['descricao_produto']; ?>">
  </div>
           
 <!--Input VALOR DO PRODUTO--> 
  <div class="col-md-6">
        <label for="EditValor" class="form-label" >Valor</label>
        <input type="number" class="form-control" id="EditValor" name="EditValor" value="<?php echo $infoProd['valor_produto']; ?>">
  </div>

 <!--Input QUANTIDADE DO PRODUTO--> 
  <div class="col-md-6">
        <label for="EditQtd" class="form-label">Quantidade</label>
        <input type="number" class="form-control" id="EditQtd" name="EditQtd" value="<?php echo $infoProd['quantidade_produto']; ?>">
  </div>

 <!--Input TIPO DO PRODUTO--> 
  <div class="col-md-6">
        <label for="EditTipo" class="form-label">Tipo de Produto</label>
        <select class="form-control" name="EditTipo" id="EditTipo" value="<?php echo $infoProd['tipo_produto']; ?>">
        <option value="eletronicos">Eletronico</option>
        <option value="alimento">Alimento</option>
        <option value="moda">Moda</option>
        </select>    
  </div>

 <!--Input DETALHES DO PRODUTO--> 
  <div class="col-md-6">
        <label for="EditDetalhes" class="form-label" >Detalhes</label>
        <input type="text" class="form-control" id="EditDetalhes" name="EditDetalhes" value="<?php echo $infoProd['detalhes_produto']; ?>">
  </div>

 <!--Botões de voltar e cadastrar--> 
  <div class="btns">
    <input type="submit" name="sendEdit"class="btn btn-primary">
    <button type="" class="btn btn-primary"><a href="./home.php"> Voltar</button> </a>  
    <input type="submit" value="Deletar" name="sendDelete"class="btn btn-danger">
  </div>
</form>
</div>
</div>

</body>
</html>