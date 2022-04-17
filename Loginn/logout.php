<?php 

session_start();
session_destroy();

header("Location: ../index.php"); // cuando el index este terminado pasa directamente a pag principal.

?>