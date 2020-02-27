 

<div class="container-fluid">
   
    <form method="POST" action="<?= base_url('centrocosto/update') ?>">
        <br>
    <h4 class = "text-left">Centro de costo</h4>
    <div class="card">
        <div class="card-body">
       
                <div class="form-group row">
                    <input type="hidden" name="idCentrocosto" value="<?=set_value('idCentrocosto',isset($centrocosto['CC_ID']) ? $centrocosto['CC_ID']  : '')?>" class="form-control" placeholder="">
                    <label class="col-sm-3 col-form-label" >Descripcion</label>
                    <input class="col-sm-4" style="height:30px; type="text" name="descripcion" value="<?=set_value('descripcion',isset($centrocosto['CC_DESCRIPCION']) ? $centrocosto['CC_DESCRIPCION']  : '')?>" class="form-control-sm" placeholder="">
                    <?= form_error('descripcion','<p class="text-danger">','</p>') ?>
                </div>      
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" >Abreviatura</label>
                    <input class="col-sm-4" style="height:30px; type="text" name="abreviatura" value="<?=set_value('abreviatura',isset($centrocosto['CC_ABREVIATURA']) ? $centrocosto['CC_ABREV']  : '')?>" class="form-control-sm" placeholder="">
                    <?= form_error('abreviatura','<p class="text-danger">','</p>') ?>
                </div>      
                <div class="form-group row"  >
                    <label  class="col-sm-3 col-form-label" >Activo</label>
                    <input  class="col-sm-1" type="checkbox" id ="estado" name="estado" value="<?=set_value('estado',isset($centrocosto['CC_ESTADO']) ? $centrocosto['CC_ESTADO']  : '0')?>" class="form-control-sm " placeholder="">

                    <?= form_error('estado','<p class="text-danger">','</p>') ?>
                </div>    
  
        </div>
    </div>
    <br>
    <input type="submit" class="btn btn-primary btn-sm" value="Actualizar">
    <input type="button" class="btn btn btn-dark btn-sm" onclick="history.back();" value="Regresar a la lista ">
    </form>
</div>