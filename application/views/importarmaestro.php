  <?php if($msg = $this->session->flashdata('msg')): ?>
  <div class="alert alert-success text-center" role="alert">
    <?= $msg ?>
  </div>
<?php endif; ?>


<form action="<?= base_url('importarmaestro/import') ?>" method="POST"  enctype="multipart/form-data">
<h3 class="text-center">Importador de maestros</h3>
    <div class="row">
         <button>Importar data</button>
    </div>

    <br>
    Maestros del sistema
<div class="row">
  <div class="col-6 border border-primary">
         <div  class="checkbox"> <label><input id = "sede" name = 'sede'  type="checkbox" value="1">Sede</label></div>
         <div  class="checkbox"> <label><input id = "local" name = 'local'  type="checkbox" value="1">Local</label></div>
         <div  class="checkbox"> <label><input id = "area" name = 'area'  type="checkbox" value="1">Area</label></div>
         <div  class="checkbox"> <label><input id = "oficina" name = 'oficina'  type="checkbox" value="1">Oficina</label></div>
         <div  class="checkbox"> <label><input id = "familia" name = 'familia'  type="checkbox" value="1">Familia</label></div>
         <div  class="checkbox"> <label><input id = "subfamilia" name = 'subfamilia'  type="checkbox" value="1">Sub familia</label></div>
         <div  class="checkbox"> <label><input id = "cuentacontable" name = 'cuentacontable'  type="checkbox" value="1">Cuenta contable</label></div>
         <div  class="checkbox"> <label><input id = "centrodecosto" name = 'centrodecosto'  type="checkbox" value="1">centrodecosto</label></div>
         <div  class="checkbox"> <label><input id = "contrato" name = 'contrato'  type="checkbox" value="1">Contrato</label></div>
         <div  class="checkbox"> <label><input id = "responsable" name = 'responsable'  type="checkbox" value="1">Responsable</label></div>
         <div  class="checkbox"> <label><input id = "bien" name = 'bien'  type="checkbox" value="1">Bien</label></div>
         <div  class="checkbox"> <label><input id = "edificio" name = 'edificio'  type="checkbox" value="1">Edificio</label></div>
         <div  class="checkbox"> <label><input id = "piso" name = 'piso'  type="checkbox" value="1">Piso</label></div>
             
                 
<br>

      </div> 
     <div class="col-6 border border-primary">
      
  
                    <input type="hidden" name="idSede" value="<?=set_value('idSede',isset($sede['SE_ID']) ? $sede['SE_ID']  : '')?>" class="form-control" placeholder="">
                    <label class="col-sm-4 col-form-label" >Prefijos Fichas</label>
                    <input class="col-sm-6" style="height:30px;" type="text" name="prefijo"   class="form-control-sm" placeholder="" value = "COES">
                    <?= form_error('prefijo','<p class="text-danger">','</p>') ?>
                
                <br>
                    <label class="col-sm-4 col-form-label" >Mes y año de incio operacion</label>
               
                    <input class="col-sm-6" name="FEC_INICIO_OPE" class="form-control" type="date" value="<?php echo date('Y') . '-' . date('m') . '-' . date('d');; ?>"  >
                    
                  <br>
                    
                    <input  class="col-sm-1" type="checkbox" id ="actualiza_depreciacion" name="actualiza_depreciacion"   class="form-control-sm " placeholder="">
        <label  class="col-sm-10 col-form-label" >Actualizar depreciacion acumulada a la fecha</label>
                    <?= form_error('estado','<p class="text-danger">','</p>') ?>
               
  <br>
   
    <input type="file"  valu name="file" id="file" required accept=".xls, .xlsx" />

      </div> 
    </div>
 
</form>



 
