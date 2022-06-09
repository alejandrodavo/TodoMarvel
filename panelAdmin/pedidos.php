<?php
require("conexion.php");
class Pedido{
    private $id_pedido;
    private $id_usuario;
    private $username;
    private $pedido;
    private $tipo;
    private $comentario;
    private $fecha;
    private $estado;
    
    function __construct ($id_pedido, $id_usuario, $username, $pedido, $tipo, $comentario, $fecha, $estado){
        $this->id_pedido=$id_pedido;
        $this->id_usuario=$id_usuario;
        $this->username=$username;
        $this->pedido=$pedido;
        $this->tipo=$tipo;
        $this->comentario=$comentario;
        $this->fecha=$fecha;
        $this->estado=$estado;

    }

    static function filas_totales(){
        $mysqli = conectarBD(); 
        $sql="SELECT * FROM pedidos";
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
		$sql = "insert into pedidos values(null,'$this->id_usuario','$this->username', '$this->pedido','$this->tipo', '$this->comentario', '$this->fecha', '$this->estado')";	
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
        $sql = "update pedidos set estado='$this->estado' where id_pedido='$idModif'";
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
        $sql="SELECT * FROM pedidos";
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
        $sql="SELECT * FROM pedidos where id_pedido = '$id'";
        $resultado = $mysqli->query($sql);
        $fila = $resultado->fetch_assoc();
        $resultado->free(); 
        desconectarBD($mysqli);
        return $fila;
    }
    static function devolver_filas_ventana($cuantos,$inicio){
        $filas = array();
        $mysqli = conectarBD(); 
        $sql="SELECT * FROM pedidos order by fecha desc limit $inicio,$cuantos";
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
        $sql = "delete from pedidos where id_pedido=".$this->id_pedido;
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


}

?>