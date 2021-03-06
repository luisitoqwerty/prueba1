<?php

require_once "clases\conexion.php";
$obj = new conectar();
$conexion = $obj->conexion();

$sql = "SELECT id_juego, nombre, anio, empresa FROM t_juegos ";

$rusult = mysqli_query($conexion, $sql);

?>


<div>

    <table class="table table-hover table-condensed" id='iddatatable'>

        <thead style="background-color: #dc3545 ; color:white; font-weight:bold;">

            <tr>
                <td>nombre</td>
                <td>año</td>
                <td>empresa </td>
                <td>Editar</td>
                <td>Eliminar</td>


            </tr>
        </thead>

        <tfoot style="background-color: #ccc ; color:white; font-weight:bold;">
            <tr>
                <td>nombre</td>
                <td>año</td>
                <td>empresa </td>
                <td>Editar</td>
                <td>Eliminar</td>


            </tr>
        </tfoot>

        <tbody>
            <?php
            while ($mostrar = mysqli_fetch_row($rusult)) {
            ?>

                <tr>
                    <td><?php echo $mostrar[1] ?></td>
                    <td><?php echo $mostrar[2] ?></td>
                    <td><?php echo $mostrar[3] ?></td>
                    <td>
                        <span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEditar" onclick="agregaFrmActualizar('<?php echo $mostrar[0] ?>')">
                            <span class="fas fa-pencil-alt"></span>
                        </span>
                    </td>
                    <td>
                        <span class="btn btn-danger btn-sm" onclick="eliminarDatos('<?php echo $mostrar[0] ?>')">
                            <span class="fas fa-ban"></span>
                        </span>
                    </td>


                </tr>

            <?php
            }
            ?>


        </tbody>

    </table>


</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#iddatatable').DataTable();
    });
</script>