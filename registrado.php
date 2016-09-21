
<?php

$nome = $_POST['nome'];
$nome_usuario = $_POST['nome_usuario'];
$email = $_POST['email'];
$senha = $_POST['senha2'];


echo $nome;
echo '<br>';
echo $nome_usuario;
echo '<br>';
echo $email;
echo '<br>';
echo $senha;
echo '<br>';

require('login_bd.php');
	$vConexao = mysqli_connect($vServidor, $vUsuario, $vSenha, $vBaseDados);
	if (!$vConexao) {die('Problemas na conexão: ' . mysqli_connect_error());}

		$vSql='SELECT * '.
	    	  'FROM usuarios ';

	$vResultado=mysqli_query($vConexao, $vSql);
	if (!$vResultado) {die('Problemas na conexão: ' . mysqli_error($vConexao));}


	$vRegistros=mysqli_num_rows($vResultado);
	if ($vRegistros==0) {die('Nenhum registro encontrado!');}

	$vCampo=mysqli_fetch_assoc($vResultado);

	
	var_dump($vCampo);


	if($nome_usuario===$vCampo['usuario']){

		echo "esse usuario ja existe";
		header("location: sign_up_ok.php");

	}else{
		echo "ok";
	}

