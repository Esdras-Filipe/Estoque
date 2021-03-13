create database projeto;

use projeto;

CREATE TABLE Usuario(
    idUsuario  int AUTO_INCREMENT,
    nome varchar(50) not null,
    senha varchar(32) not null,
    cpf varchar(14) not null,
    datacriacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    tipo varchar(13) not null,
    email varchar(40) not null,
    constraint pk_Usuario primary key(idUsuario, cpf) 
);

CREATE TABLE Fornecedor(
    nome varchar(50) not null,
    cnpj varchar(18) not null,
    endereco varchar(50) not null,
    numero varchar(15) not null,
    complemento varchar(5),
    bairro varchar(20) not null,
    cidade varchar(20) not null,
    estado varchar(20) not null,
    CEP varchar(9) not null,
    constraint pk_Fornecedor primary key(cnpj)
 );

CREATE TABLE Produto (
    codigo VARCHAR(80) not null,
    cnpjForn varchar(18) ,
    descricao VARCHAR(50) not null,
    categoria VARCHAR(20) not null,
    marca VARCHAR(20) not null,
    precoVenda  float not null,
    precoCusto  float not null,
    estoqueAtual  float not null,
    unidadeMedida VARCHAR(15) not null,
    limiteEstoque float not null,
    estoqueMinimo  float not null,
    constraint pk_Produto primary key(codigo),
    constraint fk_CnpjFornecedor foreign key(cnpjForn) references Fornecedor(cnpj) on delete set null
);

 create table TransacaoEstoque(
    idTransacaoEstoque int AUTO_INCREMENT not null,
    tipo varchar(50) not null,
    dataOperacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    codigoProduto varchar(80) not null,
    quantidade float not null,
    constraint pk_idTranEsto primary key(idTransacaoEstoque),
    constraint fk_CodigoProduto foreign key(codigoProduto) references Produto(codigo) on delete cascade

 );
 
 insert into Usuario VALUES("", "admin", md5("admin"), "000.000.000-00", now(), "Administrador","admin@email.com");
 
 


 
