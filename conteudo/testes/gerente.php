
<html>
<head>
	<title> pagina do gerente</title>
</head>
<body>
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
<br>
<a href='../consultar/consultar_usuario.php'>consultar usuario</a>
<br>
<a href='../consultar/consultar.php'>consultar imóveis</a>
<br>
<a href='../login/logout.php'>sair</a>
</body>

