sign_up.php

<html>

<head> 
	<title> Registre-se </title>
<script>

function ValidarSenha(){
	senha1 = document.f1.senha1.value
	senha2 = document.f1.senha2.value

	if(senha1 == senha2)
		alert("OK")
	else
		alert("SENHAS DIFERENTES")
}

</script>
</head>
<body>
	<form method= "POST" action="registrado.php" name = "f1">
	<ul>
		<li>
			Nome
			<input type= "text" name= "nome"/>
		</li>
		<li>
			Email
			<input type="text" name= "email"/>
		</li>
		<li>
			Senha
			<input type="password" name="senha1" size="20">
		</li>
		<li>
			Confirmar Senha
			<input type="password" name="senha2" size="20" >
		</li>
			<input type="button" value="validar senha" onClick="ValidarSenha()">


</body>