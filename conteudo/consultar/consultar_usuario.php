<!DOCTYPE html>
<html>
<font face=Arial>
  <center><head>
    <meta charset="utf-8">
    <title>Página Adiministrativa</title>
    <h1><a href="#">Imobiliária</br>
      <span>Nossa Casa</span></a></h1>
    <a href="../testes/adm.php">Página Inicial</a>
	<a href="../cadastrar/cadastra_gerente.php">cadastrar usuarios</a>
	<a href="../cadastrar/cadastrar_imovel.php">cadastrar imóveis</a>
    <a href="../quemsomos/quemsomos.html">Quem somos</a>
    <a href="../consultar/consultar.php">Consulta imóveis</a>
	<!-- <a href="../consultar/consultar_usuario.php">Consulta usuarios</a> -->
    <a href="../login/logout.php">logout</a>

  </head></center>
<center><body>
<br>
<br>

<form method = "POST" action = "consultar_usuario.php" >
Digite o nome do usuario a ser pesquisado
<input type = "text" name = "nome"/>
<br>
<input type = "hidden" name = "start">
<button> Consultar </button>
</form></center>
<br>
<br>



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

<center><table border="1">

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


</table></center>
 <br>
 <br>
   
</body>
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