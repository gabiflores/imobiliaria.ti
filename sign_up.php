<?php
	require('login_bd.php');
		$vConexao = mysqli_connect($vServidor, $vUsuario, $vSenha, $vBaseDados);
	if (!$vConexao) {die('Problemas na conexão: ' . mysqli_connect_error());}

		$vSql='SELECT usuario FROM usuarios ';

		$vResultado=mysqli_query($vConexao, $vSql);
	if (!$vResultado) {die('Problemas na conexão: ' . mysqli_error($vConexao));}
	$dados = array();
	$dados = mysqli_fetch_assoc($vResultado);
	var_dump($dados);	
?>
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
	function ValidarNome(){
		nome = document.f1.nome.value

		<?php while($dados = mysqli_fetch_array($vResultado)) { ?>
			nome_array <?php echo $dados ?>

			if(nome_array 	aja==x nome)
				alert("Esse usuario ja existe")
			else
				alert("ok")
		<? } ?>
	}
	
}
	</script>

	</head>
	<body>
		<form method= "POST" action="registrado.php" name = "f1">
		<ul>
			<li>
				Nome
				<input type= "text" name= "nome" onkeyup="showHint(this.value)"/>
				<p>Suggestions: <span id="txtHint"></span></p>
			</li>
				<input type="button" value="Verificar nome"onkeyup="showHint(this.value)">
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
				<input type="button" value="verificar senha" onClick="ValidarSenha()">
		</ul>
		</form>
		<script>
function showHint(str) {
    if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET", "array_usuarios.php?q="+str, true);
        xmlhttp.send();
    }
}
</script>
</head>
<body>

<p><b>Start typing a name in the input field below:</b></p>
<form>
First name: <input type="text" onkeyup="showHint(this.value)">
</form>
<p>Suggestions: <span id="txtHint"></span></p>
	</body>
</html>