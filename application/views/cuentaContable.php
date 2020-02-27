<?php if($msg = $this->session->flashdata('msg')): ?>
  <div class="alert alert-success text-center" role="alert">
    <?= $msg ?>
  </div>
<?php endif; ?>


<h3 class="text-center">Cuentas Contables</h3>
    <div class="row form-inline">
        <a href="<?=base_url('cuentascontable/')?>nuevo" class="btn btn-info btn-sm" role="button" >Nuevo</a>
          <input class="col-md-11" type="text" id="mainsearch" name="mainsearch" class="form-control" value="" placeholder="Buscar...."> 
    </div>
    <div class="row">
      <table class="table w-auto small" >
        <thead class="thead-dark">
          <tr>
            <th scope="col">id</th>
            <th scope="col">Cuenta.Contable</th>
            <th scope="col">Tasa Tributaria</th>
            <th scope="col">Estado</th>
            <th scope="col">Creado</th>
            <th scope="col">Modificado</th>
            <th scope="col">Tiempo.Vida.Financiero</th>
            <th scope="col">Tasa.Anual.Financiero</th>
            <th scope="col">Tasa.Mensual.Financiero</th>

            <th scope="col" style="padding-right: 100px;">Acciones</th>
          </tr>
        </thead>
        <tbody>
           
          <?php    $cuentacontable = 'Cuenta.Contable';
          $tasatributaria = 'Tasa Tributaria';
          $TiempoVidaFinanciero = 'Tiempo.Vida.Financiero';
          $TasaAnualFinanciero = 'Tasa.Anual.Financiero';
          $TasaMensualFinanciero = 'Tasa.Mensual.Financiero';
            foreach($data as $item): ?>
          <tr>
            <th scope="row"><?= $item->Codigo ?></th>
            <td><?= $item->$cuentacontable ?></td>
            <td><?= $item->$tasatributaria ?></td>  
            <td><?= $item->Estado?></td>
            <td><?= $item->Creado ?></td>
            <td><?= $item->Modificado ?></td>
            <td><?= $item->$TiempoVidaFinanciero ?></td>
            <td><?= $item->$TasaAnualFinanciero ?></td>
            <td><?= $item->$TasaMensualFinanciero ?></td>

            <td >
                <a class="btn btn-warning btn-sm" href="<?=base_url('cuentascontable/editar/'.$item->Codigo)?>" role="button">Editar</a> <a class="btn btn-danger btn-sm" href="#" data-id="<?=$item->Codigo?>" id="delete" role="button">Eliminar</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div> 

<?= $this->pagination->create_links() ?>
