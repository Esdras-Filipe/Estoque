<?php

session_start();
require_once "../../model/Produto/ProdutoDAO.php";
$produtoDAO = new ProdutoDAO();

$codigo = $_GET['codigo'];

if (is_numeric($codigo)) {
    $tipo = "int";
    $produto = $produtoDAO->buscaID($codigo);
} else {
    $tipo = "str";
    $produto = $produtoDAO->BuscaDescricao($codigo);
}

require_once('../../Controller/Usuario/verificalogin.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Estoque</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha512-M5KW3ztuIICmVIhjSqXe01oV2bpe248gOxqmlcYrEzAvws7Pw3z6BK0iGbrwvdrUQUhi3eXgtxp5I8PDo9YfjQ==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha512-kBFfSXuTKZcABVouRYGnUo35KKa1FBrYgwG4PAx7Z2Heroknm0ca2Fm2TosdrrI356EDHMW383S3ISrwKcVPUw==" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../styles/styleBuscar.css">
    <link rel="stylesheet" href="../../styles/cabecalho.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap-grid.min.css" integrity="sha512-pkOzvsY+X67Lfs6Yr/dbx+utt/C90MITnkwx8X5fyKkBorWHJLlR3TmgNJs83URAR0GdejZZnjZdgYjzL/mtcQ==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap-reboot.min.css" integrity="sha512-gl/07tE1atRY5leOa5GtQa/pclV529xEP5cDTIdU1rj7vDh4KKz3nHrP7DsTBx3F++ihOqZGdcRTfOvrU/JF4g==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha512-MoRNloxbStBcD8z3M/2BmnT+rg4IsMxPkXaGh2zD6LGNNFE80W3onsAhRcMAMrSoyWL9xD7Ert0men7vR8LUZg==" crossorigin="anonymous" />
</head>

<body style=" background-color: rgba(250, 250, 250, 0.2);">
    <div class="tudo">
        <?php
        include("cabecalho.php");
        ?>
        </nav>
        <h1> Listagem de Produtos no Estoque</h1>

        <div class="espaco">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Descri????o</th>
                        <th scope="col">C??digo</th>
                        <th scope="col">Estoque</th>
                        <th scope="col">Uni De Medida</th>
                        <th scope="col">Pre??o</th>
                        <th scope="col">Fornecedor</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Li De Estoque</th>
                        <th scope="col">Excluir</th>
                    </tr>

                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    if ($tipo == "str") {
                        foreach ($produto as $cat) {
                            $i++;
                            echo "<td>{$i}</td>";
                            echo "<td>{$cat->getDescricao()}</td>";
                            echo "<td>{$cat->getCodigo()}</td>";
                            echo "<td>{$cat->getEstoqueAtual()}</td>";
                            echo "<td>{$cat->getUnidadeMedida()}</td>";
                            echo "<td>R\$ {$cat->getPrecoVenda()}</td>";
                            echo "<td>{$cat->getCnpjFornecedor()}</td>";
                            echo "<td>{$cat->getMarca()}</td>";
                            echo "<td>{$cat->getLimiteEstoque()}</td>";
                            echo "<td>";
                            echo "<a href='../server/deletar.php?codigo={$cat->getCodigo()}'>Excluir</a>";
                            echo "</td></tr>";
                        }
                    } else if ($tipo == "int") {
                        $i++;
                        echo "<td>{$i}</td>";
                        echo "<td>{$produto->getDescricao()}</td>";
                        echo "<td>{$produto->getCodigo()}</td>";
                        echo "<td>{$produto->getEstoqueAtual()}</td>";
                        echo "<td>{$produto->getUnidadeMedida()}</td>";
                        echo "<td>R\$ {$produto->getPrecoVenda()}</td>";
                        echo "<td>{$produto->getCnpjFornecedor()}</td>";
                        echo "<td>{$produto->getMarca()}</td>";
                        echo "<td>{$produto->getLimiteEstoque()}</td>";
                        echo "<td>";
                        echo "<a href='../server/deletar.php?codigo={$produto->getCodigo()}'>Excluir</a>";
                        echo "</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>