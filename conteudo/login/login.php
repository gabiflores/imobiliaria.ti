<html>
  <font face=Arial>
      <center><head>
        <meta charset="utf-8">
        <title>Login | Imobiliário Nossa Casa</title>
        <h1><a href="../../index.html">Imobiliária</br>
          <span>Nossa Casa</span></a></h1>
        <a href="../../index.html">Página Inicial</a>
        <a href="../quemsomos/quemsomos.html">Quem somos</a>
        <a href="../consultar/consultar.php">Consulta imóveis</a>
        <a href="../login/login.php">login</a>

      </head></center>

	<center><body>

	<form method="POST" action="login.php">
		<ul>

				Usuario </br>
				<input type="text" name="usuario" /></br></br>

				Senha</br>
				<input type="password" name="senha" /></br>

			<input type ="hidden" name="existe"/></br>
	<button> Enviar </button>
	</ul>
	</form>
<?php

if(isset($_POST["existe"])){
$usuario = $_POST["usuario"];
$senha = $_POST["senha"];

require_once('../configuracoes.php');
$vConexao = mysqli_connect($vServidor, $vUsuario, $vSenha, $vBaseDados);

if (!$vConexao) {die('Problemas na conexão: ' . mysqli_connect_error());}

$vSql="SELECT id, nome, senha, tipo FROM usuarios WHERE  nome = '". $usuario ."' AND senha = '". $senha ."'";

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
  			$_SESSION['nome']=$vDadosUsuario['nome'];
   			$_SESSION['tipo']=$vDadosUsuario['tipo'];
   			echo "ok";
   		}

	switch($vDadosUsuario['tipo']){

	case '1':
	echo "teste";
		header("location: ../testes/adm.php");
		break;
	case '2':
		header("location: ../testes/gerente.php");
		break;
	case '3':
		header("location: ../testes/funcionario.php");
		break;
	case '4':
		header("location: ../testes/corretor.php");
		break;
	case '5':
		header("location: ../testes/cliente.php");
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
</font>
</html>
