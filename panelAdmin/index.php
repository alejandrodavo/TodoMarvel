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
	if($opcion=="pAb"){
		$pagina="asignaturasBorrar.php";
		$actual="BORRAR ASIGNATURAS";
	}
	if($opcion=="pAm"){
		$pagina="pedidosModificar.php";
		$actual="MODIFICAR ASIGNATURAS";
	}
	
	if($opcion=="listado"){
		$pagina="listaAlumnos3_PDF.php";
		$actual="";
	}

	if($opcion=="principal"){
		$pagina="inicial.php";
		$actual="";
	}


	if($opcion=="pM"){
		$pagina="matriculas.php";
		$actual="MATRICULAS";
	}
	if($opcion=="pMa"){
		$pagina="matriculasAlta.php";
		$actual="MATRICULAS";
	}
	if($opcion=="pMb"){
		$pagina="matriculasBorrar.php";
		$actual="MATRICULAS";
	}
	if($opcion=="pMn"){
		$pagina="matriculasNotas.php";
		$actual="NOTAS";
	}
	?>

	<?php
		
		
		include($pagina);
	?>
				
<?php
	require_once("pie.php");
?>