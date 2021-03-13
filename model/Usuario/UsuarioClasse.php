<?php

class Usuario
{
    private $nome;
    private $senha;
    private $cpf;
    private $datacriacao;
    private $tipo;
    private $email;


    public function __construct(
        $nome,
        $senha,
        $cpf,
        $datacriacao,
        $tipo,
        $email
    ) {
        $this->nome = $nome;
        $this->senha = $senha;
        $this->cpf = $cpf;
        $this->datacriacao = $datacriacao;
        $this->tipo = $tipo;
        $this->email = $email;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }
    public function setDataCriacao($datacriacao)
    {
        $this->datacriacao = $datacriacao;
    }
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }


    public function getEmail()
    {
        return $this->email;
    }
    public function getTipo()
    {
        return $this->tipo;
    }
    public function getDataCriacao()
    {
        return $this->datacriacao;
    }
    public function getCpf()
    {
        return $this->cpf;
    }
    public function getSenha()
    {
        return $this->senha;
    }
    public function getNome()
    {
        return $this->nome;
    }
}
