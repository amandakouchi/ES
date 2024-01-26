<?php

//IMPLEMENTAÇÃO COM SINGLETON

class Connection{
    
    private static $instance;
    
    private function __construct(){
    }
    
    public static function getInstance(){ 
        // verifica se a instância já existe instância 
        if(!isset(self::$instance)){
            self::$instance = mysqli_connect("localhost", "root", "", "mobilidade");
        }
        
        return self::$instance; 
        // :: é um operador para acessar constantes, atributos ou métodos estáticos
        // diferentemente do java, no php não se pode omitir o self 
    }
    
}

?>