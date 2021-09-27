<?php

require 'class/Produto.php';

$produto = new Produto();

switch ($_GET['operacao']) {
    case 'list':
        echo '<h3>Produtos</h3>';

        foreach($produto->list() as $value){
            echo 'Id: '. $value['id'] . '<br>Nome: '. $value['nome'].'<br>Descrição: '. $value['descricao'].'<hr>';
        }
        break;
        
    default:
        break;
}
