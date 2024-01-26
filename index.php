<?php

// PARA ACESSAR O MÉTODO A SER EXECUTADO:
// na sua URL: 
// localhost/ES_mobilidade/?classe=<CLASSE>&metodo=<METODO>&<PARAMETRO1>=<VALOR1>

// EX: para executar o método listar(98765432101) da classe Lista em controller: 
// localhost/ES_mobilidade/?classe=Lista&metodo=listar&usuario=98765432101

$classe = $_GET['classe']; 
$metodo = $_GET['metodo'];

require_once 'controller/'.$classe.".php";

$obj = new $classe();
$obj->$metodo();

?>