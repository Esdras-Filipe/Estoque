<?php
require_once "../../model/Fornecedor/Classe_fornecedor.php";
require_once "../../model/conn.php";


class FornecedorDAO
{
    public function inserir(Fornecedor $fornecedor)
    {
        global $pdo;

        $nome = $fornecedor->getNome();
        $cnpj = $fornecedor->getCnpj();
        $endereco = $fornecedor->getEndereco();
        $numero = $fornecedor->getNumero();
        $complemento = $fornecedor->getComplemento();
        $bairro = $fornecedor->getBairro();
        $cidade = $fornecedor->getCidade();
        $estado = $fornecedor->getEstado();
        $cep = $fornecedor->getCep();

        $qry = $pdo->prepare("INSERT INTO Fornecedor(nome, cnpj, endereco, numero, complemento, bairro, cidade, estado, CEP) 
        VALUES(:nome, :cnpj, :endereco, :numero, :complemento, :bairro, :cidade, :estado, :CEP)");

        $qry->bindParam(":nome", $nome, PDO::PARAM_STR);
        $qry->bindParam(":cnpj", $cnpj, PDO::PARAM_STR);
        $qry->bindParam(":endereco", $endereco, PDO::PARAM_STR);
        $qry->bindParam(":numero", $numero, PDO::PARAM_STR);
        $qry->bindParam(":complemento", $complemento, PDO::PARAM_STR);
        $qry->bindParam(":bairro", $bairro, PDO::PARAM_STR);
        $qry->bindParam(":cidade", $cidade, PDO::PARAM_STR);
        $qry->bindParam(":estado", $estado, PDO::PARAM_STR);
        $qry->bindParam(":CEP", $cep, PDO::PARAM_STR);
        $qry->execute();
    }

    public function Atualizar(Fornecedor $fornecedor)
    {
        global $pdo;

        $nome = $fornecedor->getNome();
        $cnpj = $fornecedor->getCnpj();
        $endereco = $fornecedor->getEndereco();
        $numero = $fornecedor->getNumero();
        $complemento = $fornecedor->getComplemento();
        $bairro = $fornecedor->getBairro();
        $cidade = $fornecedor->getCidade();
        $estado = $fornecedor->getEstado();
        $cep = $fornecedor->getCep();

        $qry = $pdo->prepare("UPDATE Fornecedor SET nome=:nome, endereco=:endereco, numero=:numero,  complemento=:complemento, 
        bairro=:bairro, cidade=:cidade, estado=:estado, CEP=:CEP WHERE cnpj=:cnpj ");

        $qry->bindParam(":nome", $nome, PDO::PARAM_STR);
        $qry->bindParam(":cnpj", $cnpj, PDO::PARAM_STR);
        $qry->bindParam(":endereco", $endereco, PDO::PARAM_STR);
        $qry->bindParam(":numero", $numero, PDO::PARAM_STR);
        $qry->bindParam(":complemento", $complemento, PDO::PARAM_STR);
        $qry->bindParam(":bairro", $bairro, PDO::PARAM_STR);
        $qry->bindParam(":cidade", $cidade, PDO::PARAM_STR);
        $qry->bindParam(":estado", $estado, PDO::PARAM_STR);
        $qry->bindParam(":CEP", $cep, PDO::PARAM_STR);
        $qry->execute();
    }

    public function Verifica($cnpj)
    {
        global $pdo;

        $qry = $pdo->prepare("SELECT * FROM Fornecedor WHERE cnpj=:cnpj");

        $qry->bindParam(":cnpj", $cnpj, PDO::PARAM_STR);
        $qry->execute();
        $verifica = $qry->rowCount();

        return $verifica;
    }

    public function Deletar(Fornecedor $fornecedor)
    {
        global $pdo;

        $qry = $pdo->prepare("DELETE FROM Fornecedor WHERE cnpj=:cnpj");

        $cnpj = $fornecedor->getCnpj();
        $qry->bindParam(":cnpj", $cnpj, PDO::PARAM_STR);
        $qry->execute();
    }

    public function BuscarTodos()
    {
        global $pdo;

        $qry = $pdo->query("SELECT * FROM Fornecedor");

        $items = array();
        while ($linha = $qry->fetch()) {
            $items[] = new Fornecedor(
                $linha["nome"],
                $linha["cnpj"],
                $linha["endereco"],
                $linha["numero"],
                $linha["complemento"],
                $linha["bairro"],
                $linha["cidade"],
                $linha["estado"],
                $linha["CEP"]
            );
        }
        return $items;
    }

    public function BuscarID($cnpj)
    {
        global $pdo;
        $qry = $pdo->prepare("SELECT * FROM Fornecedor WHERE cnpj=:cnpj");
        $qry->bindParam(":cnpj", $cnpj);
        $qry->execute();
        $linha = $qry->fetch();

        return new Fornecedor(
            $linha["nome"],
            $linha["cnpj"],
            $linha["endereco"],
            $linha["numero"],
            $linha["complemento"],
            $linha["bairro"],
            $linha["cidade"],
            $linha["estado"],
            $linha["CEP"]
        );
    }

    public function BuscarNome($nome)
    {
        global $pdo;

        $qry = $pdo->prepare("SELECT * FROM Fornecedor WHERE nome LIKE CONCAT('%', :nome, '%')");
        $qry->bindParam(":nome", $nome);
        $qry->execute();

        while ($linha = $qry->fetch()) {
            $items[] = new Fornecedor(
                $linha["nome"],
                $linha["cnpj"],
                $linha["endereco"],
                $linha["numero"],
                $linha["complemento"],
                $linha["bairro"],
                $linha["cidade"],
                $linha["estado"],
                $linha["CEP"]
            );
        }
        return  $items;
    }
    public function Erro($erro)
    {
        session_start();
        $_SESSION["erro"] = $erro;
    }
}
