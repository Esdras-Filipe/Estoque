<?php
require_once dirname(__FILE__) . "/produto_classe.php";
require_once("../../model/conn.php");


class ProdutoDAO
{

    public function inserir(Produto $estoque)
    {
        global $pdo;

        $codigo = $estoque->getCodigo();
        $cnpjForncedor = $estoque->getCnpjFornecedor();
        $descricao = $estoque->getDescricao();
        $categoria = $estoque->getCategoria();
        $marca = $estoque->getMarca();
        $precoVenda =  $estoque->getPrecoVenda();
        $precoCusto =   $estoque->getPrecoCusto();
        $estoqueAtual = $estoque->getEstoqueAtual();
        $unidadeMedida =  $estoque->getUnidadeMedida();
        $limiteEstoque = $estoque->getLimiteEstoque();
        $estoqueMinimo = $estoque->getEstoqueMinimo();

        $qry = $pdo->prepare("INSERT INTO Produto(codigo, cnpjForn, descricao, categoria, marca, precoVenda, precoCusto, estoqueAtual, unidadeMedida, limiteEstoque, estoqueMinimo) 
        VALUES(:codigo, :cnpjForn, :descricao, :categoria, :marca, :precoVenda, :precoCusto, :estoqueAtual, :unidadeMedida, :limiteEstoque, :estoqueMinimo) ");

        $qry->bindParam(":codigo", $codigo, PDO::PARAM_STR);
        $qry->bindParam(":cnpjForn", $cnpjForncedor, PDO::PARAM_STR);
        $qry->bindParam(":descricao", $descricao, PDO::PARAM_STR);
        $qry->bindParam(":categoria", $categoria, PDO::PARAM_STR);
        $qry->bindParam(":marca", $marca, PDO::PARAM_STR);
        $qry->bindParam(":precoVenda", $precoVenda, PDO::PARAM_STR);
        $qry->bindParam(":precoCusto", $precoCusto, PDO::PARAM_STR);
        $qry->bindParam(":estoqueAtual", $estoqueAtual, PDO::PARAM_STR);
        $qry->bindParam(":unidadeMedida", $unidadeMedida, PDO::PARAM_STR);
        $qry->bindParam(":limiteEstoque", $limiteEstoque, PDO::PARAM_STR);
        $qry->bindParam(":estoqueMinimo", $estoqueMinimo, PDO::PARAM_STR);
        $qry->execute();
    }

    public function atualizar(Produto $estoque)
    {

        global $pdo;

        $codigo = $estoque->getCodigo();
        $cnpjForncedor = $estoque->getCnpjFornecedor();
        $descricao = $estoque->getDescricao();
        $categoria = $estoque->getCategoria();
        $marca = $estoque->getMarca();
        $precoVenda =  $estoque->getPrecoVenda();
        $precoCusto =   $estoque->getPrecoCusto();
        $estoqueAtual = $estoque->getEstoqueAtual();
        $unidadeMedida =  $estoque->getUnidadeMedida();
        $limiteEstoque = $estoque->getLimiteEstoque();
        $estoqueMinimo = $estoque->getEstoqueMinimo();

        $qry = $pdo->prepare("UPDATE Produto SET cnpjForn=:cnpjForn, descricao=:descricao, categoria=:categoria, marca=:marca, precoVenda=:precoVenda, 
        precoCusto=:precoCusto, estoqueAtual=:estoqueAtual, unidadeMedida=:unidadeMedida, limiteEstoque=:limiteEstoque, estoqueMinimo=:estoqueMinimo WHERE codigo=:codigo");

        $qry->bindParam(":codigo", $codigo, PDO::PARAM_STR);
        $qry->bindParam(":cnpjForn", $cnpjForncedor, PDO::PARAM_STR);
        $qry->bindParam(":descricao", $descricao, PDO::PARAM_STR);
        $qry->bindParam(":categoria", $categoria, PDO::PARAM_STR);
        $qry->bindParam(":marca", $marca, PDO::PARAM_STR);
        $qry->bindParam(":precoVenda", $precoVenda, PDO::PARAM_STR);
        $qry->bindParam(":precoCusto", $precoCusto, PDO::PARAM_STR);
        $qry->bindParam(":estoqueAtual", $estoqueAtual, PDO::PARAM_STR);
        $qry->bindParam(":unidadeMedida", $unidadeMedida, PDO::PARAM_STR);
        $qry->bindParam(":limiteEstoque", $limiteEstoque, PDO::PARAM_STR);
        $qry->bindParam(":estoqueMinimo", $estoqueMinimo, PDO::PARAM_STR);
        $qry->execute();

        $qry->execute();
    }

    public function deletar(Produto $estoque)
    {
        global  $pdo;
        $qry = $pdo->prepare("DELETE FROM Produto WHERE codigo=:codigo");
        $codigo = $estoque->getCodigo();
        $qry->bindParam(":codigo", $codigo, PDO::PARAM_STR);
        $qry->execute();
    }

    public function buscarTodos()
    {
        global $pdo;
        $qry = $pdo->query("SELECT * FROM Produto");
        $items = array();
        $nome = "";

        while ($linha = $qry->fetch()) {
            $cnpjfor = $linha["cnpjForn"];
            $qry2 = $pdo->query("SELECT nome FROM Fornecedor WHERE cnpj = '$cnpjfor' ");
            while ($nome = $qry2->fetch()) {
                $items[] = new Produto(
                    $linha["codigo"],
                    $nome["nome"],
                    $linha["descricao"],
                    $linha["categoria"],
                    $linha["marca"],
                    $linha["precoVenda"],
                    $linha["precoCusto"],
                    $linha["estoqueAtual"],
                    $linha["unidadeMedida"],
                    $linha["limiteEstoque"],
                    $linha["estoqueMinimo"]
                );
            }
        }
        return $items;
    }

    public function verifica($codigo)
    {
        global  $pdo;
        $qry = $pdo->prepare("SELECT * FROM Produto WHERE codigo=:codigo");
        $qry->bindParam(":codigo", $codigo, PDO::PARAM_STR);
        $qry->execute();
        $verifica = $qry->rowCount();
        return $verifica;
    }

    public function TransacaoEstoque($tipo, $dataOperacao, $codigoProduto, $quantidade, $operacao)
    {
        $operador = " ";

        global $pdo;

        $qry = $pdo->prepare("INSERT INTO TransacaoEstoque(tipo, dataOperacao, codigoProduto, quantidade) 
        VALUES(:tipo, :dataOperacao, :codigoProduto, :quantidade)");
        $qry->bindParam(":tipo", $tipo);
        $qry->bindParam(":dataOperacao", $dataOperacao);
        $qry->bindParam(":codigoProduto", $codigoProduto);
        $qry->bindParam(":quantidade", $quantidade);
        $qry->execute();

        if ($operacao == "entrada") {
            $operador = "+";
        } else {
            $operador = "-";
        }

        $qry2 = $pdo->prepare("UPDATE Produto SET estoqueAtual = estoqueAtual $operador :quantidade WHERE codigo=:codigoProduto");
        $qry2->bindParam(":quantidade", $quantidade);
        $qry2->bindParam(":codigoProduto", $codigoProduto);
        $qry2->execute();
    }

    public function buscaID($codigo)
    {
        global $pdo;
        $qry = $pdo->prepare("SELECT * FROM Produto WHERE codigo=:codigo");
        $qry->bindParam(":codigo", $codigo);
        $qry->execute();
        $linha = $qry->fetch();

        return new Produto(
            $linha["codigo"],
            $linha["cnpjForn"],
            $linha["descricao"],
            $linha["categoria"],
            $linha["marca"],
            $linha["precoVenda"],
            $linha["precoCusto"],
            $linha["estoqueAtual"],
            $linha["unidadeMedida"],
            $linha["limiteEstoque"],
            $linha["estoqueMinimo"]
        );
    }



    public function BuscaDescricao($descricao)
    {
        global $pdo;

        $qry = $pdo->prepare("SELECT * FROM Produto WHERE descricao LIKE CONCAT('%', :descricao, '%') ");
        $qry->bindParam(":descricao", $descricao);
        $qry->execute();

        while ($linha = $qry->fetch()) {
            $items[] = new Produto(
                $linha["codigo"],
                $linha["cnpjForn"],
                $linha["descricao"],
                $linha["categoria"],
                $linha["marca"],
                $linha["precoVenda"],
                $linha["precoCusto"],
                $linha["estoqueAtual"],
                $linha["unidadeMedida"],
                $linha["limiteEstoque"],
                $linha["estoqueMinimo"]
            );
        }
        return $items;
    }
    public function Erro($erro)
    {
        session_start();
        $_SESSION["erro"] = $erro;
    }
}
