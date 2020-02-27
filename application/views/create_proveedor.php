<form action="<?= base_url('proveedor/store') ?>" method="POST">
	<h4>Proveedor Nuevo</h4>
	<hr>
	<div class="form-group">

            <div class="form-row">
                <div class="col-7">
                    <label for="">Tipo Documento</label>
                    <select style="height:35px"  name="PRO_IDDOC" class="custom-select">
                        <option selected value="">Seleccione</option>
                        <option <?= set_value('PRO_IDDOC') == 'DNI' ? 'selected' : ''; ?> value="1">DNI</option>
                        <option <?= set_value('PRO_IDDOC') == 'RUC' ? 'selected' : ''; ?> value="6">RUC</option>
                        <option <?= set_value('PRO_IDDOC') == 'OTRO' ? 'selected' : ''; ?> value="0">OTRO</option>
                    </select>
                    <div class="text-danger"><?= form_error('PRO_IDDOC') ?></div>   
                </div>
            </div>

            <div class="form-row">
                <div class="col-7">
                    <label for="">Documento</label>
                    <input type="text"  maxlength="11" onkeypress="return isNumber(event)" name="PRO_NUMDOC" class="form-control" placeholder="Numero Documento" value="<?= set_value('user') ?>">
                    <div class="text-danger"><?= form_error('user') ?></div>
                </div>
 
            </div>

            <div class="form-row">
        		<div class="col-7">
        			<label for="">Nombres y Apellidos</label>
        			<input  style="text-transform:uppercase" type="text" name="PRO_DESCRIPCION" class="form-control" placeholder="Nombres y Apellidos" value="<?= set_value('user') ?>">
					<div class="text-danger"><?= form_error('user') ?></div>
        		</div>
 
        	</div>
      
        	<div class="form-row">
        		<div class="col-7">
        			<label for="">Telefono</label>
        			<input name="PRO_TELEFONO" class="form-control" type="text" placeholder="Numero teléfono" value="<?= set_value('name') ?>">
					<div class="text-danger"><?= form_error('name') ?></div>   
        		</div>
            </div>
    
 
           <div class="form-row">
                <div class="col-7">
                    <label for="">Email</label>
                    <input name="PRO_EMAIL" class="form-control" type="text" placeholder="Email" value="<?= set_value('name') ?>">
                    <div class="text-danger"><?= form_error('name') ?></div>   
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
     <br>
        <input type="submit" class="btn btn-primary btn-sm" value="Grabar">
        <input type="button" class="btn btn btn-dark btn-sm" onclick="history.back();" value="Regresar a la lista ">
    </div>
</form>
