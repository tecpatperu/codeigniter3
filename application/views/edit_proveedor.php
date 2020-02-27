 

<div class="container-fluid">
   
    <form method="POST" action="<?= base_url('proveedor/update') ?>">
        <br>
    <h4 class = "text-left">proveedor</h4>
    <div class="card">
        <div class="card-body">
                
                 <div class="form-group row">
                         
                            <label class="col-sm-3 col-form-label" for="">Tipo Documento</label>
                            <select class="col-sm-4" style="height:35px"  name="PRO_IDDOC" class="custom-select">
                                <option   value="">Seleccione</option>
                                <option <?= set_value('iddoc',$proveedor['PRO_IDDOC']) == '1' ? 'selected' : ''; ?> value="1">DNI</option>
                                <option <?= set_value('iddoc',$proveedor['PRO_IDDOC']) == '6' ? 'selected' : ''; ?> value="6">RUC</option>
                                <option <?= set_value('iddoc',$proveedor['PRO_IDDOC']) == '0' ? 'selected' : ''; ?> value="0">OTRO</option>
                            </select>
                         
                            <div class="text-danger"><?= form_error('PRO_IDDOC') ?></div>   
                       
                 </div>
                <div class="form-group row">
                    
                        <label class="col-sm-3 col-form-label" for="">Documento</label>
                        <input  class="col-sm-4"  type="text" name="PRO_NUMDOC" class="form-control" placeholder="Numero Documento" value="<?=set_value('estado',isset($proveedor['PRO_NUMDOC']) ? $proveedor['PRO_NUMDOC']  : '0')?>">
                        <div class="text-danger"><?= form_error('user') ?></div>
              
                </div>


                <div class="form-group row">
                    <input type="hidden" name="idproveedor" value="<?=set_value('idproveedor',isset($proveedor['PRO_ID']) ? $proveedor['PRO_ID']  : '')?>" class="form-control" placeholder="">
                    <label class="col-sm-3 col-form-label" >Apellidos y Nombres</label>
                    <input class="col-sm-4" style="height:30px; type="text" name="descripcion" value="<?=set_value('descripcion',isset($proveedor['PRO_DESCRIPCION']) ? $proveedor['PRO_DESCRIPCION']  : '')?>" class="form-control-sm" placeholder="Apellidos y Nombres">
                    <?= form_error('descripcion','<p class="text-danger">','</p>') ?>
                </div>      
 
                <div class="form-group row"  >
                    <label  class="col-sm-3 col-form-label" >Activo</label>
                    <input  class="col-sm-1"  type="checkbox" id ="estado" name="estado" value="<?=set_value('estado',isset($proveedor['PRO_ESTADO']) ? $proveedor['PRO_ESTADO']  : '0')?>" class="form-control-sm " placeholder="">

                    <?= form_error('estado','<p class="text-danger">','</p>') ?>
                </div>    
  
            <div class="form-group row">
               
                    <label class="col-sm-3 col-form-label"  for="">Telefono</label>
                    <input  class="col-sm-4" style="height:30px;" name="telefono" class="form-control" type="text" placeholder="Numero teléfono" value="<?=set_value('telefono',isset($proveedor['PRO_TELEFONO']) ? $proveedor['PRO_TELEFONO']  : '')?>">
                    <div class="text-danger"><?= form_error('name') ?></div>   
          
            </div>
    
 
           <div class="form-group row">
             
                    <label class="col-sm-3 col-form-label"  for="">Email</label>
                    <input  class="col-sm-4"  style="height:30px;" name="email" class="form-control" type="text" placeholder="Email" value="<?=set_value('PRO_EMAIL',isset($proveedor['PRO_EMAIL']) ? $proveedor['PRO_EMAIL']  : '')?>">
                    <div class="text-danger"><?= form_error('name') ?></div>   
          
            </div>

        </div>
    </div>
    <br>
    <input type="submit" class="btn btn-primary btn-sm" value="Actualizar">
    <input type="button" class="btn btn btn-dark btn-sm" onclick="history.back();" value="Regresar a la lista ">
    </form>
</div>