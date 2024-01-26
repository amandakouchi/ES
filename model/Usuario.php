<?php

require_once "Connection.php";

class Usuario{
    
    private $cpf;
    private $nome;
    
    public function __construct($cpf, $nome){
        $this->cpf = $cpf;
        $this->nome = $nome;
    }
    
    
    public function getNome(){
        return $this->nome;
    }
    
     public function getCPF(){
        return $this->cpf;
    }
    
    
    public static function getUsuarioPorCPF($cpf){
        $conn = Connection::getInstance();
        
        if(!$conn){
            die("Falha na conexão com o banco: ".mysqli_connect_error());
        }
        
        // trata da US04 AC02
        $sql = "SELECT *
                FROM usuario
                WHERE cpf =".$cpf.";";
            
        // como a conexão foi feita de forma procedural, o mesmo ocorre aqui
        $resul = mysqli_query($conn, $sql);
        // inserindo as linhas de retorno no vetor viagens
        
        if(!$resul){
            echo $sql;
        }
        
        $temp = mysqli_fetch_assoc($resul);
        
        $usuario = new Usuario($temp["cpf"], $temp["nome"]);
        
        return $usuario;
    }
}

?>