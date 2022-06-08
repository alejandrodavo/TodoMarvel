<?php

require("usuarios.php");
if(isset($_GET['id']))
   $idBorrar=$_GET['id'];
   if(isset($_GET['n']))
   $nombre=$_GET['n'];

$cod="";


if (isset($_POST['borrar'])){
		$mysqli = conectarBD(); 
		$borrarA = new Usuario($idBorrar,"","","","","","");
		$borr=$borrarA->borrar();
		echo "Se ha borrado: $nombre </br>";
		desconectarBD($mysqli);
		?>
		<script>
			window.location.assign("http://localhost/Marvel/TodoMarvel/panelAdmin/index.php?p=p1")
		</script>
		<?php

}	
if (isset($_POST['cancelar'])){
	?>
	<script>
		window.location.assign("http://localhost/Marvel/TodoMarvel/panelAdmin/index.php?p=p1")
	</script>
	<?php
}
?>

<html>
	<body>
		<div style="margin-bottom:465px;margin-top:200px;display:flex;align-items:center;justify-content:center;" id="eliminar">
			<form method="POST" action="<?php $_SERVER['PHP_SELF']?>">
				SEGURO QUE QUIERES ELIMINAR AL USUARIO <u style='font-size:1.3em'><?php echo $nombre."</u> con el ID ".$idBorrar;?><br><br>
				<input type="submit" name="borrar" value="ELIMINAR">
				<input type="submit" name="cancelar" value="CANCELAR">
			</form>
		</div>
	</body>
</html>

