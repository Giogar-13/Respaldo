<?php
session_name("usuario");
session_start();
if (isset($_SESSION['id'])!=""){
  echo " <link rel='stylesheet' href='../../statics/css/perfil.css'>";

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
          echo "</div>";

          echo "<div id= 'Info'>";
          echo "<button id='cambio'>Eliminar al usuarios</button>";
          echo "<button id='bloquear'>Bloquear Usuarios</button>";
          echo "<button id='revisar'>Revisar Usuario</button>";
          echo "<button><a href='../php/nuevaCategoria.php'>Añadir categoria</a></button>";

            if (isset($_POST['envio'])) {
                echo "<br>El usuario eliminado es  es:";
                  $usuario=$_POST['usuario'];
                  echo "<br>".base64_decode(hex2bin($usuario));
               $elimaUsu = "DELETE FROM usuario WHERE id_usuario LIKE \"$usuario\"";
               $resEli=mysqli_query($conexion,$elimaUsu);
            }


            if (isset($_POST['bloqueo'])) {
              echo "<br>El usuario bloqueado es:";
                $usuario=$_POST['usuario'];
                echo "<br>".base64_decode(hex2bin($usuario));
                
                $Blocked = "UPDATE usuario SET Estado = 2 WHERE id_usuario LIKE \"$usuario\"";
                mysqli_query($conexion, $Blocked);
          }


          if (isset($_POST['revisar'])) {
            echo "<br>El usuario consultado es es:";
              $usuario=$_POST['usuario'];
              echo "<br>".base64_decode(hex2bin($usuario));
              
              $Consulta = "SELECT * FROM usuario WHERE id_usuario LIKE \"$usuario\"";
              $ConsulUsu = mysqli_query($conexion, $Consulta);
              $datosUsu=mysqli_fetch_array($ConsulUsu,MYSQLI_ASSOC);

              echo "<br><br>".base64_decode(hex2bin($datosUsu['Nombre']))." ".$datosUsu['ApellidoP']." ".$datosUsu['ApellidoM'];     
              echo "<br>Correo eléctronico: ".base64_decode(hex2bin($datosUsu['Correo']));
              echo "<br>Imagen perfil:<br><img src=".$datosUsu['img'].">";
              echo "<p>Fecha de nacimiento: <br>".$datosUsu['Cumple']."</p>";
              echo "<p>Correo eléctronico: <br>".base64_decode(hex2bin($datosUsu['Correo']))."</p>";
        }

        echo "</div>";
    
          echo "<script src='../js/admi.js'></script>";

        break;
    }
    echo "<div class='botones'>";
  echo "
    <a href='../php/nuevafoto.php' id='botones'>Nueva Foto</a>
    <a href='../php/nuevoCorreo.php' id='botones'>Nueva Correo</a>
    <a href='../php/nuevaContra.php' id='botones'>Nueva Contraseña</a>
    <a href='../../templates/principalEncuestas.html' id='botones'>Regresar</a>
    <a href='../php/cerrarS.php' id='botones'>Cerrar Sesion</a>
    </div>";
    echo "</div>";
}
else {
  header('Location: ../../templates/inicioSesion.html');
  }
  
?>
