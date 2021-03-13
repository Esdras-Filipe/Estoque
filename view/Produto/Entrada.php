<?php
session_start();
?>
<HTML>

<head>
    <title>Entrada</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../styles/Produto/Entrada.css">
    <link rel="stylesheet" href="../../styles/cabecalho.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body style=" background-color: rgba(250, 250, 250, 0.2);">
    <?php
    include("cabecalho.php");
    ?>
    </nav>
    <h1>Entrada</h1>
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
    <form action="../../Controller/Produto/produto_entrada.php" method="POST">
        <div class="form-group">
            <label for="formGroupExampleInput2">Codigo do Produto</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Código" name="codigo">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Quantidade</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Quantidade" name="quantidade">
        </div>
        <label class="label2">Motivo</label>
        <div class="selecao">
            <select class="form-control" name=opcao>
                <option value="0">Devolução do Cliente</option>
                <option value="1">Compra</option>
                <option value="2">Tranferência entre lojas</option>
                <option value="3">Retorno de remessa</option>
                <option value="4">Ajuste de estoque</option>
            </select>
        </div>
        <button type="submit" class="botao-form">Enviar</button>
    </form>

</body>


</HTML>