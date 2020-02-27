<?php if($msg = $this->session->flashdata('msg')): ?>
  <div class="alert alert-success text-center" role="alert">
    <?= $msg ?>
  </div>
<?php endif; ?>


<h3 class="text-center">Proveedores</h3>
    <div class="row form-inline">
        <a href="<?=base_url('proveedores/')?>nuevo" class="btn btn-info btn-sm" role="button" >Nuevo</a>
       <input class="col-md-11" type="text" id="mainsearch" name="mainsearch" class="form-control" value="" placeholder="Buscar...."> 
    </div>
    <div class="row">
      <table class="table w-auto small" >
        <thead class="thead-dark">
          <tr>
            <th scope="col">Codigo</th>
            <th scope="col">Tipo</th>
            <th scope="col">Documento</th>
            <th scope="col">Nombre Completo</th>
            <th scope="col">Telefono</th>
            <th scope="col">E-Mail</th>
            <th scope="col">Estado</th>
            <th scope="col">Creado.el</th>
            <th scope="col">Modificado.el</th>
            <th scope="col" style="padding-right: 100px;">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $nombrecompleto = 'Nombre.Completo'; 
          $creado = 'Creado.el'; 
          $modificado = 'Modificado.el'; 
          $email = 'E-Mail';

          foreach($data as $item): ?>
          <tr>
            <th scope="row"><?= $item->Codigo ?></th>
            <td><?= $item->Tipo ?></td>
            <td><?= $item->Documento ?></td> 
            <td><?= $item->$nombrecompleto ?></td> 
            <td><?= $item->Telefono ?></td>  
            <td><?= $item->$email ?></td>  
            <td><?= $item->Estado ?></td>
            <td><?= $item->$creado ?></td>
            <td><?= $item->$modificado ?></td>

            <td >
                <a class="btn btn-warning btn-sm" href="<?=base_url('proveedores/editar/'.$item->Codigo)?>" role="button">Editar</a> <a class="btn btn-danger btn-sm" href="#" data-id="<?=$item->Codigo?>" id="delete" role="button">Eliminar</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div> 

<?= $this->pagination->create_links() ?>
