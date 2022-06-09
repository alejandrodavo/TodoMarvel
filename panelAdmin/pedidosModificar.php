<?php
   require("pedidos.php");

if(isset($_GET['id']))
$idModif=$_GET['id'];


$fila=Pedido::devolver_id($idModif);
$id_pedido = $fila['id_pedido'];
$id_usuario=$fila["id_usuario"];
$username=$fila["username"];
$pedido=$fila["pedido"];
$tipo=$fila["tipo"];
$comentario=$fila["comentario"];
$fecha=$fila["fecha"];
$estado=$fila["estado"];



function datosCorrectos($estado){
	$correcto=true;
	//if(trim($tit=="")) $correcto=false;
	//if(empty(trim($text))) $correcto=false;	
	return $correcto;
}




if (isset($_POST['modificar'])){
	$estado=$_POST['estado'];

	if(datosCorrectos($estado)){
		$pedidoM = new Pedido($id_pedido, $id_usuario, $username, $pedido, $tipo, $comentario, $fecha, $estado);
        $res=$pedidoM->modificar($idModif);
		if($res>0){
			?>
			<script>
				window.location.assign("http://localhost/Marvel/TodoMarvel/panelAdmin/index.php?p=pA")
			</script>
			<?php
		}
		
		else
			echo "<br/>Fallo al insertar filas";
	}
}		
if (isset($_POST['volver'])){
	?>
	<script>
		window.location.assign("http://localhost/Marvel/TodoMarvel/panelAdmin/index.php?p=pA")
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
				<tr><td align="right">PEDIDO: </td><td align="left"><span><?php echo $pedido?></span></td></tr>
				<tr><td align="right">FECHA: </td><td align="left"><span><?php echo $fecha?></span></td></tr>
				<tr><td align="right">ESTADO: </td><td align="left">
					<select name="estado">
						<option style="color:grey;font-weight:bold;" value="Enviado"<?php if($estado=="Enviado") echo "selected='selected'" ?>>Enviado</option>
  						<option style="color:orange;font-weight:bold;" value="Editando"<?php if($estado=="Editando") echo "selected='selected'"  ?>>Editando</option>
						<option style="color:green;font-weight:bold;" value="Publicado"<?php if($estado=="Publicado") echo "selected='selected'" ?>>Publicado</option>
  						<option style="color:red;font-weight:bold;" value="Cancelado"<?php if($estado=="Cancelado") echo "selected='selected'" ?>>Cancelado</option>
					</td></tr>
					<tr><td align="center" colspan="2"><input type="submit" value="MODIFICAR" name="modificar"> <input type="submit" value="VOLVER" name="volver"></td></tr>
			</table>
</form>
	</body>
</html>

