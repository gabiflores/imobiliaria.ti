consulta_bd.php
<?php

$finalidade=$_POST['finalidade'];
$tipo=$_POST['tipo'];
$dormitorio=$_POST['dormitorio'];
$valor1=$_POST['valor1'];
$valor2=$_POST['valor2'];

require('login_bd.php');
$vConexao = mysqli_connect($vServidor, $vUsuario, $vSenha, $vBaseDados);

if (!$vConexao) {die('Problemas na conexão: ' . mysqli_connect_error());}

$vSql="SELECT id, usuario, senha, tipo FROM usuarios WHERE  usuario = '". $usuario ."' AND senha = '". $senha ."'";

 
$vResultado=mysqli_query($vConexao, $vSql);
$vRegistros=mysqli_num_rows($vResultado);
$vDadosimoveis=mysqli_fetch_assoc($vResultado);

var_dump($vDadosimoveis);

