<?php
session_start();
require_once("../../model/Produto/ProdutoDAO.php");
$produtoDAO = new ProdutoDAO();
$produto = $produtoDAO->buscarTodos();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha512-M5KW3ztuIICmVIhjSqXe01oV2bpe248gOxqmlcYrEzAvws7Pw3z6BK0iGbrwvdrUQUhi3eXgtxp5I8PDo9YfjQ==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha512-kBFfSXuTKZcABVouRYGnUo35KKa1FBrYgwG4PAx7Z2Heroknm0ca2Fm2TosdrrI356EDHMW383S3ISrwKcVPUw==" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../styles/styleBuscar.css">
    <link rel="stylesheet" href="../../styles/cabecalho.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap-grid.min.css" integrity="sha512-pkOzvsY+X67Lfs6Yr/dbx+utt/C90MITnkwx8X5fyKkBorWHJLlR3TmgNJs83URAR0GdejZZnjZdgYjzL/mtcQ==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap-reboot.min.css" integrity="sha512-gl/07tE1atRY5leOa5GtQa/pclV529xEP5cDTIdU1rj7vDh4KKz3nHrP7DsTBx3F++ihOqZGdcRTfOvrU/JF4g==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha512-MoRNloxbStBcD8z3M/2BmnT+rg4IsMxPkXaGh2zD6LGNNFE80W3onsAhRcMAMrSoyWL9xD7Ert0men7vR8LUZg==" crossorigin="anonymous" />
    <title>Estoque</title>
    
</head>

<body>

    <div class="tudo">
        <?php
        include("cabecalho.php");
        ?>
        <form action="./buscarID.php" method="GET">
            <button class="btn btn-primary" type="submit" style="margin-right: 30px; float: right; margin-top: 20px; background: #000;border: none;">Buscar</button>
            <div class="formgroup1">
                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Código ou Nome" name="codigo">
            </div>

        </form>
        </nav>
        <h1> Listagem de Produtos no Estoque</h1>

        <div class="espaco">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Código</th>
                        <th scope="col">Estoque</th>
                        <th scope="col">Medida</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Fornecedor</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Li De Estoque</th>
                        <th scope="col">Excluir</th>
                    </tr>

                </thead>
                <tbody>
                    <?php
                    $i = 0;
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
                        echo "<a href='../../server/Produto/deletar.php?codigo={$cat->getCodigo()}'>Excluir</a>";
                        echo "</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
