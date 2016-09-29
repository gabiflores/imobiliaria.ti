<?php

//Corrige a codificação de caracteres para ISO ou UTF
ini_set('default_charset','utf-8');

//Conectar a base de dados a partir do arquivo de configurações
require('../../bd/login_bd.php');
$vConexao = mysqli_connect($vServidor, $vUsuario, $vSenha, $vBaseDados);
if (!$vConexao) {die('Problemas na conexão: ' . mysqli_connect_error());}

//Excluir na tabela de dados
$vId = $_GET["vId"];
$vSql='DELETE FROM usuarios '.
      'WHERE id='.$vId;
$vResultado = mysqli_query($vConexao, $vSql);
if (!$vConexao) {die('Problemas na conexão: ' . mysqli_connect_error());}
echo('Registro excluido com sucesso!');

echo "<br>";
echo "<a href='../consultar/consultar_usuario.php'> voltar </a>";

?>