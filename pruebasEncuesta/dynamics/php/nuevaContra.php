<html>
<form action="../php/nuevafoto.php" method="POST">
        <label>Cambiar correo eléctronico</label>
        <input type="text" name="nuevaContra" pattern=".+@.+\..+" require>
        <input type="submit" name="Enviar">
</form>
</html>

<?php

if (isset($_POST['nuevaContra']) && preg_match('/(?=.*[A-Z])(?=.*[\.,!@#$&*])(?=.*[0-9])(?=.*[a-z]).{10,}/',$_POST['nuevaContra'])){
    $NuevaContra=strip_tags(mysqli_real_escape_string($conexion,$_POST['nuevaContra']));
    
    $NuevaContra=$NuevaContra."EBaTdDtDFDtGZ4uBnqmq3BvANFU2J2";
    $NuevaContra=hash('sha256', $NuevaContra);
    
      $NuevaContra = "UPDATE usuario SET Contrasena ='$NuevaContra' WHERE id_usuario LIKE \"$usu\"";
      mysqli_query($conexion, $NuevaContra);
    }
    echo "<a href='../../templates/principalEncuestas.html'>Regresar</a>";

?>