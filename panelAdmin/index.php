<?php
	require_once("cabecera.php");
?>
	<?php
	$opcion="principal";
	$actual="";
	
	if(isset($_GET["p"])){
		$opcion=$_GET["p"];
	}
	
	if($opcion=="p1"){
		$pagina="alta.php";
		$actual="USUARIOS";
	}
	
	if($opcion=="p2"){
		$pagina="modificar.php";
		$actual="MODIFICAR";
	}
	if($opcion=="p3"){
		$pagina="borrar.php";
		$actual="BORRAR";
	}


	if($opcion=="pA"){
		$pagina="pedidosAlta.php";
		$actual="ASIGNATURAS";
	}

	if($opcion=="pAm"){
		$pagina="pedidosModificar.php";
		$actual="MODIFICAR PEDIDOS";
	}
	
	if($opcion=="listado"){
		$pagina="listaAlumnos3_PDF.php";
		$actual="";
	}

	if($opcion=="principal"){
		$pagina="inicial.php";
		$actual="";
	}


	if($opcion=="pPer"){
		$pagina="personajeAlta.php";
		$actual="PERSONAJES";
	}
	if($opcion=="pPerB"){
		$pagina="personajeBorrar.php";
		$actual="BORRAR PERSONAJE";
	}
	if($opcion=="pPerM"){
		$pagina="personajeModificar.php";
		$actual="MODIFICAR PERSONAJE";
	}
	?>

	<?php
		
		
		include($pagina);
	?>
				
<?php
	require_once("pie.php");
?>