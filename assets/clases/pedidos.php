<?php
require("lib/conexion.php");
class Asignatura{
    private $id_asignatura;
    private $nombre;
    private $horas;
    
    function __construct ($id_asignatura, $nombre, $horas){
        $this->id_asignatura=$id_asignatura;
        $this->nombre=$nombre;
        $this->horas=$horas;
    }

    static function filas_totales(){
        $mysqli = conectarBD(); 
        $sql="SELECT * FROM asignaturas";
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

    function insertar(){	
		$conexion = conectarBD();	
		$sql = "insert into asignaturas values('$this->id_asignatura','$this->nombre','$this->horas')";	
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

    function modificar($idModif){	
		$conexion = conectarBD();	
        $sql = "update asignaturas set id_asignatura='$this->id_asignatura', nombre='$this->nombre', horas='$this->horas' where id_asignatura='$idModif'";
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

    static function devolver_todas_filas(){
        $filas = array();
        $mysqli = conectarBD(); 
        $sql="SELECT * FROM asignaturas";
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
        $sql="SELECT * FROM asignaturas where id_asignatura = '$id'";
        $resultado = $mysqli->query($sql);
        $fila = $resultado->fetch_assoc();
        $resultado->free(); 
        desconectarBD($mysqli);
        return $fila;
    }
    static function devolver_filas_ventana($cuantos,$inicio){
        $filas = array();
        $mysqli = conectarBD(); 
        $sql="SELECT * FROM asignaturas limit $inicio,$cuantos";
        $resultado = $mysqli->query($sql);
        while($fila = $resultado->fetch_assoc()){ 
            $filas[] = $fila;
        }
        $resultado->free(); 
        desconectarBD($mysqli); 
        return $filas;
    }

    function borrar(){
        $mysqli = conectarBD(); 
        $sql = "delete from asignaturas where id_asignatura=".$this->id_asignatura;
        $mysqli->query($sql);
        $num_filas=$mysqli->affected_rows;
        desconectarBD($mysqli);
        return $num_filas;
    }

    static function valores_select($campo){
        $valores=array();
        $conexion=conectarBD();
        $sql = "select distinct $campo from asignaturas order by $campo";
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
        $sql="SELECT * FROM asignaturas ".$condicion;
        $resultado = $mysqli->query($sql);
        while($fila = $resultado->fetch_assoc()){ 
            $filas[] = $fila;
        }
        $resultado->free(); 
        desconectarBD($mysqli); 
        return $filas;
    }

    static function verAsignaturas(){
        $filas = array();
        $mysqli = conectarBD(); 
        $sql="SELECT id_asignatura, nombre FROM asignaturas
        inner join matricula on matricula.id_asignatura = asignatura.id_asignatura 
        where matricula.id_alumno != $this->id_alumno";
        $resultado = $mysqli->query($sql);
        while($fila = $resultado->fetch_assoc()){ 
            $filas[] = $fila;
        }
        $resultado->free(); 
        desconectarBD($mysqli); 
        return $filas;
    }
}

?>