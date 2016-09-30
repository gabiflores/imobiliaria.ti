
<?php
	$finalidade = $_POST['finalidade'];
	$status = $_POST['status'];
	$tipo = $_POST['tipo'];
	$dormitorios = $_POST['dormitorios'];
	$valor = $_POST['valor'];

	ini_set('default_charset','utf-8');

	require('../../bd/login_bd.php');
	$vConexao = mysqli_connect($vServidor, $vUsuario, $vSenha, $vBaseDados);
	if (!$vConexao) {die('Problemas na conexão: ' . mysqli_connect_error());}

	$vId = $_POST['id'];
	$vSql='UPDATE imoveis SET finalidade = "'. $finalidade .'", status = "' . $status . '" tipo = "' . $tipo . '", dormitorios = "' . $dormitorios . '", valores_imoveis = "' . $valor . '" WHERE id= "'. $vId .'" ; ';

	$vResultado = mysqli_query($vConexao, $vSql);
	if (!$vResultado) {die('Problemas na conexão: ' . mysqli_error($vConexao));}
	echo('Imovel editado com sucesso');

	echo "<br>";
	echo "<a href='../consultar/consultar.php'> voltar </a>";
?>