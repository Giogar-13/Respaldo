<?php
include "./conexion.php";
if(isset($_POST['id_usuario'])){
  //echo "<br>hola ".$_POST['id_usuario'];
  strip_tags($_POST['id_usuario']);

  $usu=$_POST['id_usuario'];
  $usu=base64_encode($usu);//Pasa el texto a base 64
  $usu=bin2hex ($usu);
}
if(isset($_POST['contra'])){
  //session_start();
  strip_tags($_POST['contra']);
  $contraseña=$_POST['contra'];
  $contraseña=$contraseña."EBaTdDtDFDtGZ4uBnqmq3BvANFU2J2";
  $contraseña=hash('sha256', $contraseña);
}
$usu=mysqli_real_escape_string ($conexion, $usu);
$contraseña=mysqli_real_escape_string ($conexion, $contraseña);

$ini = "SELECT Contrasena FROM usuario WHERE id_usuario LIKE \"$usu\"";
$respuesta= mysqli_query($conexion, $ini);
$row = mysqli_fetch_array($respuesta);

$ini2 = "SELECT Contrasena FROM usuario WHERE Correo LIKE \"$usu\"";
$respuesta2= mysqli_query($conexion, $ini2);
$row2 = mysqli_fetch_array($respuesta2);


if (isset($row[0])==$contraseña){
  header('Location: ../../templates/principalEncuestas.html   ');
  session_name("usuario");
  session_start();

 /* $identificador = "SELECT id_usuario FROM usuario WHERE Contrasena LIKE \"$contraseña\"";
  $respuesta2= mysqli_query($conexion, $identificador);
  $row2 = mysqli_fetch_array($respuesta2);
  $deci = hex2bin($row2[0]);
  $deci= base64_decode($deci);*/
  $_SESSION['id']=$usu;
}
elseif (isset($row2[0])==$contraseña){
  header('Location: ../../templates/principalEncuestas.html');
  session_name("usuario");
  session_start();

  $identificador = "SELECT id_usuario FROM usuario WHERE Contrasena LIKE \"$contraseña\"";
  $respuesta2= mysqli_query($conexion, $identificador);
  $row2 = mysqli_fetch_array($respuesta2);
  $deci = hex2bin($row2[0]);
  $deci= base64_decode($deci);
  $_SESSION['id']=$row2[0];
}
else{
  echo "El usuario o la contraseña son incorrectos";
}
?>
