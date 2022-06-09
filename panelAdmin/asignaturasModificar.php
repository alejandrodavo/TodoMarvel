<?php
   require("clases/asignaturas.php");

if(isset($_GET['id']))
$idModif=$_GET['id'];


$fila=Asignatura::devolver_id($idModif);
$id_asig = $fila['id_asignatura'];
$nombre = $fila['nombre'];
$hor = $fila['horas'];



function datosCorrectos($id,$nom,$horas){
	$correcto=true;
	//if(trim($tit=="")) $correcto=false;
	//if(empty(trim($text))) $correcto=false;	
	return $correcto;
}

$id="";
$nom="";
$horas="";


if (isset($_POST['modificar'])){
	$id=$_POST['id'];
	$nom=$_POST['nombre'];
	$horas=$_POST['horas'];

	if(datosCorrectos($id,$nom,$horas)){
		$asignaturaM = new Asignatura($id,$nom,$horas);
        $res=$asignaturaM->modificar($idModif);
		if($res>0)
			echo "<br/>$nom modificado correctamente";
		else
			echo "<br/>Fallo al insertar filas";
	}
}		
?>



<html>
	<head>
	</head>

	<body>
	<form method="POST" action="<?php $_SERVER['PHP_SELF']?>">
			<table>
				<tr><td align="right">ID: </td><td align="left"><input type="text" name="id" size="20" maxlength="30" value="<?php echo $id_asig?>"></td></tr>
				<tr><td align="right">NOMBRE: </td><td align="left"><input type="text" name="nombre" size="20" maxlength="20" value="<?php echo $nombre?>"></td></tr>
				<tr><td align="right">HORAS: </td><td align="left"><input type="text" name="horas" size="20" maxlength="20" value="<?php echo $hor?>"></td></tr>
				<tr><td align="center" colspan="2"><input type="submit" value="MODIFICAR" name="modificar"></td></tr>	
			</table>
</form>
<?php 	echo "<button><a href='".$_SERVER['PHP_SELF']."?p=p1'><h2>VOLVER</h2></a></button>"?>
	</body>
</html>

