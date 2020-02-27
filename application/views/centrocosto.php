<?php if($msg = $this->session->flashdata('msg')): ?>
  <div class="alert alert-success text-center" role="alert">
    <?= $msg ?>
  </div>
<?php endif; ?>


<h3 class="text-center">Centro de costos</h3>
    <div class="row form-inline">
        <a href="<?=base_url('centroscosto/')?>nuevo" class="btn btn-info btn-sm" role="button" >Nuevo</a>
          <input class="col-md-11" type="text" id="mainsearch" name="mainsearch" class="form-control" value="" placeholder="Buscar...."> 
    </div>
    <div class="row">
      <table class="table w-auto small" >
        <thead class="thead-dark">
          <tr>
            <th scope="col">id</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Descripcion Abreviada</th>
            <th scope="col">Fecha Registro</th>
            <th scope="col">Fecha Modificado</th>
            <th scope="col">Estado</th>
            <th scope="col" style="padding-right: 100px;">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($data as $item): ?>
          <tr>
            <th scope="row"><?= $item->CC_ID ?></th>
            <td><?= $item->CC_DESCRIPCION ?></td>
            <td><?= $item->CC_ABREV?></td>  
      	    <td><?= $item->CC_FECREG ?></td>
            <td><?= $item->CC_FECMOD ?></td>
            <td><?= $item->CC_ESTADO == 1 ? 'activo' : 'inactivo' ?></td>

            <td >
                <a class="btn btn-warning btn-sm" href="<?=base_url('centroscosto/editar/'.$item->CC_ID)?>" role="button">Editar</a>  <a class="btn btn-danger btn-sm" href="#" data-id="<?=$item->CC_ID?>" id="delete" role="button">Eliminar</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div> 

<?= $this->pagination->create_links() ?>
