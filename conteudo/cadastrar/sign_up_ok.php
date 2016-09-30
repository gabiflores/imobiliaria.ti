<!DOCTYPE html>
<html>
<font face=Arial>
  <center><head>
    <meta charset="utf-8">
    <title>registre-se</title>
    <h1><a href="../../index.html">Imobiliária</br>
      <span>Nossa Casa</span></a></h1>
    <a href="../../index.html">Página Inicial</a>
    <a href="../quemsomos/quemsomos.html">Quem somos</a>
    <a href="../consultar/consultar.php">Consulta imóveis</a>
    <!-- <a href="../cadastrar/sign_up_ok.php">sign up</a> -->
    <a href="../login/login.php">login</a> 

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

	 </head></center>
	 <br>
	 <br>


  <center><body>
		<form method= "POST" action="../login/registrado.php" name = "f1">
		<ul>
			<li>
				Nome
				<input type= "text" name= "nome"/>
				
			</li>
			<li>
				Nome de usuario
				<input type= "text" name= "nome_usuario"/>
				
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
				<input type="button" value="verificar senha" onClick="ValidarSenha()">

			</li>
				<button> enviar </button>
		</ul>
		</form>
	 </body></center>
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
