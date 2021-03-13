<?php
require_once("../../model/Produto/ProdutoDAO.php");

$produtoDAO = new ProdutoDAO();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $codigo = $_POST['codigo'];
    $cnpjFornecedor = $_POST['cnpjFornecedor'];
    $descricao =  $_POST['descricao'];
    $categoria = $_POST['categoria'];
    $marca =  $_POST['marca'];
    $precoVenda = $_POST['precoVenda'];
    $precoCusto =  $_POST['precoCusto'];
    $estoqueAtual = $_POST['estoqueAtual'];
    $unidadeMedida = $_POST['unidadeMedida'];
    $limiteEstoque =  $_POST['limiteEstoque'];
    $estoqueMinimo =  $_POST['estoqueMinimo'];
    if (
        empty($codigo) || empty($cnpjFornecedor) || empty($descricao) || empty($categoria) || empty($marca) || empty($precoVenda)
        || empty($precoCusto) || empty($estoqueAtual) || empty($unidadeMedida) || empty($limiteEstoque || empty($estoqueMinimo))
    ) {
        $erro = $produtoDAO->Erro("Preencha todos os campos");
        header("Location: ../../view/Produto/atualizar.php");
    } else {
        $produto = new Produto($codigo, $cnpjFornecedor, $descricao, $categoria, $marca, $precoVenda, $precoCusto, $estoqueAtual, $unidadeMedida, $limiteEstoque, $estoqueMinimo);
        $verifica = $produtoDAO->verifica($codigo);
        if ($verifica == 1) {
            $produtoDAO->atualizar($produto);
            $erro = $produtoDAO->Erro("sucesso");
            header("Location: ../../view/Produto/atualizar.php");
        } else {
            $erro = $produtoDAO->Erro("Produto não existe");
            header("Location: ../../view/Produto/atualizar.php");
        }
    }
} else {
    $erro = $produtoDAO->Erro("Erro desconhecido");
    header("Location: ../../view/Produto/atualizar.php");
}
