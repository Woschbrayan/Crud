<?php
//Chamando o arquivo de conexão


class Deletar
{
    /** @formDta array recebe valores do produto*/
        public array $formData;

    /**Function onde deleta o produto do Banco de dados @return void*/
        public function deletarProduto(){
       
    //tenta executar a conexão com o DataBase e a função de DELETE
        try{
        $conexao = new Conn();
        $conn = $conexao->conectar();

    //SQL da função Deletar
        $sql="DELETE FROM produto WHERE  id_produto  = {$this->formData['idProduto']}";
            
        $resultquery = $conn->prepare($sql);
        $resultquery->execute();
    //Redireciona a pag para Home        
        header('location: http://localhost/crud/Views/home.php');

    //Manten msg de sucesso
        $_SESSION['msg'] = "<p style='color:green;position: relative; left: 40%; margin: 0; width: 25%;'>Deletado com sucesso!</p>";

        }
    //se não conseguir executa
        catch(\Exception){
    //Redireciona a pag para Home   
        header('location: http://localhost/crud/Views/home.php');

    //Manten msg de ERRO
        $_SESSION['msg'] = "<p style='color:red;position: relative; left: 40%; margin: 0; width: 25%;'>Não foi possivel deletar o produto!</p>";

        }
        
    }

}