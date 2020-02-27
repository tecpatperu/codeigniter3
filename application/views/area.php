<?php if($msg = $this->session->flashdata('msg')): ?>
  <div class="alert alert-success text-center" role="alert">
    <?= $msg ?>
  </div>
<?php endif; ?>


<h3 class="text-center">Areas</h3>
    <div class="row form-inline">
        <a href="<?=base_url('areas/')?>nuevo" class="btn btn-info btn-sm" role="button" >Nuevo</a>
        <input class="col-md-11" type="text" id="mainsearch" name="mainsearch" class="form-control" value="" placeholder="Buscar...."> 
    </div>
    <div class="row">
      <table class="table w-auto small" >
        <thead class="thead-dark">
          <tr>
            <th scope="col">Codigo.Area</th>
            <th scope="col">Area</th>
            <th scope="col">Abreviatura.Area</th>
            <th scope="col">Estado</th>
            <th scope="col">Creado</th>
            <th scope="col">Modificado</th>
            <th scope="col">Codigo.Edificio</th>
            <th scope="col">Edificio</th>
            <th scope="col">Codigo.Piso</th>
            <th scope="col">Piso</th>
            <th scope="col" style="padding-right: 100px;">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $codigoarea = 'Codigo.Area';
          $abrev = 'Abreviatura.Area';
          $codigopiso = 'Codigo.Piso';
          $codigoedificio = 'Codigo.Edificio';
          foreach($data as $item): ?>
          <tr>
            <th scope="row"><?= $item->$codigoarea ?></th>
            <td><?= $item->Area ?></td>
            <td><?= $item->$abrev ?></td>  
      	    <td><?= $item->Estado ?></td>
            <td><?= $item->Creado ?></td>  
            <td><?= $item->Modificado ?></td>  
            <td><?= $item->$codigoedificio ?></td>  
            <td><?= $item->Edificio ?></td>  
            <td><?= $item->$codigopiso ?></td>  
            <td><?= $item->Piso ?></td>  
            
            <td >
                <a class="btn btn-warning btn-sm" href="<?=base_url('areas/editar/'.$item->$codigoarea)?>" role="button">Editar</a> <a class="btn btn-danger btn-sm" href="#" data-id="<?=$item->$codigoarea?>" id="delete" role="button">Eliminar</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div> 

<?= $this->pagination->create_links() ?>
