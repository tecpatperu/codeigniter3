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
  

<h3 class="text-center">Contratos</h3>
    <div class="row form-inline">
        <a href="<?=base_url('contratos/')?>nuevo" class="btn btn-info btn-sm" role="button" >Nuevo</a>
          <input class="col-md-11" type="text" id="mainsearch" name="mainsearch" class="form-control" value="" placeholder="Buscar...."> 
    </div>
       <div id="div1" class="row">
      <table class="table w-auto small" >
        <thead class="thead-dark">
          <tr>
            <th scope="col">Codigo</th>
            <th scope="col">Tipo.Documento</th>
            <th scope="col">Documento</th>
            <th scope="col">Numero.Documento</th>
            <th scope="col">Modalidad</th>
            <th scope="col">Fecha.Doc.</th>
            <th scope="col">Fecha.Inicio</th>
            <th scope="col">Fecha.Fin</th>
            <th scope="col">Numero.Cuotas</th>
            <th scope="col">Importe</th>
            <th scope="col">Observaciones</th>
            <th scope="col">Estado</th>
            <th scope="col">Creado</th>
            <th scope="col">Modificado</th>
            <th scope="col">Estado.Depreciacion</th>

            <th scope="col" style="padding-right: 100px;">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $tipodocumento = 'Tipo.Documento';
          $numerodocumento = 'Numero.Documento';
          $fechadoc = 'Fecha.Doc.';
          $fechainicio = 'Fecha.Inicio';
          $fechafin = 'Fecha.Fin';
          $numerocuotas = 'Numero.Cuotas';
          $estadodepreciacion = 'Estado.Depreciacion';




           foreach($data as $item): ?>
          <tr>
            <th scope="row"><?= $item->Codigo ?></th>
            <td><?= $item->$tipodocumento ?></td>
            <td><?= $item->Documento ?></td>  
            <td><?= $item->$numerodocumento ?></td>  
            <td><?= $item->Modalidad ?></td>  
            <td><?= $item->$fechadoc ?></td>  
            <td><?= $item->$fechainicio ?></td>  
            <td><?= $item->$fechafin ?></td>  
            <td><?= $item->$numerocuotas ?></td>
      	    <td><?= $item->Importe ?></td>
            <td><?= $item->Observaciones ?></td>
            <td><?= $item->Estado ?></td>
            <td><?= $item->Creado ?></td>
            <td><?= $item->Modificado ?></td>
            <td><?= $item->$estadodepreciacion ?></td>


            <td >
                <a class="btn btn-warning btn-sm" href="<?=base_url('contratos/editar/'.$item->Codigo)?>" role="button">Editar</a>  <a class="btn btn-danger btn-sm" href="#" data-id="<?=$item->Codigo?>" id="delete" role="button">Eliminar</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div> 

<?= $this->pagination->create_links() ?>
