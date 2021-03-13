<?php
session_start();
require_once("../Controller/Usuario/verificalogin.php");

?>
<html lang="pt-br">
<header>
    <title>Estoque</title>
    <meta charset="UTF-8" />
   <link rel="stylesheet" href="../styles/formulario.css">
    <link rel="stylesheet" href="../styles/cabecalho.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</header>

<body style=" background-color: rgba(250, 250, 250, 0.2);">
    <div class="tudo">

        <nav>
            <ul>
                <li><a href="./Produto/buscar.php">Produtos</a>
                    <?php
                    if (isset($_SESSION["tipo"]) && $_SESSION["tipo"] == "Administrador") { ?>
                        <ul>
                            <li><a href="./Produto/Estoque.php">Inserir</a>
                            <li><a href="./Produto/atualizar.php">Atualizar</a>
                            <li><a href="./Produto/Buscar.php">Listar</a>
                        </ul>
                    <?php } ?>
                </li>
                <li><a href="./Fornecedor/listar.php">Fornecedores</a>
                    <?php
                    if (isset($_SESSION["tipo"]) && $_SESSION["tipo"] == "Administrador") { ?>
                        <ul>
                            <li><a href="./Fornecedor/Insere.php">Inserir</a>
                            <li><a href="./Fornecedor/Atualizar.php">Atualizar</a>
                            <li><a href="./Fornecedor/Listar.php">Listar</a>
                        </ul>
                    <?php } ?>
                </li>
                <li><a href="./Produto/TransacaoEstoque.php">Transação de Estoque</a>
                    <?php
                    if (isset($_SESSION["tipo"]) && $_SESSION["tipo"] == "Administrador") { ?>
                        <ul>
                            <li><a href="./Produto/Entrada.php">Entrada</a>
                            <li><a href="./Produto/Saida.php">Saida</a>
                        </ul>
                    <?php } ?>
                </li>
                <li><a href="">Usuario</a>
                    <?php
                    if (isset($_SESSION["tipo"]) && $_SESSION["tipo"] == "Administrador") { ?>
                        <ul>
                            <li><a href="./Usuario/inserir.php">Cadastrar</a>
                            <li><a href="">Deletar</a>
                        </ul>
                    <?php } ?>
                </li>
            </ul>
        </nav>
    </div>
</body>

</html>