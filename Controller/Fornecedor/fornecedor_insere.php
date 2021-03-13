<?php

require_once("../../model/Fornecedor/fornecedorDAO.php");

$FornecedorDAO = new FornecedorDAO();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = addslashes($_POST["nome"]);
    $cnpj = addslashes($_POST["cnpj"]);
    $endereco = addslashes($_POST["endereco"]);
    $numero = addslashes($_POST["numero"]);
    $complemento = addslashes($_POST["complemento"]);
    $bairro = addslashes($_POST["bairro"]);
    $cidade = addslashes($_POST["cidade"]);
    $cep = addslashes($_POST["cep"]);
    $valor = addslashes($_POST["value"]);

    $estado[] = array(
        $estado[0] = "AC",
        $estado[1] = "AL",
        $estado[2] = "AP",
        $estado[3] = "AM",
        $estado[4] = "BA",
        $estado[5] = "CE",
        $estado[6] = "ES",
        $estado[7] = "GO",
        $estado[8] = "MA",
        $estado[9] = "MT",
        $estado[10] = "MS",
        $estado[11] = "MG",
        $estado[12] = "PA",
        $estado[13] = "PB",
        $estado[14] = "PR",
        $estado[15] = "PE",
        $estado[16] = "PI",
        $estado[17] = "RJ",
        $estado[18] = "RN",
        $estado[19] = "RS",
        $estado[20] = "RO",
        $estado[21] = "RR",
        $estado[22] = "SC",
        $estado[23] = "SP",
        $estado[24] = "SE",
        $estado[25] = "TO",
        $estado[26] = "DF",
    );

    if (
        empty($nome) || empty($cnpj) || empty($endereco) || empty($numero) ||
        empty($bairro) || empty($cidade) || empty($estado) || empty($cep)
    ) {
        $erro = $FornecedorDAO->Erro("Preencha todos os campos");
        header("Location: ../../view/Fornecedor/Insere.php");
    } else {
        if (strlen($cnpj) == 18) {
            $verific = $FornecedorDAO->Verifica($cnpj);
            if ($verific == 0) {
                try {
                    $fornecedor = new Fornecedor(
                        $nome,
                        $cnpj,
                        $endereco,
                        $numero,
                        $complemento,
                        $bairro,
                        $cidade,
                        $estado[$valor],
                        $cep
                    );
                    $FornecedorDAO->inserir($fornecedor);
                    $erro = $FornecedorDAO->Erro("sucesso");
                   header("Location: ../../view/Fornecedor/Insere.php");
                } catch (Exception $e) {
                    $FornecedorDAO->Erro($e->getMessage());
                    header("Location: ../../view/Fornecedor/Insere.php");
                }
            } else {
                $FornecedorDAO->Erro("CNPJ já existe");
               header("Location: ../../view/Fornecedor/Insere.php");
            }
        } else {
            $FornecedorDAO->Erro("CNPJ inválido");
           header("Location: ../../view/Fornecedor/Insere.php");
        }
    }
} else {
    $FornecedorDAO->Erro("Erro desconhecido");
    header("Location: ../../view/Fornecedor/Insere.php");
}
