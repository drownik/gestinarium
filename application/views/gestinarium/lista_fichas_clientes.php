<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

	<section class="section section-lg bg-default">
    <div class="container">
      <div class="row row-70 justify-content-md-center justify-content-xl-between">
        <div class="col-md-6">
          <h3 class="border-bottom border-primary">Fichas de mascotas</h3>
        </div>
        <div class="col-md-6">
          <a class="button button-xs button-primary mt-2 mr-5 float-right" href=<?php echo '"'.base_url('gestinarium/editar_cliente/').'"'; ?>>Añadir ficha nueva</a>
        </div>
        <div class="col-md-12 col-lg-12 col-xs-12">
          <?php echo $datatable; ?>
        </div>
        </div>
      </div>
    </div>
  </section>
  <script type="text/javascript">
    $(document).ready( function () {
      $('#fichas').dataTable( {
        "columnDefs": [ {
        "targets": 0,
        "data": "ver_ficha",
          "render": function ( data, type, row, meta ) {
            return '<a href="'+data+'">Ver ficha</a>';
          }
        } ]
      } );
    } );
  </script>

