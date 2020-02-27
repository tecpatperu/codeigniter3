<form action="<?= base_url('motivobaja/store') ?>" method="POST">
	<h4>Motivo baja Nueva</h4>
	<hr>
	<div class="form-group">
            <div class="form-row">
        		<div class="col-7">
        			<label for="">Descripcion</label>
        			<input type="text" name="MB_DESCRIPCION" class="form-control" placeholder="Nombre de motivo baja" value="<?= set_value('user') ?>">
					<div class="text-danger"><?= form_error('user') ?></div>
        		</div>
 
        	</div>
    </div>
 
    

    <!--estado en activo por ser nuevo
    <div class="form-group">
    	<div class="form-row">
    		<div class="col-7">
    			 
                <div class="checkbox"> <label><input name = 'MB_ESTADO'  type="checkbox" value="">Estado</label></div>
				<div class="text-danger"><?= form_error('especialidad') ?></div>
				
    		</div>
   
    	</div>
    </div>-->
    <div class="form-group">
        <input type="submit" class="btn btn-primary btn-sm" value="Grabar">
        <input type="button" class="btn btn btn-dark btn-sm" onclick="history.back();" value="Regresar a la lista ">
    </div>
</form>
