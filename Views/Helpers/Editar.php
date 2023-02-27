<?php
require'./Helpers/Conn.php';
Class Editar
{
/**@formData array recebe valores do fomr para editar o registro*/
    public array $formData;

/** @id int recebe a id do produto*/
    public int $id;

/**Function para listar apenas um unico usuario*/
    
    public function listarUsuarioUnico()
    {
        
       //intanciando conexão com o DataBase
       
            $conexao = new Conn();
            $conn = $conexao->conectar();
  
        //Eexutando sql 
            $sql = "SELECT * FROM produto WHERE id_produto = $this->id";
            $resultquery = $conn->prepare($sql);
            $resultquery->execute();

        //Retornando valores em Array
            $row_produtos = $resultquery->fetch(PDO::FETCH_ASSOC);
            return $row_produtos;   

    }

    /**Function para editar as informações do produto*/

    public function editarProduto()
    {
        //intanciando conexão com o DataBase
            $conexao = new Conn();
            $conn = $conexao->conectar();

        //tentando executar o sql
            try{
                $sql = "UPDATE 
                produto
            SET
                nome_produto= '{$this->formData['EditProduto']}',
                descricao_produto= '{$this->formData['EditDescricao']}',
                tipo_produto= '{$this->formData['EditTipo']}',
                valor_produto= {$this->formData['EditValor']},
                quantidade_produto= {$this->formData['EditQtd']},
                detalhes_produto= '{$this->formData['EditDetalhes']}'
            WHERE 
                id_produto  = {$this->formData['idProduto']}";
        //Executando SQL
                $resultquery = $conn->prepare($sql);
                $resultquery->execute();

        //Retornando msg de sessão
        $_SESSION['msg'] = "<p style='color:green; margin-left: 30%;'>Alteração realizada com sucesso!</p>";

            }catch(\Exception){
        //se nã deu certo retorna msg de sessao de erro
            $_SESSION['msg'] = "<p style='color:red;'>Erro ao fazer Alteração!</p>";
            }
                
    }
} 

