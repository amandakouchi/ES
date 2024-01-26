<?php

    $usuario = $_REQUEST['usuario'];
    $viagens = $_REQUEST['viagens']; 
?>

<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <title>Listagem</title>
    </head>
    
    <body>
        <h1>Viagens de <?= $usuario->getNome()?></h1>
        
        <form method = 'post' action = "./index.php?classe=Lista&metodo=listarPorMes&usuario=<?= $usuario->getCPF()?>">
<!--        trata da US05 AC01, AC02 e AC06-->
            <label for="lista">Selecione um mês:</label>
            <select id="lista" name="mes" onchange="this.form.submit()">
                <option disabled selected>Mês</option>
                <option value="01">Janeiro</option>
                <option value="02">Fevereiro</option>
                <option value="03">Março</option>
                <option value="04">Abril</option>
                <option value="05">Maio</option>
                <option value="06">Junho</option>
                <option value="07">Julho</option>
                <option value="08">Agosto</option>
                <option value="09">Setembro</option>
                <option value="10">Outubro</option>
                <option value="11">Novembro</option>
                <option value="12">Dezembro</option>
            </select>
        </form>
        <br>
        
        <?php
        
        // trata da US04 AC05
        if(!$viagens){
            echo "Você não realizou nenhuma viagem...";
        }
        else {
            foreach($viagens as $viagem):
                echo "(".$viagem->getTempo()."): ".$viagem->getTipo().", ".$viagem->getLinha().";<br>";
            endforeach;
        }
        
        ?>
        
        <br>
         
        <button type="button" onclick="window.location.href = '?classe=Lista&metodo=listar&usuario=<?= $usuario->getCPF()?>'">Limpar</button>
        
    </body>
    
</html>