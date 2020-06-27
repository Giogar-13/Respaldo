<?php
header('Location: ../../templates/inicioSesion.html');
session_name("usuario");
session_start();
session_unset();
session_destroy();
?>
