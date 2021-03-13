<?php
require_once("../../model/Usuario/crudUsuario.php");
require_once("../../Controller/Usuario/verificalogin.php");

$id = $_SESSION["idUser"];
$usuarioDAO = new UsuarioDAO();
$usuario = $usuarioDAO->BuscarID($id);

$data = $usuario->getDataCriacao();
$data = new DateTime($data);
$data = $data->format("d/m/Y");
?>

<html lang="pt-br">

<head>
    <title>Usuario</title>
    <link rel="stylesheet" href="../../styles/cabecalho.css">
    <link rel="stylesheet" href="../../styles/stylesUsuario.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body style=" background-color: rgba(250, 250, 250, 0.2);">
    <?php
    include("./cabecalho.php");
    ?>
    </nav>
    <h1>Usuario</h1>
    <div class="caixa">
        <img src="../../imagens/Usuario.svg" class="imgUsuario">
        <div class="conteudo">
            <label for="exampleInputEmail1" class="label1">Nome:</label>
            <label for="exampleInputEmail1" class="label"> <?php echo $usuario->getNome(); ?> </label></br>
            <label for="exampleInputEmail1" class="label1">CPF:</label>
            <label for="exampleInputEmail1" class="label"><?php echo $usuario->getCpf(); ?></label></br>
            <label for="exampleInputEmail1" class="label1">Data:</label>
            <label for="exampleInputEmail1" class="label"><?php echo $data; ?></label></br>
            <label for="exampleInputEmail1" class="label1">Privilégio:</label>
            <label for="exampleInputEmail1" class="label"><?php echo $usuario->getTipo(); ?></label></br>
            <label for="exampleInputEmail1" class="label1">Email:</label>
            <label for="exampleInputEmail1" class="label"><?php echo $usuario->getEmail(); ?></label></br>
            <a class="button" href="#">Atualizar Senha</a>
        </div>
    </div>


</body>



</html>