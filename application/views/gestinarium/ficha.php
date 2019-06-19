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
          <h3 class="border-bottom border-primary">Ficha de <?php echo $mascota['nombre']; ?></h3>
        </div>
        <div class="col-md-12 col-lg-12 col-xs-12">
          <div class="col-md-6">
            <h4 class="d-inline">Propietario:</h4>
            <span><?php echo ucfirst($mascota['propietario']); ?></span>
          </div>
          <div class="col-md-6">
            <h4 class="d-inline">Especie:</h4>
            <span><?php echo ucfirst($mascota['especie']); ?></span>
          </div>
          <div class="col-md-6">
            <h4 class="d-inline">Raza:</h4>
            <span><?php echo $mascota['raza']; ?></span>
          </div>
          <div class="col-md-6">
            <h4 class="d-inline">Fecha nacimiento:</h4>
            <span><?php echo $mascota['fecha_nacimiento']; ?></span>
          </div>
          <div class="col-md-12">
            <h4 class="d-inline">Enfermedades crónicas:</h4>
            <span><?php echo $mascota['enfermedades_cronicas']; ?></span>
            <p></p>
          </div>
          <div class="col-md-12">
            <h4 class="d-inline">Alergias:</h4>
            <span><?php echo $mascota['alergias']; ?></span>
            <p></p>
          </div>
          <div class="col-md-12">
            <h4 class="d-inline">Notas adicionales:</h4>
            <span><?php echo $mascota['notas']; ?></span>
            <p></p>
          </div>
          <div class="col-md-12">
            <h4 class="mb-3">Historial de visitas:</h4>
            <?php echo $datatable; ?>
          </div>
          <div class="col-md-12">
            <a class="button button-xs button-primary mt-2" href=<?php echo '"'.base_url('gestinarium/editar_ficha/'.$mascota['id']).'"'; ?>>Editar</a>
          </div>
        </div>
      </div>
    </div>
  </section>