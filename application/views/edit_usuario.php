 

<div class="container-fluid">
   
    <form method="POST" action="<?= base_url('usuario/update') ?>">
        <br>
    <h4 class = "text-center">Responsable</h4>
    <div class="card">
        <div class="card-body">
            <div class="form-group row">
            
                    
                    
                            <label  class="col-sm-3 col-form-label"  for="">Tipo Documento</label>
                             
                                <select class="col-sm-2" style="height:30px;"  id ="iddoc" name="RA_IDDOC" class="custom-select">
                                    <option   value="">Seleccione</option>
                                    <option <?= set_value('iddoc',$usuario['RA_IDDOC']) == '1' ? 'selected' : ''; ?> value="1">DNI</option>
                                    <option <?= set_value('iddoc',$usuario['RA_IDDOC']) == '6' ? 'selected' : ''; ?> value="6">RUC</option>
                                    <option <?= set_value('iddoc',$usuario['RA_IDDOC']) == '0' ? 'selected' : ''; ?> value="0">OTRO</option>
                                </select>
                            
                            <div class="text-danger"><?= form_error('RA_IDDOC') ?></div>   
                      
            </div> 


                   






   
            <div class="form-group row">
               
                    <label class="col-sm-3 col-form-label">Documento</label>
                    <input class="col-sm-2" style="height:30px;" type="text" name="documento" value="<?=set_value('documento',isset($usuario['RA_NUMDOC']) ? $usuario['RA_NUMDOC']  : '')?>" class="form-control-sm" placeholder="">
                    <?= form_error('documento','<p class="text-danger">','</p>') ?>
               
            </div>  
            <div class="form-group row">
                     <input type="hidden" name="idusuario" value="<?=set_value('idusuario',isset($usuario['RA_ID']) ? $usuario['RA_ID']  : '')?>" class="form-control" placeholder="">
                    <label  class="col-sm-3 col-form-label" >Apellidos y Nombres</label>
                    <input  class="col-sm-6" style="height:30px;"  type="text" name="descripcion" value="<?=set_value('descripcion',isset($usuario['RA_DESCRIPCION']) ? $usuario['RA_DESCRIPCION']  : '')?>" class="form-control-sm" placeholder="">
                    <?= form_error('descripcion','<p class="text-danger">','</p>') ?>
            </div>
  
            <div class="form-group row">  
                    <label class="col-sm-3 col-form-label" >Activo</label>
                     <input class="col-sm-1" style="height:30px" type="checkbox" id ="estado" name="estado" value="<?=set_value('estado',isset($usuario['RA_ESTADO']) ? $usuario['RA_ESTADO']  : '0')?>" class="form-control-sm " placeholder="">                    
                    <?= form_error('estado','<p class="text-danger">','</p>') ?>
             </div>
                  
 
            <div class="form-group row">  
                     <label class="col-sm-3 col-form-label" >Telefono</label>
                    <input class="col-sm-4" style="height:30px;" type="text" name="telefono" value="<?=set_value('telefono',isset($usuario['RA_TELEFONO']) ? $usuario['RA_TELEFONO']  : '')?>" class="form-control-sm" placeholder="">
                    <?= form_error('telefono','<p class="text-danger">','</p>') ?>
             </div>  

 
            <div class="form-group row">  
                     <label class="col-sm-3 col-form-label" >Email</label>
                    <input class="col-sm-4" style="height:30px;" type="text" name="email" value="<?=set_value('email',isset($usuario['RA_EMAIL']) ? $usuario['RA_EMAIL']  : '')?>" class="form-control-sm" placeholder="">
                    <?= form_error('email','<p class="text-danger">','</p>') ?>
             </div>  
        </div>
    </div>
    <br>
    <input type="submit" class="btn btn-primary btn-sm" value="Actualizar">
    <input type="button" class="btn btn btn-dark btn-sm" onclick="history.back();" value="Regresar a la lista ">
    </form>
</div>