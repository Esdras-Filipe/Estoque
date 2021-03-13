<?php

require_once "../../model/Fornecedor/FornecedorDAO.php";
$FornecedorDAO = new FornecedorDAO();

$codigo = $_GET['codigo'];
$final = $_GET['codigo'];

$codigo = str_replace(".", "", $codigo);
$codigo = str_replace("/", "", $codigo);


if (is_numeric($codigo)) {
    $tipo = "int";
    $Fornecedor = $FornecedorDAO->BuscarID($final);
} else {
    $tipo = "str";
    $Fornecedor = $FornecedorDAO->BuscarNome($final);
}

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
    <link rel="stylesheet" href="../../styles/stylesCabeçalho.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap-grid.min.css" integrity="sha512-pkOzvsY+X67Lfs6Yr/dbx+utt/C90MITnkwx8X5fyKkBorWHJLlR3TmgNJs83URAR0GdejZZnjZdgYjzL/mtcQ==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap-reboot.min.css" integrity="sha512-gl/07tE1atRY5leOa5GtQa/pclV529xEP5cDTIdU1rj7vDh4KKz3nHrP7DsTBx3F++ihOqZGdcRTfOvrU/JF4g==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha512-MoRNloxbStBcD8z3M/2BmnT+rg4IsMxPkXaGh2zD6LGNNFE80W3onsAhRcMAMrSoyWL9xD7Ert0men7vR8LUZg==" crossorigin="anonymous" />
</head>

<body style=" background-color: rgba(250, 250, 250, 0.2);">
    <div class="tudo">
        <?php
        include("cabeçalho.php");
        ?>
        </nav>
        <h1>Listagem de Fornecedores</h1>
        <div class="espaco">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Cnpj</th>
                        <th scope="col">Endereço</th>
                        <th scope="col">CEP</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    if ($tipo == "str") {
                        foreach ($Fornecedor as $cat) {
                            $i++;
                            echo "<td>{$i}</td>";
                            echo "<td>{$cat->getNome()}</td>";
                            echo "<td>{$cat->getCnpj()}</td>";
                            echo "<td>{$cat->getEndereco()}</td>";
                            echo "<td>{$cat->getCep()}</td>";
                            echo "<td>{$cat->getNumero()}</td>";
                            echo "<td>";
                            echo "<a href='../server/deletar.php?codigo={$cat->getCnpj()}'>Excluir</a>";
                            echo "</td></tr>";
                        }
                    } else if ($tipo == "int") {
                        $i++;
                        echo "<td>{$i}</td>";
                        echo "<td>{$Fornecedor->getNome()}</td>";
                        echo "<td>{$Fornecedor->getCnpj()}</td>";
                        echo "<td>{$Fornecedor->getEndereco()}</td>";
                        echo "<td>{$Fornecedor->getCep()}</td>";
                        echo "<td>{$Fornecedor->getNumero()}</td>";
                        echo "<td>";
                        echo "<a href='../server/deletar.php?codigo={$Fornecedor->getCnpj()}'>Excluir</a>";
                        echo "</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>