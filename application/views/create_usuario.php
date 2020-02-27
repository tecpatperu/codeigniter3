<form action="<?= base_url('usuario/store') ?>" method="POST">
	<h4>Responsable Nuevo</h4>
	<hr>

    <div class="form-group">     
        	<div class="form-row">
        		<div class="col-7">
        			<label for="">Tipo Documento</label>
                    <select style="height:30px"  name="RA_IDDOC" class="custom-select">
                        <option selected value="">Seleccione</option>
                        <option <?= set_value('RA_IDDOC') == 'DNI' ? 'selected' : ''; ?> value="1">DNI</option>
                        <option <?= set_value('RA_IDDOC') == 'RUC' ? 'selected' : ''; ?> value="6">RUC</option>
                        <option <?= set_value('RA_IDDOC') == 'OTRO' ? 'selected' : ''; ?> value="0">OTRO</option>
                    </select>
					<div class="text-danger"><?= form_error('RA_IDDOC') ?></div>   
        		</div>
            </div>
    </div>
     <div class="form-group">     
            <div class="form-row">
                <div class="col-7">
                    <label for="">Documento</label>
                    <input style="height:30px"  name="RA_NUMDOC" class="form-control" type="text" placeholder="Numero de documento" value="<?= set_value('RA_NUMDOC') ?>">
                    <div class="text-danger"><?= form_error('RA_NUMDOC') ?></div>   
                </div>
            </div>
    </div>
 
     <div class="form-group">     
            <div class="form-row">
                <div class="col-7">
                    <label for="">Nombres y apellidos</label>
                    <input style="height:30px"  name="RA_DESCRIPCION" class="form-control" type="text" placeholder="Nombres y apellidos" value="<?= set_value('RA_DESCRIPCION') ?>">
                    <div class="text-danger"><?= form_error('RA_DESCRIPCION') ?></div>   
                </div>
            </div>
    </div>
<!-- 
    <div class="form-group">
        <div class="form-row">
            <div class="col-7">
                 
                <div class="checkbox"> <label><input style="height:30px"   name = 'RA_ESTADO'  CHECKED type="checkbox" value="1">Activo</label></div>
                <div class="text-danger"><?= form_error('RA_ESTADO') ?></div>
                
            </div>
   
        </div>
    </div> 
-->
     <div class="form-group">     
            <div class="form-row">
                <div class="col-7">
                    <label for="">Telefono</label>
                    <input style="height:30px"  name="RA_TELEFONO" class="form-control" type="text" placeholder="Telefono" value="<?= set_value('RA_TELEFONO') ?>">
                    <div class="text-danger"><?= form_error('RA_TELEFONO') ?></div>   
                </div>
            </div>
    </div>
      <div class="form-group">     
            <div class="form-row">
                <div class="col-7">
                    <label for="">Email</label>
                    <input style="height:30px"  name="RA_EMAIL" class="form-control" type="text" placeholder="Email" value="<?= set_value('RA_EMAIL') ?>">
                    <div class="text-danger"><?= form_error('RA_EMAIL') ?></div>   
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
    <div class="form-group">
        <input type="submit" class="btn btn-primary btn-sm" value="Grabar">
        <input type="button" class="btn btn btn-dark btn-sm" onclick="history.back();" value="Regresar a la lista ">
    </div>
</form>
