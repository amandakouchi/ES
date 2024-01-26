<?php
require_once 'model/Viagem.php';
require_once 'model/Usuario.php';

class Lista{
    
    public function listar(){
        $cpf = $_GET['usuario'];
            
        $_REQUEST['usuario'] = Usuario::getUsuarioPorCPF($cpf);
        $_REQUEST['viagens'] = Viagem::viagemPorUsuario($cpf);
            
        require_once 'view/Listagem.php';
            
    }
    public static function listarPorMes(){
        $cpf = $_GET['usuario'];
        $mes = $_POST['mes'];
        
        $_REQUEST['usuario'] = Usuario::getUsuarioPorCPF($cpf);
        $_REQUEST['viagens'] = Viagem::viagemPorMes($cpf, $mes);
        
        require_once 'view/Listagem.php';
    }
    
    
        
}


?>