<?php 

require_once '../ctr-model/produtosDAO.php';
$objProdutos = new Produto();

if(isset($_POST['insert'])) {
    $nome = $_POST['txtNome'];
    $estoque = $_POST['txtEstoque'];
    $preco = $_POST['txtPreco'];
    if($objProdutos->insert($nome, $estoque, $preco)) {
        $objProdutos->redirect('../adm-produtos.php');
    }
}

if(isset($_POST['editar'])) {
    $nome = $_POST['txtNome'];
    $estoque = $_POST['txtEstoque'];
    $preco = $_POST['txtPreco'];
    $id = $_POST['txtId'];
    if($objProdutos->update($nome, $estoque, $preco, $id)) {
        $objProdutos->redirect('../adm-produtos.php');
    }
}

if(isset($_POST['delete'])) {
    $id = $_POST['txtId'];
    if($objProdutos->delete($id)) {
        $objProdutos->redirect('../adm-produtos.php');
    }
}



?>