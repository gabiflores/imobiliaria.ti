
<html>
<head>
	<title> pagina do adm</title>
</head>
<body>
<?php
session_start();
echo $_SESSION['nome'];
echo '<br>';
echo $_SESSION['tipo'];

?>
<br>
<a href='../consultar/consultar_usuario.php'>consultar usuario</a>
<br>
<a href='../consultar/consultar.php'>consultar imóveis</a>
<br>
<a href='../login/logout.php'>sair</a>
</body>
