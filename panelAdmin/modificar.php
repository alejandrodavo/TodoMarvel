<?php
   require("usuarios.php");

if(isset($_GET['id']))
$idModif=$_GET['id'];


$fila=Usuario::devolver_id($idModif);
$correo = $fila['correo'];
$usu = $fila['username'];
$cont = $fila['password'];
$nomb = $fila['nombre'];
$fechaN = $fila['fechaNacimiento'];


function datosCorrectos($co,$us,$pa,$no,$fec){
	$correcto=true;
	//if(trim($tit=="")) $correcto=false;
	//if(empty(trim($text))) $correcto=false;	
	return $correcto;
}

$co="";
$us="";
$pa="";
$no="";
$fec="";

if (isset($_POST['modificar'])){
	$co = $_POST['correo'];
	$us = $_POST['usuario'];
	$pa = $_POST['password'];
	$no = $_POST['nombre'];
	$fec = $_POST['fechaNacimiento'];


	if(datosCorrectos($co,$us,$pa,$no,$fec)){
		$usuarioM = new Usuario($idModif,$co,$us,$pa,$no,$fec,"");
        $res=$usuarioM->modificar();
		if($res>0){
		?>
		<script>
			window.location.assign("http://localhost/Marvel/TodoMarvel/panelAdmin/index.php?p=p1")
		</script>
		<?php
		}
		else
			echo "<br/>Fallo al modificar usuario, credenciales inválidas";
	}
}

if (isset($_POST['volver'])){
	?>
	<script>
		window.location.assign("http://localhost/Marvel/TodoMarvel/panelAdmin/index.php?p=p1")
	</script>
	<?php
}
?>


<html>
	<head>
	</head>
	<body>
	<form method="POST" action="<?php $_SERVER['PHP_SELF']?>" style="margin-top:100px">
			<table>
				<tr><td align="right">CORREO: </td><td align="left"><input type="text" name="correo" size="20" maxlength="50" value="<?php echo $correo?>"></td></tr>
				<tr><td align="right">USUARIO: </td><td align="left"><input type="text" name="usuario" size="20" maxlength="50" value="<?php echo $usu?>"></td></tr>
				<tr><td align="right">CONTRASEÑA: </td><td align="left"><input type="text" name="password" size="20" maxlength="50" value="<?php echo $cont?>"></td></tr>
				<tr><td align="right">NOMBRE: </td><td align="left"><input type="text" name="nombre" size="20" maxlength="50" value="<?php echo $nomb?>"></td></tr>
				<tr><td align="right">FECHA NACIMIENTO: </td><td align="left"><input type="date" name="fechaNacimiento" size="4" maxlength="20" value="<?php echo $fechaN?>"></td></tr>
				<tr><td align="center" colspan="2"><input type="submit" value="MODIFICAR" name="modificar"> <input type="submit" value="VOLVER" name="volver"></td></tr>	
			</table>
</form>
	</body>
</html>