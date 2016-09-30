<html>
<?php
require('../../bd/login_bd.php');
require_once "../consultar/consultar_usuario.php";
$vConexao = mysqli_connect($vServidor, $vUsuario, $vSenha, $vBaseDados);
if (!$vConexao) {die('Problemas na conexão: ' . mysqli_connect_error());}
$vId = $_GET["vId"];
$vSql= " SELECT * FROM usuarios WHERE id= '". $vId ."'";
$vResultado=mysqli_query($vConexao, $vSql);
$vRegistros=mysqli_num_rows($vResultado);
$dados=mysqli_fetch_assoc($vResultado);
var_dump($dados);
$nome= $dados['nome'];
$senha = $dados['senha'];
$tipo = $dados['tipo'];
$id = $dados['id'];
$email= $dados['email'];
?>


<head>
	<title> Editar Usuarios </title>
</head>
<budy>
<form method = "POST" action = "concluir_editar.php">
	<ul>
	<li>
	Nome
	<input type = "text" name = "nome" value = "<?php echo "$nome";?>"/>
	</li>
	<li>
	Senha
	<input type = "password" name = "senha" value = "<?php echo "$senha";?>"/>
	</li>
	<li>
	Tipo
	<input type = "text" name = "tipo" value = "<?php echo "$tipo";?>"/>
	</li>
	<li>
	E-Mail
	<input type = "text" name = "email" value = "<?php echo "$email";?>"/>
	</li>
	<input type = "hidden" name = "id" value = "<?php echo "$id";?>"/>
	<button> Editar </button>
	</ul>
	</form>
</budy>
</html>
