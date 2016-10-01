<!DOCTYPE html>
<html>
<font face=Arial>
  <center><head>
    <meta charset="utf-8">
    <title>cadastro de imoveis</title>
    <h1><a href="../testes/adm.php">Imobiliária</br>
      <span>Nossa Casa</span></a></h1>
    <a href="../testes/adm.php">Página Inicial</a>
	<a href="../cadastrar/cadastra_gerente.php">cadastrar usuarios</a>
	<!-- <a href="../cadastrar/cadastrar_imovel.php">cadastrar imóveis</a> -->
    <a href="../quemsomos/quemsomos1.html">Quem somos</a>
    <a href="../consultar/consultar.php">Consulta imóveis</a>
	<a href="../consultar/consultar_usuario.php">Consulta usuarios</a>
    <a href="../login/logout.php">logout</a>

  </head></center>


  <body>
  <br>
  <br>

	<center><form enctype="multipart/form-data" method="POST" action="cadastrar_imovel.php">
	<ul>	
			<li>
			status
			<select name="status">
  					<option value="ocupado"> ocupado </option> 
  					<option value="disponivel" > disponivel </option>
			</select>
			</li>
			<li>
			Endereço
			<input type="text" name="endereco">
			</li>
			<li>
			Finalidade
			<select name="finalidade">
  					<option value="compra"> compra </option> 
  					<option value="aluguel" > aluguel </option>
			</select>
			
			Tipo
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
			</select>
			</li>
			<li>
			Dormitórios
			<select name="dormitorios">
  				<option value="1"> 1 dormitório </option> 
  				<option value="2"> 2 dormitórios </option>
  				<option value="3"> 3 dormitórios </option>
  				<option value="4"> 4 dormitórios </option>
  				<option value="5"> 5 dormitórios </option>
  				<option value="6"> 6 dormitórios </option>
  				<option value="7"> 7 dormitórios </option>
  				<option value="8"> 8 dormitórios </option>
  				<option value="9"> 9 dormitórios </option>
  				<option value="10"> 10 dormitórios </option>
			</select>
			
			banheiros
			<select name="banheiros">
  				<option value="1"> 1 banheiro </option> 
  				<option value="2"> 2 banheiros </option>
  				<option value="3"> 3 banheiros </option>
  				<option value="4"> 4 banheiros </option>
  				<option value="5"> 5 banheiros </option>
  				<option value="6"> 6 banheiros </option>
  				<option value="7"> 7 banheiros </option>
  				<option value="8"> 8 banheiros </option>
  				<option value="9"> 9 banheiros </option>
  				<option value="10"> 10 banheiros </option>
			</select>
			</li>
			<li>
			tamanho do terreno
			<br>
			comprimento
			<input type="int" name="comprimento">
			largura
			<input type="int" name="largura">
			</li>

			<li>
			valor
			<input type="int" name="valor">
			</li>
			<li>
			url video
			<input type="text" name="link">
			</li>
			<li>  
            Imagens:
            <input name="imagem" type="file" id="imagem">
           	</li>
           	<input name="existe" type="hidden">
           	<br>
           	
			<button> cadastrar imovel </button>
	</ul>
	</form></center>

<?php
if(isset($_POST['existe'])){
	require_once('../../bd/login_bd.php');
	$vConexao = mysqli_connect($vServidor, $vUsuario, $vSenha, $vBaseDados);

	if (!$vConexao) {die('Problemas na conexão: ' . mysqli_connect_error());}

	$status = $_POST['status'];
	$endereco = $_POST['endereco'];
	$finalidade = $_POST['finalidade'];
	$tipo = $_POST['tipo'];
	$dormitorios = $_POST['dormitorios'];
	$banheiros = $_POST['banheiros'];
	$comprimento = $_POST['comprimento'];
	$largura = $_POST['largura'];
	$valor = $_POST['valor'];
	$url_video = $_POST['link'];
	$imagem = $_FILES['imagem'];

	$vSql='SELECT MAX(id) FROM imoveis';
	$midias=mysqli_query($vConexao, $vSql);
    $midias2=mysqli_fetch_array($midias);
    $midias2 = ($midias2[0]+1);
    var_dump($midias2);
    	// Se a imagem estiver sido selecionada
		if (!empty($imagem["name"])) {
	 
			// Largura máxima em pixels
			$largura = 3000;
			// Altura máxima em pixels
			$altura = 3000;
			// Tamanho máximo do arquivo em bytes
			$tamanho = 100000;
	 		
	 		$error=[];

	    	// Verifica se o arquivo é uma imagem
	    	if(!preg_match("/(pjpeg|jpeg|png|gif|bmp)/", $imagem["type"])){
	     	   $error[1] = "Isso não é uma imagem.";
	   	 	} 
	 
			// Pega as dimensões da imagem
			$dimensoes = getimagesize($imagem["tmp_name"]);
	 
			// Verifica se a largura da imagem é maior que a largura permitida
			if($dimensoes[0] > $largura) {
				$error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
			}
	 
			// Verifica se a altura da imagem é maior que a altura permitida
			if($dimensoes[1] > $altura) {
				$error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
			}
	 
			// Verifica se o tamanho da imagem é maior que o tamanho permitido
			if($imagem["size"] > $tamanho) {
	   		 	$error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
			}
	 
			// Se não houver nenhum erro
			if (count($error) == 0) {
	 
				// Pega extensão da imagem
				preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $imagem["name"], $ext);
	 
	        	// Gera um nome único para a imagem
	        	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
	 
	        	// Caminho de onde ficará a imagem
	        	$caminho_imagem = "../imagens/" . $nome_imagem;
	 
				// Faz o upload da imagem para seu respectivo caminho
				move_uploaded_file($imagem["tmp_name"], $caminho_imagem);
	 
				$vSql='INSERT INTO imoveis (status,endereco,valores_imoveis,dormitorios,finalidade,terreno_largura,terreno_comprimento,banheiros,tipo) VALUES ("' . $status . '", "' . $endereco . '", "' . $valor . '", "' . $dormitorios . '", "' . $finalidade . '", "' . $largura . '", "' . $comprimento . '", "' . $banheiros . '", "' . $tipo . '")';
				$vResultado = mysqli_query($vConexao, $vSql);
				if (!$vResultado) {echo('Problemas na conexão: ' . mysqli_error($vConexao));
			}else{echo 'sucesso';
			}
	
				$vSql='INSERT INTO fotos (nome, midias) VALUES ("' . $caminho_imagem . '", "' . $midias2 . '" );';
				$vResultado = mysqli_query($vConexao, $vSql);
				if (!$vResultado) {echo('Problemas na conexão: ' . mysqli_error($vConexao));
			}else{echo 'sucesso';
			}

				$vSql='INSERT INTO videos (link, midias) VALUES ("' . $url_video . '", "' . $midias2 . '" );';
				$vResultado = mysqli_query($vConexao, $vSql);
				if (!$vResultado) {echo('Problemas na conexão: ' . mysqli_error($vConexao));
			}else{echo 'sucesso';
			}

				//onde string message = mensagem retorno de erro de gravaçao de dados

				// Se os dados forem inseridos com sucesso
				if ($vSql){
					echo "imovel cadastrado com sucesso.";
				}
			}
	 
			// Se houver mensagens de erro, exibe-as
			if (count($error) != 0) {
				foreach ($error as $erro) {
					echo $erro . "<br />";
				}
			}
		}
}
?>

</body>
<br>
<br>
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

