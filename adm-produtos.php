<?php
    require_once './ctr-model/produtosDAO.php';
    $objProdutos = new Produto();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Produtos</title>
    <style>
        .formAlign{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }
    </style>
</head>
<body>
    <header><?php include './nav.php' ?></header>
    <div class="container">
        <h2 class="my-3">Lista de Produtos</h2>
        <p>Cadastro de Produtos para o banco de dados</p>
        <p><button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Cadastrar</button></p>
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Nome</th>
                    <th class="text-center">Estoque</th>
                    <th class="text-center">Preço</th>
                    <th class="text-center">Editar</th>
                    <th class="text-center">Deletar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $stmt = $objProdutos->read();
                    $stmt->execute();
                    while ($objProdutos = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                        <tr>
                            <td>
                                <?php echo $objProdutos['id']; ?>
                            </td>
                            <td>
                                <?php echo $objProdutos['nome']; ?>
                            </td>
                            <td>
                                <?php echo $objProdutos['estoque']; ?>
                            </td>
                            <td>
                                <?php echo $objProdutos['preco']; ?>
                            </td>
                            <td>
                                <button 
                                    type="button" class="btn"
                                    data-toggle="modal" 
                                    data-target="#myModalEditar" 
                                    data-id="<?php echo $objProdutos['id']; ?>"
                                    data-nome="<?php echo $objProdutos['nome']; ?>"
                                    data-estoque="<?php echo $objProdutos['estoque']; ?>"
                                    data-preco="<?php echo $objProdutos['preco']; ?>">
                                    <img src="./imagens/database_edit.png" alt="editar">
                                </button>
                            </td>
                            <td>
                                <button 
                                    type="button" class="btn" 
                                    data-toggle="modal" 
                                    data-target="#myModalDelete" 
                                    data-id="<?php echo $objProdutos['id']; ?>"
                                    data-nome="<?php echo $objProdutos['nome']; ?>">
                                    <img src="./imagens/database_delete.png" alt="delete"> 
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
                        <h4 class="modal-title">Novo Produto</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="./ctr-controle/ctr-produtos.php" method="post">
                            <input type="hidden" name="insert">
                            <div class="form-group">
                                <label for="nome">Nome:</label>
                                <input type="text" class="form-control" placeholder="Nome Produto" id="nome" name="txtNome">
                            </div>
                            <div class="form-group">
                                <label for="estoque">Estoque:</label>
                                <input type="text" class="form-control" placeholder="Quantidade Estoque" id="estoque" name="txtEstoque" maxlength="15">
                            </div>
                            <div class="form-group">
                                <label for="preco">Preço:</label>
                                <input type="text" class="form-control" placeholder="Preço" id="preco" name="txtPreco" maxlength="10">
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
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header bg-dark" style="color: #fff;">
                        <h4 class="modal-title">Editar</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="./ctr-controle/ctr-produtos.php" method="post">
                            <input type="hidden" name="editar">
                            <input type="hidden" name="txtId" id="recipient-id">
                            <div class="form-group">
                                <label for="recipient-nome">Nome:</label>
                                <input type="text" class="form-control" placeholder="Produto" id="recipient-nome" name="txtNome">
                            </div>
                            <div class="form-group">
                                <label for="recipient-estoque">Telefone:</label>
                                <input type="text" class="form-control" placeholder="Estoque" id="recipient-estoque" name="txtEstoque" maxlength="15">
                            </div>
                            <div class="form-group">
                            <label for="recipient-preco">Aniversário:</label>
                                <input type="text" class="form-control" placeholder="Preço" id="recipient-preco" name="txtPreco" maxlength="10">
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
                    <form action="./ctr-controle/ctr-produtos.php" method="post">
                        <input type="hidden" name="delete">
                        <input type="hidden" name="txtId" id="recipient-id" readonly>
                        <div class="form-group">
                            <label for="nome">Tem certeza que deseja deletar?</label>
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

    <script>
        $('#myModalDelete').on('show.bs.modal', function(event){
            var button = $(event.relatedTarget);
            var recipientId = button.data('id');
            var recipientNome = button.data('nome');

            var modal = $(this);
            modal.find('#recipient-id').val(recipientId);
            modal.find('#recipient-nome').val(recipientNome);
        });
    </script>
    <script>
        $('#myModalEditar').on('show.bs.modal', function(event){
            var button = $(event.relatedTarget);
            var recipientId = button.data('id');
            var recipientNome = button.data('nome');
            var recipientEstoque = button.data('estoque');
            var recipientPreco = button.data('preco');

            var modal = $(this);
            modal.find('#recipient-nome').val(recipientNome);
            modal.find('#recipient-estoque').val(recipientEstoque);
            modal.find('#recipient-preco').val(recipientPreco);
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