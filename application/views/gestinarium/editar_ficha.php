<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

	<section class="section section-lg bg-default">
    <div class="container">
      <div class="row row-70 justify-content-md-center justify-content-xl-between">
        <div class="col-md-12 col-lg-10 col-xl-6">
          <?php if($id_mascota) {?>
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

                  if($id_mascota) {
                      echo '<input type="hidden" name="id" value="'.$id_mascota.'" />';
                      echo form_input(array('id' => 'nombre', 'class' => 'form-control','name' => 'nombre', 'value' => $mascota['nombre']));
                    } else {
                      echo form_input(array('id' => 'nombre', 'class' => 'form-control','name' => 'nombre'));
                    }
                  ?>

                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <?php
                    echo form_label('Fecha de nacimiento', 'fecha_nacimiento', array('class' => 'mt-1')); 
                    if($id_mascota) {
                  ?>
                    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control col-md-6 float-right" value=<?php echo '"'.$mascota['fecha_nacimiento'].'"'; ?>>
                  <?php
                    } else {
                  ?>
                    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control col-md-6 float-right" value="">  
                  <?php
                    }
                  ?>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <select class="form-control" name="fk_cliente">
                  <?php
                    if ($id_mascota) { 
                          foreach($clientes as $key => $value) {
                            if($value['id'] == $mascota['fk_cliente']) {
                              echo '<option value="'.$value['id'].'" selected>'.ucfirst($value['nombre']).'</option>';
                            } else {
                              echo '<option value="'.$value['id'].'">'.ucfirst($value['nombre']).'</option>';
                            }
                          } 
                        } else { 
                          foreach($clientes as $key => $value) {
                            echo '<option value="" selected disabled hidden>Seleccionar Propietario</option>';
                            echo '<option value="'.$value['id'].'">'.ucfirst($value['nombre']).'</option>';
                          }
                        }
                  ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row col-md-12 mt-1">
              <div class="col-md-4">
                <div class="form-group">
                  <select class="form-control" name="fk_especie">
                  <?php
                    if ($id_mascota) { 
                          foreach($especies as $key => $value) {
                            if($value['id'] == $mascota['fk_especie']) {
                              echo '<option value="'.$value['id'].'" selected>'.ucfirst($value['nombre']).'</option>';
                            } else {
                              echo '<option value="'.$value['id'].'">'.ucfirst($value['nombre']).'</option>';
                            }
                          } 
                        } else { 
                          echo '<option value="" selected disabled hidden>Seleccionar Especie</option>';
                          foreach($especies as $key => $value) {
                            echo '<option value="'.$value['id'].'">'.ucfirst($value['nombre']).'</option>';
                          }
                        }
                  ?>
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <?php echo form_label('Raza', 'raza', array('class' => 'form-label')); 
                    if($id_mascota) {
                        echo form_input(array('id' => 'raza', 'class' => 'form-control','name' => 'raza', 'value' => $mascota['raza']));
                      } else {
                        echo form_input(array('id' => 'raza', 'class' => 'form-control','name' => 'raza'));
                      }
                  ?>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <select class="form-control" name="fk_genero">
                  <?php
                    if ($id_mascota) { 
                            if($mascota['fk_genero'] == 1) {
                              echo '<option value="'.$mascota['fk_genero'].'" selected>Macho</option>';
                              echo '<option value="2">Hembra</option>';
                            } else {
                              echo '<option value="2" selected>Hembra</option>';
                              echo '<option value="1">Macho</option>';
                            }
                        } else { 
                          echo '<option value="" selected disabled hidden>Seleccionar género</option>';
                          echo '<option value="1">Macho</option>';
                          echo '<option value="2">Hembra</option>';
                        }
                  ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row col-md-12 mt-1">
              <div class="form-group col-md-8">
                <?php echo form_label('Enfermedades crónicas', 'enfermedades_cronicas', array('class' => 'form-label')); 
                  if($id_mascota) {
                      echo form_input(array('id' => 'enfermedades_cronicas', 'class' => 'form-control col-md-12','name' => 'enfermedades_cronicas', 'value' => $mascota['enfermedades_cronicas']));
                    } else {
                      echo form_input(array('id' => 'enfermedades_cronicas', 'class' => 'form-control col-md-12','name' => 'enfermedades_cronicas'));
                    }
                ?>
              </div>
            </div>
            <div class="row col-md-12 mt-1">
              <div class="form-group col-md-8">
                <?php echo form_label('Alergias', 'alergias', array('class' => 'form-label')); 
                  if($id_mascota) {
                      echo form_input(array('id' => 'alergias', 'class' => 'form-control col-md-12','name' => 'alergias', 'value' => $mascota['alergias']));
                    } else {
                      echo form_input(array('id' => 'alergias', 'class' => 'form-control col-md-12','name' => 'alergias'));
                    }
                ?>
              </div>
            </div>
            <div class="row col-md-12 mt-1">
              <div class="form-group col-md-8">
                <?php echo form_label('Notas adicionales', 'notas', array('class' => 'form-label')); 
                  if($id_mascota) {
                      echo form_textarea(array('id' => 'notas', 'class' => 'form-control col-md-12','name' => 'notas', 'value' => $mascota['notas']));
                    } else {
                      echo form_textarea(array('id' => 'notas', 'class' => 'form-control col-md-12','name' => 'notas'));
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

