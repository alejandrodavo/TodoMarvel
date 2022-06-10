<?php
session_start();

if(isset($_SESSION["usuario"])){
$usuario = $_SESSION["usuario"];
}else{
  $usuario = "";
}
$filtro="";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="robots" content="noindex" />
    <title>Personajes</title>
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

<body>
    <header>
        <div id="bloq">
            <a href="home"><img class="logo" src="./assets/images/logo.png"></a>
            <input type="checkbox" id="hamburguesa">
            <label for="hamburguesa" class="fa fa-bars" id="icono"></label>
            <ul class="menu">
                <li><a href="home">Inicio</a></li>
                <li><a class="seleccionado" href="personajes">Personajes</a></li>
                <li><a href="pedidos">Pedidos</a></li>
                <li><a href="blog">Blog</a></li>
                <?php
                if($usuario==="admin") echo '<li><a href="panelAdmin/index.php">Admin</a></li>';
                if($usuario==="") echo '<li><a href="login">Login</a></li>';
                if($usuario!="" && $usuario != "admin") echo"<li><a href='perfil?usuario=$usuario'>$usuario</a></li>"
                ?>
            </ul>
        </div>
    </header>
    

    <main>





    

<h2 class="tit"><a href="personajes">PERSONAJES</a><br>
<form method="POST" action="<?php $_SERVER['PHP_SELF']?>">
      <select name="filtro">
        <option value="Todos"<?php if($filtro=="Todos") echo "selected='selected'" ?>>Todos</option>
        <option value="Pelicula"<?php if($filtro=="Pelicula") echo "selected='selected'" ?>>Peliculas</option>
        <option value="Comic"<?php if($filtro=="Comic") echo "selected='selected'" ?>>Comics</option>
        <option value="Villano"<?php if($filtro=="Villano") echo "selected='selected'" ?>>Villanos</option>
        <option value="Heroes"<?php if($filtro=="Heroes") echo "selected='selected'" ?>>Heroes</option>
    </select>
    <input type="submit" value="Filtrar" name="filtrar">
    
    </form></h2>

<?php

require("panelAdmin/Personaje.php");
$inicio=0;
$cuantos=4;

if(isset($_POST["filtrar"])){
  $filtro=$_POST["filtro"];
  $filas=Personaje::devolver_filas_Filtro($filtro);
}else{
  $filas=Personaje::devolver_todas_filas();
} 
//echo "<div id='imagenes'>";
$rutaImagenes="../assets/images/personajes/";
$cont=0;
$saltos=[0,4,8,12,16];
foreach($filas as $fila){ 
if(in_array($cont,$saltos)){
  if($cont!=0)
  echo"</div>";
  echo"<div id='imagenes'>";
}

echo "<section><div id='servs'>";
echo "<img src='assets/images/personajes/{$fila['imagen']}' alt='{$fila['nombre']}'>";
echo '<div id="text-bloq">';
echo "<a href='personaje?p={$fila['nombre']}' target=_blank><h3>{$fila['nombre']}</h3></a>";
echo "<span>{$fila['afiliacion']} - {$fila['tipo']}</span><br><br>";
echo "<p>{$fila['descripcion']}</p></div></div></section>";
if(in_array($cont,$saltos)){
  if($cont!=0)
  echo"";
}
$cont++;

}
echo "<div>";

?>


</main>


  <footer>
    <p>&copyTodo Marvel 2022</p>
    <a href="#">Politica de privacidad y cookies</a><br>
    <div class="sociales">
      <a class="fa fa-facebook" href="facebook.com"></a>
      <a class="fa fa-twitter" href="twitter.com"></a>
      <a class="fa fa-envelope" href="alexdavomar@gmail.com"></a>
      <a class="fa fa-instagram" href="instagram.com"></a>
    </div>
  </footer>

</body>

</html>