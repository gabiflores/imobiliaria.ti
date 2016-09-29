<!DOCTYPE html>
<html>
<font face=Arial>
  <center><head>
    <meta charset="utf-8">
    <title>Página Adiministrativa</title>
    <h1><a href="index.html">Imobiliária</br>
      <span>Nossa Casa</span></a></h1>
    <a href="#">Página Inicial</a>
	<a href="../cadastrar/cadastra_gerente.php">cadastrar usuarios</a>
	<a href="../cadastrar/cadastrar_imovel.php">cadastrar imóveis</a>
    <a href="../quemsomos/quemsomos.html">Quem somos</a>
    <a href="../consultar/consultar.php">Consulta imóveis</a>
	<a href="../consultar/consultar_usuario.php">Consulta usuarios</a>
    <a href="../login/logout.php">logout</a>

  </head></center>


  <center><body>
  <?php
session_start();
echo $_SESSION['nome'];
echo '<br>';
echo $_SESSION['tipo'];

?>
    <form method="POST" action="consultar.php">
  		<ul>

  			Finalidade
  			<select name="finalidade">
    					<option value="compra"> compra </option>
    					<option value="aluguel" > aluguel </option>
  			</select>


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

  			Preços entre
  			<select name="valor1">
  				<option value="aluguel"> aluguel </option>
    				<option value="2000000"> 20.000,00 </option>
    				<option value="5000000"> 50.000,00 </option>
    				<option value="10000000"> 100.000,00 </option>
  			</select>
  			à
  			<select name="valor2">
    				<option value="5000000"> 50.000,00 </option>
    				<option value="10000000"> 10000000 </option>
    				<option value="outros"> outros </option>
  			</select>


  			<input type ="hidden" name="existe"/>
  	<button> consultar </button>
  	</ul>
  </form></center>

  <center><img src="../imagens/casa.jpg" alt="casa" class="figure" style="
        height: 526px;
        width: 862.594;
        margin-right: 3px;
        margin-top: 13px;
    "></center>
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

