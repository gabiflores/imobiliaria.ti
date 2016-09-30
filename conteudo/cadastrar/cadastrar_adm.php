<!DOCTYPE html>
<html>
<font face=Arial>
  <center><head>
    <meta charset="utf-8">
    <title>cadastro de usuarios</title>
    <h1><a href="index.html">Imobiliária</br>
      <span>Nossa Casa</span></a></h1>
    <a href="#">Página Inicial</a>
	<!-- <a href="../cadastrar/cadastra_gerente.php">cadastrar usuarios</a> -->
	<a href="../cadastrar/cadastrar_imovel.php">cadastrar imóveis</a>
    <a href="../quemsomos/quemsomos.html">Quem somos</a>
    <a href="../consultar/consultar.php">Consulta imóveis</a>
	<a href="../consultar/consultar_usuario.php">Consulta usuarios</a>
    <a href="../login/logout.php">logout</a>

  </head></center>


  <center><body>

  <br>
  <br>

<?php
require('../configuracoes.php');
$vConexao = mysqli_connect($vServidor, $vUsuario, $vSenha, $vBaseDados);
if (!$vConexao) {die('Problemas na conexão: ' . mysqli_connect_error());}
?>
<html>
 	<head>
		<title> Tela de Cadastra </title>
	</head>
	<body>
	<form method="POST" action="cadastra_gerente.php">
		<ul>
			<li>
				Nome
				<input type="text" name="nome" />
			</li>
			<li>
				Usuario
				<input type="text" name="usuario" />
			</li>
			<li>
				Senha
				<input type="password" name="senha" value="senhatemp" />
			</li>
			<li>
				E-MAIL
				<input type="text" name="email" />
			</li>
			<li>
				Tipo de Permissão
				<select name="tipo">
  					<option value="2"> Gerente </option>
  					<option value="3"> Financeiro </option>
  					<option value="4"> Funcionario </option>
  					<option value="5"> Corretor </option>
  					<option value="6"> Cliente </option>
				</select>
			</li>
			<li>
				Tipo de Usuario
				<input type="text" name="tipo2" />
			</li>
			<li>
				CPF
				<input type="text" name="cpf" />
			</li>
			<input type ="hidden" name="existe"/>
			<br>
			
	<button> Enviar </button>
	</ul>
	</form>
<?php

if (isset($_POST["existe"])){

	$nome = $_POST["nome"];
	$usuario = $_POST["usuario"];
	$senha = $_POST["senha"];
	$tipo = $_POST["tipo"];
	$tipo2 = $_POST["tipo2"];
	$cpf = $_POST["cpf"];
	$email = $_POST["email"];

	$vSql='INSERT INTO usuarios '.
		  '(nome, senha, tipo, email) '.
		  'VALUES'.
		  '("'.$nome.'", "'.$senha.'", "'.$tipo.'", "'.$email.'"); ';
	$vResultado = mysqli_query($vConexao, $vSql);

	$vSql='INSERT INTO pessoas '.
		  '(nome, cpf, tipo) '.
		  'VALUES'.
		  '("'.$nome.'", "'.$cpf.'", "'.$tipo2.'"); ';
	$vResultado = mysqli_query($vConexao, $vSql);
	
	if (!$vResultado) {die('Problemas na inserção: ' . mysqli_error());}
	echo('dados inseridos com sucesso!');

}
?>
</body>
<br>
<br>
  <center><footer>
    <P>Contato Fone:(51) 9876-54321</p>
      <p>Rua Tramandaí / Senac,RS</p>
    <p>
      © 2016 by Gaby, Pedro e Tiago - All rights reserved.
    </p>
    <a href="https://www.facebook.com/" id="facebook" target="_blank">Facebook</a>
    <a href="https://www.twitter.com/" id="twitter" target="_blank">Twitter</a>
    <a href="https://www.google.com//" id="googleplus" target="_blank">Google+</a>
  </footer></center>
</html>

