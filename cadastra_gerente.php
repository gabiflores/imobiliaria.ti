<?php
require('configuracoes.php');
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
</html>