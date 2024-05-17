<?php
// Iniciamos la sesion
session_start();
// Destruir todo en esta sesión
session_destroy();
header("Location: index.php");

