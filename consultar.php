consultar

<html>
 	<head>
		<title>  </title>
	</head>
	<body>
	<form method="POST" action="consulta_bd.php">
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
			<select name="dormitorio">
  				<option value="d1"> 1 dormitório </option> 
  				<option value="d2"> 2 dormitório </option>
  				<option value="d3"> 3 dormitório </option>
  				<option value="d4"> 4 dormitório </option>
  				<option value="d5"> 5 dormitório </option>
  				<option value="d6"> 6 dormitório </option>
  				<option value="d7"> 7 dormitório </option>
  				<option value="d8"> 8 dormitório </option>
  				<option value="d9"> 9 dormitório </option>
  				<option value="d10"> 10 dormitório </option>
  				<option value="outro"> outros </option>
  				<option value="todos_d"> Todos </option>
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
				<option value="v_aluguel1"> aluguel </option>
  				<option value="v1"> 20.000,00 </option> 
  				<option value="v2"> 50.000,00 </option>
  				<option value="v3"> 100.000,00 </option>
			</select>
			A
			<select name="valor2">
  				<option value="v4"> 50.000,00 </option> 
  				<option value="v5"> 100.000,00 </option>
  				<option value="v6"> outros </option>
			</select>
			</li>

			<input type ="hidden" name="existe"/>
	<button> consultar </button>
	</ul>
	</form>