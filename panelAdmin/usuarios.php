<?php
include("conexion.php");
include("utilidadCodif.php");
class Usuario{
    private $id_usuario;
    private $correo;
    private $usu;
    private $pass;
    private $nombre;
    private $fechaN;
    private $avatar;
    
    function __construct ($id_usuario, $correo, $usu, $pass, $nombre, $fechaN, $avatar){
        $this->id_usuario=$id_usuario;
        $this->correo=$correo;
        $this->usu=$usu;
        $this->password=$pass;
        $this->nombre=$nombre;
        $this->fechaN=$fechaN;
        $this->avatar=$avatar;
    }

    static function filas_totales(){
        $mysqli = conectarBD(); 
        $sql="SELECT * FROM usuarios";
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

    static function existeUsuario(){
		
		$msg="";
		$passEncrip=encripta($this->pass,'ENCRIPT');
		$sql = "select count(*) as cuantos from usuarios 
		where nombre='$this->nombre' and pass='$passEncrip'";
		//echo $sql;
		$conexion=conectarBD();
		$res=$conexion->query($sql);
		$linea=$res->fetch_assoc();
		Conexion::desconectarBD($conexion);
		if($linea['cuantos']!=0)
			return true;
		else 
			return false;
		
	}

    static function crearCuenta($correo, $usu, $pass, $nombre, $fechaN, $avatar){
		$msg="";
		$passEncrip=encripta($pass,'ENCRIPT');
		$sql = "insert into usuarios values(null,'$correo','$usu','$passEncrip','$nombre','$fechaN','$avatar')";
		echo $sql;
		$conexion=conectarBD();
        $res=$conexion->query($sql);
        if ($conexion->error!="") { 
            echo "Error: La ejecución de la consulta falló debido a: \n"; 
            echo "Query: " . $sql . "\n"; 
            echo "Errno: " . $conexion->errno . "\n"; 
            echo "Error: " . $conexion->error . "\n"; 
            exit; 
        }
        desconectarBD($conexion); 
	}


    static function login($us,$ps){
        $msg="";
        $passEncrip=encripta($ps,'ENCRIPT');
		$sql = "select count(*) as cuantos from usuarios 
		where username='$us' and password='$passEncrip'";
		$conexion = conectarBD();	
		$res=$conexion->query($sql);
		$linea=$res->fetch_assoc();
        desconectarBD($conexion); 
		if($linea['cuantos']!=0)
			return true;
		else 
			return false;
    }

    static function recuperarContraseña($usu, $correo, $fechaN){
		$msg="";
        $mysqli = conectarBD(); 
		$sql = "select password from usuarios 
		where username='$usu' and correo='$correo' and fechaNacimiento='$fechaN'";
		$resultado = $mysqli->query($sql);
        if ($mysqli->error!="") { 
			echo "Error: La ejecución de la consulta falló debido a: \n"; 
			echo "Query: " . $sql . "<br>\n"; 
			echo "Errno: " . $conexion->errno . "<br>\n"; 
			echo "Error: " . $conexion->error . "<br>\n"; 
			exit; 
		}

        $fila = $resultado->fetch_assoc();
        if($fila==null)
        return $msg="ERROR";
        $pass=$fila['password'];
        $passEncrip=desEncripta($pass,'ENCRIPT');
        $resultado->free(); 
        desconectarBD($mysqli);
        return $passEncrip;
	}

    static function existeRecuperar(){
        $msg="";
		$sql = "select count(*) as cuantos from usuarios 
		where nombre='$this->nombre' and pass='$passEncrip'";
		//echo $sql;
		$conexion=Conexion::conectarBD();
		$res=$conexion->query($sql);
		$linea=$res->fetch_assoc();
		Conexion::desconectarBD($conexion);
		if($linea['cuantos']!=0)
			return true;
		else 
			return false;
    }



    static function devolver_todas_filas(){
        $filas = array();
        $mysqli = conectarBD(); 
        $sql="SELECT * FROM usuarios";
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
        $sql="SELECT * FROM usuarios where id_usuario = '$id'";
        $resultado = $mysqli->query($sql);
        $fila = $resultado->fetch_assoc();
        $passDecrip=desEncripta($fila["password"],"ENCRIPT");
        $fila["password"]=$passDecrip;
        $resultado->free(); 
        desconectarBD($mysqli);
        return $fila;
    }
    static function devolver_filas_ventana($cuantos,$inicio){
        $filas = array();
        $mysqli = conectarBD(); 
        $sql="SELECT * FROM usuarios limit $inicio,$cuantos";
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
        $sql="SELECT * FROM usuarios ".$condicion;
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
        $passEncrip=encripta($this->password,'ENCRIPT');
		$sql = "insert into usuarios values('null','$this->correo','$this->usu','$passEncrip','$this->nombre','$this->fechaN','$this->avatar')";	
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
        $sql = "delete from usuarios where id_usuario=".$this->id_usuario;
        $mysqli->query($sql);
        $num_filas=$mysqli->affected_rows;
        desconectarBD($mysqli);
        return $num_filas;
    }

    function modificar(){	
		$conexion = conectarBD();
        $passEncrip=encripta($this->password,'ENCRIPT');
        $sql = "update usuarios set correo='$this->correo', username='$this->usu',password='$passEncrip',nombre='$this->nombre' ,fechaNacimiento='$this->fechaN' where id_usuario=$this->id_usuario";
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

