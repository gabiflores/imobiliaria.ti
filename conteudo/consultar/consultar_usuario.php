
<html>
<head>
	<title> consultar usuario </title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<!-- <script> -->
			<!-- function confirma(){ -->
				<!-- if (!confirm('Deseja Excluir')){ -->
					<!-- return false; -->
				<!-- } -->
			<!-- } -->
		<!-- </script> -->
</head>
<body>
<!-- <?php
// session_start();
// echo $_SESSION['nome'];
// echo '<br>';
// echo $_SESSION['tipo'];

?> -->
<form method = "POST" action = "consultar_usuario.php" >
Digite o nome do usuario a ser pesquisado
<input type = "text" name = "nome"/>
<br>
<input type = "hidden" name = "start">
<button> Consultar </button>
</form>

<?php

if(isset($_POST['start'])){
	$nome = $_POST['nome'];
	require('../../bd/login_bd.php');
	$vConexao = mysqli_connect($vServidor, $vUsuario, $vSenha, $vBaseDados);
	if (!$vConexao) {die('Problemas na conexão: ' . mysqli_connect_error());}
	if(empty($_POST['nome'])){

		$vSql='SELECT * '.
	    	  'FROM usuarios ';	
		}else{
			$vSql='SELECT * '.
	      	'FROM usuarios '.
	      	'WHERE nome LIKE "'.$nome.'"';
	    }

	$vResultado=mysqli_query($vConexao, $vSql);
	if (!$vResultado) {die('Problemas na conexão: ' . mysqli_error($vConexao));}

	$vRegistros=mysqli_num_rows($vResultado);
	if ($vRegistros==0) {die('Nenhum registro encontrado!');}

}	
?>

<table border="1">

<?php
if(isset($_POST['start'])){
	//Exibir dados
	echo('Registros: '.$vRegistros.'</br></br>');
	echo "<tr>";
	echo "<th> excluir </th>";
	echo "<th> ID </th>";
	echo "<th> Nome </th>";
	//echo "<th> Senha </th>";
	echo "<th> Tipo </th>";
	echo "<th> Email </th>";
	echo "<th> Editar </th>";
	echo "</tr>";

	while($vCampo=mysqli_fetch_array($vResultado)){
		  $vJavascript="javascript: if (confirm('Confirma a exclusão do registro?'))parent.location.href='../excluir/excluir_usuarios.php?vId=".$vCampo['id']."'";
	      echo('<tr>');
	      echo('<td>'.
	           '<a href="#" onClick="'.$vJavascript.'">Excluir</a>'.'<td>'.
	           utf8_encode($vCampo['id']).'<td>'.
	           utf8_encode($vCampo['nome']).'<td>'.
	           //utf8_encode($vCampo['senha']).'<td>'.
	           utf8_encode($vCampo['tipo']).'<td>'.
			   utf8_encode($vCampo['email']).'<td>'.
	           '<a href=../editar/editar_usuario.php?vId='.$vCampo['id'].'>Editar</a>'.'</td>');
	      echo('</tr>');
	     };


	//Fechar conexão
	mysqli_close($vConexao);
}
?>

<!-- Finalizar tabela e página
   </table>
   


   <br>
   <a href='logout.php'>sair</a>
  </body>
</html>