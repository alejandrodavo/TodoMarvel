<?php
   require("Personaje.php");

if(isset($_GET['id']))
$idModif=$_GET['id'];


$fila=Personaje::devolver_id($idModif);
$nombreP=$fila["nombre"];
$tipoP=$fila["tipo"];
$afiliacionP=$fila["afiliacion"];
$descripcionP=$fila["descripcion"];
$imagenP=$fila["imagen"];


function datosCorrectos($nombre,$tipo,$afiliacion,$descripcion,$imagen){
	$correcto=true;
	//if(trim($tit=="")) $correcto=false;
	//if(empty(trim($text))) $correcto=false;	
	return $correcto;
}

$nombre="";
$tipo="";
$afiliacion="";
$descripcion="";
$imagenN="";

if (isset($_POST['modificar'])){
	$nombre=$_POST["nombre"];
	$tipo=$_POST["tipo"];
	$afiliacion=$_POST["afiliacion"];
	$descripcion=$_POST["descripcion"];
	if($_FILES["imagen"]["name"]!=""){
		if(!isset($imagenP)){
			$url="../assets/images/personajes/{$imagenP}";
			unlink("$url");
		}

	$imagenP=$_FILES['imagen']['name'];
	$tiposValidos=array("image/jpeg","image/bmp","image/png","image/gif");
	$tamFic=$_FILES['imagen']['size'];
	$tipoFic=$_FILES['imagen']['type'];
	if(in_array($tipoFic,$tiposValidos)){ //comprueba tipos fichero
	
			$ruta="../assets/images/personajes/";
			$imagenN=$_FILES['imagen']['name'];
			if(is_file($ruta.$imagenN)){ //comprobar si un fichero existe y renombrarlo
				echo "El fichero ya existe, lo renombramos<br>";
				$imagenN=time().$imagenN;
			}
			
			
			if (is_uploaded_file($_FILES['imagen']['tmp_name'])){
				move_uploaded_file($_FILES['imagen']['tmp_name'] ,$ruta.$imagenN);
				echo "<br>Fichero subido<br>";
			}

	}
	else
		echo "Tipo no valido, solo se permiten ".implode(";",$tiposValidos);
	}


	if(datosCorrectos($nombre,$tipo,$afiliacion,$descripcion,$imagenP)){
		if($imagenN!="")
		$PersonajeM = new Personaje($idModif,$nombre,$tipo,$afiliacion,$descripcion,$imagenN);
		else
		$PersonajeM = new Personaje($idModif,$nombre,$tipo,$afiliacion,$descripcion,$imagenP);
        $res=$PersonajeM->modificar();
		if($res>0){
		?>
		<script>
			window.location.assign("http://localhost/Marvel/TodoMarvel/panelAdmin/index.php?p=pPer")
		</script>
		<?php
		}
		else
			echo "<br/>Fallo al modificar personaje";
	}
}

if (isset($_POST['volver'])){
	?>
	<script>
		window.location.assign("http://localhost/Marvel/TodoMarvel/panelAdmin/index.php?p=pPer")
	</script>
	<?php
}
?>


<html>
	<head>
	</head>
	<body>
	<form method="POST" action="<?php $_SERVER['PHP_SELF']?>" style="margin-top:100px" enctype="multipart/form-data">
			<table>
				<tr><td align="center" colspan="2"><img style='box-shadow:rgba(0, 0, 0, 0.5) 3px 3px 10px 0px;' height='120px' width='120px' src="../assets/images/personajes/<?php echo $imagenP ?>"></td></tr>		
				<tr><td align="right">NOMBRE:</td><td align="left"><input type="text" placeholder="Nombre" name="nombre" size="20" maxlength="30" value="<?php echo $nombreP?>"></td></tr>
				<tr><td align="right">TIPO:</td><td align="left"><select name="tipo">
						<option value="Comic" <?php if($tipoP=="Comic") echo "selected='selected'"?>>Comic</option>
						<option value="Pelicula" <?php if($tipoP=="Pelicula") echo "selected='selected'"?>>Pelicula</option>		
				</select></td></tr>
				<tr><td align="right">AFILIACION:</td><td align="left"><input type="text" placeholder="Afiliacion" name="afiliacion" size="20" maxlength="50" value="<?php echo $afiliacionP?>"></td></tr>
				<tr><td align="right">DESCRIPCION:</td><td align="left"><input type="text" placeholder="Descripción" name="descripcion" size="20" maxlength="200" value="<?php echo $descripcionP?>"></td></tr>
				<tr><td align="right">IMAGEN:</td><td align="left"><input type="file" placeholder="Imagen" name="imagen" size="20" maxlength="50"></td></tr>
				<tr><td align="center" colspan="2"><input type="submit" value="MODIFICAR" name="modificar"> <input type="submit" value="VOLVER" name="volver"></td></tr>	
			</table>
</form>
	</body>
</html>