<html>
<form action="../php/nuevafoto.php" method="POST">
        <label>Cambiar correo eléctronico</label>
        <input type="text" name="correoElectronico" pattern=".+@.+\..+" require>
        <input type="submit" name="Enviar">
</form>
</html>
<?php
if (isset($_POST['correoElectronico'])&& preg_match('/.+@.+\..+/',$_POST['correoElectronico'])){
    $NuevoCorreo=strip_tags(mysqli_real_escape_string($conexion,$_POST['correoElectronico']));
  
    $NuevoCorreo=base64_encode($NuevoCorreo);//Pasa el texto a base 64
    $NuevoCorreo=bin2hex($NuevoCorreo);
    $NuevoCorreo = "UPDATE usuario SET Correo ='$NuevoCorreo' WHERE id_usuario LIKE \"$usu\"";
    mysqli_query($conexion, $NuevoCorreo);
  }
  echo "<a href='../../templates/principalEncuestas.html'>Regresar</a>";
?>