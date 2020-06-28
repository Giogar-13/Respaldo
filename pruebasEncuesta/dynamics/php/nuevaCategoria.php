
<?php
session_name("usuario");
session_start();
include "./conexion.php";

    echo "
    <form action='../php/nuevaCategoria.php' method='POST'>
        <label>Nueva Categoría</label>
        <input type='text' name='categoria' require>
        <input type='submit' name='enviar'>
</form>  ";
if (isset($_POST['categoria'])){
    $categoria=strip_tags(mysqli_real_escape_string($conexion,$_POST['categoria']));
    $categoriaNueva = "INSERT INTO categoria (Categoria) VALUES(\"$categoria\")";
    mysqli_query($conexion, $categoriaNueva);
  }
  echo "<a href='../../templates/principalEncuestas.html'>Regresar</a>";
?>