<?php
require_once("../../model/Produto/ProdutoDAO.php");

$produtoDAO = new ProdutoDAO();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $dataAtual = new DateTime();
    $fuso = new DateTimeZone('America/Sao_Paulo');
    $dataAtual->setTimezone($fuso);
    $dataAtual = $dataAtual->format('Y-m-d H:i:s');

    $codigo = $_POST["codigo"];
    $quantidade = $_POST["quantidade"];
    $opcao = $_POST["opcao"];

    $opcaoEntrada = array(

        $opcaoEntrada[0] = "Devolução do Cliente",
        $opcaoEntrada[1] = "Compra",
        $opcaoEntrada[2] = "Tranferência entre lojas",
        $opcaoEntrada[3] = "Retorno de remessa",
        $opcaoEntrada[4] = "Ajuste de estoque",

    );

    $opcao = intval($opcao);

    if (empty($codigo) || empty($quantidade)) {
        $erro = $produtoDAO->Erro("Preencha todos os campos");
        header("Location: ../../view/Produto/Entrada.php");
    } else {
        $verifica = $produtoDAO->Verifica($codigo);
        if ($verifica == 1) {
            try {
                $produtoDAO->TransacaoEstoque($opcaoEntrada[$opcao], $dataAtual, $codigo, $quantidade, "entrada");
                $erro = $produtoDAO->Erro("sucesso");
                header("Location: ../../view/Produto/Entrada.php");
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        } else {
            $erro = $produtoDAO->Erro("Produto não existe");
            header("Location: ../../view/Produto/Entrada.php");
        }
    }
}
