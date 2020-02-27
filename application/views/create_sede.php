<form action="<?= base_url('sede/store') ?>" method="POST">
	<h4>Sede Nueva</h4>
	<hr>
	<div class="form-group">
            <div class="form-row">
        		<div class="col-7">
        			<label for="">Sede Principal</label>
               <select class="form-control" id="sede"  name="SE_ID"  >
<option value="1">Arequipa</option>
<option value="2">Amazonas</option>
<option value="3">Ica</option>
<option value="4">Trujillo</option>
<option value="5">Tarapoto</option>
<option value="6">Pucallpa</option>
<option value="7">Tacna</option>
<option value="8">Piura</option>
<option value="9">Tumbes</option>
<option value="10">Lima</option>
<option value="11">Moquegua</option>
<option value="12">Cerro de pasco</option>
<option value="13">Loreto</option>
</select>
                <input type="hidden" id="desc_sede" name="SE_DESCRIPCION" class="form-control" placeholder="Nombre de sede" value="<?= set_value('user') ?>" 
					<div class="text-danger"><?= form_error('user') ?></div>
        		</div>
 
        	</div>
        
        	<div class="form-row">
        		<div class="col-7">
        			<label for="">Descripcion</label>
        			<input name="SE_ABREVIATURA" class="form-control" type="text" placeholder="Descripcion" value="<?= set_value('name') ?>">
					<div class="text-danger"><?= 
                    form_error('name') ?></div>   
        		</div>
            </div>
    </div>
 
    

    <!--estado en activo por ser nuevo
    <div class="form-group">
    	<div class="form-row">
    		<div class="col-7">
    			 
                <div class="checkbox"> <label><input name = 'SE_ESTADO'  type="checkbox" value="">Estado</label></div>
				<div class="text-danger"><?= form_error('especialidad') ?></div>
				
    		</div>
   
    	</div>
    </div>-->
    <br>
    <div class="form-group">
        <input type="submit" class="btn btn-primary btn-sm" value="Grabar">
        <input type="button" class="btn btn btn-dark btn-sm" onclick="history.back();" value="Regresar a la lista ">
    </div>
</form>
