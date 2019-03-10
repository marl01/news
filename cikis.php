<?php 

// oturum
session_start();

// oturum sonlandir
session_destroy();

// yonlendir
header("Location: index.php");

?>