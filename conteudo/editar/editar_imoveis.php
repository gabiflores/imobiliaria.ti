editar_imoveis.php

<html>
<?php
require('../../bd/login_bd.php');
require_once "../consultar/consultar.php";
$vConexao = mysqli_connect($vServidor, $vUsuario, $vSenha, $vBaseDados);
if (!$vConexao) {die('Problemas na conexão: ' . mysqli_connect_error());}
$vId = $_GET["vId"];
$vSql= " SELECT * FROM imoveis WHERE id= '". $vId ."'";
$vResultado=mysqli_query($vConexao, $vSql);
$vRegistros=mysqli_num_rows($vResultado);
$imoveis=mysqli_fetch_assoc($vResultado);

var_dump($imoveis);

$finalidade = $imoveis['finalidade'];
$status = $imoveis['status'];
$dormitorios = $imoveis['dormitorios'];
$tipo = $imoveis['tipo'];
$valor = $imoveis['valores_imoveis'];
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
	Status
	<input type = "text" name = "status" value = "<?php echo "$status";?>"/>
	</li>
	<li>
	Tipo
	<input type = "text" name = "tipo" value = "<?php echo "$tipo";?>"/>
	</li>
	<li>
	Dormitorios
	<input type = "text" name = "dormitorios" value = "<?php echo "$dormitorios";?>"/>
	</li>
	<li>
	valor
	<input type = "text" name = "valor" value = "<?php echo "$valor";?>"/>
	</li>
	<input type = "hidden" name = "id" value = "<?php echo "$id";?>"/>
	<button> Editar </button>
	</ul>
	</form>
</budy>
</html>
