<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <?php require_once "scripts.php" ?>
</head>

<body>


    <!-- Modal -->
    <div class="modal fade" id="modal_Agregar_nuevo" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmnuevo">
                        <label>nombre</label>
                        <input type="text" class="form-control input-sm" id="nombre" name="nombre">
                        <label>año</label>
                        <input type="text" class="form-control input-sm" id="anio" name="anio">
                        <label>empresa </label>
                        <input type="text" class="form-control input-sm" id="empresa" name="empresa">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" id="btnagregar_nuevo" name="btnagregar_nuevo" class="btn btn-primary">Agregar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal cerrar -->


    <div class='container'>
        <div class="row">
            <div class="col-sm-12">
                <div class="card text-left">
                    <div class="card-header">
                        tablas dinamicas con datatable y php
                    </div>
                    <div class="card-body">
                        <span class="btn btn-primary" data-toggle="modal" data-target="#modal_Agregar_nuevo">
                            Agregar nuevo <span class="fas fa-plus"></span>
                        </span>
                        <hr>
                        <div id="tablaDatatable"></div>
                    </div>
                    <div class="card-footer text-muted">
                        por luis fernando
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>


<script type="text/javascript">
    $(document).ready(function() {
        $('#btnagregar_nuevo').click(function() {
            datos = $('#frmnuevo').serialize();
            $.ajax({
                type: "POST",
                data: datos,
                url: "procesos/agregar.php",
                success: function(r) {
                    if (r == 1) {
                        $('#tablaDatatable').load('tabla.php');
                        alertify.success("agregado con exito gracias por su compra");
                    } else {

                        alertify.errror("fallo al agregar .(");

                    }
                }
            });
        });
    });
</script>




<script type="text/javascript">
    $(document).ready(function() {
        $('#tablaDatatable').load('tabla.php');

    });
</script>