<?php
session_start();
require_once('../../Controller/Usuario/verificalogin.php');
?>
<html lang="pt-br">

<head>
    <title>Estoque</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="../../styles/formulario.css">
    <link rel="stylesheet" href="../../styles/cabecalho.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body style=" background-color: rgba(250, 250, 250, 0.2);">
    <?php
    include("cabecalho.php");
    ?>
    </nav>
    <h1>Cadastro de Produtos</h1>
    <?php if (isset($_SESSION["erro"])) {
        if ($_SESSION["erro"] == "sucesso") { ?>
            <div class="alert alert-success" role="alert" style="width: 450px; margin-left: 40%;">
                Produto cadastrado com sucesso
            </div>
        <?php } else { ?>
            <div class="alert alert-danger" role="alert" style="width: 450px; margin-left: 40%;">
                <?php echo $_SESSION["erro"]; ?>
            </div>
        <?php } ?>
    <?php } ?>
    <?php unset($_SESSION["erro"]); ?>
    <form action=" ../../Controller/Produto/produto_inserir.php" method="POST">
        <div class="caixa">
            <?php
            include("FormInseAtua.php");
            ?>
            <button type="submit" class="btn btn-primary" style="background: #000; border: none; width: 810px;  margin-bottom: 50px;">Cadastrar</button>
        </div>
    </form>
</body>

</html>