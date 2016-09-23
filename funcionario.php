

<html>
<head>
	<title> pagina do funcionario</title>
</head>
<body>
<?php
SESSION_START();
echo $_SESSION['nome'];
echo '<br>';
echo $_SESSION['tipo'];

?>
<br>
<a href='consultar.php'>consultar imóveis</a>
<br>
<a href='logout.php'>sair</a>
</body>

