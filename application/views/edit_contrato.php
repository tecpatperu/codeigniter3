 

<div class="container-fluid">
   
    <form method="POST" action="<?= base_url('Contrato/update') ?>">
        <br>
    <h4 class = "text-left">Contrato</h4>
    <div class="card">
        <div class="card-body">
       
             <div class="form-row">
                
                    <label class="col-3" for="">Tipo de Documento</label>
                    
                    <div  class="btn-group">
                    <input type="hidden" name="CO_ID"   class="form-control" value="<?=set_value('CO_ID',isset($contrato['CO_ID']) ? $contrato['CO_ID']  : '')?>">
      
                    <?=form_dropdown('CO_IDTIPDOC', $groups,  set_value('CO_IDTIPDOC',isset($contrato['CO_IDTIPDOC']) ? $contrato['CO_IDTIPDOC']  : '') );?>

                    </div>
                    <div class="text-danger"><?= form_error('user') ?></div>
               </div>   
            
               <div class="form-row">
                 
                    <label class="col-3" for="">Nro Documento</label>
                     <input  class="col-3" type="text" name="CO_NUMDOC" class="form-control" placeholder="Documento" value="<?=set_value('CO_NUMDOC',isset($contrato['CO_NUMDOC']) ? $contrato['CO_NUMDOC']  : '')?>">
                    <div class="text-danger"><?= form_error('user') ?></div>
                </div>
             
                

      
            <div class="form-row">
                 
                    <label class="col-3" for="">Modalidad</label>
                    <input class="col-3" name="CO_MODALIDAD" class="form-control" type="text" placeholder="Modalidad" value="<?=set_value('CO_MODALIDAD',isset($contrato['CO_MODALIDAD']) ? $contrato['CO_MODALIDAD']  : '')?>">
                    <div class="text-danger"><?= form_error('name') ?></div>   
                 
            </div>
  
 
             <div class="form-row">
                 
                    <label class="col-3" for="">Fecha del doc.</label>
                    <input class="col-3" id = "prueba" name="CO_FEC_CON" class="form-control" type="date" placeholder="Fecha documento" value="<?=set_value('CO_FEC_CON',isset($contrato['CO_FEC_CON']) ? $contrato['CO_FEC_CON']  : '')?>">
                    <div class="text-danger"><?= form_error('name') ?></div>   
                 
            </div>

                <div class="form-row">
                 
                    <label class="col-3" for="">Fecha Inicio</label>
                    <input class="col-3" name="CO_FEC_INI" class="form-control" type="date" placeholder="Fecha inicio" value="<?=set_value('CO_FEC_INI',isset($contrato['CO_FEC_INI']) ? $contrato['CO_FEC_INI']  : '')?>">
                    <div class="text-danger"><?= form_error('name') ?></div>   
                 
            </div>
                <div class="form-row">
                 
                    <label class="col-3" for="">Fecha fin.</label>
                    <input class="col-3" name="CO_FEC_FIN" class="form-control" type="date" placeholder="Fecha Fin" value="<?=set_value('CO_FEC_FIN',isset($contrato['CO_FEC_FIN']) ? $contrato['CO_FEC_FIN']  : '')?>">
                    <div class="text-danger"><?= form_error('name') ?></div>   
                 
            </div>
                <div class="form-row">
                 
                    <label class="col-3" for="">Num. cuotas</label>
                    <input class="col-3" name="CO_NUM_CUOTAS" class="form-control" type="text" placeholder="Num. cuotas"value="<?=set_value('CO_NUM_CUOTAS',isset($contrato['CO_NUM_CUOTAS']) ? $contrato['CO_NUM_CUOTAS']  : '')?>">
                    <div class="text-danger"><?= form_error('name') ?></div>   
                 
            </div>
                <div class="form-row">
                 
                    <label class="col-3" for="">Importe</label>
                    <input class="col-3" name="CO_IMPORTE" class="form-control" type="text" placeholder="Importe" value="<?=set_value('CO_IMPORTE',isset($contrato['CO_IMPORTE']) ? $contrato['CO_IMPORTE']  : '')?>">
                    <div class="text-danger"><?= form_error('name') ?></div>   
                 
            </div>
                <div class="form-row">
                 
                    <label class="col-3" for="">Observación</label>
                    <input class="col-3" name="CO_OBS" class="form-control" type="text" placeholder="Observacion" value="<?=set_value('CO_OBS',isset($contrato['CO_OBS']) ? $contrato['CO_OBS']  : '')?>">
                    <div class="text-danger"><?= form_error('name') ?></div>   
                 
            </div>
 <br>
  
 
 
<label for="Activo">
    <?php echo form_radio('CO_ESTADO', 1, set_radio('CO_ESTADO', 1 , $contrato['CO_ESTADO'] == '1'), "id='activo'"); ?> Activo
</label>
<label for="Liquidado">
    <?php  echo form_radio('CO_ESTADO', 2, set_radio('CO_ESTADO', 2 , $contrato['CO_ESTADO'] == '2'), "id='liquidado'"); ?> Liquidado
</label>

        <div class="form-row">
                <div  class="checkbox"> <label><input id = "deprecia" name = 'CO_DEPRECIA_LEASING'  type="checkbox" value="<?=set_value('CO_DEPRECIA_LEASING',isset($contrato['CO_DEPRECIA_LEASING']) ? $contrato['CO_DEPRECIA_LEASING']  : 'NO')?>">Desea depreciar los Activos asociados al Contrato en la forma de Leasing? SI</label></div>
                <div class="text-danger"><?= form_error('especialidad') ?></div>
        </div>
    <br>        

            


            </div>    
                   
                  
  
        </div>
    </div>
    <br>
    <input type="submit" class="btn btn-primary btn-sm" value="Actualizar">
    <input type="button" class="btn btn btn-dark btn-sm" onclick="history.back();" value="Regresar a la lista ">
    </form>
</div>