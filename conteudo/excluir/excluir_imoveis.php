
<?php

ini_set('default_charset','utf-8');

require('../../bd/login_bd.php');
$vConexao = mysqli_connect($vServidor, $vUsuario, $vSenha, $vBaseDados);
if (!$vConexao) {die('Problemas na conexão: ' . mysqli_connect_error());}

//Excluir na tabela de dados
$vId = $_GET["vId"];
$vSql='DELETE FROM Imoveis '.
      'WHERE id='.$vId;
$vResultado = mysqli_query($vConexao, $vSql);
if (!$vConexao) {die('Problemas na conexão: ' . mysqli_connect_error());}
echo('Imóvel excluido com sucesso!');

echo "<br>";
echo "<a href='../consultar/consultar.php'> voltar </a>";

?>