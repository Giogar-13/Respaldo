<?php

include "../dynamics/php/conexion.php";
$encuesta = $_GET['encuesta'];
$encuesta = (int)$encuesta;
$consulta = "SELECT * FROM ENCUESTA WHERE id_encuesta=$encuesta";
$respuesta = mysqli_query($conexion,$consulta);
$encuesta = mysqli_fetch_array($respuesta,MYSQLI_ASSOC);
$envio = [];
$final = [];
$parcial = [];
$opciones = [];
$frecuencia = [];
$enunciado = [];
if(isset($encuesta["Pregunta1"]))
{
  $pregunta = $encuesta["Pregunta1"];
  $pregunta = (int)$pregunta;
  $consultaConPreg = "SELECT Pregunta FROM PREGUNTA WHERE id_pregunta = $pregunta";
  $respConPreg = mysqli_query($conexion,$consultaConPreg);
  $contenidoPregArreglo = mysqli_fetch_array($respConPreg,MYSQLI_ASSOC);
  $contenidoPregunta = $contenidoPregArreglo['Pregunta'];
  array_push($enunciado,$contenidoPregunta);
  $consultaContenido = "SELECT*FROM OPCION WHERE id_pregunta = $pregunta";
  $respuestaContenido = mysqli_query($conexion,$consultaContenido);
  while($info = mysqli_fetch_array($respuestaContenido,MYSQLI_ASSOC))
  {
    array_push($opciones,$info['contenido']);
    array_push($frecuencia,$info['cantidad']);
  }
  array_push($parcial,$opciones,$frecuencia);
  array_push($final,$parcial);
  $parcial = [];
  $opciones = [];
  $frecuencia = [];
}
if(isset($encuesta["Pregunta2"]))
{
  $pregunta = $encuesta["Pregunta2"];
  $pregunta = (int)$pregunta;
  $consultaConPreg = "SELECT Pregunta FROM PREGUNTA WHERE id_pregunta = $pregunta";
  $respConPreg = mysqli_query($conexion,$consultaConPreg);
  $contenidoPregArreglo = mysqli_fetch_array($respConPreg,MYSQLI_ASSOC);
  $contenidoPregunta = $contenidoPregArreglo['Pregunta'];
  array_push($enunciado,$contenidoPregunta);
  $consultaContenido = "SELECT*FROM OPCION WHERE id_pregunta = $pregunta";
  $respuestaContenido = mysqli_query($conexion,$consultaContenido);
  while($info = mysqli_fetch_array($respuestaContenido,MYSQLI_ASSOC))
  {
    array_push($opciones,$info['contenido']);
    array_push($frecuencia,$info['cantidad']);
  }
  array_push($parcial,$opciones,$frecuencia);
  array_push($final,$parcial);
  $parcial = [];
  $opciones = [];
  $frecuencia = [];
}
if(isset($encuesta["Pregunta3"]))
{
  $pregunta = $encuesta["Pregunta3"];
  $pregunta = (int)$pregunta;
  $consultaConPreg = "SELECT Pregunta FROM PREGUNTA WHERE id_pregunta = $pregunta";
  $respConPreg = mysqli_query($conexion,$consultaConPreg);
  $contenidoPregArreglo = mysqli_fetch_array($respConPreg,MYSQLI_ASSOC);
  $contenidoPregunta = $contenidoPregArreglo['Pregunta'];
  array_push($enunciado,$contenidoPregunta);
  $consultaContenido = "SELECT*FROM OPCION WHERE id_pregunta = $pregunta";
  $respuestaContenido = mysqli_query($conexion,$consultaContenido);
  while($info = mysqli_fetch_array($respuestaContenido,MYSQLI_ASSOC))
  {
    array_push($opciones,$info['contenido']);
    array_push($frecuencia,$info['cantidad']);
  }
  array_push($parcial,$opciones,$frecuencia);
  array_push($final,$parcial);
  $parcial = [];
  $opciones = [];
  $frecuencia = [];
}
if(isset($encuesta["Pregunta4"]))
{
  $pregunta = $encuesta["Pregunta4"];
  $pregunta = (int)$pregunta;
  $consultaConPreg = "SELECT Pregunta FROM PREGUNTA WHERE id_pregunta = $pregunta";
  $respConPreg = mysqli_query($conexion,$consultaConPreg);
  $contenidoPregArreglo = mysqli_fetch_array($respConPreg,MYSQLI_ASSOC);
  $contenidoPregunta = $contenidoPregArreglo['Pregunta'];
  array_push($enunciado,$contenidoPregunta);
  $consultaContenido = "SELECT*FROM OPCION WHERE id_pregunta = $pregunta";
  $respuestaContenido = mysqli_query($conexion,$consultaContenido);
  while($info = mysqli_fetch_array($respuestaContenido,MYSQLI_ASSOC))
  {
    array_push($opciones,$info['contenido']);
    array_push($frecuencia,$info['cantidad']);
  }
  array_push($parcial,$opciones,$frecuencia);
  array_push($final,$parcial);
  $parcial = [];
  $opciones = [];
  $frecuencia = [];
}
if(isset($encuesta["Pregunta5"]))
{
  $pregunta = $encuesta["Pregunta5"];
  $pregunta = (int)$pregunta;
  $consultaConPreg = "SELECT Pregunta FROM PREGUNTA WHERE id_pregunta = $pregunta";
  $respConPreg = mysqli_query($conexion,$consultaConPreg);
  $contenidoPregArreglo = mysqli_fetch_array($respConPreg,MYSQLI_ASSOC);
  $contenidoPregunta = $contenidoPregArreglo['Pregunta'];
  array_push($enunciado,$contenidoPregunta);
  $consultaContenido = "SELECT*FROM OPCION WHERE id_pregunta = $pregunta";
  $respuestaContenido = mysqli_query($conexion,$consultaContenido);
  while($info = mysqli_fetch_array($respuestaContenido,MYSQLI_ASSOC))
  {
    array_push($opciones,$info['contenido']);
    array_push($frecuencia,$info['cantidad']);
  }
  array_push($parcial,$opciones,$frecuencia);
  array_push($final,$parcial);
  $parcial = [];
  $opciones = [];
  $frecuencia = [];
}

array_push($envio,$final,$enunciado);

$envio = json_encode($envio);
echo $envio;





 ?>
