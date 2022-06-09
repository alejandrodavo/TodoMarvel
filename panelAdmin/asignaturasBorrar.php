<?php

   require("clases/asignaturas.php");
   if(isset($_GET['id']))
   $idBorrar=$_GET['id'];
   if(isset($_GET['n']))
   $nombre=$_GET['n'];

$cod="";


if (isset($_POST['borrar'])){
		$mysqli = conectarBD(); 
		$borrarA = new Asignatura($idBorrar,"","","","","");
		$borr=$borrarA->borrar();
		echo "Se ha borrado: $nombre </br>";
		desconectarBD($mysqli);
		echo "<a href='".$_SERVER['PHP_SELF']."?p=pA'><h2>VOLVER</h2></a>";   
}	

if (isset($_POST['cancelar']))
	echo "Cancelado<br>";
?>



<html>
	<head>
	</head>

	<body>
		<form method="POST" action="<?php $_SERVER['PHP_SELF']?>">
		SEGURO QUE QUIERES ELIMINAR LA ASIGNATURA <?php echo $nombre." con el ID ".$idBorrar;?><br><br>
		<input type="submit" name="borrar" value="ELIMINAR">
		<input type="submit" name="cancelar" value="CANCELAR">

		</form>
		<?php 	echo "<button><a href='".$_SERVER['PHP_SELF']."?p=pA'><h2>VOLVER</h2></a></button>"?>
	</body>
</html>

