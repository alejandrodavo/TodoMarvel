<?PHP
// Incluir bibliotecas de funciones
   require("Personaje.php");


   if(isset($_GET['inicio']))
   $inicio=$_GET['inicio'];
else
   $inicio=0;


$cuantos=4;
$totalFilas=Personaje::filas_totales();

if ($totalFilas==0){
   echo "Aún no hay personajes";  
}

$filas=Personaje::devolver_filas_ventana($cuantos,$inicio);


echo "<table><caption>Personajes</caption><thead>";
$rutaImagenes="../assets/images/personajes/";
$cont=1;
foreach($filas as $fila){ 
   if($cont==1){
	   echo "<tr>";
	   foreach($fila as $indice=>$valor){
		   echo "<th>";
		   echo "$indice";
		   echo "</th>";
	   }
	   echo "<th>Borrar</th>";
	   echo "<th>Modificar</th>";
	   echo "</tr>";
   }
   $cont++;
   echo "</thead><tbody><tr>";
   echo "<td data-label='ID Personaje'>".$fila['id_personaje']."</td><td data-label='Nombre'>".$fila['nombre']."</td><td data-label='Tipo'>".$fila['tipo']."</td><td data-label='Afiliacion'>".$fila['afiliacion']."</td><td data-label='Descripcion'>".
   $fila['descripcion']."<td data-label='Imagen'><img style='border-radius:100%;box-shadow:rgba(0, 0, 0, 0.5) 3px 3px 10px 0px;' height='40px' width='40px' src='$rutaImagenes".$fila['imagen']."'></td>";
   echo "<td data-label='Borrar' align='center'><a href='".$_SERVER['PHP_SELF']."?p=pPerB&id=".$fila['id_personaje']."&n=".$fila['nombre']."&img=".$fila['imagen']."'>
   <img height='30px' width='30px' src='images/papelera.png'></a></td>";
   echo "<td data-label='Modificar' align='center'><a href='".$_SERVER['PHP_SELF']."?p=pPerM&id=".$fila['id_personaje']."&n=".$fila['nombre']."&img=".$fila['imagen']."'>
   <img height='30px' width='30px' src='images/edit.png'></a></td>";
   echo "</tr>";
}
echo "</tbody></table>";
if($inicio+$cuantos<=$totalFilas)
   $siguiente=$inicio+$cuantos;
else
   $siguiente=$inicio;

if($inicio-$cuantos>=0)
   $anterior=$inicio-$cuantos;
else
   $anterior=$inicio;
   
$paginas=array(1=>0,2=>4,3=>8,4=>12,5=>16);

echo "<div style='margin:20px;text-align:center'><a style='color:black' href='".$_SERVER['PHP_SELF']."?p=pPer&inicio=$anterior'>[anterior]</a>";
echo " <a style='color:black' href='".$_SERVER['PHP_SELF']."?p=pPer&inicio=$siguiente'>[siguiente]</a></div>";



   function datosCorrectos($nombre,$tipo,$afiliacion,$descripcion,$imagen){
	$correcto=true;
	return $correcto;
}

$id_personaje=null;
$nombre="";
$tipo="";
$afiliacion="";
$descripcion="";

if (isset($_POST['alta'])){
	$nombre=$_POST["nombre"];
	$tipo=$_POST["tipo"];
	$afiliacion=$_POST["afiliacion"];
	$descripcion=$_POST["descripcion"];


	$tiposValidos=array("image/jpeg","image/bmp","image/png","image/gif");
	$tamFic=$_FILES['imagen']['size'];
	$tipoFic=$_FILES['imagen']['type'];
	if(in_array($tipoFic,$tiposValidos)){ //comprueba tipos fichero
	

			$ruta="../assets/images/personajes/";
			$name=$_FILES['imagen']['name'];
			if(is_file($ruta.$name)){ //comprobar si un fichero existe y renombrarlo
				echo "El fichero ya existe, lo renombramos<br>";
				$name=time().$name;
			}
				
			foreach($_FILES['imagen'] as $indice=>$valor)
					echo "$indice: $valor <br>";
			
			if (is_uploaded_file($_FILES['imagen']['tmp_name'])){
				move_uploaded_file($_FILES['imagen']['tmp_name'] ,$ruta.$name);
				echo "<br>Fichero subido<br>";
			}

	}
	else
		echo "Tipo no valido, solo se permiten ".implode(";",$tiposValidos);






	if(datosCorrectos($nombre,$tipo,$afiliacion,$descripcion,$name)){
			$personajeN = new Personaje(null,$nombre,$tipo,$afiliacion,$descripcion,$name);
			$conexion = conectarBD();
			$res=$personajeN->insertar();
			if($res>0)
				echo "<br/>$res Personaje creado correctamente";
			else
				echo "<br/>Fallo al crear personaje";

		}

	}
	
?>
<form method="POST" action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
			<table>
				<tr><td align="right">NOMBRE:</td><td align="left"><input type="text" placeholder="Nombre" name="nombre" size="20" maxlength="30"></td></tr>
				<tr><td align="right">TIPO:</td><td align="left">
					<select name="tipo">
						<option value="Comic">Comic</option>
						<option value="Pelicula">Pelicula</option>		
					</select>
				</td></tr>
				<tr><td align="right">AFILIACION:</td><td align="left"><input type="text" placeholder="Afiliacion" name="afiliacion" size="20" maxlength="50"></td></tr>
				<tr><td align="right">DESCRIPCION:</td><td align="left"><input type="text" placeholder="Descripción" name="descripcion" size="20" maxlength="200"></td></tr>
				<tr><td align="right">IMAGEN:</td><td align="left"><input type="file" placeholder="Imagen" name="imagen" size="20" maxlength="50"></td></tr>
				<tr><td align="center" colspan="2"><input type="submit" value="ALTA" placeholder="" name="alta"></td></tr>	
			</table>
</form>
