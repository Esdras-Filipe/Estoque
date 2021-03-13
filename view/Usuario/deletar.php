<?php
session_start();
require_once("../../Controller/Usuario/verificalogin.php");

?>

<html lang="pt-br">

<head>
    <link rel="stylesheet" href="../../styles/cabecalho.css">
    <link rel="stylesheet" href="../../styles/Produto/stylesestoque.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Usuario </title>
    <meta charset="UTF-8">
</head>

<body style=" background-color: rgba(250, 250, 250, 0.2);">
    <?php
    include("cabecalho.php");
    ?>
    </nav>
    <h1>Deletar Usuario</h1>
    <?php if (isset($_SESSION["erro"])) {
        if ($_SESSION["erro"] == "sucesso") { ?>
            <div class="alert alert-success" role="alert" style="width: 450px; margin-left: 40%;">
               Usuario deletado com sucesso!
            </div>
        <?php } else { ?>
            <div class="alert alert-danger" role="alert" style="width: 450px; margin-left: 40%;">
                <?php echo $_SESSION["erro"]; ?>
            </div>
        <?php } ?>
    <?php } ?>
    <?php unset($_SESSION["erro"]); ?>
    <form action="../../Controller/Usuario/deletar.php" method="POST">
        <div class="form-group1">
            <label for="sformGroupExampleInput2">CPF</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="CPF" name="cpf">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1" name= "conf">
            <label class="form-check-label" for="exampleCheck1">Confirme que você deseja excluir o Usuario</label>
        </div>
        <button type="submit" class="btn btn-primary" style="width: 450px; background: #000; border: none; margin-left: 40%;">Deletar</button>
    </form>

</body>

</html>
