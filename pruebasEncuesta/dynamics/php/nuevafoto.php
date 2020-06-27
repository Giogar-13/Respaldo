<html>
<form action="../php/nuevafoto.php" method="POST" enctype="multipart/form-data">
        <label>Foto de perfil</label>
        <input type="file" name="fotoPerfil" require>
        <br><br>
        <label>Cambiar correo eléctronico</label>
        <input type="text" name="correoElectronico" pattern=".+@.+\..+" require>
        <br><br>
        <label>Cambiar Contraseña</label>
        <input type="password" name="nuevaContra" pattern="(?=.*[A-Z])(?=.*[\.,!@#$&*])(?=.*[0-9])(?=.*[a-z]).{10,}" title="La contraseña debe tener 10 caracteres de longitud, mayúsculas, minúsculas, números y caracteres especiales." require>
        <br><br>
        <input type="submit" name="Enviar">
</form>
</html>

<?php
include("./conexion.php");
session_name("usuario");
session_start();

$usu=$_SESSION['id'];
//$usu=base64_encode($usu);
//$usu=bin2hex($usu);

if (isset($_FILES['fotoPerfil']))
{
  $file_name= $_FILES['fotoPerfil']['name'];
  //Obtiene el nombre del archivo enviado
  $file_type= $_FILES['fotoPerfil']['type'];
  //Obtiene el tipo de archivo enviado enviado

  $file_info=$_FILES['fotoPerfil']['tmp_name'];
  //Obtiene la ubicación temporal del archivo

  $file_store="../statics/img/perfiles/".$file_name;
  //Da una ruta de almacenamiento

      if ($file_type="jpg"||"jpeg"||"png")
      {
        //El formato es correcto

        if (file_exists($file_store))
        {
          echo "El archivo ya fue enviado";
          $Nimg = "UPDATE usuario SET img ='\"$file_store\"' WHERE id_usuario LIKE \"$usu\"";
          mysqli_query($conexion, $Nimg);
        }
        else
        {
          if(move_uploaded_file($file_info,$file_store))
          {
            $Nimg = "UPDATE usuario SET img ='\"$file_store\"' WHERE id_usuario LIKE \"$usu\"";
            mysqli_query($conexion, $Nimg);

          }
      }
    }
      else {
        echo "El formato no es correcto";
      }
}

if (isset($_POST['correoElectronico'])&& preg_match('/.+@.+\..+/',$_POST['correoElectronico'])){
  $NuevoCorreo=strip_tags(mysqli_real_escape_string($conexion,$_POST['correoElectronico']));


  $NuevoCorreo=base64_encode($NuevoCorreo);//Pasa el texto a base 64
  $NuevoCorreo=bin2hex($NuevoCorreo);
  $NuevoCorreo = "UPDATE usuario SET Correo ='$NuevoCorreo' WHERE id_usuario LIKE \"$usu\"";
  mysqli_query($conexion, $NuevoCorreo);
}

if (isset($_POST['nuevaContra']) && preg_match('/(?=.*[A-Z])(?=.*[\.,!@#$&*])(?=.*[0-9])(?=.*[a-z]).{10,}/',$_POST['nuevaContra'])){
$NuevaContra=strip_tags(mysqli_real_escape_string($conexion,$_POST['nuevaContra']));

$NuevaContra=$NuevaContra."EBaTdDtDFDtGZ4uBnqmq3BvANFU2J2";
$NuevaContra=hash('sha256', $NuevaContra);

  $NuevaContra = "UPDATE usuario SET Contrasena ='$NuevaContra' WHERE id_usuario LIKE \"$usu\"";
  mysqli_query($conexion, $NuevaContra);
}
echo "<a href='../../templates/principalEncuestas.html'>Regresar</a>";

 ?>
