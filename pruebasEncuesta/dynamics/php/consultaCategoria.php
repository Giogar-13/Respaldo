<?php
include "./conexion.php";
$parciales = [];
$categoriasExistentes = [];
$consultaCategorias = "SELECT*FROM Categoria";
$respuestaConsultas = mysqli_query($conexion,$consultaCategorias);
while ($categoria = mysqli_fetch_array($respuestaConsultas,MYSQLI_ASSOC))
{
  array_push($parciales,$categoria['id_categoria'],$categoria['Categoria']);
  array_push($categoriasExistentes,$parciales);
  $parciales = [];
}
$categoriasExistentes = json_encode($categoriasExistentes);
echo $categoriasExistentes;




 ?>
