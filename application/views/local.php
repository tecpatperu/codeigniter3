<?php if($msg = $this->session->flashdata('msg')): ?>
  <div class="alert alert-success text-center" role="alert">
    <?= $msg ?>
  </div>
<?php endif; ?>


<h3 class="text-center">Locales</h3>
    <div class="row form-inline">
        <a href="<?=base_url('locales/')?>nuevo" class="btn btn-info btn-sm" role="button" >Nuevo</a>
        <input class="col-md-11" type="text" id="mainsearch" name="mainsearch" class="form-control" value="" placeholder="Buscar...."> 
    </div>
    <div class="row">
      <table class="table w-auto small" >
        <thead class="thead-dark">
          <tr>
            <th scope="col">Codigo.Local</th>
            <th scope="col">Sede</th>
            <th scope="col">Codigo.Sede</th>
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
$codigosede = 'Codigo.Sede';
$codigolocal = 'Codigo.Local';
$abrev = 'Descripción.Abreviada';

          foreach($data as $item): ?>
          <tr>
            <th scope="row"><?= $item->$codigolocal ?></th>
            <td><?= $item->Sede ?></td>
            <td><?= $item->$codigosede ?></td>  
      	    <td><?= $item->Descripción ?></td>
            <td><?= $item->$abrev ?></td>
            <td><?= $item->Estado ?></td>
            <td><?= $item->Creado ?></td>
            <td><?= $item->Modificado ?></td>     
            
            <td >
                <a class="btn btn-warning btn-sm" href="<?=base_url('locales/editar/'.$item->$codigolocal)?>" role="button">Editar</a> <a class="btn btn-danger btn-sm" href="#" data-id="<?=$item->$codigolocal?>" id="delete" role="button">Eliminar</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div> 

<?= $this->pagination->create_links() ?>
