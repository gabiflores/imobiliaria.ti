
<html>
<head>
	<title> pagina do gerente</title>
</head>
<body>
<?php
SESSION_START();
echo $_SESSION['nome'];
echo '<br>';
echo $_SESSION['tipo'];

?>
<br>
<a href='logout.php'>sair</a>
</body>
