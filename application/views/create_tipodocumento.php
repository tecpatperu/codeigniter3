<form action="<?= base_url('tipodocumento/store') ?>" method="POST">
	<h4>Tipo documento Nuevo</h4>
	<hr>
	<div class="form-group">
            <div class="form-row">
        		<div class="col-7">
        			<label for="">Descripcion</label>
        			<input type="text" name="PRO_DESCRIPCION" class="form-control" placeholder="Nombre de Tipodocumento" value="<?= set_value('user') ?>">
					<div class="text-danger"><?= form_error('user') ?></div>
        		</div>
 
        	</div>
    </div>
    <div class="form-group">     
        	<div class="form-row">
        		<div class="col-7">
        			<label for="">Abreviatura</label>
        			<input name="PRO_ABREV" class="form-control" type="text" placeholder="Abreviatura" value="<?= set_value('name') ?>">
					<div class="text-danger"><?= form_error('name') ?></div>   
        		</div>
            </div>
    </div>
 
    

    <!--estado en activo por ser nuevo
    <div class="form-group">
    	<div class="form-row">
    		<div class="col-7">
    			 
                <div class="checkbox"> <label><input name = 'PRO_ESTADO'  type="checkbox" value="">Estado</label></div>
				<div class="text-danger"><?//= form_error('especialidad') ?></div>
				
    		</div>
   
    	</div>
    </div>-->
    <div class="form-group">
        <input type="submit" class="btn btn-primary btn-sm" value="Grabar">
        <input type="button" class="btn btn btn-dark btn-sm" onclick="history.back();" value="Regresar a la lista ">
    </div>
</form>
