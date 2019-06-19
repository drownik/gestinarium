<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <section class="section section-lg bg-default">
        <div class="container">
            <div class="row row-70 justify-content-center mt-5">
                <div class="col-md-3 mt-5">
                    <?php if(validation_errors()) { ?>
                        <div class="alert alert-danger" role="alert">
                          <?php echo validation_errors(); ?>
                        </div>
                    <?php } ?>
                    <div class="brand__name col-md-10">
                        <img src="<?php echo base_url('assets/images/'); ?>logo-default-380x100.png" alt="" width="190" height="50"/>
                    </div>
                    <div class="col-md-10">
                      <?php echo form_open('login', array('class' => 'rd-mailform')); ?>
                      <div class="form-group">
                          <?php
                            echo form_label('Nombre de usuario', 'username', array('class' => 'mt-1')); 
                            echo form_input(array('id' => 'username', 'class' => 'form-control','name' => 'username'));
                            echo form_label('Password', 'password', array('class' => 'mt-1')); 
                            echo form_password(array('id' => 'password', 'class' => 'form-control','name' => 'password'));
                            echo form_submit('mysubmit', 'Login', 'class="button button-xs button-primary mt-3 ml-5"');
                          ?>
                      </div>
                        <?php echo form_close();?>
                    </div>
                </div>
            </div>
    </section>