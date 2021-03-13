<?php

require_once("../../model/Fornecedor/FornecedorDAO.php");

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
        empty($bairro) || empty($cidade) || empty($cep)
    ) {
        $erro = $FornecedorDAO->Erro("Preencha todos os campos");
        header("Location: ../../view/Fornecedor/Atualizar.php");
    } else {
        if (strlen($cnpj) == 18) {
            $verific = $FornecedorDAO->Verifica($cnpj);
            if ($verific == 1) {
                try {
                    $fornecedor = new Fornecedor(
                        $nome,
                        $cnpj,
                        $endereco,
                        $numero,
                        $complemento,
                        $bairro,
                        $estado[$valor],
                        $estado,
                        $cep
                    );
                    $FornecedorDAO->Atualizar($fornecedor);
                    $erro = $FornecedorDAO->Erro("sucesso");
                    header("Location: ../../view/Fornecedor/Atualizar.php");
                } catch (Exception $e) {
                    $erro = $FornecedorDAO->Erro($e->getMessage());
                    header("Location: ../../view/Fornecedor/Atualizar.php");
                }
            } else {
                $erro = $FornecedorDAO->Erro("Fornecedor não está cadastrado");
                header("Location: ../../view/Fornecedor/Atualizar.php");
            }
        } else {
            $erro = $FornecedorDAO->Erro("CNPJ inválido");
            header("Location: ../../view/Fornecedor/Atualizar.php");
        }
    }
} else {
    echo "erro";
}
