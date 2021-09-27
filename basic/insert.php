<?php

declare(strict_types=1);

$pdo = require 'connect.php';
$sql = 'insert into produtos(nome, descricao) values(?, ?)';

$prepare = $pdo->prepare($sql);

$prepare->bindParam(1, $_GET['nome']);
$prepare->bindParam(2, $_GET['descricao']);
$prepare->execute();

echo $prepare->rowCount();