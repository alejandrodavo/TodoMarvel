<?php

require("Personaje.php");
if(isset($_GET['id']))
   $idBorrar=$_GET['id'];
   if(isset($_GET['n']))
   $nombre=$_GET['n'];
   if(isset($_GET['img']))
   $imagen=$_GET['img'];

$cod="";


if (isset($_POST['borrar'])){
		$url="../assets/images/personajes/{$imagen}";
		echo $url;
		unlink("$url");
		$mysqli = conectarBD(); 
		$borrarP = new Personaje($idBorrar,"","","","","");
		$borr=$borrarP->borrar();
		echo "Se ha borrado: $nombre </br>";
		desconectarBD($mysqli);
		?>
		<script>
			window.location.assign("http://localhost/Marvel/TodoMarvel/panelAdmin/index.php?p=pPer")
		</script>
		<?php

}	
if (isset($_POST['cancelar'])){
	?>
	<script>
		window.location.assign("http://localhost/Marvel/TodoMarvel/panelAdmin/index.php?p=pPer")
	</script>
	<?php
}
?>

<html>
	<body>
		<div style="margin-bottom:465px;margin-top:200px;display:flex;align-items:center;justify-content:center;" id="eliminar">
			<form method="POST" action="<?php $_SERVER['PHP_SELF']?>">
				SEGURO QUE QUIERES ELIMINAR AL PERSONAJE <u style='font-size:1.3em'><?php echo $nombre."</u> con el ID ".$idBorrar;?><br><br>
				<input type="submit" name="borrar" value="ELIMINAR">
				<input type="submit" name="cancelar" value="CANCELAR">
			</form>
		</div>
	</body>
</html>

