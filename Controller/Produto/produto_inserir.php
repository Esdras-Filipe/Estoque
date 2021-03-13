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
        header("Location: ../../view/Produto/Estoque.php");
    } else {
        if (
            is_numeric($precoVenda) && is_numeric($precoCusto) && is_numeric($estoqueAtual) &&
            is_numeric($limiteEstoque) && is_numeric($estoqueMinimo)
        ) {
            if ($estoqueAtual >= $estoqueMinimo) {
                $verific = $produtoDAO->verifica($codigo);
                if ($verific == 0) {
                    try {
                        $produto = new Produto(
                            $codigo,
                            $cnpjFornecedor,
                            $descricao,
                            $categoria,
                            $marca,
                            $precoVenda,
                            $precoCusto,
                            $estoqueAtual,
                            $unidadeMedida,
                            $limiteEstoque,
                            $estoqueMinimo
                        );
                        $produtoDAO->inserir($produto);
                        $erro = $produtoDAO->Erro("sucesso");
                        header("Location: ../../view/Produto/Estoque.php");
                    } catch (Exception $e) {
                        echo $e->getMessage();
                    }
                } else {
                    $erro = $produtoDAO->Erro("Produto já existe na base de dados");
                    header("Location: ../../view/Produto/Estoque.php");
                }
            } else {
                $erro = $produtoDAO->Erro("Estoque atual não ser menor que o estoque minimo ");
                header("Location: ../../view/Produto/Estoque.php");
            }
        } else {
            $erro = $produtoDAO->Erro("Os campos relacionados a preço e a estoque devem ser números");
            header("Location: ../../view/Produto/Estoque.php");
        }
    }
} else {
    echo "erro";
}
