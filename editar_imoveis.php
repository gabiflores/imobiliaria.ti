editar_imoveis.php

<html>
<?php
require('login_bd.php');
require_once "consultar.php";
$vConexao = mysqli_connect($vServidor, $vUsuario, $vSenha, $vBaseDados);
if (!$vConexao) {die('Problemas na conexão: ' . mysqli_connect_error());}
$vId = $_GET["vId"];
$vSql= " SELECT * FROM Imoveis WHERE id= '". $vId ."'";
$vResultado=mysqli_query($vConexao, $vSql);
$vRegistros=mysqli_num_rows($vResultado);
$imoveis=mysqli_fetch_assoc($vResultado);

var_dump($imoveis);

$finalidade = $imoveis['finalidade'];
$dormitorios = $imoveis['dormitorios'];
$tipo = $imoveis['tipo'];
$valor = $imoveis['valor'];
$id = $imoveis['id'];
?>


<head>
	<title> Editar Imóveis </title>
</head>
<budy>
<form method = "POST" action = "concluir_editar_imoveis.php">
	<ul>
	<li>
	Finalidade
	<input type = "text" name = "finalidade" value = "<?php echo "$finalidade";?>"/>
	</li>
	<li>
	Tipo
	<input type = "text" name = "tipo" value = "<?php echo "$tipo";?>"/>
	</li>
	<li>
	Dormitorios
	<input type = "text" name = "dormitorios" value = "<?php echo "$dormitorios";?>"/>
	</li>
	<input type = "hidden" name = "id" value = "<?php echo "$id";?>"/>
	<button> Editar </button>
	</ul>
	</form>
</budy>
</html>
