<?php

require "../../model/Usuario/crudUsuario.php";
$u = new UsuarioDAO();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["nome"]) && !empty($_POST["nome"]) && isset($_POST["senha"]) && !empty($_POST["senha"])) {

        $nome = addslashes($_POST["nome"]);
        $senha = addslashes($_POST["senha"]);

        $usuario = new Usuario($nome, $senha, "", "", "", "", "");

        if ($u->login($usuario) ==  true) {
            if (isset($_SESSION['idUser'])) {
                header("location: ../../view/inicial.php");
            } else {
                header("location: ../../index.php");
            }
        } else {
            $u->Erro("Usuario e/ou senha incorretos");
            header("location: ../../index.php");
        }
    } else {
        $u->Erro("Preencha todos os campos");
        header("location: ../../index.php");
    }
}
