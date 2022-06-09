

<!DOCTYPE html>
<html>
    <head>
        <title>LISTA USUARIOS</title>
        <meta charset="UFT-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="stylesheets/screen.css">

	<style>
		table td{
			border: 1px solid black;
		}
	</style>
    </head>
<body>
<?php
	$cabecera=false;
	$conexion= new mysqli("localhost","root","","todomarvel");
	$result=$conexion->query("Select * from pedidos where estado!='Publicado' and estado!='Cancelado'");
	echo "<table border='1'>";
	while($fila=$result->fetch_assoc()){
		if(!$cabecera){
			echo "<tr>";
			foreach($fila as $indice=>$valor){
				echo "<td>";
				echo $indice;
				echo "</td>";
			}
			echo "</tr>";
			$cabecera=true;
			echo "</tr>";
		}
		echo "<tr>";
		foreach($fila as $indice=>$valor){
			echo"<td>";
			echo $valor;
			echo"</td>";
		}
		echo "</tr>";
	}
	echo "</table>";
	$result->free();
	$conexion->close();
	
?>
<a style="color:red" href="listaAlumnosPDF.php">Listar pedidos en PDF </a>
</body>
</html>