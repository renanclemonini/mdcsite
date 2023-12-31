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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/mobile-first.css">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/produtos.css">
    <script src="./js/index.js"></script>
    <?php include './bs4.php'; ?>
    <title>Marília Di Credico - Produtos</title>
    <style>
        .formAlign{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .formAlign2{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        .produto{
            flex-direction: row;
        }

        .btnDesign{
            color: #fff;
            background-color: #000;
        }
    </style>
</head>
<body onresize="mudouTamanho()">
    <header id="container">
        
    </header>
    <span id="menuBurguer" class="material-symbols-outlined" onclick="clickMenu()">
        menu
    </span>
    <menu id="itensMenu">
        <ul>
            <li><a href="index.php" target="_self">Home</a></li>
            <li><a href="adm.php">Administração</a></li>
            <li><a href="agendamento-inicio.php" target="_self">Agendamento</a></li>
            <li><a href="https://www.instagram.com/mariliadicredico.bioestetica/" target="_blank">Instagram</a></li>
            <li><a href="micropig.php">Micropigmentação</a></li>
        </ul>
    </menu>
    <main>
        <article>
            <h2>Produtos</h2>
            <div id="caixaMaior">

                <div id="caixaProduto" class="primeiroProduto">
                    <h5>Óleo de Girassol - Farmax</h5>

                    <div id="produtoDescricao" class="container">
                        <img class="imagem mt-3" src="imagens/oleoGirassol.png" alt="oleoGirassol">
                        <div class="container">
                            <div class="formAlign p-3">
                                <p class="text-center">Este óleo irá auxiliar no processo de cicatrização da micropigmentação</p>
                                <p><strong>R$ 15,00</strong></p>
                                <button type="button" class="btn btnDesign" data-toggle="modal" data-target="#oleoGirassol">
                                    Comprar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <div id="caixaProduto" class="primeiroProduto">
                    <h5>Óleo de Ricino - Farmax</h5>

                    <div id="produtoDescricao" class="container">
                        <img class="imagem2" src="imagens/oleoRicino.png" alt="oleoRicino">
                        <div class="container">
                            <div class="formAlign p-3">
                                <p class="text-center">Este óleo irá auxiliar no processo de crescimento dos fios das sobrancelhas</p>
                                <p><strong>R$ 15,00</strong></p>
                                <button type="button" class="btn btnDesign" data-toggle="modal" data-target="#oleoRicino">
                                    Comprar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Oleo Girassol -->
                <div class="modal" id="oleoGirassol">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        
                            <!-- Modal Header -->
                            <div class="modal-header">
                            <h4 class="modal-title">Óleo de Girassol</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            
                            <!-- Modal body -->
                            <div class="modal-body">
                                <form action="./ctr-controle/ctr-vendas.php" method="post"> 
                                    <input type="hidden" name="compraGirassol"> 
                                    <div class="form-group">
                                        <label for="iClient">Selecione seu cadastro:</label>
                                        <select name="txtCliente" id="iClient">
                                        <?php 
                                        $stmt = $objClientes->read();
                                        $stmt->execute();
                                        while($objClientes = $stmt->fetch(PDO::FETCH_ASSOC)){
                                        ?>
                                            <option value="<?php echo $objClientes['id'] ?>"><?php echo $objClientes['nome'] ?></option>
                                            <?php 
                                        }
                                        ?>
                                        </select>
                                    </div>      
                                    <input type="hidden" name="txtProduto" value="1">
                                    <div>
                                        <label for="iQuantidade">Quantidade:</label>
                                        <select style="width: 50px;" name="txtQtdVenda" id="iQuantidade">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </div>         
                                    <div class="formAlign2">
                                        <input type="submit" value="Comprar" class="btn btn-primary">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                            
                            <!-- Modal footer -->
                            <div class="modal-footer"></div>
                            
                        </div>
                    </div>
                </div>

                <!-- Oleo Ricino -->
                <div class="modal" id="oleoRicino">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        
                            <!-- Modal Header -->
                            <div class="modal-header">
                            <h4 class="modal-title">Óleo de Girassol</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            
                            <!-- Modal body -->
                            <div class="modal-body">
                                <form action="./ctr-controle/ctr-vendas.php" method="post"> 
                                    <input type="hidden" name="compraGirassol"> 
                                    <div class="form-group">
                                        <label for="iClient">Selecione seu cadastro:</label>
                                        <select name="txtCliente" id="iClient">
                                        <?php 
                                        
                                        $stmt->execute();
                                        while($objClientes = $stmt->fetch(PDO::FETCH_ASSOC)){
                                        ?>
                                            <option value="<?php echo $objClientes['id'] ?>"><?php echo $objClientes['nome'] ?></option>
                                            <?php 
                                        }
                                        ?>
                                        </select>
                                    </div>      
                                    <input type="hidden" name="txtProduto" value="2">
                                    <div>
                                        <label for="iQuantidade">Quantidade:</label>
                                        <select style="width: 50px;" name="txtQtdVenda" id="iQuantidade">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </div>         
                                    <div class="formAlign2">
                                        <input type="submit" value="Comprar" class="btn btn-primary">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                            
                            <!-- Modal footer -->
                            <div class="modal-footer"></div>
                            
                        </div>
                    </div>
                </div>

            </div>
        </article>
    </main>
    <footer>
        <p>Site Desenvolvido por Renan Clemonini &reg;</p>
    </footer>
</body>
</html>