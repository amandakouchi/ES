<?php

require_once "Connection.php";

class Viagem{
    
    private $tipo;
    private $linha;
    private $tempo;
    
    
    public function __construct($tipo, $linha, $tempo){
        $this->tipo = $tipo;
        $this->linha = $linha;
        $this->tempo = $tempo;
    } 
    
    public function getTipo(){
        return $this->tipo;
    }
    
    public function getLinha(){
        return $this->linha;
    }
    
    public function getTempo(){
        return $this->tempo;
    }
    
    public static function viagemPorUsuario($cpf){
        $conn = Connection::getInstance();
        
        if(!$conn){
            die("Falha na conexão com o banco: ".mysqli_connect_error());
        }
        
        // trata da US04 AC01, AC02, AC03
        $sql = "SELECT tipo, linha, DATE_FORMAT(datahora, '%d/%m/%Y %H:%i') AS tempo 
                FROM viagem, meioTransporte
                WHERE viagem.id_meio = meioTransporte.id_meio AND cpf_usuario=".$cpf."
                ORDER BY datahora DESC;";
            
        // como a conexão foi feita de forma procedural, o mesmo ocorre aqui
        $resul = mysqli_query($conn, $sql);
        // inserindo as linhas de retorno no vetor viagens
        
        if(!$resul){
            echo $sql;
        }
        
        $viagens = array();
        while($viagem = mysqli_fetch_assoc($resul)){
            $viagens[] = new Viagem($viagem["tipo"], $viagem["linha"], $viagem["tempo"]);
        }
        
        return $viagens;
    }
    
    public static function viagemPorMes($usuario, $mes){
        $conn = Connection::getInstance();
        
        if(!$conn){
            die("Falha na conexão com o banco: ".mysqli_connect_error());
        }
        
//      trata da US05 AC04
        $mes_atual = date("m");
        $mes_atual = intval($mes_atual);
        $mes = intval($mes);
        
        if($mes > $mes_atual) {
            $ano = intval(date("Y")) - 1;
            $ano = strval($ano);
        } else {
            $ano = date("Y");
        }
        
        $mes = strval($mes);
        
        $sql =  "SELECT tipo, linha, DATE_FORMAT(datahora, '%d/%m/%Y %H:%i') AS tempo 
                FROM viagem, meioTransporte
                WHERE viagem.id_meio = meioTransporte.id_meio AND
                    cpf_usuario =".$usuario." AND
                    datahora Like '".$ano."-".$mes."%'
                ORDER BY datahora DESC;";
            
        $resul = mysqli_query($conn, $sql);
        
        // inserindo as linhas de retorno no vetor viagens
        $viagens = array();
        while($viagem = mysqli_fetch_assoc($resul)){
             $viagens[] = new Viagem($viagem["tipo"], $viagem["linha"], $viagem["tempo"]);
        }
        
        return $viagens;        
    }
}

?>