<?php

session_start();
if(isset($_SESSION["usuario"]))
$usuario = $_SESSION["usuario"];
else $usuario = "";
if($usuario === "admin"){
    



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="robots" content="noindex" />
    <title>TodoMarvel | Admin</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <link rel="alternate" type="application/atom+xml" title="My Weblog feed" href="/feed/" />
    <link rel="search" type="application/opensearchdescription+xml" title="My Weblog search" href="opensearch.xml" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
</head>

<?php
    if(isset($_POST["logout"])){
        session_destroy();
        ?><script>window.location.assign("http://localhost/Marvel/home")</script><?php
    }
?>
<main>
<form method="POST" action="<?php $_SERVER['PHP_SELF']?>">
            <input type="submit" value="Cerrar sesión" name="logout">
</form>
</main>

<?php
}else{
    echo "<h1>No tienes permisos para ver esta página!</h1>";
}
?>
