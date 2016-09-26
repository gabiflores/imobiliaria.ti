
<?php
	$finalidade = $_POST['finalidade'];
	$tipo = $_POST['tipo'];
	$dormitorios = $_POST['dormitorios'];

	ini_set('default_charset','utf-8');

	require('../../bd/login_bd.php');
	$vConexao = mysqli_connect($vServidor, $vUsuario, $vSenha, $vBaseDados);
	if (!$vConexao) {die('Problemas na conexão: ' . mysqli_connect_error());}

	$vId = $_POST['id'];
	$vSql=' UPDATE Imoveis SET finalidade = "'. $finalidade .'", tipo = "' . $tipo . '", dormitorios = "' . $dormitorios . '" WHERE id= "'. $vId .'" ; ';

	$vResultado = mysqli_query($vConexao, $vSql);
	if (!$vConexao) {die('Problemas na conexão: ' . mysqli_connect_error());}
	echo('Imovel editado com sucesso');

	echo "<br>";
	echo "<a href='../consultar/consultar.php'> voltar </a>";
?>