<?php 

 class Conn{
        //Inicio da conexão com o banco de dados utilizando PDO
        public string $host = "localhost";
        public string $user = "root";
        public string $pass = "";
        public string $dbname = "testecarletto";
        public int $port = 3306;
        public object $connect;

        public function conectar(){
            try{
                $this->connect = new PDO("mysql:host=". $this->host . ";port=" . $this->port .";dbname=" . $this->dbname, $this->user, $this->pass);
                // echo "Conexão realizada com sucesso!";
                return $this->connect;
            }catch(Exception $erro){
                echo "Conexão com o banco de dados não realizado com sucesso: ".$erro->getMessage();
                return false;
            }
        }
}


