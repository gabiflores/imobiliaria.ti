<?php

$mysqli = new mysqli("localhost", "root", "16099515", "teste");

$resultado = $mysqli->query("SELECT usuario FROM usuarios");

$dados = $resultado->fetch_assoc();


$resultado->fetch_assoc();
while($usuario = $resultado->fetch_assoc()){
    $a[] = $usuario;
}

// Array with names
foreach ($a as $key => $value) {
$a = $a[$key][$value];
}
var_dump($a);

// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($a as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = $name;
            } else {
                $hint .= ", $name";
            }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "no suggestion" : $hint;
?> 