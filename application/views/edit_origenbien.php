 

<div class="container-fluid">
   
    <form method="POST" action="<?= base_url('Origenbien/update') ?>">
        <br>
    <h4 class = "text-left">Origen bien</h4>
    <div class="card">
        <div class="card-body">
       
                <div class="form-group row">
                    <input type="hidden" name="idOrigenbien" value="<?=set_value('idOrigenbien',isset($origenbien['OR_ID']) ? $origenbien['OR_ID']  : '')?>" class="form-control" placeholder="">
                    <label class="col-sm-3 col-form-label" >Descripcion</label>
                    <input class="col-sm-4" style="height:30px; type="text" name="descripcion" value="<?=set_value('descripcion',isset($origenbien['OR_DESCRIPCION']) ? $origenbien['OR_DESCRIPCION']  : '')?>" class="form-control-sm" placeholder="">
                    <?= form_error('descripcion','<p class="text-danger">','</p>') ?>
                </div>      
       
                <div class="form-group row"  >
                    <label  class="col-sm-3 col-form-label" >Activo</label>
                    <input  class="col-sm-1" type="checkbox" id ="estado" name="estado" value="<?=set_value('estado',isset($origenbien['OR_ESTADO']) ? $origenbien['OR_ESTADO']  : '0')?>" class="form-control-sm " placeholder="">

                    <?= form_error('estado','<p class="text-danger">','</p>') ?>
                </div>    
  
        </div>
    </div>
    <br>
    <input type="submit" class="btn btn-primary btn-sm" value="Actualizar">
    <input type="button" class="btn btn btn-dark btn-sm" onclick="history.back();" value="Regresar a la lista ">
    </form>
</div>