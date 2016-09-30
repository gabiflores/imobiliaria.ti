<?php
	$nome = $_POST['nome'];
	$senha = $_POST['senha'];
	$tipo = $_POST['tipo'];
	$email = $_POST['email'];

	ini_set('default_charset','utf-8');

	require('../../bd/login_bd.php');
	$vConexao = mysqli_connect($vServidor, $vUsuario, $vSenha, $vBaseDados);
	if (!$vConexao) {die('Problemas na conexão: ' . mysqli_connect_error());}

	$vId = $_POST['id'];
	$vSql=' UPDATE usuarios SET nome = "'. $nome .'", senha = "' . $senha . '", email = "' . $email . '", tipo = "' . $tipo . '" WHERE id= "'. $vId .'" ; ';

	$vResultado = mysqli_query($vConexao, $vSql);
	if (!$vConexao) {die('Problemas na conexão: ' . mysqli_connect_error());}
	echo('Registro editado com sucesso');

	echo "<br>";
	echo "<a href='../consultar/consultar_usuario.php'> voltar </a>";
?>