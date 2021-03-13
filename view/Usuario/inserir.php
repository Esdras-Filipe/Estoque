<?php
session_start();
require_once("../../Controller/Usuario/verificalogin.php");
?>

<html>

<head lang="pt-br">
    <meta charset="UTF-8">
    <title>Usuario</title>
     <link rel="stylesheet" href="../../styles/formulario.css">
    <link rel="stylesheet" href="../../styles/cabecalho.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body style=" background-color: rgba(250, 250, 250, 0.2);">
    <?php
    include("cabecalho.php");
    ?>
    </nav>
    <h1>Cadastro de Usuario</h1>
    <form action="../../Controller/Usuario/insere.php" method="POST">
        <?php
        include("./FormInseAtua.php");
        ?>
        <div class="form-group1">
            <label for="formGroupExampleInput2">Tipo de Usuario</label>
            <select class="form-control" name=opcao>
                <option value="0">Administrador</option>
                <option value="1">Usuario</option>
            </select>
        </div>

        <button type="submit" class="botao-form" onclick="return validarSenha(); ">Cadastrar</button>
    </form>
    <script>
        let senha = document.getElementById('senha');
        let senha2 = document.getElementById('senha2');

        function validarSenha() {
            if (senha.value != senha2.value) {
                senha2.setCustomValidity("Senhas diferentes!");
                senha2.reportValidity();
                return false;
            } else {
                senha2.setCustomValidity("");
                return true;
            }
        }

        senha2.addEventListener('input', validarSenha);
    </script>
</body>

</html>
