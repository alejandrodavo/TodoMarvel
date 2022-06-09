<?PHP
// Incluir bibliotecas de funciones
   require("usuarios.php");


   if(isset($_GET['inicio']))
   $inicio=$_GET['inicio'];
else
   $inicio=0;


$cuantos=4;
$totalFilas=Usuario::filas_totales();

if ($totalFilas==0){
   echo "Aún no hay usuarios";  
}

$filas=Usuario::devolver_filas_ventana($cuantos,$inicio);


echo "<table><caption>Usuarios</caption><thead>";

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
   echo "<td data-label='ID Usuario'>".$fila['id_usuario']."</td><td data-label='Correo'>".$fila['correo']."</td><td data-label='Usuario'>".$fila['username']."</td><td data-label='Contraseña'>".$fila['password']."</td><td data-label='Nombre'>".
   $fila['nombre']."</td><td data-label='Fecha Nacimiento'>".$fila['fechaNacimiento']."</td><td data-label='Avatar'><img style='border-radius:100%;box-shadow:rgba(0, 0, 0, 0.5) 3px 3px 10px 0px;' height='40px' width='40px' src='../".$fila['avatar']."'></td>";
   echo "<td data-label='Borrar' align='center'><a href='".$_SERVER['PHP_SELF']."?p=p3&id=".$fila['id_usuario']."&n=".$fila['username']."'>
   <img height='30px' width='30px' src='images/papelera.png'></a></td>";
   echo "<td data-label='Modificar' align='center'><a href='".$_SERVER['PHP_SELF']."?p=p2&id=".$fila['id_usuario']."&n=".$fila['username']."'>
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

echo "<div style='margin:20px;text-align:center'><a style='color:black' href='".$_SERVER['PHP_SELF']."?p=p1&inicio=$anterior'>[anterior]</a>";
echo " <a style='color:black' href='".$_SERVER['PHP_SELF']."?p=p1&inicio=$siguiente'>[siguiente]</a></div>";



   function datosCorrectos($usu,$pas,$nom,$ape,$cor,$fec){
	$correcto=true;
	return $correcto;
}

$id=null;
$correo="";
$usu="";
$cont="";
$nombre="";
$fechaN="";
$avatar="";

if (isset($_POST['alta'])){
	$correo=$_POST['correo'];
	$usu=$_POST['usuario'];
	$cont=$_POST['contraseña'];
	$nombre=$_POST['nombre'];
	$fechaN=$_POST['fechaN'];
	$avatar="../assets/images/avatar/default.png";

	if(datosCorrectos($correo,$usu,$cont,$nombre,$fechaN,$avatar)){
			$usuarioN = new Usuario(null,$correo,$usu,$cont,$nombre,$fechaN,$avatar);
			$conexion = conectarBD();
			$res=$usuarioN->insertar();
			if($res>0)
				echo "<br/>$res Usuario registrado correctamente";
			else
				echo "<br/>Fallo al insertar socio";

		}

	}
	
?>
<form method="POST" action="<?php $_SERVER['PHP_SELF']?>">
			<table>
				<tr><td align="right">CORREO:</td><td align="left"><input type="text" placeholder="Correo" name="correo" size="20" maxlength="30"></td></tr>
				<tr><td align="right">USUARIO:</td><td align="left"><input type="text" placeholder="Usuario" name="usuario" size="20" maxlength="30"></td></tr>
				<tr><td align="right">CONTRASEÑA:</td><td align="left"><input type="text" placeholder="Contraseña" name="contraseña" size="20" maxlength="50"></td></tr>
				<tr><td align="right">NOMBRE:</td><td align="left"><input type="text" placeholder="Nombre" name="nombre" size="20" maxlength="50"></td></tr>
				<tr><td align="right">FECHA NACIMIENTO:</td><td align="left"><input type="date" placeholder="Fecha Nacimiento" name="fechaN" size="20" maxlength="50"></td></tr>
				<tr><td align="center" colspan="2"><input type="submit" value="ALTA" placeholder="" name="alta"></td></tr>	
			</table>
</form>
