<?php if($msg = $this->session->flashdata('msg')): ?>
  <div class="alert alert-success text-center" role="alert">
    <?= $msg ?>
  </div>
<?php endif; ?>


<h3 class="text-center">Sub Familias</h3>
    <div class="row form-inline">
        <a href="<?=base_url('subfamilias/')?>nuevo" class="btn btn-info btn-sm" role="button" >Nuevo</a>
        <input class="col-md-11" type="text" id="mainsearch" name="mainsearch" class="form-control" value="" placeholder="Buscar...."> 
    </div>
    <div class="row">
      <table class="table w-auto small" >
        <thead class="thead-dark">
          <tr>
            <th scope="col">Codigo.Familia</th>
            <th scope="col">Familia</th>
            <th scope="col">Codigo.Sub.Familia</th>
            <th scope="col">Descripción</th>
            <th scope="col">Descripción.Abreviada</th>
            <th scope="col">Estado</th>
            <th scope="col">Creado</th>
            <th scope="col">Modificado</th>
            <th scope="col" style="padding-right: 100px;">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php 
$codigofamilia = 'Codigo.Familia';
$codigosubfamilia = 'Codigo.Sub.Familia';
$abrev = 'Descripción.Abreviada';
          foreach($data as $item): ?>
          <tr>
            <th scope="row"><?= $item->$codigofamilia ?></th>
            <td><?= $item->Familia ?></td>
            <td><?= $item->$codigosubfamilia ?></td>  
      	    <td><?= $item->Descripción ?></td>
            <td><?= $item->$abrev ?></td>
            <td><?= $item->Estado ?></td>
            <td><?= $item->Creado ?></td>
            <td><?= $item->Modificado ?></td>
            
            

            <td >
                <a class="btn btn-warning btn-sm" href="<?=base_url('subfamilias/editar/'.$item->$codigosubfamilia)?>" role="button">Editar</a> <a class="btn btn-danger btn-sm" href="#" data-id="<?=$item->$codigosubfamilia?>" id="delete" role="button">Eliminar</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div> 

<?= $this->pagination->create_links() ?>
