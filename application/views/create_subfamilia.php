<form action="<?= base_url('subfamilia/store') ?>" method="POST">
	<h4>Subfamilia Nueva</h4>
	<hr>
	<div class="form-group">

             <div class="form-row ">
                <div class="col-7"> 
                 
                        <label for="">Familia</label>
                        <br>
                        <div class="btn-group">
                        <input type="hidden" name="LO_IDFAMILIA"   class="form-control"   value="<?= set_value('user') ?>">
                        <input   type="text" name="DESC_FAMILIA" readonly class="form-control" placeholder="Familia" value="<?= set_value('user') ?>">
                         <button type="button"  class="btn btn-primary view_detail" ><i class="fa fa-search"></i></button>
                        </div>
                        <div class="text-danger"><?= form_error('user') ?></div>
                       
                     
                </div>
            </div>



            <div class="form-row">
        		<div class="col-7">
        			<label for="">Descripcion</label>
        			<input type="text" name="LO_DESCRIPCION" class="form-control" placeholder="Nombre de Subfamilia" value="<?= set_value('user') ?>">
					<div class="text-danger"><?= form_error('user') ?></div>
        		</div>
 
        	</div>
    
        	<div class="form-row">
        		<div class="col-7">
        			<label for="">Abreviatura</label>
        			<input name="LO_ABRE" class="form-control" type="text" placeholder="Abreviatura" value="<?= set_value('name') ?>">
					<div class="text-danger"><?= form_error('name') ?></div>   
        		</div>
            </div>
 
 
    

    <!--estado en activo por ser nuevo
    <div class="form-group">
    	<div class="form-row">
    		<div class="col-7">
    			 
                <div class="checkbox"> <label><input name = 'LO__ESTADO'  type="checkbox" value="">Estado</label></div>
				<div class="text-danger"><?//= form_error('especialidad') ?></div>
				
    		</div>
   
    	</div>
    </div>-->
 <br>
        <input type="submit" class="btn btn-primary btn-sm" value="Grabar">
        <input type="button" class="btn btn btn-dark btn-sm" onclick="history.back();" value="Regresar a la lista ">
    </div>
</form>


<div  style=" background-color: rgba(0,0,0,.0001) !important;" id="show_modal" class="modal fade" role="dialog" style="background: #000;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;"> Familias</h3>
      </div>
      <div class="modal-body">
        <table id = "familias" class="table table-bordered table-striped">
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




