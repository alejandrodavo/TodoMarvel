<?PHP
// Incluir bibliotecas de funciones
   require("usuarios.php");
   
   $totalUsuarios=Usuario::filas_totales();
   $totalUsuarios=Usuario::filas_totales();


?>
<h2 style="text-align:center;margin-top:80px;">Estadisticas de la página</h2>

<div class="container">
  <div class="cards">
    <div class="card-item">
      <div class="card-image">
      </div>
      <div class="card-info">
        <h2 class="card-title"><?php echo $totalUsuarios;?></h2>
        <p class="card-intro">Usuarios</p>
      </div>
    </div>
  </div>
  <div class="cards">
    <div class="card-item">
      <div class="card-image">
      </div>
      <div class="card-info">
        <h2 class="card-title">A new trail you can't miss</h2>
        <p class="card-intro">Personajes/Peliculas</p>
      </div>
    </div>
  </div>
  <div class="cards">
    <div class="card-item">
      <div class="card-image">
      </div>
      <div class="card-info">
        <h2 class="card-title">Inside the Outdoors</h2>
        <p class="card-intro">Pedidos</p>
      </div>
    </div>
  </div>
  <div class="cards">
    <div class="card-item">
      <div class="card-image">
      </div>
      <div class="card-info">
        <h2 class="card-title">Essential hiking hacks</h2>
        <p class="card-intro">Último usuario</p>
      </div>
    </div>
  </div>