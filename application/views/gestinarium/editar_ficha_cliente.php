<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

	<section class="section section-lg bg-default">
    <div class="container">
      <div class="row row-70 justify-content-md-center justify-content-xl-between">
        <div class="col-md-12 col-lg-10 col-xl-6">
          <?php if($id_cliente) {?>
            <h3 class="border-bottom border-primary">Editar ficha</h3>
          <?php } else { ?>
            <h3 class="border-bottom border-primary">Nueva ficha</h3>
          <?php } ?>
        </div>
          <div class="col-md-12 col-lg-12 col-xs-12">
            <?php echo form_open('gestinarium/post_ficha', array('class' => 'rd-mailform')); ?>
            <div class="row col-md-12">
              <div class="col-md-2">
                <div class="form-group">
                  <?php echo form_label('Nombre', 'nombre', array('class' => 'form-label')); 
                  echo '<input type="hidden" name="calling_function" value="'.$this->router->fetch_method().'" />';

                  if($id_cliente) {
                      echo '<input type="hidden" name="id" value="'.$id_cliente.'" />';
                      echo form_input(array('id' => 'nombre', 'class' => 'form-control','name' => 'nombre', 'value' => $cliente['nombre']));
                    } else {
                      echo form_input(array('id' => 'nombre', 'class' => 'form-control','name' => 'nombre'));
                    }
                  ?>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                   <?php echo form_label('Apellidos', 'apellidos', array('class' => 'form-label')); 

                  if($id_cliente) {
                      echo form_input(array('id' => 'apellidos', 'class' => 'form-control','name' => 'apellidos', 'value' => $cliente['apellidos']));
                    } else {
                      echo form_input(array('id' => 'apellidos', 'class' => 'form-control','name' => 'apellidos'));
                    }
                  ?>
                </div>
              </div>
            </div>
            <div class="row col-md-12 mt-1">
              <div class="col-md-6">
                <div class="form-group">
                  <?php echo form_label('Domicilio', 'domicilio', array('class' => 'form-label'));

                    if($id_cliente) {
                      echo form_input(array('id' => 'domicilio', 'class' => 'form-control','name' => 'domicilio', 'value' => $cliente['domicilio']));
                    } else {
                      echo form_input(array('id' => 'domicilio', 'class' => 'form-control','name' => 'domicilio'));
                    }
                  ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row col-md-12 mt-1">
              <div class="form-group col-md-2">
                <?php echo form_label('Localidad', 'localidad', array('class' => 'form-label')); 
                  if($id_cliente) {
                      echo form_input(array('id' => 'localidad', 'class' => 'form-control col-md-12','name' => 'localidad', 'value' => $cliente['localidad']));
                    } else {
                      echo form_input(array('id' => 'localidad', 'class' => 'form-control col-md-12','name' => 'localidad'));
                    }
                ?>
              </div>
              <div class="form-group col-md-2">
                <?php echo form_label('Municipio', 'municipio', array('class' => 'form-label')); 
                  if($id_cliente) {
                      echo form_input(array('id' => 'municipio', 'class' => 'form-control col-md-12','name' => 'municipio', 'value' => $cliente['municipio']));
                    } else {
                      echo form_input(array('id' => 'municipio', 'class' => 'form-control col-md-12','name' => 'municipio'));
                    }
                ?>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <?php echo form_label('Código postal', 'cp', array('class' => 'form-label')); 
                    if($id_cliente) {
                        echo form_input(array('id' => 'cp', 'class' => 'form-control','name' => 'cp', 'value' => $cliente['cp']));
                      } else {
                        echo form_input(array('id' => 'cp', 'class' => 'form-control','name' => 'cp'));
                      }
                  ?>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <?php echo form_label('País', 'pais', array('class' => 'form-label')); 
                    if($id_cliente) {
                        echo form_input(array('id' => 'pais', 'class' => 'form-control','name' => 'pais', 'value' => $cliente['pais']));
                      } else {
                        echo form_input(array('id' => 'pais', 'class' => 'form-control','name' => 'pais'));
                      }
                  ?>
                </div>
              </div>
            </div>
            <div class="row col-md-12 mt-1">
              <div class="form-group col-md-4">
                <?php echo form_label('Email', 'email', array('class' => 'form-label')); 
                  if($id_cliente) {
                      echo form_input(array('id' => 'email', 'class' => 'form-control','name' => 'email', 'value' => $cliente['email']));
                    } else {
                      echo form_input(array('id' => 'email', 'class' => 'form-control','name' => 'email'));
                    }
                ?>
              </div>
            </div>
            <div class="row col-md-12 mt-1">
              <div class="form-group col-md-4">
                <?php echo form_label('Teléfono', 'telefono', array('class' => 'form-label')); 
                  if($id_cliente) {
                      echo form_input(array('id' => 'telefono', 'class' => 'form-control','name' => 'telefono', 'value' => $cliente['telefono']));
                    } else {
                      echo form_input(array('id' => 'telefono', 'class' => 'form-control','name' => 'telefono'));
                    }
                ?>
              </div>
            </div>
            <div class="row col-md-12 mt-1">
              <div class="form-group">
                <?php echo form_submit('mysubmit', 'Guardar', 'class="button button-xs button-primary"'); ?>
              </div>
            </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </section>

