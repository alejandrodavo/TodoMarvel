<?PHP
// Incluir bibliotecas de funciones
   require("pedidos.php");


   if(isset($_GET['inicio']))
   $inicio=$_GET['inicio'];
else
   $inicio=0;


$cuantos=3;
$totalFilas=Pedido::filas_totales();

if ($totalFilas==0){
   echo "Aún no hay pedidos";  
}

$filas=Pedido::devolver_filas_ventana($cuantos,$inicio);

function verColor($esta){
	if($esta=="Enviado")
	return "grey;";
	else if($esta=="Editando")
	return "orange;";
	else if($esta=="Publicado")
	return "green;";
	else if($esta=="Cancelado")
	return "red;";

}

echo "<table><caption>Pedidos</caption><thead>";

$cont=1;
foreach($filas as $fila){ 
   if($cont==1){
	   echo "<tr>";
	   foreach($fila as $indice=>$valor){
		   echo "<th>";
		   echo "$indice";
		   echo "</th>";
	   }
	   echo "<th>Modificar estado</th>";
	   echo "</tr>";
   }
   $cont++;
   echo "</thead><tbody><tr>";
   echo "<td data-label='ID Pedido'>".$fila['id_pedido']."</td><td data-label='ID Usuario'>".$fila['id_usuario']."</td><td data-label='Usuario'>".$fila['username']."</td><td data-label='Pedido'>".$fila['pedido']."</td><td data-label='Tipo'>".
   $fila['tipo']."</td><td data-label='Comentario'>".$fila['comentario'];
   echo "<td data-label='Fecha' align='center'>".$fila['fecha']."</td><td data-label='Estado' style='font-weight:bold;color:".verColor($fila['estado'])."' align='center'  >".$fila['estado']."</td>";
   echo "<td data-label='Modificar estado' align='center'><a href='".$_SERVER['PHP_SELF']."?p=pAm&id=".$fila['id_pedido']."'>
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

echo "<div style='margin:20px;text-align:center'><a style='color:black' href='".$_SERVER['PHP_SELF']."?p=pA&inicio=$anterior'>[anterior]</a>";
echo " <a style='color:black' href='".$_SERVER['PHP_SELF']."?p=pA&inicio=$siguiente'>[siguiente]</a></div>";



   function datosCorrectos($username, $pedido, $tipo, $comentario, $fecha, $estado){
	$correcto=true;
	//if(trim($tit=="")) $correcto=false;
	//if(empty(trim($text))) $correcto=false;	
	return $correcto;
}

$username="";
$pedido="";
$tipo="";
$comentario="";
$fecha="";
$estado="";

if (isset($_POST['alta'])){
	$username=$_POST["username"];
	$pedido=$_POST["pedido"];
	$tipo=$_POST["tipo"];
	$comentario=$_POST["comentario"];
	$fecha=$_POST["fecha"];
	$estado=$_POST["estado"];

	if(datosCorrectos($username, $pedido, $tipo, $comentario, $fecha, $estado)){
			$asignaturaN = new Pedido(null,null, $username, $pedido, $tipo, $comentario, $fecha, $estado);
			$conexion = conectarBD();
			$res=$asignaturaN->insertar();
			if($res>0)
				echo "<br/>$res Pedido insertado correctamente";
			else
				echo "<br/>Fallo al insertar pedido";

		}

	}
	$filasUsu=Pedido::devolver_todas_filas_Usuario();



?>
<form method="POST" action="<?php $_SERVER['PHP_SELF']?>">
			<table>
				<tr><td align="right">USUARIO: </td><td align="left"><input placeholder="Usuario" size="30" maxlength="30" name="username" list="username"><datalist id="username">
					<?php
						foreach($filasUsu as $filaUsu){ 
								foreach($filaUsu as $indice=>$valor){
									if($indice==="username")
									echo "<option value='$valor'>$valor</option>";
								}
							}
					?>
					</datalist></select>
				</td></tr>
				<tr><td align="right">PEDIDO: </td><td align="left"><input type="text" name="pedido" size="30" maxlength="30" placeholder="Pedido"></td></tr>
				<tr><td align="right">TIPO: </td><td align="left"><input type="text" name="tipo" size="30" maxlength="30" placeholder="Tipo"></td></tr>
				<tr><td align="right">COMENTARIO: </td><td align="left"><input type="text" name="comentario" size="30" maxlength="200" placeholder="Comentario"></td></tr>
				<tr><td align="right">FECHA: </td><td align="left"><input type="date" name="fecha" size="3" maxlength="2" placeholder="Fecha"></td></tr>
				<tr><td align="right">ESTADO: </td><td align="left">
					<select name="estado">
						<option style="color:grey" value="Enviado">Enviado</option>
  						<option style="color:orange" value="Editando">Editando</option>
						<option style="color:green" value="Publicado">Publicado</option>
  						<option style="color:red" value="Cancelado">Cancelado</option></select>
					</td></tr>

				<tr><td align="center" colspan="2"><input type="submit" value="ALTA" name="alta"></td></tr>	
			</table>
</form>

<style>

</style>
