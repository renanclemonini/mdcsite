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
                            <form action="" method="get" class="p-3 formAlign">
                                <p class="text-center">Este óleo irá auxiliar no processo de cicatrização da micropigmentação</p>
                                <div class="produto ">
                                    <label for="iQuantidade">Quantidade:</label>
                                    <select style="width: 50px;" name="txtQuantidade" id="iQuantidade">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                                <p><strong>R$ 15,00</strong></p>
                                <input type="submit" value="Comprar" class="btn btnDesign">
                            </form>
                        </div>
                    </div>
                </div>

                <hr>

                <div id="caixaProduto" class="primeiroProduto">
                    <h5>Óleo de Ricino - Farmax</h5>

                    <div id="produtoDescricao" class="container">
                        <img class="imagem2" src="imagens/oleoRicino.png" alt="oleoRicino">
                        <div class="container-sm">
                            <form action="#" method="get" class="p-3 formAlign">
                                <p class="text-center">Este óleo irá auxiliar no processo de crescimento dos fios</p>
                                <div class="produto">
                                    <label for="iQuantidade">Quantidade:</label>
                                    <select style="width: 50px;" name="txtQuantidade" id="iQuantidade">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                                <p><strong>R$ 13,00</strong></p>
                                <input type="submit" value="Comprar" class="btn btnDesign">
                            </form>
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