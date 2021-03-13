<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once("../../model/Usuario/crudUsuario.php");
    $usuarioDAO = new UsuarioDAO();

    $cpf = $_POST["cpf"];
    if (empty($cpf)) {
        $usuarioDAO->Erro("Preencha todos os campos");
        Header("Location: ../../view/Usuario/deletar.php");
    } else {
        if (strlen($cpf) != 14) {
            $usuarioDAO->Erro("CPF inválido");
            Header("Location: ../../view/Usuario/deletar.php");
        } else {
            $verifica = $usuarioDAO->verifica($cpf);
            if ($verifica == 0) {
                $usuarioDAO->Erro("Usuario não existe");
                Header("Location: ../../view/Usuario/deletar.php");
            } else {
                $usuario = new Usuario("", "", $cpf, "", "", "");
                $usuarioDAO->Deletar($usuario);
                $usuarioDAO->Erro("sucesso");
                Header("Location: ../../view/Usuario/deletar.php");
            }
        }
    }
}
