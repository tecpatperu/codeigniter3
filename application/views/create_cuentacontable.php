<form action="<?= base_url('cuentacontable/store') ?>" method="POST">
	<h4>Cuenta Contable Nueva</h4>
	<hr>
        <div class="form-group">
            <div class="form-row">
                
                    <label  class="col-sm-3 col-form-label"  for="">Codigo</label>
                    <input class="col-sm-4"  type="text" name="AR_ID" class="form-control" placeholder="Codigo contable" value="<?= set_value('user') ?>">
                    <div class="text-danger"><?= form_error('user') ?></div>
             
            </div>
    </div>
	<div class="form-group">
            <div class="form-row">
        		 
        			<label class="col-sm-3 col-form-label"  for="">Descripcion</label>
        			<input class="col-sm-4" type="text" name="AR_DESCRIPCION" class="form-control" placeholder="Descripcion" value="<?= set_value('user') ?>">
					<div class="text-danger"><?= form_error('user') ?></div>
        		</div>
  
    </div>
    <div class="form-group">     
        	<div class="form-row">
        		 
        			<label class="col-sm-3 col-form-label"  for="">% Tasa</label>
        			<input class="col-sm-4" name="AR_TASA" id="tasa" class="form-control" type="number" placeholder="Tasa" value="<?= set_value('name') ?>">
					<div class="text-danger"><?= form_error('name') ?></div>   
        		</div>
             
    </div>
 
        <div class="form-group">     
            <div class="form-row">
             
                    <label  class="col-sm-3 col-form-label"  for="">Tiempo de vida</label>
                    <input class="col-sm-4" id ="tiempovida" name="tiempovida" class="form-control" type="number   " placeholder="Tiempo de vida" value="<?= set_value('name') ?>"> (Meses)
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

Datos para el Asiento de Depreciación

        <div style="border:1px solid black">
            <div class="form-row">
          
                    <label class="col-sm-3 col-form-label"  for="">Cuenta Cargo</label>
                    <br>
                    <div class="btn-group">
                    <input type="hidden" name="AR_CUENTA_CARGO"   class="form-control"   value="<?= set_value('user') ?>">
                    <input   type="text" name="AR_DES_CUENTA_CARGO" readonly class="form-control" placeholder="Cuenta Cargo" value="<?= set_value('user') ?>">
                     <button type="button"  class="btn btn-primary view_detail1" ><i class="fa fa-search"></i></button>
                    </div>
                    <div class="text-danger"><?= form_error('user') ?></div>
                  
                     
   
            </div>
            <div class="form-row">
              
                    <label class="col-sm-3 col-form-label"  for="">Cuenta Abono</label>
                    <br>
                    <div class="btn-group">
                    <input type="hidden" name="AR_CUENTA_ABONO"   class="form-control"   value="<?= set_value('user') ?>">
                    <input type="text" name="AR_DES_CUENTA_ABONO" readonly class="form-control" placeholder="Cuenta Abono" value="<?= set_value('user') ?>">
                     <button type="button"  class="btn btn-primary view_detail2" ><i class="fa fa-search"></i></button>
                    </div>
                    <div class="text-danger"><?= form_error('user') ?></div>
                  
                     
    
            </div>
  
        </div>    

        <br>

Datos para el Asiento de Diferencia de Cambio

                <div style="border:1px solid black">
            <div class="form-row">
          
                    <label class="col-sm-3 col-form-label"  for="">Cuenta Activo</label>
                    <br>
                    <div class="btn-group">
                    <input type="hidden" name="AR_CUENTA_CARGO_DC"   class="form-control"   value="<?= set_value('user') ?>">
                    <input   type="text" name="AR_DES_CUENTA_CARGO_DC" readonly class="form-control" placeholder="Cuenta Activo" value="<?= set_value('user') ?>">
                     <button type="button"  class="btn btn-primary view_detail3" ><i class="fa fa-search"></i></button>
                    </div>
                    <div class="text-danger"><?= form_error('user') ?></div>
                  
                     
   
            </div>
            <div class="form-row">
              
                    <label class="col-sm-3 col-form-label"  for="">Cuenta Cargo</label>
                    <br>
                    <div class="btn-group">
                    <input type="hidden" name="AR_CUENTA_ABONO_DC"   class="form-control"   value="<?= set_value('user') ?>">
                    <input  type="text" name="AR_DES_CUENTA_ABONO_DC" readonly class="form-control" placeholder="Cuenta Cargo" value="<?= set_value('user') ?>">
                     <button type="button"  class="btn btn-primary view_detail4" ><i class="fa fa-search"></i></button>
                    </div>
                    <div class="text-danger"><?= form_error('user') ?></div>
                  
                     
    
            </div>
            <div class="form-row">
              
                    <label class="col-sm-3 col-form-label"  for="">Cuenta Abono</label>
                    <br>
                    <div class="btn-group">
                    <input type="hidden" name="AR_CUENTA_ABONO_DC_PERDIDA"   class="form-control"   value="<?= set_value('user') ?>">
                    <input   type="text" name="AR_DES_CUENTA_ABONO_DC_PERDIDA" readonly class="form-control" placeholder="Cuenta Abono" value="<?= set_value('user') ?>">
                     <button type="button"  class="btn btn-primary view_detail5" ><i class="fa fa-search"></i></button>
                    </div>
                    <div class="text-danger"><?= form_error('user') ?></div>
                  
                     
    
            </div>
        </div>  

 <br>
 Datos para el Asiento de Revaluación
                <div style="border:1px solid black">
            <div class="form-row">
          
                    <label class="col-sm-3 col-form-label"  for="">Cuenta Cargo</label>
                    <br>
                    <div class="btn-group">
                    <input type="hidden" name="AR_CUENTA_CARGO_R"   class="form-control"   value="<?= set_value('user') ?>">
                    <input   type="text" name="AR_DES_CUENTA_CARGO_R" readonly class="form-control" placeholder="Cuenta Cargo" value="<?= set_value('user') ?>">
                     <button type="button"  class="btn btn-primary view_detail6" ><i class="fa fa-search"></i></button>
                    </div>
                    <div class="text-danger"><?= form_error('user') ?></div>
                  
                     
   
            </div>
            <div class="form-row">
              
                    <label  class="col-sm-3 col-form-label" for="">Cuenta Abono</label>
                    <br>
                    <div class="btn-group">
                    <input type="hidden" name="AR_CUENTA_ABONO_R"   class="form-control"   value="<?= set_value('user') ?>">
                    <input   type="text" name="AR_DES_CUENTA_ABONO_R" readonly class="form-control" placeholder="Cuenta Abono" value="<?= set_value('user') ?>">
                     <button type="button"  class="btn btn-primary view_detail7" ><i class="fa fa-search"></i></button>
                    </div>
                    <div class="text-danger"><?= form_error('user') ?></div>
                  
                     
    
            </div>

  
        </div>     
        <br>
    <div class="form-group">
        <input type="submit" class="btn btn-primary btn-sm" value="Grabar">
        <input type="button" class="btn btn btn-dark btn-sm" onclick="history.back();" value="Regresar a la lista ">
    </div>
</form>







<div  style=" background-color: rgba(0,0,0,.0001) !important;" id="show_modal1" class="modal fade" role="dialog" style="background: #000;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;"> Plan de Cuentas</h3>
      </div>
      <div class="modal-body"  style="height: 400px;  overflow-y: auto;"  >
        <table id = "cuentas1" class="table table-bordered table-striped">
          <thead class="btn-success">
            <tr><input type="text" id="jobsearch" name="jobsearch" class="form-control" value="" placeholder="Buscar...."></tr>
            </tr>
            <tr>
              <th>Codigo</th>
              <th>Descripcion</th>
            
            </tr>
          </thead>
          <tbody  id="listRecords1">                    
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
        <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;"> Plan de Cuentas</h3>
      </div>
      <div class="modal-body" style="height: 400px;  overflow-y: auto;">
        <table id = "cuentas2" class="table table-bordered table-striped">
          <thead class="btn-success">
            <tr><input type="text" id="jobsearch" name="jobsearch" class="form-control" value="" placeholder="Buscar...." ></tr>
            <tr>
              <th>Codigo</th>
              <th>Descripcion</th>
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





<div  style=" background-color: rgba(0,0,0,.0001) !important;" id="show_modal3" class="modal fade" role="dialog" style="background: #000;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;"> Plan de Cuentas</h3>
      </div>
      <div class="modal-body" style="height: 400px;  overflow-y: auto;">
        <table id = "cuentas3" class="table table-bordered table-striped">
          <thead class="btn-success">
            <tr><input type="text" id="jobsearch" name="jobsearch" class="form-control" value="" placeholder="Buscar...."></tr>
            <tr>
              <th>Codigo</th>
              <th>Descripcion</th>
              <th></th>
            </tr>
          </thead>
          <tbody  id="listRecords3">                    
          </tbody>

       </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<div  style=" background-color: rgba(0,0,0,.0001) !important;" id="show_modal4" class="modal fade" role="dialog" style="background: #000;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;"> Plan de Cuentas</h3>
      </div>
      <div class="modal-body" style="height: 400px;  overflow-y: auto;">
        <table id = "cuentas4" class="table table-bordered table-striped">
          <thead class="btn-success">
            <tr><input type="text" id="jobsearch" name="jobsearch" class="form-control" value="" placeholder="Buscar...."></tr>
            <tr>
              <th>Codigo</th>
              <th>Descripcion</th>
              <th></th>
            </tr>
          </thead>
          <tbody  id="listRecords4">                    
          </tbody>

       </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<div  style=" background-color: rgba(0,0,0,.0001) !important;" id="show_modal5" class="modal fade" role="dialog" style="background: #000;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;"> Plan de Cuentas</h3>
      </div>
      <div class="modal-body" style="height: 400px;  overflow-y: auto;">
        <table id = "cuentas5" class="table table-bordered table-striped">
          <thead class="btn-success">
            <tr><input type="text" id="jobsearch" name="jobsearch" class="form-control" value="" placeholder="Buscar...."></tr>
            <tr>
              <th>Codigo</th>
              <th>Descripcion</th>
              <th></th>
            </tr>
          </thead>
          <tbody  id="listRecords5">                    
          </tbody>

       </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<div  style=" background-color: rgba(0,0,0,.0001) !important;" id="show_modal6" class="modal fade" role="dialog" style="background: #000;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;"> Plan de Cuentas</h3>
      </div>
      <div class="modal-body" style="height: 400px;  overflow-y: auto;">
        <table id = "cuentas6" class="table table-bordered table-striped">
          <thead class="btn-success">
            <tr><input type="text" id="jobsearch" name="jobsearch" class="form-control" value="" placeholder="Buscar...."></tr>
            <tr>
              <th>Codigo</th>
              <th>Descripcion</th>
              <th></th>
            </tr>
          </thead>
          <tbody  id="listRecords6">                    
          </tbody>

       </table>
      </div>
      <div class="modal-footer" >
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<div  style=" background-color: rgba(0,0,0,.0001) !important;" id="show_modal7" class="modal fade" role="dialog" style="background: #000;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;"> Plan de Cuentas</h3>
      </div>
      <div class="modal-body" style="height: 400px;  overflow-y: auto;">
        <table id = "cuentas7" class="table table-bordered table-striped">
          <thead class="btn-success">
           <tr><input type="text" id="jobsearch" name="jobsearch" class="form-control" value="" placeholder="Buscar...."></tr>
            <tr>
              <th>Codigo</th>
              <th>Descripcion</th>
              <th></th>
            </tr>
          </thead>
          <tbody  id="listRecords7">                    
          </tbody>

       </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


