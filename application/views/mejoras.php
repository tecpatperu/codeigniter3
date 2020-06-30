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
 
<h3 class="text-center">Mejoras</h3>
    <div class="row form-inline">
        <a href="<?=base_url('mejoras/')?>nuevo" class="btn btn-info btn-sm" role="button" >Nuevo</a>
        <input class="col-md-11" type="text" id="mainsearch" name="mainsearch" class="form-control" value="" placeholder="Buscar...."> 
    </div>
    <div id="div1" class="row">
      
      <table  class="table w-auto small"  >
        <thead class="thead-dark">
          <tr>
            <th scope="col">Codigo</th>
            <th scope="col">Descripción.Activo</th>
            <th scope="col">Sec.</th>
            <th scope="col">Fecha</th>
            <th scope="col">Concepto.Mejora</th>
            <th scope="col">Fecha.Registro</th>
         

            <th scope="col" style="padding-right: 100px;">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php 

          foreach($data as $item): ?>
          

          <tr><td style="display:none;"><?= $item['Codigo'] ?></td>
            <td scope="row"><?= $item['Codigo'] ?></td>
            <td scope="row"><?= $item['Descripcion.Activo'] ?></td>
            <td scope="row"><?= $item['Sec.'] ?></td>
            <td scope="row"><?= $item['Fecha'] ?></td>
            <td scope="row"><?= $item['Concepto.Mejora'] ?></td>
            <td scope="row"><?= $item['Fecha.Registro'] ?></td>


            <td >
                <a class="btn btn-warning btn-sm view_detailmejora" href="<?=base_url('mejoras/editar/'.$item['Codigo'])?>" role="button">Editar</a> <a class="btn btn-danger btn-sm" href="#" data-id="<?=$item['Codigo']?>" id="delete" role="button">Eliminar</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
   
    </div> 

<?= $this->pagination->create_links() ?>
