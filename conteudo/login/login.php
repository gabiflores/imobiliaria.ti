login_processa.php'

<html>
 	<head>
		<title> Tela de Login </title>
	</head>
	<body>
	<form method="POST" action="login.php">
		<ul>
			<li>
				Usuario
				<input type="text" name="usuario" />
			</li>
			<li>
				Senha
				<input type="password" name="senha" />
			</li>
			<input type ="hidden" name="existe"/>
	<button> Enviar </button>
	</ul>
	</form>
<?php

if(isset($_POST["existe"])){
$usuario = $_POST["usuario"];
$senha = $_POST["senha"];

require_once('../../bd/login_bd.php');
$vConexao = mysqli_connect($vServidor, $vUsuario, $vSenha, $vBaseDados);

if (!$vConexao) {die('Problemas na conexão: ' . mysqli_connect_error());}

$vSql="SELECT id, usuario, senha, tipo FROM usuarios WHERE  usuario = '". $usuario ."' AND senha = '". $senha ."'";

$vResultado=mysqli_query($vConexao, $vSql);
$vRegistros=mysqli_num_rows($vResultado);
$vDadosUsuario=mysqli_fetch_assoc($vResultado);

var_dump($vRegistros);
var_dump($vDadosUsuario);

	if ($vRegistros===1) {
		session_start();
		session_destroy();
		session_start();

		if (empty($_SESSION['id'])){
   			$_SESSION['id']=$vDadosUsuario['id'];
  			$_SESSION['nome']=$vDadosUsuario['usuario'];
   			$_SESSION['tipo']=$vDadosUsuario['tipo'];
   			echo "ok";
   		}

	switch($vDadosUsuario['tipo']){

	case 'adm':
	echo "teste";
		header("location: ../testes/adm.php");
		break;
	case 'gerente':
		header("location: ../testes/gerente.php");
		break;
	case 'funcionario':
		header("location: ../testes/funcionario.php");
		break;
	case 'corretor':
		header("location: ../testes/corretor.php");
		break;
	case 'cliente':
		header("location: ../testes/cliente.php");
		break;
	}
	}else{
   	echo "senha ou usuario invalido";
	}
}

?>