cadastrar_imovel.php
<html>
<head>
	<title> cadastrar imovel </title>
</head>
</body>
	<form enctype="multipart/form-data" method="POST" action="cadastrar_imovel.php">
	<ul>
			<li>
			Finalidade
			<select name="finalidade">
  					<option value="compra"> compra </option> 
  					<option value="aluguel" > aluguel </option>
			</select>
			</li>
			<li>
			Tipo
			<select name="tipo">
					<option value="todos_imoveis"> Todos os imóveis </option> 
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
			<li>
			url video
			<input type="text" name="link">
			</li>
			<li>    
    		<input type="hidden" name="MAX_FILE_SIZE" value="30000" />
   
            Imagens:
            <br>
			<input type="file" name="pictures[]" />
			<br>
			<input type="file" name="pictures[]" />
			<br>
			<input type="file" name="pictures[]" />
			<br>
			<input type="submit" value="Enviar" />

			<button> cadastrar imovel </button>
	</ul>
	</form>

<?php
if(isset($_POST['existe'])){
	foreach ($_FILES["pictures"]["error"] as $key => $error) {
	    if ($error == UPLOAD_ERR_OK) {
	        $tmp_name = $_FILES["pictures"]["tmp_name"][$key];
	        $name = $_FILES["pictures"]["name"][$key];
	        move_uploaded_file($tmp_name, "data/$name");
	    }
	    var_dump($tmp_name);
	}
}
?>

