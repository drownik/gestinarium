<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
  // echo "<pre>";
  // print_r($mascota);
  // echo "</pre>";
?>

	<section class="section section-lg bg-default">
    <div class="container">
      <div class="row row-70 justify-content-md-center justify-content-xl-between">
        <div class="col-md-12 col-lg-10 col-xl-6">
          <h3 class="border-bottom border-primary">Ficha de <?php echo $cliente['nombre'].' '.$cliente['apellidos']; ?></h3>
        </div>
        <div class="col-md-12 col-lg-12 col-xs-12">
          <div class="col-md-6">
            <h4 class="d-inline">Domicilio:</h4>
            <span><?php echo ucfirst($cliente['domicilio']); ?></span>
          </div>
          <div class="col-md-6">
            <h4 class="d-inline">Código postal:</h4>
            <span><?php echo ucfirst($cliente['cp']); ?></span>
          </div>
          <div class="col-md-6">
            <h4 class="d-inline">Localidad:</h4>
            <span><?php echo ucfirst($cliente['localidad']); ?></span>
          </div>
          <div class="col-md-6">
            <h4 class="d-inline">Municipio:</h4>
            <span><?php echo ucfirst($cliente['municipio']); ?></span>
          </div>
          <div class="col-md-6">
            <h4 class="d-inline">País:</h4>
            <span><?php echo ucfirst($cliente['pais']); ?></span>
          </div>
          <div class="col-md-6">
            <h4 class="d-inline">Email:</h4>
            <span><?php echo $cliente['email']; ?></span>
          </div>
          <div class="col-md-6">
            <h4 class="d-inline">Teléfono:</h4>
            <span><?php echo $cliente['telefono']; ?></span>
          </div>
          <div class="col-md-12">
            <h4 class="mb-3">Mascotas asociadas:</h4>
            <?php echo $datatable; ?>
          </div>
          <div class="col-md-12">
            <a class="button button-xs button-primary mt-2" href=<?php echo '"'.base_url('gestinarium/editar_cliente/'.$cliente['id']).'"'; ?>>Editar</a>
          </div>
        </div>
      </div>
    </div>
  </section>