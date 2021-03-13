<?php

require_once("../../model/Produto/ProdutoDAO.php");

$produtoDAO = new ProdutoDAO();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $codigo = $_GET["codigo"];
    if (empty($codigo)) {
        echo "preencha os campos";
    } else {
        $produtoDAO->deletar(new Produto($codigo, " ", " ", " ", " ", " ", " ", " ", " ", " ", " "));
        header("Location: ../../view/Produto/Estoque.php");
    }
} else {
    echo "erro";
}
