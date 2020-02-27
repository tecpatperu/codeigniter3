<form action="<?= base_url('contrato/store') ?>" method="POST">
	<h4>Contrato Nuevo</h4>
	<hr>
	<div class="form-group">

             <div class="form-row">
                
                    <label class="col-2" for="">Tipo de Documento</label>
                    
                    <div  class="btn-group">
                    <input type="hidden" name="CO_ID"   class="form-control"   value="<?= set_value('user') ?>">
      
                    <?=form_dropdown('CO_IDTIPDOC', $groups, '1');?>

                    </div>
                    <div class="text-danger"><?= form_error('user') ?></div>
                  
             
            </div>

            <div class="form-row">
        		 
        			<label class="col-2" for="">Nro Documento</label>
        			 <input  class="col-3" type="text" name="CO_NUMDOC" class="form-control" placeholder="Documento" value="<?= set_value('user') ?>">
					<div class="text-danger"><?= form_error('user') ?></div>
        	 
 
        	</div>

      
        	<div class="form-row">
        		 
        			<label class="col-2" for="">Modalidad</label>
        			<input class="col-3" name="CO_MODALIDAD" class="form-control" type="text" placeholder="Modalidad" value="<?= set_value('name') ?>">
					<div class="text-danger"><?= form_error('name') ?></div>   
        		 
            </div>
  
 
        <div class="form-row">
                 
                    <label class="col-2" for="">Fecha del doc.</label>
                    <input class="col-3" id = "prueba" name="CO_FEC_CON" class="form-control" type="date" placeholder="Fecha documento" value="<?= set_value('name') ?>">
                    <div class="text-danger"><?= form_error('name') ?></div>   
                 
            </div>

                <div class="form-row">
                 
                    <label class="col-2" for="">Fecha Inicio</label>
                    <input class="col-3" name="CO_FEC_INI" class="form-control" type="date" placeholder="Fecha inicio" value="<?= set_value('name') ?>">
                    <div class="text-danger"><?= form_error('name') ?></div>   
                 
            </div>
                <div class="form-row">
                 
                    <label class="col-2" for="">Fecha fin.</label>
                    <input class="col-3" name="CO_FEC_FIN" class="form-control" type="date" placeholder="Fecha Fin" value="<?= set_value('name') ?>">
                    <div class="text-danger"><?= form_error('name') ?></div>   
                 
            </div>
                <div class="form-row">
                 
                    <label class="col-2" for="">Num. cuotas</label>
                    <input class="col-3" name="CO_NUM_CUOTAS" class="form-control" type="text" placeholder="Num. cuotas" value="<?= set_value('name') ?>">
                    <div class="text-danger"><?= form_error('name') ?></div>   
                 
            </div>
                <div class="form-row">
                 
                    <label class="col-2" for="">Importe</label>
                    <input class="col-3" name="CO_IMPORTE" class="form-control" type="text" placeholder="Importe" value="<?= set_value('name') ?>">
                    <div class="text-danger"><?= form_error('name') ?></div>   
                 
            </div>
                <div class="form-row">
                 
                    <label class="col-2" for="">Observación</label>
                    <input class="col-3" name="CO_OBS" class="form-control" type="text" placeholder="Observacion" value="<?= set_value('name') ?>">
                    <div class="text-danger"><?= form_error('name') ?></div>   
                 
            </div>
 <br>
    	<div class="form-row">
            <div class = "form-group">
                 <label for="">Activo</label>
                 <input type="radio" name="CO_ESTADO" id="activo" value="1" checked="checked" />
            </div>
            <div class="col-1"></div>
            <div class = "form-group">
                 <label for="">Liquidado</label>
                 <input type="radio" name="CO_ESTADO" id="liquidado" value="2" />
            </div>
				<div class="text-danger"><?= form_error('especialidad') ?></div>
    	</div>
 
        <div class="form-row">
                <div  class="checkbox"> <label><input id = "deprecia" name = 'CO_DEPRECIA_LEASING'  type="checkbox" value="">Desea depreciar los Activos asociados al Contrato en la forma de Leasing? SI</label></div>
                <div class="text-danger"><?= form_error('especialidad') ?></div>
        </div>
    <br>
        <input type="submit" class="btn btn-primary btn-sm" value="Grabar">
        <input type="button" class="btn btn btn-dark btn-sm" onclick="history.back();" value="Regresar a la lista ">
    </div>
</form>
