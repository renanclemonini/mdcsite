<?php
    require_once './ctr-model/clienteDAO.php';
    $objClientes = new Cliente();
    
    require_once './ctr-model/produtosDAO.php';
    $objProdutos = new Produto();

    require_once './ctr-model/vendasDAO.php';
    $objVendas = new Vendas();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Agendamentos Por Dia</title>
    <style>
        .formAlign{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }
    </style>
</head>
<body>
    <header><?php include'./nav.php' ?></header>
    <div class="container">
        <h2 class="my-3">Vendas</h2>
        <p>Lista de Vendas Por Dia</p>
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th class="text-center">Data</th>
                    <th class="text-center">Cliente</th>
                    <th class="text-center">Produto</th>
                    <th class="text-center">Qtd</th>
                    <th class="text-center">Editar</th>
                    <th class="text-center">Deletar</th>
                </tr>
            </thead>
            <p>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                    Nova Venda
                </button>
            </p>
            <tbody>
                <?php
                    $stmt = $objVendas->readAll();
                    while ($objVendas = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                        <tr>
                            <td>
                                <?php echo $objVendas['Data']; ?>
                            </td>
                            <td>
                                <?php echo $objVendas['Cliente']; ?>
                            </td>
                            <td>
                                <?php echo $objVendas['Produto']; ?>
                            </td>
                            <td>
                                <?php echo $objVendas['qtdVenda']; ?>
                            </td>
                            <td>
                                <button 
                                    type="button" class="btn"
                                    data-toggle="modal" 
                                    data-target="#myModalEditar" 
                                    data-id="<?php echo $objVendas['id']; ?>"
                                    data-dataVenda="<?php echo $objVendas['Data']; ?>"
                                    data-cliente="<?php echo $objVendas['Cliente']; ?>"
                                    data-produto="<?php echo $objVendas['Produto']; ?>"
                                    data-quantidade="<?php echo $objVendas['qtdVenda']; ?>"
                                    >
                                    <img src="./imagens/database_edit.png" alt="editar">
                                </button> 
                            </td>
                            <td>
                                <button 
                                    type="button" class="btn" 
                                    data-toggle="modal" 
                                    data-target="#myModalDelete" 
                                    data-id="<?php echo $objVendas['id']; ?>"
                                    data-nome="<?php echo $objVendas['Cliente']; ?>"> <img src="./imagens/database_delete.png" alt="delete">
                                </button> 
                            </td>
                        </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        

    <!-- Modal Cadastro -->
    <div class="modal" id="myModal">
            
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header bg-dark" style="color: #fff;">
                    <h4 class="modal-title">Nova Venda</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="./ctr-controle/ctr-vendas.php" method="post">
                        <input type="hidden" name="insert">
                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            <br>
                            <select name="txtCliente" id="nome">
                                <?php
                                    $sql = "SELECT * FROM clientes ORDER BY nome";
                                    $stmt = $objClientes->runQuery($sql);
                                    $stmt->execute();
                                    while($objClientes = $stmt->fetch(PDO::FETCH_ASSOC)){
                                ?>
                                <option value="<?php echo $objClientes['id'] ?>">
                                    <?php echo $objClientes['nome'] ?>
                                </option>
                                <?php 
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="produto">Produto:</label>
                            <br>
                            <select name="txtProduto" id="produto">
                                <?php
                                $sql = "SELECT * FROM produtos ORDER BY id";
                                $stmt = $objProdutos->runQuery($sql);
                                $stmt->execute();
                                while($objProdutos = $stmt->fetch(PDO::FETCH_ASSOC))
                                {
                                ?>
                                <option value="<?php echo $objProdutos['id'] ?>">
                                    <?php echo $objProdutos['nome'] ?>
                                </option>
                                <?php 
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="qtdVenda">Quantidade:</label>
                            <input type="number" class="form-control" id="qtdVenda" name="txtQtdVenda">
                        </div>
                        <div class="form-group">
                            <label for="dataVenda">Data:</label>
                            <input type="date" class="form-control" id="dataVenda" name="txtDataVenda">
                        </div>
                        <div class="formAlign">
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer"></div>

            </div>
        </div>
    </div>

    <!-- Modal Editar -->
    <div class="modal" id="myModalEditar">
        <div class="modal-dialog">
            <!-- Modal Header -->
            <div class="modal-content">
                <div class="modal-header bg-dark" style="color: #fff;">
                    <h4 class="modal-title">Editar</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="./ctr-controle/ctr-vendas.php" method="post">
                        <input type="hidden" name="update">
                        <input type="hidden" name="txtId" id="recipient-id">
                        <!-- <div class="form-group">
                            <label for="recipient-cliente">Cliente:</label>
                            <input type="hidden" class="form-control" placeholder="idCliente" name="txtIdCliente" id="recipient-idCliente">
                            <input type="text" class="form-control" placeholder="Digite seu nome" id="recipient-cliente" name="txtCliente">
                        </div>
                        <div class="form-group">
                            <label for="recipient-produto">Produto:</label>
                            <input type="hidden" class="form-control" name="idServico" id="recipient-idServico">
                            <input type="text" class="form-control" placeholder="Digite serviço" id="recipient-produto" name="txtProduto">
                        </div> -->
                        <div class="form-group">
                            <label for="recipient-quantidade">Quantidade:</label>
                            <input type="text" class="form-control" id="recipient-quantidade" name="txtQtdVenda" required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-dataVenda">Data:</label>
                            <!-- <input type="text" class="form-control" id="recipient-dataVenda" name="txtData"> -->
                            <input type="date" class="form-control" id="recipient-dataVenda" name="txtDataVenda" required>
                        </div>
                        <div class="formAlign">
                            <button type="submit" class="btn btn-primary">Editar</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
        
    <!-- Modal Delete -->
    <div class="modal" id="myModalDelete">
        
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header bg-dark" style="color: #fff;">
                    <h4 class="modal-title">Deletar</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="./ctr-controle/ctr-vendas.php" method="post">
                        <input type="hidden" name="delete">
                        <input type="hidden" name="txtId" id="recipient-id" readonly>
                        <div class="form-group">
                            <label for="nome">Tem certeza que deseja deletar este agendamento?</label>
                            <input type="hidden" name="nome" id="recipient-nome">
                        </div>
                        <div class="formAlign">
                            <button type="submit" class="btn btn-primary">Deletar</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    
    <!-- JQuery Delete -->
    <script>
        $('#myModalDelete').on('show.bs.modal', function(event){
            var button = $(event.relatedTarget);
            var recipientId = button.data('id');

            var modal = $(this);
            modal.find('#recipient-id').val(recipientId);
        });
    </script>

    <!-- JQuery Editar -->
    <script>
        $('#myModalEditar').on('show.bs.modal', function(event){
            var button = $(event.relatedTarget);
            var recipientId = button.data('id');
            // var recipientCliente = button.data('cliente');
            // var recipientProduto = button.data('produto');
            var recipientDataVenda = button.data('dataVenda')
            var recipientQuantidade = button.data('quantidade');

            var modal = $(this);
            // modal.find('#recipient-cliente').val(recipientCliente);
            // modal.find('#recipient-produto').val(recipientProduto);
            modal.find('#recipient-quantidade').val(recipientQuantidade);
            modal.find('#recipient-dataVenda').val(recipientDataVenda);
            modal.find('#recipient-id').val(recipientId);
        });
    </script>
    <script>  
        function formatar(mascara, documento) {
            let i = documento.value.length;
            let saida = '#';
            let texto = mascara.substring(i);
            while (texto.substring(0, 1) != saida && texto.length ) {
            documento.value += texto.substring(0, 1);
            i++;
            texto = mascara.substring(i);
            }
        }
    </script>
</body>

</html>