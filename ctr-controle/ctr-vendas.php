<?php 

require_once '../ctr-model/vendasDAO.php';
$objVendas = new Vendas();

require_once '../ctr-model/produtosDAO.php';
$objProdutos = new Produto();

date_default_timezone_set('America/Bahia');


if(isset($_POST['compraGirassol'])) {
    $idCliente = $_POST['txtCliente'];
    $idProduto = $_POST['txtProduto'];
    $qtdVenda = $_POST['txtQtdVenda'];
    $dataVenda = date('Y-m-d');
    if($objVendas->insert($idCliente, $idProduto, $qtdVenda, $dataVenda)) {
        $objVendas->redirect('../produtos.php');
    }
}

if(isset($_POST['insert'])) {
    $idCliente = $_POST['txtCliente'];
    $idProduto = $_POST['txtProduto'];
    $qtdVenda = $_POST['txtQtdVenda'];
    $dataVenda = $_POST['txtDataVenda'];
    if($objVendas->insert($idCliente, $idProduto, $qtdVenda, $dataVenda)) {
        $objVendas->redirect('../adm-vendas.php');
    }
}

if(isset($_POST['compraRicino'])) {
    $idCliente = $_POST['txtCliente'];
    $idProduto = $_POST['txtProduto'];
    $qtdVenda = $_POST['txtQtdVenda'];
    $dataVenda = date('Y-m-d');
    if($objVendas->insert($idCliente, $idProduto, $qtdVenda, $dataVenda)) {
        $objVendas->redirect('../produtos.php');
    }
}

if(isset($_POST['update'])){
    $qtdVenda = $_POST['txtQtdVenda'];
    $dataVenda = $_POST['txtDataVenda'];
    $id = $_POST['txtId'];
    if($objVendas->update($qtdVenda, $dataVenda, $id)) {
        $objVendas->redirect('../adm-vendas.php');
    }
}

if(isset($_POST['delete'])){
    $id = $_POST['txtId'];
    if($objVendas->deletar($id)) {
        $objVendas->redirect('../adm-vendas.php');
    }
}

?>