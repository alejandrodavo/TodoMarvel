<?php
session_start();

if(isset($_SESSION["usuario"])){
$usuario = $_SESSION["usuario"];
}else{
  $usuario = "";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="robots" content="noindex" />
    <title>Home</title>
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
                <li><a class="seleccionado" href="#">Inicio</a></li>
                <li><a href="servicios">Servicios</a></li>
                <li><a href="contacto">Contacto</a></li>
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

    <section>
      <h1>Título 1</h1>
      <article>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
        commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
        pariatur.</article>
    </section>
    <br>
    <section>
      <h1>Título 2</h1>
      <article>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
        commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
        pariatur.</article>
    </section>
    <br>
    <section>
      <h1>Título 3</h1>
      <article>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
        commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
        pariatur.</article>
    </section>
    <br>
    <section>
      <h1>Título 4</h1>
      <article>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
        commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
        pariatur.</article>
    </section>
    <br>
    <section>
      <h1>Título 5</h1>
      <article>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
        commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
        pariatur.</article>
    </section>
    <br>

    <h2 class="tit"><a href="servicios.html">SERVICIOS</a></h2>
    <div id="imagenes">

    <section>
        <div id="servs">
            <img src="assets/images/clase1.jpg" alt="Andando">
            <div id="text-bloq">
              <a href=""><h3>ESO</h3></a>
                <span>MAGNICA KICTAM - LOREMIPSUM</span><br><br>
                <P>Cras ultricies ligula sed magna dictum porta auris blandita.</P>
            </div>
        </div>
    </section>

    <section>
        <div id="servs">
            <img src="assets/images/clase2.jpg" alt="Zapatos">
            <div id="text-bloq">
                <a href=""><h3>BACHILLER</h3></a>
                <span>MAGNICA KICTAM - LOREMIPSUM</span><br><br>
                <P>Cras ultricies ligula sed magna dictum porta auris blandita.</P>
            </div>
        </div>
    </section>

    <section>
        <div id="servs">
            <img src="assets/images/clase3.jpg" alt="Tenedores">
            <div id="text-bloq">
              <a href=""><h3>CICLOS</h3></a>
                <span>MAGNICA KICTAM - LOREMIPSUM</span><br><br>
                <P>Cras ultricies ligula sed magna dictum porta auris blandita.</P>
            </div>
        </div>
    </section>

    <section>
      <div id="servs">
          <img src="assets/images/clase4.jpg" alt="Tenedores">
          <div id="text-bloq">
            <a href=""><h3>UNIVERSIDAD</h3></a>
              <span>MAGNICA KICTAM - LOREMIPSUM</span><br><br>
              <P>Cras ultricies ligula sed magna dictum porta auris blandita.</P>
          </div>
      </div>
  </section>
    </div>
  <h2 class="tit"><a href="contacto.html">CONTACTO</a></h2>


  <form action="">

    <label for="nombre">Nombre</label><br>
    <input type="text" name="nombre" class="field" required=”true” placeholder="Tu nombre"><br>

    <label for="email">Email</label><br>
    <input type="email" name="email" class="field" required=”true” placeholder="Email"><br>

    <label for="edad">Edad</label><br>
    <input type="text" name="edad" class="field" required=”true” placeholder="Tu edad"><br>

    <label for="telefono">Teléfono</label><br>
    <input pattern="{1,9}" type="tel" name="telefono" class="field" required=”true” placeholder="Tu número de telefono"><br>

    <label for="mensaje">Mensaje</label><br>
    <textarea name="mensaje"class="field" required=”true” placeholder="Mensaje"></textarea><br>

    <label>Acepta Política de Privacidad </label>
    <input type="checkbox" id="privacidad" value="Politica_Privacidad" required=”true”>
    <br>

    <label>Acepta Política de Cookies </label>
    <input type="checkbox" id="cookies" value="Politica_Cookies" required=”true”>
    <br>
    



    <p class="centrar">
    <input type="submit" class="boton" value="Enviar"/>
    </p>
    


  </form>

  </main>


  <footer>
    <p>&copyTodo Marvel 2022</p>
    <a href="#">Politica de privacidad y cookies</a><br>
    <div class="sociales">
      <a class="fa fa-facebook" href="#"></a>
      <a class="fa fa-twitter" href="#"></a>
      <a class="fa fa-rss" href="#"></a>
      <a class="fa fa-envelope" href="#"></a>
      <a class="fa fa-instagram" href="#"></a>
    </div>
  </footer>

</body>

</html>