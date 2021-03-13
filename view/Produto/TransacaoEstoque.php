<?php
session_start();
require_once "../../model/conn.php";
$qry = $pdo->prepare("SELECT * FROM TransacaoEstoque ORDER BY
idTransacaoEstoque DESC");
$qry->execute();
?>

<html>

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
        <h1>Transação de Estoque</h1>

        <div class="espaco">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Nome Produto</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Data</th>
                        <th scope="col">Hora</th>
                    </tr>

                </thead>
                <tbody>
                    <?php
                    $NomePro = " ";
                    while ($row = ($qry->fetch())) {
                        $NomePro = $row["codigoProduto"];
                        $qry2 = $pdo->query("SELECT descricao FROM Produto WHERE codigo = '$NomePro' ");
                        while ($nome = $qry2->fetch()) {
                            $data = $row["dataOperacao"];
                            $data =  new DateTime($data);
                            $hora = $data->format('H:i');
                            $data = $data->format('d/m/Y ');
                            echo "<td>{$row['idTransacaoEstoque']}</td>";
                            echo "<td>{$row['tipo']}</td>";
                            echo "<td>{$nome['descricao']}</td>";
                            echo "<td>{$row['quantidade']}</td>";
                            echo "<td>{$data}</td>";
                            echo "<td>{$hora}</td>";
                            echo "</td></tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>

</body>

</html>