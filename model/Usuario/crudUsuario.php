<?php
session_start();
require_once dirname(__FILE__) . "/UsuarioClasse.php";
require "../../model/conn.php";
class UsuarioDAO
{
    public function login(Usuario $usuario)
    {
        global $pdo;

        $nome = $usuario->getNome();
        $senha = $usuario->getSenha();
        $sql = "SELECT * FROM Usuario where nome=:nome AND senha=:senha";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":senha", md5($senha));
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $dado = $sql->fetch();
            $_SESSION['idUser'] = $dado['idUsuario'];
            $_SESSION['tipo'] = $dado["tipo"];
            return true;
        } else {
            return false;
        }
    }

    public function Erro($erro)
    {

        $_SESSION["erro"] = $erro;
        echo $erro;
    }

    public function verifica($cpf)
    {
        global $pdo;

        $sql = $pdo->prepare("SELECT * FROM Usuario WHERE cpf=:cpf");
        $sql->bindValue(":cpf", $cpf);
        $sql->execute();
        $verifica = $sql->rowCount();
        return $verifica;
    }

    public function Inserir(Usuario $usuario)
    {
        global $pdo;

        $sql = $pdo->prepare("INSERT INTO Usuario(nome, senha, cpf, datacriacao, tipo, email) 
            VALUES(:nome, :senha, :cpf, :datacriacao, :tipo, :email)");

        $sql->bindValue(":nome", $usuario->getNome());
        $sql->bindValue(":senha", $usuario->getSenha());
        $sql->bindValue(":cpf", $usuario->getCpf());
        $sql->bindValue(":datacriacao", $usuario->getDataCriacao());
        $sql->bindValue(":tipo", $usuario->getTipo());
        $sql->bindValue(":email", $usuario->getEmail());
        $sql->execute();
    }

    public function Atualizar(Usuario $usuario)
    {
        global $pdo;

        $sql = $pdo->prepare("UPDATE Usuario SET nome=:nome, senha=:senha, 
            datacriacao=:datacriacao, tipo=:tipo, email=:email WHERE cpf=:cpf");

        $sql->bindValue(":nome", $usuario->getNome());
        $sql->vindValue(":senha", $usuario->getSenha());
        $sql->bindValue(":cpf", $usuario->getCpf());
        $sql->bindValue(":datacriacao", $usuario->getDataCriacao());
        $sql->bindValue(":tipo", $usuario->getTipo());
        $sql->bindValue(":email", $usuario->getEmail());
        $sql->execute();
    }

    public function Deletar(Usuario $usuario)
    {
        global $pdo;

        $sql = $pdo->prepare("DELETE FROM Usuario WHERE cpf=:cpf");
        $sql->bindValue(":cpf", $usuario->getCpf());
        $sql->execute();
    }
    public function BuscarID($id)
    {
        global $pdo;

        $qry = $pdo->prepare("SELECT * FROM Usuario WHERE idUsuario=$id");
        $qry->execute();

        $linha = $qry->fetch();

        return new Usuario(
            $linha["nome"],
            $linha["senha"],
            $linha["cpf"],
            $linha["datacriacao"],
            $linha["tipo"],
            $linha["email"]

        );
    }
}
