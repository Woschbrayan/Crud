<?php
require'./Helpers/Conn.php';
class ListarProduto
{
  /* @infoProd object Onde armazena todas informações do produto*/
  public object $infoProd;

  public int $inicio;

/** FUNCTION SELECT funcção onde realizara o select  @return void*/
 public function List()
 {
  //Instancciando a conexão com o DataBase
    $conexao = new Conn();
    $conn = $conexao->conectar();

  //Executando SQL
    $sql = "  SELECT * FROM `produto` ORDER BY `produto`.`nome_produto` ASC LIMIT {$this->inicio}, 10  ";
    $resultquery = $conn->prepare($sql);
    $resultquery->execute();

  //Laço de repição para executar mais de um protudo 
    while ($row_produtos = $resultquery->fetch(PDO::FETCH_ASSOC)):
            
?>         
<!--EXECUTAR O HTML com os valores do array-->
  <tr>
      <th scope='row'>  <?php  echo $row_produtos['id_produto'];    ?></th>
      <td><?php echo  $row_produtos['nome_produto'];                ?></td>
      <td><?php echo  $row_produtos['descricao_produto'];           ?></td>
      <td><?php echo  $row_produtos['tipo_produto'];                ?></td>
      <td><?php echo  $row_produtos['valor_produto'];               ?></td>
      <td><?php echo $row_produtos['quantidade_produto'];           ?></td>
      <td><?php echo $row_produtos['data_registro']; ?></td>
      <td class='acoes'><a href="/crud/Views/detalhes.php?numproduto=<?php echo $row_produtos['id_produto'];?>"><button type='button'name="btnVizualizar" class='btn btn-primary'>Visualizar</button></a></td>
      <td class='acoes'><a href='/crud/Views/editar.php?numproduto=<?php echo $row_produtos['id_produto'];?>'><button type='button' class='btn btn-secondary'>Editar</button></a></td>
  </tr> 
        
            
<?php
  //Final do while
    endwhile;
    } 


    public function count()
    {
    //Instancciando a conexão com o DataBase
      $conexao = new Conn();
      $conn = $conexao->conectar();
    //Executando SQL
      $sql = "SELECT COUNT(nome_produto) count FROM produto";
      $resultquery = $conn->prepare($sql);
      $resultquery->execute();

    //retornando valor fora do array  
      $retorno = $resultquery->fetch()["count"];
    //Utilizando funcao CEIL para formartar o valor
      $pag = ceil($retorno / 10);
      return $pag;

    }
}