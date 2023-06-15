<?php 

require_once '../ctr-model/vendasDAO.php';
$objVendas = new Vendas();

if(isset($_POST['insert'])) {
    $idCliente = $_POST['txtCliente'];
    $idProduto = $_POST['txtProduto'];
    $qtdVenda = $_POST['txtQtd'];
    // switch($idProduto) {
    //     case 1:
    //         $precoUnitario = 15;
    //         break;
    //     case 2:
    //         $precoUnitario = 13;
    //         break;
    // }
    if($idProduto == 1) {
        $precoUnitario = 15;
    }else {
        $precoUnitario = 13;
    }
    $precoFinal = ($qtdVenda * $precoUnitario);
    $dataVenda = $_POST['txtData'];
    if($objVendas->insert($idCliente, $idProduto, $qtdVenda, $precoFinal, $dataVenda)) {
        $objVendas->redirect('../adm-vendas.php');
    }
}

?>