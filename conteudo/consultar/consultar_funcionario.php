

<font face=Arial><html>

  <center><head>
    <meta charset="utf-8">
    <title>Imobliária Nossa Casa</title>
    <h1><a href="../testes/funcionario.php">Imobiliária</br>
      <span>Nossa Casa</span></a></h1>
    <a href="../testes/funcionario.php">Página Inicial</a>
    <a href="../quemsomos/quemsomos3.html">Quem somos</a>
    <!-- <a href="consultar.php">Consulta imóveis</a> -->
    <a href="../login/logout.php">logout</a>

  <body>
	<form method="POST" action="consultar_funcionario.php">
		<ul>

			Finalidade
			<select name="finalidade">
  					<option value="compra"> compra </option>
  					<option value="aluguel" > aluguel </option>
			</select>
			
			Status
			<select name="status">
  					<option value="disponivel"> disponivel </option>
  					<option value="ocupado" > ocupada </option>
			</select>
			
			Tipo
			<select name="tipo">
					<!-- <option value="todos_imoveis"> Todos os imóveis </option> -->
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
  					
			</select>

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
  				
			</select>

			Preços entre
			<select name="valor1">
				<option value="500"> 500,00 </option>
  				<option value="2000000"> 20.000,00 </option>
  				<option value="5000000"> 50.000,00 </option>
  				<option value="10000000"> 100.000,00 </option>
			</select>
			à
			<select name="valor2">
  				<option value="5000000"> 50.000,00 </option>
  				<option value="10000000"> 10000000 </option>
  				<option value="100000000000000000"> 100000000000000000 </option>
			</select>


			<input type ="hidden" name="existe"/>
	<button> consultar </button>
	</ul>
	</form>
<div style="height:20px;">
</div>

</body>

<?php
if(isset($_POST['existe'])){
	$finalidade = $_POST['finalidade'];
	$status = $_POST['status'];
	$tipo = $_POST['tipo'];
	$dormitorio = $_POST['dormitorios'];
	$valor1 = $_POST['valor1'];
	$valor2 = $_POST['valor2'];

	require('../../bd/login_bd.php');
	$vConexao = mysqli_connect($vServidor, $vUsuario, $vSenha, $vBaseDados);
	if (!$vConexao) {die('Problemas na conexão: ' . mysqli_connect_error());}

	if ($_POST['tipo'] == "todos_imoveis"){

		$vSql='SELECT * FROM imoveis';

	}else{

		$vSql='SELECT * FROM imoveis WHERE status = "'.$status.'" AND valores_imoveis BETWEEN "' . $valor1 . '" AND "' . $valor2 . '" AND dormitorios = "' . $dormitorio . '" AND finalidade = "' . $finalidade . '"';
	}
	$vResultado=mysqli_query($vConexao, $vSql);
	if (!$vResultado) {die('Problemas na conexão: ' . mysqli_error($vConexao));}

	$vRegistros=mysqli_num_rows($vResultado);
	if ($vRegistros==0) {die('Nenhum registro encontrado!');}


	echo "<table border='1'>";
	echo('Registros: '.$vRegistros.'</br></br>');
	echo "<tr>";
	echo "<th> excluir </th>";
	echo "<th> ID </th>";
	echo "<th> Finalidade </th>";
	echo "<th> Status </th>";
	echo "<th> Tipo </th>";
	echo "<th> Dormitorios </th>";
	echo "<th> Valor </th>";
	echo "<th> Editar </th>";
	echo "</tr>";

	while($vCampo=mysqli_fetch_array($vResultado)){
		 $vJavascript="javascript: if (confirm('Confirma a exclusão do registro?'))parent.location.href='../excluir/excluir_imoveis.php?vId=".$vCampo['id']."'";
	    echo('<tr>');
	    echo('<td>'.
	        '<a href="#" onClick="'.$vJavascript.'">Excluir</a>'.'<td>'.
	        utf8_encode($vCampo['id']).'<td>'.
	        utf8_encode($vCampo['finalidade']).'<td>'.
			utf8_encode($vCampo['status']).'<td>'.
	        utf8_encode($vCampo['tipo']).'<td>'.
	        utf8_encode($vCampo['dormitorios']).'<td>'.
	        utf8_encode($vCampo['valores_imoveis']).'<td>'.
	        '<a href=../editar/editar_imoveis.php?vId='.$vCampo['id'].'>Editar</a>'.'</td>');
	    echo('</tr>');
	};

	mysqli_close($vConexao);
}
?>

   </table>
  </body>
  <div style="height:100px;">
</div>
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

  </html></font>
