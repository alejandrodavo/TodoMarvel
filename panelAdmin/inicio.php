<?php
require_once('productos_model.php');

function datosCorrectos($cod,$des,$pv,$exis){
	$correcto=true;
	//if(trim($tit=="")) $correcto=false;
	//if(empty(trim($text))) $correcto=false;	
	return $correcto;
}

$cod="";
$des="";
$pv="";
$exis="";

if (isset($_POST['guardar'])){
	$cod=$_POST['codigo'];
	$des=$_POST['descripcion'];
	$pv=$_POST['pvp'];
	$exis=$_POST['existencias'];
	if(datosCorrectos($cod,$des,$pv,$exis)){
		
		$new_user_data = array(
			'cod_prod'=>$cod,
			'descripcion'=>$des,
			'pvp'=>$pv,
			'existencias'=>$exis
			);
			$productoN = new Producto();
			$productoN->get($new_user_data['cod_prod']);
			$productoN->set($new_user_data);
			print $productoN->cod_prod . ' ' . $productoN->descripcion . ' ha sido creado<br>';
		}
	}
?>

<html>
	<head>
	</head>
	<body>
		<form method="POST" action="<?php $_SERVER['PHP_SELF']?>">
		CÓDIGO PRODUCTO: <input type="text" name="codigo" id="codigo"><br>
		DESCRIPCIÓN: <input type="text" name="descripcion" id="descripcion"><br>
		PVP: <input type="text" name="pvp" id="pvp"><br>
		EXISTENCIAS: <input type="text" name="existencias" id="exisencias"><br>
		<input type="submit" name="guardar" value="GUARDAR">
		</form>
	</body>
</html>