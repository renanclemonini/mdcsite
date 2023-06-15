<?php 

require_once '../ctr-model/agendamentosDAO.php';
$objAgendamentos = new Agendamentos();

if(isset($_POST['insert'])) {
    $idCliente = $_POST['txtCliente'];
    $idServico = $_POST['txtServico'];
    $dia = $_POST['txtData'];
    $horario = $_POST['txtHorario'];
    if($objAgendamentos->insert($idCliente, $idServico, $dia, $horario)) {
        $objAgendamentos->redirect('../adm-agendamentos.php');
    }
}

if(isset($_POST['insertCliente'])) {
    $idCliente = $_POST['txtCliente'];
    $idServico = $_POST['txtServico'];
    $dia = $_POST['txtData'];
    $horario = $_POST['txtHorario'];
    if($objAgendamentos->insert($idCliente, $idServico, $dia, $horario)) {
        $objAgendamentos->redirect('../agendamento-novo.php');
    }
}

if(isset($_POST['update'])) {
    $dia = $_POST['txtData'];
    $horario = $_POST['txtHorario'];
    $id = $_POST['txtId'];
    if($objAgendamentos->update($dia, $horario, $id)) {
        $objAgendamentos->redirect('../adm-agendamentos.php');
    }
}

if(isset($_POST['delete'])) {
    $id = $_POST['txtId'];
    if($objAgendamentos->deletar($id)) {
        $objAgendamentos->redirect('../adm-agendamentos.php');
    }
}

?>