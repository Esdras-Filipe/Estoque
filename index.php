<?php
session_start();
?>
<html lang="pt-br">
<header>
    <meta charset="UTF-8" />
    <title>Login</title>
    <meta http-equiv="refresh" content="30">
    <link rel="stylesheet" href="./styles/styleLogin.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@1,700&family=Roboto+Mono:ital,wght@1,300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Piazzolla:ital,wght@1,600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@1,300&display=swap" rel="stylesheet">
</header>

<body>~
    <div class="BarraLateral">
        <p class="texto">
            Seu site onde você pode controlar seu estoque remotamente.
        </p>
    </div>
    <div class="caixaLogin">
        <form action="./Controller/Usuario/login.php" method="POST">
            <img src="./imagens/Usuario.svg" class="imagemusuario" alt="Imagem Usuario">
            <label class="LabelUsuario">Usuário:</label></br>
            <input type="text" name="nome" class="caixa-texto" autocomplete="off"></br>
            <label class="LabelUsuario">Senha:</label></br>
            <input type="password" name="senha" class="caixa-texto" autocomplete="off"></br>
            <button type="submit" name="botao" class="botao" value="LOGIN">Entrar</button>
        </form>
    </div>
    <?php if (isset($_SESSION["erro"])) { ?>
        <div class=" alert alert-danger" role="alert" style="width: 350px; margin-left: 55%; margin-top: 36%;">
            <?php echo $_SESSION["erro"]; ?>
        </div>
    <?php } ?>
    <?php unset($_SESSION["erro"]); ?>

</body>

</html>