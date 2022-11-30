<?php include 'includes/header.php';

$nombreCliente = "Juan Pablo";

// Conocer extension de un string
echo strlen($nombreCliente); echo " / ";
var_dump($nombreCliente);
echo "<br>";

// Eliminar espacios en blanco
$texto = trim($nombreCliente);
echo strlen($texto);
echo "<br>";

//Convertirlo a mayusculas
echo strtoupper($nombreCliente);
echo "<br>";

// Convertirlo en minusculas
echo strtolower($nombreCliente);

$mail1 = "correo@correo.com";
$mail2 = "Correo@correo.com";
echo "<br>";

var_dump(strtolower($mail1) === strtolower($mail2));

// Reemplazar una cadena
echo str_replace('Juan', 'J', $nombreCliente);
echo "<br>";

// Revisar si un string existe o no
echo strpos($nombreCliente, 'Pabla');//no imprime nada
echo strpos($nombreCliente, 'pablo');//no imprime nada
echo strpos($nombreCliente, 'Pablo');//imprime la cantidad de caracteres

$tipoCliente = "Premium";

echo "<br>";

echo "El Cliente " . $nombreCliente . " es " . $tipoCliente;
echo "<br>";
echo "El Cliente {$nombreCliente} es ${tipoCliente} ";
echo "<br>";
include 'includes/footer.php';