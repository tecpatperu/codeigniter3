<form action="<?= base_url('familia/store') ?>" method="POST">
	<h4>Familia Nueva</h4>
	<hr>
	<div class="form-group">
            <div class="form-row">
        		<div class="col-7">
        			<label for="">Descripcion</label>
        			<input type="text" name="PRO_DESCRIPCION" class="form-control" placeholder="Nombre de Familia" value="<?= set_value('user') ?>">
					<div class="text-danger"><?= form_error('user') ?></div>
        		</div>
 
        	</div>
   
   
        	<div class="form-row">
        		<div class="col-7">
        			<label for="">Abreviatura</label>
        			<input name="PRO_ABREV" class="form-control" type="text" placeholder="Abreviatura" value="<?= set_value('name') ?>">
					<div class="text-danger"><?= form_error('name') ?></div>   
        		</div>
            </div>
    
 

            <div class="form-row">
                <div class="col-7">
                    <label for="">Cuenta</label>
                    <br>
                    <div class="btn-group">
                    <input type="hidden" name="PRO_CUENTA"   class="form-control"   value="<?= set_value('user') ?>">
                    <input  class="col-12" type="text" name="DESC_CUENTA" readonly class="form-control" placeholder="Cuenta contable" value="<?= set_value('user') ?>">
                     <button type="button"  class="btn btn-primary view_detail" ><i class="fa fa-search"></i></button>
                    </div>
                    <div class="text-danger"><?= form_error('user') ?></div>
                  
                     
                </div>
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

    <div class="modal fade" id="CuentaContable" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                  <h4 style="text-align:left "id="myModalLabel">Cuentas Contables</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
              
            </div>
            <div class="modal-body">
                Texto del modal
            </div>
        </div>
    </div>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary btn-sm" value="Grabar">
        <input type="button" class="btn btn btn-dark btn-sm" onclick="history.back();" value="Regresar a la lista ">
    </div>
</form>




<div  style=" background-color: rgba(0,0,0,.0001) !important;" id="show_modal" class="modal fade" role="dialog" style="background: #000;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;"> Cuentas Contable</h3>
      </div>
      <div class="modal-body" style="height: 400px;  overflow-y: auto;">
        <table id = "cuentascontable" class="table table-bordered table-striped">
          <thead class="btn-success">
                   <tr><input type="text" id="jobsearch" name="jobsearch" class="form-control" value="" placeholder="Buscar....">
            </tr>
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




