<?php

class Fornecedor
{
    private $nome;
    private $cnpj;
    private $endereco;
    private $numero;
    private $complemento;
    private $bairro;
    private $cidade;
    private $estado;
    private $cep;



    public function __construct(

        $nome,
        $cnpj,
        $endereco,
        $numero,
        $complemento,
        $bairro,
        $cidade,
        $estado,
        $cep
    ) {

        $this->nome = $nome;
        $this->cnpj = $cnpj;
        $this->endereco = $endereco;
        $this->numero = $numero;
        $this->complemento = $complemento;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->estado = $estado;
        $this->cep = $cep;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;
    }
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }
    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;
    }
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
    }
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }
    public function setCep($cep)
    {
        $this->cep = $cep;
    }

    public function getNome()
    {
        return $this->nome;
    }
    public function getCnpj()
    {
        return $this->cnpj;
    }
    public function getEndereco()
    {
        return $this->endereco;
    }
    public function getNumero()
    {
        return $this->numero;
    }
    public function getComplemento()
    {
        return $this->complemento;
    }
    public function getBairro()
    {
        return $this->bairro;
    }
    public function getCidade()
    {
        return $this->cidade;
    }
    public function getEstado()
    {
        return $this->estado;
    }
    public function getCep()
    {
        return $this->cep;
    }
}
