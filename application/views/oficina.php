<?php if($msg = $this->session->flashdata('msg')): ?>
  <div class="alert alert-success text-center" role="alert">
    <?= $msg ?>
  </div>
<?php endif; ?>
<style type="text/css">
  #div1 {
     overflow:auto;
     
     width:auto;
}

</style>
 
<h3 class="text-center">Oficinas</h3>
    <div class="row form-inline">
        <a href="<?=base_url('oficinas/')?>nuevo" class="btn btn-info btn-sm" role="button" >Nuevo</a>
        <input class="col-md-11" type="text" id="mainsearch" name="mainsearch" class="form-control" value="" placeholder="Buscar...."> 
    </div>
    <div id="div1" class="row">
      
      <table  class="table w-auto small"  >
        <thead class="thead-dark">
          <tr>
            <th scope="col">Codigo.Sede</th>
            <th scope="col">Sede</th>
            <th scope="col">Codigo.Local</th>
            <th scope="col">Local</th>
            <th scope="col">Codigo.Area</th>
            <th scope="col">Area</th>
            <th scope="col">Codigo.Oficina</th>
            <th scope="col">Oficina</th>
            <th scope="col">Abreviatura.Oficina</th>
            <th scope="col">Estado</th>
            <th scope="col">Creado</th>
            <th scope="col">Modificado</th>
            <th scope="col">Codigo.Responsable</th>
            <th scope="col">Responsable</th>
            <th scope="col">Codigo.Supervisor</th>
            <th scope="col">Supervisor</th>
            <th scope="col">Codigo.Edificio</th>
            <th scope="col">Edificio</th>
            <th scope="col">Codigo.Piso</th>
            <th scope="col">Piso</th>

            <th scope="col" style="padding-right: 100px;">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $codigosede = 'Codigo.Sede';
          $codigolocal = 'Codigo.Local';
          $codigoarea = 'Codigo.Area';
          $codigooficina = 'Codigo.Oficina';
          $abrev = 'Abreviatura.Oficina';
          $codigoresponsable = 'Codigo.Responsable';
          $codigosupervisor = 'Codigo.Supervisor';
          $codigoedificio = 'Codigo.Edificio';
          $codigopiso = 'Codigo.Piso';

          foreach($data as $item): ?>
          <tr>
            <th scope="row"><?= $item->$codigosede ?></th>
            <th scope="row"><?= $item->Sede ?></th>
            <td><?= $item->$codigolocal ?></td>
            <th scope="row"><?= $item->Local ?></th>
            <td><?= $item->$codigoarea ?></td> 
            <th scope="row"><?= $item->Area ?></th> 
      	    <td><?= $item->$codigooficina ?></td>
            <th scope="row"><?= $item->Oficina ?></th>
            <th scope="row"><?= $item->$abrev ?></th>
            <td><?= $item->Estado ?></td>
            <th scope="row"><?= $item->Creado ?></th> 
            <th scope="row"><?= $item->Modificado ?></th>    
            <th scope="row"><?= $item->$codigoresponsable ?></th>
            <th scope="row"><?= $item->Responsable ?></th>
            <th scope="row"><?= $item->$codigosupervisor ?></th>
            <th scope="row"><?= $item->Supervisor ?></th>
            <th scope="row"><?= $item->$codigoedificio ?></th>
            <th scope="row"><?= $item->Edificio ?></th>
            <th scope="row"><?= $item->$codigopiso ?></th>
            <th scope="row"><?= $item->Piso ?></th>

            <td >
                <a class="btn btn-warning btn-sm" href="<?=base_url('oficinas/editar/'.$item->$codigooficina)?>" role="button">Editar</a> <a class="btn btn-danger btn-sm" href="#" data-id="<?=$item->$codigooficina?>" id="delete" role="button">Eliminar</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
   
    </div> 

<?= $this->pagination->create_links() ?>
