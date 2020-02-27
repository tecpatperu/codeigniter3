<form action="<?= base_url('area/store') ?>" method="POST">
	<h4>Area Nueva</h4>
	<hr>
	<div class="form-group">
            <div class="form-row">
        		<div class="col-7">
        			<label for="">Descripcion</label>
        			<input type="text" name="AR_DESCRIPCION" class="form-control" placeholder="Nombre de area" value="<?= set_value('user') ?>">
					<div class="text-danger"><?= form_error('user') ?></div>
        		</div>
 
        	</div>
      
        	<div class="form-row">
        		<div class="col-7">
        			<label for="">Abreviatura</label>
        			<input name="AR_ABREVI" class="form-control" type="text" placeholder="Abreviatura" value="<?= set_value('AR_ABREVI') ?>">
					<div class="text-danger"><?= form_error('name') ?></div>   
        		</div>
            </div>
 
 
    

    <!--estado en activo por ser nuevo
    <div class="form-group">
    	<div class="form-row">
    		<div class="col-7">
    			 
                <div class="checkbox"> <label><input name = 'SE_ESTADO'  type="checkbox" value="">Estado</label></div>
				<div class="text-danger"><?//= form_error('especialidad') ?></div>
				
    		</div>
   
    	</div>
    </div>-->
<br>
     <div class="form-row">
                <div class="col-7">
                    <label for="">Edificio</label>
                    <br>
                    <div class="btn-group">
                    <input type="hidden" name="AR_IDEDIFICIO"   class="form-control"   value="<?= set_value('user') ?>">
                    <input type="text" name="DESC_EDIFICIO" readonly class="form-control" placeholder="Edificio" value="<?= set_value('user') ?>">
                     <button type="button"  class="btn btn-primary view_detail" ><i class="fa fa-search"></i></button>
                    </div>
                    <div class="text-danger"><?= form_error('user') ?></div>
                     
                </div>
    </div>
         <div class="form-row">
                <div class="col-7">
                    <label for="">Piso</label>
                    <br>
                    <div class="btn-group">
                    <input type="hidden" name="AR_IDPISO"   class="form-control"   value="<?= set_value('user') ?>">
                    <input type="text" name="DESC_PISO" readonly class="form-control" placeholder="Piso" value="<?= set_value('user') ?>">
                     <button type="button"  class="btn btn-primary view_detail2" ><i class="fa fa-search"></i></button>
                    </div>
                    <div class="text-danger"><?= form_error('user') ?></div>
                     
                </div>
    </div>
  <br>
  
        <input type="submit" class="btn btn-primary btn-sm" value="Grabar"> <input type="button" class="btn btn btn-dark btn-sm" onclick="history.back();" value="Regresar a la lista ">
    
    </div>
</form>




<div  style=" background-color: rgba(0,0,0,.0001) !important;" id="show_modal" class="modal fade" role="dialog" style="background: #000;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;"> Edificios</h3>
      </div>
      <div class="modal-body">
        <table id = "edificios" class="table table-bordered table-striped">
          <thead class="btn-success">
            <tr>
              <th>Codigo</th>
              <th>Descripcion</th>
              <th>Activo</th>
              <th></th>
            </tr>
          </thead>
          <tbody  id="listRecords">                    
          </tbody>

       </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<div  style=" background-color: rgba(0,0,0,.0001) !important;" id="show_modal2" class="modal fade" role="dialog" style="background: #000;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;"> Pisos</h3>
      </div>
      <div class="modal-body">
        <table id = "pisos" class="table table-bordered table-striped">
          <thead class="btn-success">
            <tr>
              <th>Codigo</th>
              <th>Descripcion</th>
              <th>Activo</th>
              <th></th>
            </tr>
          </thead>
          <tbody  id="listRecords2">                    
          </tbody>

       </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


