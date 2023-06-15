<?php 

require_once 'connection.php';

class Produto
{
    private $conexao;

    public function __construct()
    {
        $dataBase = new dataBase();
        $this->conexao = $dataBase->dbConnection();
    }

    public function runQuery($sql)
    {
        try {
            $stmt = $this->conexao->prepare($sql);

            return $stmt;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function insert($nome, $estoque, $preco)
    {
        try {
            $sql = "INSERT INTO produtos (nome, estoque, preco) VALUES (:nome, :estoque, :preco)";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":estoque", $estoque);
            $stmt->bindParam(":preco", $preco);
            $stmt->execute();

            return $stmt;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function read()
    {
        try {
            $sql = "SELECT * FROM produtos";
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();

            return $stmt;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function update($nome, $estoque, $preco, $id)  
    {
        try {
            $sql = "UPDATE produtos SET nome = :nome, estoque = :estoque, preco = :preco WHERE id = :id";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":estoque", $estoque);
            $stmt->bindParam(":preco", $preco);
            $stmt->bindParam(":id", $id);
            $stmt->execute();

            return $stmt;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function delete($id)
    {
        try
        {
            $sql = "DELETE FROM produtos WHERE id = :id";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();

            return $stmt;
        }
        catch(PDOException $ex)
        {
            echo $ex->getMessage();
        }
    }

    public function redirect($url)
    {  
        header("Location: $url");
    }

}
?>