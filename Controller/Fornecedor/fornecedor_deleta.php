<?php

require_once("../../model/Fornecedor/FornecedorDAO.php");

$FornecedorDAO = new FornecedorDAO();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $cnpj = addslashes($_GET["cnpj"]);
    if (empty($cnpj)) {
        $erro = $FornecedorDAO->Erro("Preencha todos os campos");
        header("Location: ../../src/Fornecedor/insere.php");
    } else {
        try {
            $FornecedorDAO->deletar(new Fornecedor("", $cnpj, "", "", "", "", "", "", ""));
            header('Location: ../../src/Fornecedor/listar.php');
        } catch (Exception $e) {
            $erro = $FornecedorDAO->Erro($e->getMessage());
            header("Location: ../../src/Fornecedor/insere.php");
        }
    }
} else {
    $erro = $FornecedorDAO->Erro("Erro desconhecido");
    header("Location: ../../src/Fornecedor/insere.php");
}
