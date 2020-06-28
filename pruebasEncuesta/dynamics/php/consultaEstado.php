<?php
/*Archivo encargado de mandar a un JS (fetch) el tipo de usuario del usuario que está usando el sistema */
include "./conexion.php";
session_name("usuario");
session_start();
$usuario = $_SESSION['id'];
$consultaEstado = "SELECT Estado FROM USUARIO WHERE id_usuario = '$usuario'";
$respuestaEstado = mysqli_query($conexion,$consultaEstado);
$EstadoArreglo = mysqli_fetch_array($respuestaEstado,MYSQLI_ASSOC);
$estado = $EstadoArreglo["Estado"];
echo $estado;
 ?>