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
 
<h3 class="text-center">Bienes</h3>
    <div class="row form-inline">
        <a href="<?=base_url('bienes/')?>nuevo" class="btn btn-info btn-sm" role="button" >Nuevo</a>
        <input class="col-md-11" type="text" id="mainsearch" name="mainsearch" class="form-control" value="" placeholder="Buscar...."> 
    </div>
    <div id="div1" class="row">
      
      <table  class="table w-auto small"  >
        <thead class="thead-dark">
          <tr>
            <th scope="col">Codigo</th>
            <th scope="col">Ficha</th>
            <th scope="col">Codigo Barra</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Componente de </th>
            <th scope="col">Codigo.Principal</th>
            <th scope="col">Modelo</th>
            <th scope="col">Serie</th>

            <th scope="col" style="padding-right: 100px;">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php 

          foreach($data as $item): ?>
          <tr><td style="display:none;"><?= $item->Id ?></td>
            <td scope="row"><?= $item->Codigo ?></td>
            <td scope="row"><?= $item->Ficha ?></td>
            <td scope="row"><?= $item->Codigo_Barra ?></td>
            <td scope="row"><?= $item->Descripcion ?></td>
            <td scope="row"><?= $item->Componente_de ?></td> 
            <th scope="row"><?= $item->Codigo_Principal ?></td> 
      	    <td scope="row"><?= $item->Modelo ?></td>
            <td scope="row"><?= $item->Serie ?></td>



            <td >
                <a class="btn btn-warning btn-sm" href="<?=base_url('bienes/editar/'.$item->Id)?>" role="button">Editar</a> <a class="btn btn-danger btn-sm" href="#" data-id="<?=$item->Id?>" id="delete" role="button">Eliminar</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
   
    </div> 

<?= $this->pagination->create_links() ?>
