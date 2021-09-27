<?php

declare(strict_types=1);

class Produto
{
    /**
     * @var PDO
     */
    private $conexao;

    public function __construct()
    {

        //TODO:aplicar teste se conexao ja existe

        try{
            $this->conexao = new PDO('mysql:host=mysql;dbname=exemplo', 'root','1234');
        } catch (Exception $e){
            echo $e->getMessage();
            die();
        }
    }

    public function list() : array
    {
        $sql = 'select * from produtos';
        
        $produtos = [];

        foreach($this->conexao->query($sql) as $key => $value){
            array_push($produtos, $value);
        }

        return $produtos;
    }

    public function insert(string $nome, string $descricao) : int
    {
        $sql = 'insert into produtos(nome, descricao) values(?, ?)';

        $prepare = $this->conexao->prepare($sql);

        $prepare->bindParam(1, $nome);
        $prepare->bindParam(2, $descricao);
        $prepare->execute();

        return $prepare->rowCount();
    }

    public function update(string $descricao, int $id) : int
    {
        $sql = 'update produtos set descricao = ? where id = ?';

        $prepare = $this->conexao->prepare($sql);
        
        $prepare->bindParam(1, $descricao);
        $prepare->bindParam(2, $id);
        
        $prepare->execute();
        
        return $prepare->rowCount();
    }

    public function delete(int $id) : int
    {
        $sql = 'delete from produtos where id = ?';

        $prepare = $this->conexao->prepare($sql);
        
        $prepare->bindParam(1, $id);
        $prepare->execute();
        
        return $prepare->rowCount();
    }

}