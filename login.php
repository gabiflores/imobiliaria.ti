

<html>
 	<head>
      <center><head>
        <meta charset="utf-8">
        <title>Login | Imobiliário Nossa Casa</title>
        <h1><a href="index.html">Imobiliária</br>
          <span>Nossa Casa</span></a></h1>
        <a href="index.html">Página Inicial</a>
        <a href="#">Quem somos</a>
        <a href="conteudo/consultar/consultar.php">Consulta imóveis</a>
        <a href="login.php">login</a>

      </head></center>

	<center><body>
	<form method="POST" action="login.php">
		<ul>

			<center>	Usuario </center></br>
				<input type="text" name="usuario" />


			<center>	Senha </center></br>
				<input type="password" name="senha" />

			<input type ="hidden" name="existe"/></br>
	<button> Enviar </button>
	</ul>
	</form>

<?php

if(isset($_POST["existe"])){
$usuario = $_POST["usuario"];
$senha = $_POST["senha"];

require('../login_bd.php');
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
		header("location: adm.php");
		break;
	case 'gerente':
		header("location:gerente.php");
		break;
	case 'funcionario':
		header("location:funcionario.php");
		break;
	case 'corretor':
		header("location:corretor.php");
		break;
	case 'cliente':
		header("location:cliente.php");
		break;
	}
	}else{
   	echo "senha ou usuario invalido";
	}
}

?>
</body></center>
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
