<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

	<section class="section section-lg bg-default">
    <div class="container">
      <div class="row row-70 justify-content-md-center justify-content-xl-between">
        <div class="col-md-12 col-lg-10 col-xl-6">
          <?php if($id_consulta) {?>
            <h3 class="border-bottom border-primary">Editar consulta</h3>
          <?php } else { ?>
            <h3 class="border-bottom border-primary">Redactar consulta</h3>
          <?php } ?>
        </div>
          <div class="col-md-12 col-lg-12 col-xs-12">
            <?php echo form_open('gestinarium/post_consulta', array('class' => 'rd-mailform')); ?>
            <div class="row col-md-12">
              <div class="col-md-3">
                <div class="form-group">
                  <?php
                  if ($id_consulta) { 
                    echo '<input type="hidden" name="id" value="'.$id_consulta.'" />';
                    echo '<input type="hidden" name="fk_mascota" value="'.$mascotas['id'].'" />';
                    echo '<select class="form-control" name="fk_mascota" disabled required>';
                    echo '<option value="'.$mascotas['id'].'" selected>'.ucfirst($mascotas['nombre']).'</option>';
                  } else { 
                    echo '<select class="form-control" name="fk_mascota" required>';
                    echo '<option value="" selected disabled hidden>Seleccionar Mascota</option>';
                    foreach($mascotas as $key => $value) {
                      echo '<option value="'.$value['id'].'">'.ucfirst($value['nombre']).'</option>';
                    }
                  } ?>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <h4>Pruebas médicas realizadas: </h4>
                  <!-- <select class="form-control"> -->
                  <?php echo form_multiselect('pruebas_medicas[]',$pruebas_medicas['pruebas_medicas'],$pruebas_medicas['pruebas_realizadas'],'class="form-control"'); ?>
                </div>
              </div>
            </div>
            <div class="row col-md-12">
              <div class="col-md-6">
                 <?php echo form_label('Motivo de la visita', 'motivo_visita', array('class' => 'form-label')); 
                  if($id_consulta) {
                      echo '<input type="hidden" name="id" value="'.$id_consulta.'" />';
                      echo form_input(array('id' => 'motivo_visita', 'class' => 'form-control','name' => 'motivo_visita', 'required' => 'required', 'value' => $consulta['motivo_visita']));
                    } else {
                      echo form_input(array('id' => 'motivo_visita', 'class' => 'form-control','name' => 'motivo_visita', 'required' => 'required'));
                    }
                  ?>
              </div>
            </div>
            <div class="row col-md-12">
              <div class="col-md-12">
              	<div class="form-wrap">
                	<div class="form-group">
                  	<?php 
                      echo form_label('Diagnóstico', 'diagnostico', array('class' => 'form-label'));
                      if($id_consulta) {
                        echo form_textarea(array('id' => 'diagnostico', 'class' => 'form-control','name' => 'diagnostico', 'required' => 'required', 'value' => $consulta['diagnostico']));
                      } else {
                  	    echo form_textarea(array('id' => 'diagnostico', 'class' => 'form-control','name' => 'diagnostico', 'required' => 'required'));
                      }
                    ?>
                	</div>
                </div>
                <div class="form-group">
              		<?php echo form_submit('mysubmit', 'Guardar', 'class="button button-xs button-primary"'); ?>
              	</div>
            </div>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </section>

