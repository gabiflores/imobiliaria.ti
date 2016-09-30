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
    <a href="../quemsomos/quemsomos1.html">Quem somos</a>
    <a href="../consultar/consultar.php">Consulta imóveis</a>
	<a href="../consultar/consultar_usuario.php">Consulta usuarios</a>
    <a href="../login/logout.php">logout</a>

  </head></center>


  <center><body>
  <?php
session_start();
echo $_SESSION['nome'];
echo "  ";
if($_SESSION['tipo']==1){
  echo "adm";
}if($_SESSION['tipo']==2){
  echo "gerente";
}if($_SESSION['tipo']==3){
  echo "funcionario";
}if($_SESSION['tipo']==4){
  echo "corretor";
}if($_SESSION['tipo']==5){
  echo "cliente";
}
?>
    <form method="POST" action="../consultar/consultar.php">
  		<ul>

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

