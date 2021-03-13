<?php
class Produto
{

    private $codigo;
    private $cnpjForn;
    private $descricao;
    private $categoria;
    private $marca;
    private $precoVenda;
    private $precoCusto;
    private $estoqueAtual;
    private $unidadeMedida;
    private $limiteEstoque;
    private $estoqueMinimo;

    public function __construct(
        $codigo,
        $cnpjForn,
        $descricao,
        $categoria,
        $marca,
        $precoVenda,
        $precoCusto,
        $estoqueAtual,
        $unidadeMedida,
        $limiteEstoque,
        $estoqueMinimo
    ) {
        $this->codigo = $codigo;
        $this->cnpjForn = $cnpjForn;
        $this->descricao = $descricao;
        $this->categoria = $categoria;
        $this->marca = $marca;
        $this->precoVenda = $precoVenda;
        $this->precoCusto = $precoCusto;
        $this->estoqueAtual = $estoqueAtual;
        $this->unidadeMedida = $unidadeMedida;
        $this->limiteEstoque = $limiteEstoque;
        $this->estoqueMinimo = $estoqueMinimo;
    }
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }
    public function setCnpjFornecedor($cnpjForn)
    {
        $this->cnpjForn = $cnpjForn;
    }
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }
    public function setMarca($marca)
    {
        $this->marca = $marca;
    }
    public function setPrecoVenda($precoVenda)
    {
        $this->precoVenda = $precoVenda;
    }
    public function setPrecoCusto($precoCusto)
    {
        $this->precoCusto = $precoCusto;
    }
    public function setEstoqueAtual($estoqueAtual)
    {
        $this->estoqueAtual = $estoqueAtual;
    }
    public function setUnidadeMedida($unidadeMedida)
    {
        $this->unidadeMedida = $unidadeMedida;
    }
    public function setLimiteEstoque($limiteEstoque)
    {
        $this->limiteEstoque = $limiteEstoque;
    }
    public function setEstoqueMinimo($estoqueMinimo)
    {
        $this->estoqueMinimo = $estoqueMinimo;
    }


    public function getCodigo()
    {
        return $this->codigo;
    }
    public function getCnpjFornecedor()
    {
        return $this->cnpjForn;
    }
    public function getDescricao()
    {
        return $this->descricao;
    }
    public function getCategoria()
    {
        return $this->categoria;
    }
    public function getMarca()
    {
        return $this->marca;
    }
    public function getPrecoVenda()
    {
        return $this->precoVenda;
    }
    public function getPrecoCusto()
    {
        return $this->precoCusto;
    }
    public function getEstoqueAtual()
    {
        return $this->estoqueAtual;
    }
    public function getUnidadeMedida()
    {
        return $this->unidadeMedida;
    }
    public function getLimiteEstoque()
    {
        return $this->limiteEstoque;
    }
    public function getEstoqueMinimo()
    {
        return $this->estoqueMinimo;
    }
}
