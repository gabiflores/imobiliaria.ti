
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
<a href='logout.php'>sair</a>
</body>
