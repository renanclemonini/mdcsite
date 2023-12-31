<?php 
    require_once('connection.php');

    class Vendas{
        private $connexao;

        public function __construct(){
            $dataBase = new dataBase();
            $this->connexao = $dataBase->dbConnection();                       
        }

        public function runQuery($sql){
            $stmt = $this->connexao->prepare($sql);
            return $stmt;
        }

        public function read(){
            try {
                $sql = "SELECT * FROM vendas";
                $stmt = $this->connexao->prepare($sql);
                $stmt->execute();

                return $stmt;
            } catch (PDOException $ex) {
                echo $ex->getMessage();
            }
        }

        public function readAll(){
            try {
                $sql = "SELECT v.id, date_format(v.dataVenda, '%d/%m/%Y') as 'Data', cli.nome as 'Cliente', pro.nome as 'Produto', v.qtdVenda
                FROM vendas v 
                INNER JOIN clientes cli ON v.idCliente = cli.id
                INNER JOIN produtos pro ON v.idProduto = pro.id ORDER BY v.dataVenda";
                $stmt = $this->connexao->prepare($sql);
                $stmt->execute();

                return $stmt;
            } catch (PDOException $ex) {
                echo $ex->getMessage();
            }
        }

        public function insert($idCliente, $idProduto, $qtdVenda, $dataVenda){
            try{
                $sql = "INSERT INTO vendas (idCliente, idProduto, qtdVenda, dataVenda) values (:idCliente, :idProduto, :qtdVenda, :dataVenda)";
                $stmt = $this->connexao->prepare($sql);
                $stmt->bindParam(':idCliente', $idCliente);
                $stmt->bindParam(':idProduto', $idProduto);
                $stmt->bindParam(':qtdVenda', $qtdVenda);
                $stmt->bindParam(':dataVenda', $dataVenda);
                $stmt->execute();

                return $stmt;
            }catch(PDOException $e){
                echo $e -> getMessage();
            }
        }

        public function update($qtdVenda, $dataVenda, $id){
            // idCliente = :idCliente, idProduto = :idProduto, , dataVenda = :dataVenda 
            // $stmt->bindParam(':idCliente', $idCliente);
            // $stmt->bindParam(':idProduto', $idProduto);
            try {
                $sql = "UPDATE vendas set qtdVenda = :qtdVenda, dataVenda = :dataVenda where id = :id";
                $stmt = $this->connexao->prepare($sql);
                $stmt->bindParam(':qtdVenda', $qtdVenda);
                $stmt->bindParam(':dataVenda', $dataVenda);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                return $stmt;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function deletar($id){
            try {
                $sql = "DELETE from vendas where id = :id";
                $stmt = $this->connexao->prepare($sql);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                return $stmt;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function redirect($url){
            header("Location: $url");
        }

        
    }
?>