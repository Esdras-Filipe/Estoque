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

        $opcaoEntrada[0] = "Devolução ao Fornecedor",
        $opcaoEntrada[1] = "Tranferência entre lojas",
        $opcaoEntrada[2] = "Remessa para Concertos",
        $opcaoEntrada[3] = "Ajuste de Estoque",
        $opcaoEntrada[4] = "Uso e consumo interno",
        $opcaoEntrada[5] = "Venda",

    );

    $opcao = intval($opcao);

    if (empty($codigo) || empty($quantidade)) {
        $erro = $produtoDAO->Erro("Preencha todos os campos");
        header("Location: ../../view/Produto/saida.php");
    } else {
        $verifica = $produtoDAO->Verifica($codigo);
        if ($verifica == 1) {
            try {
                $produtoDAO->TransacaoEstoque($opcaoEntrada[$opcao], $dataAtual, $codigo, $quantidade, "saida");
                $erro = $produtoDAO->Erro("sucesso");
                header("Location: ../../view/Produto/saida.php");
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        } else {
            $erro = $produtoDAO->Erro("Produto não existe");
            header("Location: ../../view/Produto/saida.php");
        }
    }
}
