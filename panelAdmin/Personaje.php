<?php
include("conexion.php");
include("utilidadCodif.php");
class Personaje{
    private $id_personaje;
    private $nombre;
    private $tipo;
    private $afiliacion;
    private $descripcion;
    private $imagen;
    
    function __construct ($id_personaje, $nombre, $tipo, $afiliacion, $descripcion, $imagen){
        $this->id_personaje=$id_personaje;
        $this->nombre=$nombre;
        $this->tipo=$tipo;
        $this->afiliacion=$afiliacion;
        $this->descripcion=$descripcion;
        $this->imagen=$imagen;
        }

    static function filas_totales(){
        $mysqli = conectarBD(); 
        $sql="SELECT * FROM personaje";
        $resultado = $mysqli->query($sql);
        if ($mysqli->error!="") { 
            echo "Error: La ejecución de la consulta falló debido a: \n"; 
            echo "Query: " . $sql . "\n"; 
            echo "Errno: " . $mysqli->errno . "\n"; 
            echo "Error: " . $mysqli->error . "\n"; 
            exit; 
        }
        $num_filas = $resultado->num_rows;
        $resultado->free(); 
        desconectarBD($mysqli); 
        return $num_filas;
    }


    static function devolver_todas_filas(){
        $filas = array();
        $mysqli = conectarBD(); 
        $sql="SELECT * FROM personaje";
        $resultado = $mysqli->query($sql);
        while($fila = $resultado->fetch_assoc()){ 
            $filas[] = $fila;
        }
        $resultado->free(); 
        desconectarBD($mysqli); 
        return $filas;
    }
    static function devolver_id($id){
        $filas = array();
        $mysqli = conectarBD(); 
        $sql="SELECT * FROM personaje where id_personaje = '$id'";
        $resultado = $mysqli->query($sql);
        $fila = $resultado->fetch_assoc();
        $resultado->free(); 
        desconectarBD($mysqli);
        return $fila;
    }
    static function devolver_filas_ventana($cuantos,$inicio){
        $filas = array();
        $mysqli = conectarBD(); 
        $sql="SELECT * FROM personaje limit $inicio,$cuantos";
        $resultado = $mysqli->query($sql);
        while($fila = $resultado->fetch_assoc()){ 
            $filas[] = $fila;
        }
        $resultado->free(); 
        desconectarBD($mysqli); 
        return $filas;
    }



    static function valores_select($campo){
        $valores=array();
        $conexion=conectarBD();
        $sql = "select distinct $campo from id_usuario order by $campo";
        $res = $conexion->query ($sql);
        $cuantas=$res->num_rows;
        if($cuantas>0){
            for($cont=0;$cont<$cuantas;$cont++){
                $fila=$res->fetch_array();
                $valor=$fila[$campo];
                $valores[]=$valor;
            }
        }
        $res->free();
        desconectarBD($conexion);
        return $valores;
    }

    static function devolver_filtro_filas($condicion){
        $filas = array();
        $mysqli = conectarBD(); 
        $sql="SELECT * FROM personaje ".$condicion;
        $resultado = $mysqli->query($sql);
        while($fila = $resultado->fetch_assoc()){ 
            $filas[] = $fila;
        }
        $resultado->free(); 
        desconectarBD($mysqli); 
        return $filas;
    }


    function insertar(){	
		$conexion = conectarBD();
		$sql = "insert into personaje values('null','$this->nombre','$this->tipo','$this->afiliacion','$this->descripcion','$this->imagen')";	
		$res = $conexion->query ($sql);
		if ($conexion->error!="") { 
			echo "Error: La ejecución de la consulta falló debido a: \n"; 
			echo "Query: " . $sql . "<br>\n"; 
			echo "Errno: " . $conexion->errno . "<br>\n"; 
			echo "Error: " . $conexion->error . "<br>\n"; 
			exit; 
		} 
		desconectarBD($conexion);
		return $res;
	}

    function borrar(){
        $mysqli = conectarBD();
        $sql = "delete from personaje where id_personaje=".$this->id_personaje;
        $mysqli->query($sql);
        $num_filas=$mysqli->affected_rows;
        desconectarBD($mysqli);
        return $num_filas;
    }

    function modificar(){	
		$conexion = conectarBD();
        $sql = "update personaje set nombre='$this->nombre', tipo='$this->tipo',afiliacion='$this->afiliacion' ,descripcion='$this->descripcion',imagen='$this->imagen' where id_personaje=$this->id_personaje";
		$res = $conexion->query ($sql);
		if ($conexion->error!="") { 
			echo "Error: La ejecución de la consulta falló debido a: \n"; 
			echo "Query: " . $sql . "<br>\n"; 
			echo "Errno: " . $conexion->errno . "<br>\n"; 
			echo "Error: " . $conexion->error . "<br>\n"; 
			exit; 
		} 
		desconectarBD($conexion);
		return $res;
	}

}



/*SELECT id_asignatura, nombre
FROM asignaturas inner join matricula on matricula.id_asignatura = asignaturas.id_asignatura
where matricula.id_alumno != 7


SELECT
    asignaturas.id_asignatura,
    asignaturas.nombre
FROM
    asignaturas
INNER JOIN matricula WHERE matricula.id_asignatura
not in(select id_asignatura from matricula where matricula.id_alumno = 7)
*/
?>

