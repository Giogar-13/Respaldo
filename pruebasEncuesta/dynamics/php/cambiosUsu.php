<?php
session_name("usuario");
session_start();

include "./conexion.php";

echo "<form action='../dynamics/php/eliminarUsuario.php' method='POST'>
      <select name='usuario'>";

$Registros = "SELECT * FROM usuario";
$resRegistros = mysqli_query($conexion,$Registros);
while ($res = mysqli_fetch_array($resRegistros,MYSQLI_ASSOC))
{

  if ($res['Tipo'] != 3)
  {
    echo '<option value="'.$res['id_usuario'].'">'.base64_decode(hex2bin($res['Nombre']))."</option>";
  }
}
echo "</select>
  <input type='submit' name='envio'>
  </form>";
?>
