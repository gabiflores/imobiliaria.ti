consultar

<html>
 	<head>
		<title>  </title>
	</head>
	<body>
	<form method="POST" action="consultar.php">
		<ul>
			<li>
			Finalidade
			<select name="finalidade">
  					<option value="compra"> compra </option> 
  					<option value="aluguel" > aluguel </option>
			</select>
			</li>
			Tipo
			<li>
			<select name="tipo">
  					<option value="casa"> casa </option> 
  					<option value="apartamento" > apartamento </option>
  					<option value="boxgaragem"> box/garagem </option>
  					<option value="cobertura"> cobertura </option>
  					<option value="kitnet"> kitnet </option>
  					<option value="loja"> loja </option>
  					<option value="pousada"> pousada </option>
  					<option value="sala"> sala </option>
  					<option value="predio"> prédio </option>
  					<option value="duplexgerminada"> duplex-germinada </option>
  					<option value="todos_tipo"> todos </option>
			</select>
			</li>
			<li>
			Dormitórios
			<select name="dormitorios">
  				<option value="1"> 1 dormitório </option> 
  				<option value="2"> 2 dormitório </option>
  				<option value="3"> 3 dormitório </option>
  				<option value="4"> 4 dormitório </option>
  				<option value="5"> 5 dormitório </option>
  				<option value="6"> 6 dormitório </option>
  				<option value="7"> 7 dormitório </option>
  				<option value="8"> 8 dormitório </option>
  				<option value="9"> 9 dormitório </option>
  				<option value="10"> 10 dormitório </option>
  				<option value="outro"> outros </option>
  				<option value="todos"> Todos </option>
			</select>
			</li>
			<!--<li>
			Municipio
			<select name="municipio">
  				<option value="imbe"> Imbé </option> 
  				<option value="tramandai"> Tramandaí </option>
  				<option value="osorio"> Osório </option>
			</select>
			</li>
			<li>
			Bairro
			<select name="bairro">
  				<option value="v1"></option> 
  				<option value="v2"></option>
  				<option value="v3"></option>
			</select>
			</li>-->
			<li>
			Preços entre
			<select name="valor1">
				<option value="aluguel"> aluguel </option>
  				<option value="2000000"> 20.000,00 </option> 
  				<option value="5000000"> 50.000,00 </option>
  				<option value="10000000"> 100.000,00 </option>
			</select>
			A
			<select name="valor2">
  				<option value="5000000"> 50.000,00 </option> 
  				<option value="10000000"> 10000000 </option>
  				<option value="outros"> outros </option>
			</select>
			</li>

			<input type ="hidden" name="existe"/>
	<button> consultar </button>
	</ul>
	</form>
</body>

<?php
if(isset($_POST['existe'])){
	$finalidade = $_POST['finalidade'];
	$tipo = $_POST['tipo'];
	$dormitorio = $_POST['dormitorios'];
	$valor1 = $_POST['valor1'];
	$valor2 = $_POST['valor2'];

	require('login_bd.php');
	$vConexao = mysqli_connect($vServidor, $vUsuario, $vSenha, $vBaseDados);
	if (!$vConexao) {die('Problemas na conexão: ' . mysqli_connect_error());}

		$vSql='SELECT * FROM Imoveis WHERE finalidade = "'.$finalidade.'" AND tipo = "' . $tipo . '" AND dormitorios = "' . $dormitorio . '" AND valor BETWEEN "' . $valor1 . '" AND "' . $valor2 . '" ';

	$vResultado=mysqli_query($vConexao, $vSql);
	if (!$vResultado) {die('Problemas na conexão: ' . mysqli_error($vConexao));}

	$vRegistros=mysqli_num_rows($vResultado);
	if ($vRegistros==0) {die('Nenhum registro encontrado!');}

	//$imoveis=mysqli_fetch_array($vResultado);

	//var_dump($imoveis);



	echo "<table border='1'>";
	echo('Registros: '.$vRegistros.'</br></br>');
	echo "<tr>";
	echo "<th> excluir </th>";
	echo "<th> ID </th>";
	echo "<th> Finalidade </th>";
	echo "<th> Tipo </th>";
	echo "<th> Dormitorios </th>";
	echo "<th> Valor </th>";
	echo "<th> Editar </th>";
	echo "</tr>";

	while($vCampo=mysqli_fetch_array($vResultado)){
	    echo('<tr>');
	    echo('<td>'.
	        '<a href=excluir_imoveis.php?vId='.$vCampo['id'].'>Excluir</a>'.'<td>'.
	        utf8_encode($vCampo['id']).'<td>'.
	        utf8_encode($vCampo['finalidade']).'<td>'.
	        utf8_encode($vCampo['tipo']).'<td>'.
	        utf8_encode($vCampo['dormitorios']).'<td>'.
	        utf8_encode($vCampo['valor']).'<td>'.
	        '<a href=editar_imoveis.php?vId='.$vCampo['id'].'>Editar</a>'.'</td>');
	    echo('</tr>');
	};

	mysqli_close($vConexao);
}
?>

   </table>
  </body>
</html>
