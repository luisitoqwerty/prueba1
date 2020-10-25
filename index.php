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
    <div class="modal fade" id="Agregar_nuevo" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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


	<!-- Modal -->
	<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Actualizar juego</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmnuevoU">
						<input type="text" hidden="" id="idjuego" name="idjuego">
						<label>Nombre</label>
						<input type="text" class="form-control input-sm" id="nombre_a" name="nombre_a">
						<label>Año</label>
						<input type="text" class="form-control input-sm" id="anio_a" name="anio_a">
						<label>Empresa</label>
						<input type="text" class="form-control input-sm" id="empresa_a" name="empresa_a">
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-warning" id="btnActualizar">Actualizar</button>
				</div>
			</div>
		</div>
	</div>














    <div class='container'>
        <div class="row">
            <div class="col-sm-12">
                <div class="card text-left">
                    <div class="card-header">
                        tablas dinamicas con datatable y php
                    </div>
                    <div class="card-body">
                        <span class="btn btn-primary" data-toggle="modal" data-target="#Agregar_nuevo">
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
                        alertify.success("agregado con exito :D");
                    } else {

                        alertify.errror("fallo al agregar .(");

                    }
                }
            });
        });

        $('#btnActualizar').click(function() {
            datos = $('#frmnuevo_a').serialize();

            $.ajax({
                type: "POST",
                data: datos,
                url: "procesos/actualizar.php",
                success: function(r) {
                    if (r == 1) {
                        $('#tablaDatatable').load('tabla.php');
                        alertify.success("Actualizado con exito :D");
                    } else {
                        alertify.error("Fallo al actualizar :(");
                    }
                }
            });
        });


    });
</script>

<script type="text/javascript">
	function agregaFrmActualizar(idjuego) {
		$.ajax({
			type: "POST",
			data: "idjuego=" + idjuego,
			url: "procesos/obtenDatos.php",
			success: function(r) {
				datos = jQuery.parseJSON(r);
				$('#idjuego').val(datos['id_juego']);
				$('#nombre_a').val(datos['nombre']);
				$('#anio_a').val(datos['anio']);
				$('#empresa_a').val(datos['empresa']);
			}
		});
	}

	function eliminarDatos(idjuego) {
		alertify.confirm('Eliminar un juego', '¿Seguro de eliminar este juego pro :(?', function() {

			$.ajax({
				type: "POST",
				data: "idjuego=" + idjuego,
				url: "procesos/eliminar.php",
				success: function(r) {
					if (r == 1) {
						$('#tablaDatatable').load('tabla.php');
						alertify.success("Eliminado con exito !");
					} else {
						alertify.error("No se pudo eliminar...");
					}
				}
			});

		}, function() {

		});
	}
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $('#tablaDatatable').load('tabla.php');

    });
</script>