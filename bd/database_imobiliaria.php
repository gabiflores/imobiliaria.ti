<?php

//Conectar a base de dados a partir do arquivo de configurações
require('configuracoes.php');

$vConexao = mysqli_connect($vServidor, $vUsuario, $vSenha);
if (!$vConexao) {die('Problemas na conexão: ' . mysqli_connect_error());}

//Cria a base de dados
$vSql='CREATE DATABASE imobiliaria;';
$vResultado = mysqli_query($vConexao, $vSql);

$vConexao = mysqli_connect($vServidor, $vUsuario, $vSenha, $vBaseDados);
if (!$vConexao) {die('Problemas na conexão: ' . mysqli_connect_error());}

$vSql='CREATE TABLE permissoes '.
      '( '.
      'id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY, '.
	  'usuario VARCHAR(40) NOT NULL, '.
	  'insert BOOLEAN NOT NULL, '.
	  'edita BOOLEAN NOT NULL, '.
	  'exclui BOOLEAN NOT NULL, '.
	  'consulta BOOLEAN NOT NULL, '.
      '); ';
$vResultado = mysqli_query($vConexao, $vSql);

	if (!$vResultado) {echo ('Problemas na criação da tabela permissoes erro: ' . mysqli_error());}
	echo('tabela criada com sucesso!');
	
$vSql='CREATE TABLE usuarios '.
      '( '.
      'id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY, '.
      'nome VARCHAR(40) NOT NULL UNIQUE KEY, '.
      'senha VARCHAR(40) NOT NULL, '.
      'tipo INT(10) NOT NULL, '.
	  'email VARCHAR(40) NOT NULL, '.
	  'CONSTRAINT FrKusuario_permissoes FOREIGN KEY (tipo) REFERENCES permissoes (id) '.
      '); ';
$vResultado = mysqli_query($vConexao, $vSql);

	if (!$vResultado) {echo ('Problemas na criação da tabela usuarios erro: ' . mysqli_error());}
	echo('tabela criada com sucesso!');
	
$vSql='CREATE TABLE cidades '.
      '( '.
      'id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY, '.
      'nome VARCHAR(40) NOT NULL, '.
	  'cep VARCHAR(20) NOT NULL '.
      '); ';
$vResultado = mysqli_query($vConexao, $vSql);

	if (!$vResultado) {echo ('Problemas na criação da tabela cidades erro: ' . mysqli_error());}
	echo('tabela criada com sucesso!');

$vSql='CREATE TABLE bairros '.
      '( '.
      'id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY, '.
      'nome VARCHAR(40) NOT NULL '.
      '); ';
$vResultado = mysqli_query($vConexao, $vSql);

	if (!$vResultado) {echo ('Problemas na criação da tabela bairros erro: ' . mysqli_error());}
	echo('tabela criada com sucesso!');
	
$vSql='CREATE TABLE imoveis '.
      '( '.
      'id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY, '.
      'endereco VARCHAR(40) NOT NULL, '.
	  'quem_cadastrou VARCHAR(40) NOT NULL, '.
	  'valores_imoveis INT(10) NOT NULL, '.
      'tipo VARCHAR(40) NOT NULL '.
      '); ';
$vResultado = mysqli_query($vConexao, $vSql);

	if (!$vResultado) {echo ('Problemas na criação da tabela imoveis erro: ' . mysqli_error());}
	echo('tabela criada com sucesso!');
	
$vSql='CREATE TABLE videos '.
      '( '.
      'id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY, '.
      'nome VARCHAR(40) NOT NULL, '.
      'link VARCHAR(400) NOT NULL, '.
	  'midias INT(5) NULL, '.
	  'CONSTRAINT FrKmidias_videos FOREIGN KEY (midias) REFERENCES imoveis (id) '.
      '); ';
$vResultado = mysqli_query($vConexao, $vSql);

	if (!$vResultado) {echo ('Problemas na criação da tabela videos erro: ' . mysqli_error());}
	echo('tabela criada com sucesso!');
	
$vSql='CREATE TABLE fotos '.
      '( '.
      'id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY, '.
      'nome VARCHAR(40) NOT NULL, '.
      'link VARCHAR(40) NOT NULL, '.
	  'midias INT(5) NULL, '.
	  'CONSTRAINT FrKmidias_fotos FOREIGN KEY (midias) REFERENCES imoveis (id) '.
      '); ';
$vResultado = mysqli_query($vConexao, $vSql);

	if (!$vResultado) {echo ('Problemas na criação da tabela fotos erro: ' . mysqli_error());}
	echo('tabela criada com sucesso!');
	
$vSql='CREATE TABLE pessoas '.
      '( '.
      'id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY, '.
      'nome VARCHAR(40) NOT NULL, '.
      'cpf INT(11) NOT NULL UNIQUE KEY, '.
	  'tipo VARCHAR(40) NOT NULL, '.
      'usuario INT(10), '.
	  'CONSTRAINT FrKusuario_pessoa FOREIGN KEY (usuario) REFERENCES usuarios (id) '.
      '); ';
$vResultado = mysqli_query($vConexao, $vSql);
	
	if (!$vResultado) {echo ('Problemas na criação da tabela pessoas erro: ' . mysqli_error());}
	echo('tabela criada com sucesso!');
	
$vSql='CREATE TABLE financeiro '.
      '( '.
      'id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY, '.
      'valores_imoveis INT(10) NOT NULL, '.
	  'imovel VARCHAR(40) NOT NULL, '.
      'quem_cadastrou VARCHAR(40) NOT NULL, '.
	  'comissao INT(10) NULL, '.
      'quem_vendeu VARCHAR(40) NOT NULL '.
      '); ';
$vResultado = mysqli_query($vConexao, $vSql);

	if (!$vResultado) {echo ('Problemas na criação da tabela financeiro erro: ' . mysqli_error());}
	echo('tabela criada com sucesso!');
	
$vSql='CREATE TABLE historico '.
      '( '.
      'id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY, '.
      'data DATE NOT NULL, '.
      'registro VARCHAR(40) NULL, '.
	  'valores_imoveis INT(10) NOT NULL, '.
	  'imovel VARCHAR(40) NULL, '.
      'quem_cadastrou VARCHAR(40) NULL, '.
      'quem_vendeu VARCHAR(40) NULL, '.
	  'comissao INT(10) NULL, '.
      'tipo INT(10) NULL '.
      '); ';
$vResultado = mysqli_query($vConexao, $vSql);

	if (!$vResultado) {echo ('Problemas na criação da tabela historico erro: ' . mysqli_error());}
	echo('tabela criada com sucesso!');
	
die('banco de dados criado com sucesso ');
mysqli_close;
?>