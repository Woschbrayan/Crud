<?php
 require './Helpers/Conn.php';
class Create
{
    /**@Formdata array retorna o valor recebido pelo form */
    public array $formData;
    /** function criar functio onde executa a criação do produto no DataBase*/
    public function criar()
    {
    //instanciando a coexão
        $conexao = new Conn();
        $conn = $conexao->conectar();

    //execuntando o SQL
    try{
        $sql ="INSERT INTO `produto` (`id_produto`, `nome_produto`, `descricao_produto`, `tipo_produto`, `valor_produto`, `quantidade_produto`, `data_registro`, `detalhes_produto`)
        VALUES(default,'{$this->formData['produto']}', '{$this->formData ['descricao']}', '{$this->formData ['tipo']}', '{$this->formData ['valor']}', '{$this->formData ['qtd']}', current_timestamp(), '{$this->formData ['detalhes']}')";
        $resultquery = $conn->prepare($sql);
        $resultquery->execute();

    //Redireciona a pag para Home  
        header('location: http://localhost/crud/Views/home.php');


    //Passando msg de sessão
        $_SESSION['msg'] =  "<p style='color:green;position: relative; left: 40%; margin: 0; width: 25%;'>Produto Cadastrado com sucesso!</p>";
    }catch(Exception){

    //Redireciona a pag para Home  
        header('location: http://localhost/crud/Views/home.php');

        $_SESSION['msg'] =  "<p style='color:red;position: relative; left: 40%; margin: 0; width: 25%;'>Produto Não Cadastrado!</p>";
    }

    }

}