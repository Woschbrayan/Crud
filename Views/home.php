<!DOCTYPE html>
<?php
//iniciando sessão
  session_start();
  ob_start();

//Declarando variaveis para executar a paginação
  $pagina= 1;
  $inicio = 1;

  if(isset($_GET['pag'])){
    $pagina = filter_input(INPUT_GET, "pag", FILTER_VALIDATE_INT);
    $inicio = ($pagina * 10) - 10;
  }else{
    $inicio = (1 * 10) - 10;
  }
   
//Chamando a função de count para executar a paginação 
    require'./Helpers/Listar.php';
    $registro = new ListarProduto();
    $count = $registro->count();
 
//Verificando msg de erro/sucesso da function delete
    isset($_SESSION['msg']);
    $msg = $_SESSION['msg'] ?? null;
    unset($_SESSION['msg']); 

?>
<html lang="en">
<head>
<meta charset="UTF-8">
               <meta http-equiv="X-UA-Compatible" content="IE=edge">
               <meta name="viewport" content="width=device-width, initial-scale=1.0">
               <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
               <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
               <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
              <link rel="stylesheet" href="./home.css">
               <title>Home</title>
</head>
<body>
  <!--Container principal onde exibe todos registros-->
<div class="containerPrincipal">

<!--menu para cadastrar novo produto-->
  <div class="menu">
    <div class="btn-group">
        <a href="./cadastrar.php">  <button type="button" class="btn btn-primary">Cadastrar Produto</button></a>
        <?php
          if(!empty($msg)){
                 echo $msg;
          }
        ?>
    </div> 
  </div>


  <!--Tabela de produtos-->        
<div class="container ">
<table class="table">
    <thead class="table">
        <tbody>
            <tr class="table">
                <th  class="scope-col" scope="col">N° Produto</th>
                <th class="scope-col" scope="col">Produto</th>
                <th class="scope-col" scope="col">Descrição</th>
                <th class="scope-col" scope="col">Tipo</th>
                <th class="scope-col" scope="col">Valor</th>
                <th class="scope-col" scope="col">Quantidade</th>
                <th class="scope-col" scope="col">Data</th>
                <th class="scope-col" scope="col">Vizualizar</th>
                <th class="scope-col" scope="col">Editar</th>
            </tr>
  <?php
//chamano função para listar produtos na tabela 
  $produto = new ListarProduto();
  $produto->inicio = $inicio;
  $produtoselect = $produto->List();
?>
        </tbody>
    </table>
</table>
</div>

<!--paginação-->
<div class="paginacao">
<a href="?pag=1">Primeira</a>

  <?php if($pagina>1): ?>
    <a href="?pag=<?=$pagina-1?>"><<</a> 
  <?php endif; ?>

  <p style="border-style: solid;width: 4%;text-align: center;border-width: 1px;border-color: #007bff;color: #007bff;"><?=$pagina?></p>

  <?php if($count>$pagina): ?>
    <a href="?pag=<?=$pagina+1?>">>></a>
  <?php endif;?>
    <a href="?pag=<?=$count ?>">ultima</a>
</div>
</div>
</body>
</html>