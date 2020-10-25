<?php

class crud
{

    public function agregar($datos)
    {
        $obj = new conectar();
        $conexion = $obj->conexion();

        $sql ="INSERT into t_juegos (nombre,anio,empresa) values ('$datos[0]','$datos[1]','$datos[2]')";

        return mysqli_query($conexion, $sql);
    }
}

?>