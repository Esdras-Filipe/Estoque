<?php

require_once("../../model/Usuario/crudUsuario.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuarioDAO = new UsuarioDAO;

    $dataAtual = new DateTime();
    $fuso = new DateTimeZone('America/Sao_Paulo');
    $dataAtual->setTimezone($fuso);
    $dataAtual = $dataAtual->format('Y-m-d H:i:s');

    $opcao = array(
        $opcao[0] = "Administrador",
        $opcao[1] = "Usuario",

    );

    $nome = $_POST["nome"];
    $senha = $_POST["senha"];
    $cpf = $_POST["cpf"];
    $tipo = $_POST["opcao"];
    $email = $_POST["email"];

    if (empty($nome) || empty($senha) || empty($cpf)) {
        echo "preencha os campos";
    } else {
        if (strlen($cpf) != 14) {
            echo "CPF inválido";
        } else {
            try {
                $usuario = new Usuario($nome, md5($senha), $cpf, $dataAtual, $opcao[$tipo], $email);
                $usuarioDAO->Inserir($usuario);
                echo "Cadastrado com sucesso";
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }
}
