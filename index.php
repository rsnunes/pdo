<?php

require 'class/Produto.php';

$produto = new Produto();

switch ($_GET['operacao']) {

    case 'insert':
        $status = $produto->insert('novo', 'produto teste');
        echo ($status > 0) ? 'Produto cadastrado!' : 'Falha ao cadastrar!';
        break;
    
    case 'update':
        $status = $produto->update('teste', 1);
        echo ($status > 0) ? 'Produto atualizado!' : 'Falha ao atualizar!';
        break;
    
    case 'delete':
        $status = $produto->delete(1);
        echo ($status > 0) ? 'Produto excluído!' : 'Falha ao excluir!';
        break;
    
    case 'list':
    default:
        echo '<h3>Produtos</h3>';

        foreach($produto->list() as $value){
            echo 'Id: '. $value['id'] . '<br>Nome: '. $value['nome'].'<br>Descrição: '. $value['descricao'].'<hr>';
        }
        break;
}
