
<?php

$nome = $_POST['nome'];
$nome_usuario = $_POST['nome_usuario'];
$email = $_POST['email'];
$senha = $_POST['senha2'];
$tipo = "cliente";

echo $nome;
echo '<br>';
echo $nome_usuario;
echo '<br>';
echo $email;
echo '<br>';
echo $senha;
echo '<br>';
echo $tipo;


require('login_bd.php');
	$vConexao = mysqli_connect($vServidor, $vUsuario, $vSenha, $vBaseDados);
	if (!$vConexao) {die('Problemas na conexão: ' . mysqli_connect_error());}

		$vSql='SELECT * '.
	    	  'FROM usuarios '.
	    	  'WHERE usuario = "' .$nome_usuario. '"';

	$vResultado=mysqli_query($vConexao, $vSql);
	if (!$vResultado) {die('Problemas na conexão: ' . mysqli_error($vConexao));}


	$vRegistros=mysqli_num_rows($vResultado);
	if ($vRegistros==0){

	$vSql='INSERT INTO usuarios (usuario,senha,tipo) VALUES ("' . $nome_usuario . '" ,"' . $senha . '", "' . $tipo . '")';
		$vResultado=mysqli_query($vConexao, $vSql);
		if (!$vResultado) {die('Problemas na execução: ' . mysqli_error($vConexao));}
		// echo "Usuario cadastrado com sucesso!";
		
	}else{
		echo "esse usuario ja existe!";
		header("refresh: 3; sign_up_ok.php");		
	}

?>