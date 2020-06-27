<?php
session_name("usuario");
session_start();
if (isset($_SESSION['id'])!=""){
  echo " <link rel='stylesheet' href='../statics/css/perfil.css'>";

  $usu=$_SESSION['id'];
  //$usu=base64_encode($usu);
  //$usu=bin2hex($usu);

  include "./conexion.php";

    $Usuario="SELECT * FROM usuario WHERE id_usuario LIKE \"$usu\"";
    $resUsu=mysqli_query($conexion,$Usuario);
    $datos=mysqli_fetch_array($resUsu,MYSQLI_ASSOC);

    $tipo = $datos['Tipo'];
    echo "<div id='contenedor'>";
      echo "<div class='infoPerfil'>";

      switch ($tipo) {
        case 1;
          echo "<p>Bienvenido Profesor/Profesora</p>";
          echo "<br>".base64_decode(hex2bin($datos['Nombre']))." ".$datos['ApellidoP']." ".$datos['ApellidoM'];      echo "<br>Correo eléctronico: ".base64_decode(hex2bin($datos['Correo']));
          echo "<br>Imagen perfil:<br><img src=".$datos['img'].">";
          echo "<p>Fecha de nacimiento: <br>".$datos['Cumple']."</p>";
          echo "<p>Correo eléctronico: <br>".base64_decode(hex2bin($datos['Correo']))."</p>";
        break;
        case 2:
          echo "<p>Bienvenido Alumn@</p>";
          echo "<h1>".base64_decode(hex2bin($datos['Nombre']))." ".$datos['ApellidoP']." ".$datos['ApellidoM']."</h1>";
          echo "<p>Imagen perfil:<br><img src=".$datos['img']."></p>";
          echo "<p>Fecha de nacimiento: <br>".$datos['Cumple']."</p>";
          echo "<p>Correo eléctronico: <br>".base64_decode(hex2bin($datos['Correo']))."</p>";
        break;
        case 3:
          echo"<p>Administrador</p>";
          echo "<br>".base64_decode(hex2bin($datos['Nombre']))." ".$datos['ApellidoP']." ".$datos['ApellidoM'];      echo "<br>Correo eléctronico: ".base64_decode(hex2bin($datos['Correo']));
          echo "<br>Imagen perfil:<br><img src=".$datos['img'].">";
          echo "<p>Fecha de nacimiento: <br>".$datos['Cumple']."</p>";
          echo "<p>Correo eléctronico: <br>".base64_decode(hex2bin($datos['Correo']))."</p>";


          echo "<div id='Info'>";
          echo "<button id='cambio'>Eliminar al usuarios</button>";

            if (isset($_POST['envio'])) {
                echo "El usuario seleccionado es:";
                  $usuario=$_POST['usuario'];
                echo $usuario;
               $elimaUsu = "DELETE FROM usuario WHERE id_usuario LIKE \"$usuario\"";
               $resEli=mysqli_query($conexion,$elimaUsu);
               var_dump($resEli);
            }
          echo "</div>";

        break;
    }
    echo "</div>";
    echo "<div class='botones'>
    <a href='../dynamics/php/nuevafoto.php' id='botones'>Configuración de perfil</a>
    </div>";
    echo "</div>";

}
else {
  header('Location: ../../templates/inicioSesion.html');
  }
  
?>
