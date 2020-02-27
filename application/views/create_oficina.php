<form action="<?= base_url('oficina/store') ?>" method="POST"  enctype="multipart/form-data"  >
	<h4>Oficina Nueva</h4>
	<hr>
	<div class="form-group">
            <div>
               <input type="file" name="profile_image" id="imgInp" />
              <img id="blah" src="#" alt="your image" />
            </div>
             <div class="form-row">
                
                    <label class="col-2" for="">Sede</label>
                    
                    <div  class="btn-group">
                    <input type="hidden" name="OF_IDSEDE"   class="form-control"   value="<?= set_value('user') ?>">
                    <input type="text" name="DESC_SEDE" readonly class="form-control" placeholder="Sede" value="<?= set_value('user') ?>">
                     <button type="button"  class="btn btn-primary view_detailsedes" ><i class="fa fa-search"></i></button>
                    </div>
                    <div class="text-danger"><?= form_error('user') ?></div>
                  
             
            </div>

            <div class="form-row">
                
                    <label class="col-2" for="">Local</label>
                   
                    <div  class="btn-group">
                    <input type="hidden" name="OF_IDLOCAL"   class="form-control"   value="<?= set_value('user') ?>">
                    <input type="text" name="DESC_LOCAL" readonly class="form-control" placeholder="Local" value="<?= set_value('user') ?>">
                     <button type="button"  class="btn btn-primary view_detaillocales" ><i class="fa fa-search"></i></button>
                    </div>
                    <div id="localerror" class="text-danger"><?= form_error('user') ?></div>
                  
                     
                
            </div>
            <div class="form-row">
                
                    <label class="col-2" for="">Area</label>
                  
                    <div  class="btn-group">
                    <input type="hidden" name="OF_IDAREA"   class="form-control"   value="<?= set_value('user') ?>">
                    <input type="text" name="DESC_AREA" readonly class="form-control" placeholder="Area" value="<?= set_value('user') ?>">
                     <button type="button"  class="btn btn-primary view_detailareas" ><i class="fa fa-search"></i></button>
                    </div>
                    <div class="text-danger"><?= form_error('user') ?></div>
                  
                     
               
            </div>
            <div class="form-row">
        	 
        			<label class="col-2" for="">Descripcion</label>
        			<input  class="col-3" type="text" name="OF_DESCRIPCION" class="form-control" placeholder="Nombre de oficina" value="<?= set_value('user') ?>">
					    <div class="text-danger"><?= form_error('user') ?></div>
        	 
 
        	 </div>
   
        	<div class="form-row">
        		 
        			<label class="col-2" for="">Abreviatura</label>
        			<input class="col-3" name="OF_ABREVI" class="form-control" type="text" placeholder="Abreviatura" value="<?= set_value('name') ?>">
				    	<div class="text-danger"><?= form_error('name') ?></div>   
        	 
            </div>
   
 
    <div class="form-row">
                  
                    <label class="col-2" for="">Responsable</label>
                    <br>
                    <div class="btn-group">
                    <input type="hidden" name="OF_RESPONSABLE"   class="form-control"   value="<?= set_value('user') ?>">
                    <input type="text" name="DESC_RESPONSABLE" readonly class="form-control" placeholder="Responsable" value="<?= set_value('user') ?>">
                     <button type="button"  class="btn btn-primary view_detailresponsables" ><i class="fa fa-search"></i></button>
                    </div>
                    <div class="text-danger"><?= form_error('user') ?></div>
                  
                     
                
    </div>
     
     <div class="form-row">
                  
                    <label class="col-2" for="">Supervisor</label>
                    <br>
                    <div class="btn-group">
                    <input type="hidden" name="OF_SUPERVISOR"   class="form-control"   value="<?= set_value('user') ?>">
                    <input type="text" name="DESC_SUPERVISOR" readonly class="form-control" placeholder="Supervisor" value="<?= set_value('user') ?>">
                     <button type="button"  class="btn btn-primary view_detailsupervisores" ><i class="fa fa-search"></i></button>
                    </div>
                    <div class="text-danger"><?= form_error('user') ?></div>
                  
                     
                
     </div>
                       
     <div class="form-row">
                  
                    <label class="col-2" for="">Edificio</label>
                    <br>
                    <div class="btn-group">
                    <input type="hidden" name="OF_IDOFICINA"   class="form-control"   value="<?= set_value('user') ?>">
                    <input type="text" name="DESC_OFICINA" readonly class="form-control" placeholder="Edificio" value="<?= set_value('user') ?>">
                     <button type="button"  class="btn btn-primary view_detailedificios" ><i class="fa fa-search"></i></button>
                    </div>
                    <div class="text-danger"><?= form_error('user') ?></div>
                  
       
    </div>
                        
    <div class="form-row">
                  
                    <label class="col-2" for="">Piso</label>
                    <br>
                    <div class="btn-group">
                    <input type="hidden" name="OF_IDPISO"   class="form-control"   value="<?= set_value('user') ?>">
                    <input type="text" name="DESC_PISO" readonly class="form-control" placeholder="Piso" value="<?= set_value('user') ?>">
                     <button type="button"  class="btn btn-primary view_detailpisos" ><i class="fa fa-search"></i></button>
                    </div>
                    <div class="text-danger"><?= form_error('user') ?></div>
                  
                   
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
    
        <input type="submit" class="btn btn-primary btn-sm" value="Grabar">
        <input type="button" class="btn btn btn-dark btn-sm" onclick="history.back();" value="Regresar a la lista ">
    </div>
</form>




<div  style=" background-color: rgba(0,0,0,.0001) !important;" id="show_modalsedes" class="modal fade" role="dialog" style="background: #000;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;"> Sedes</h3>
      </div>
      <div class="modal-body">
        <table id = "sedes" class="table table-bordered table-striped">
          <thead class="btn-success">
            <tr>
              <th>Codigo</th>
              <th>Descripcion</th>
              <th>Activo</th>
              <th></th>
            </tr>
          </thead>
          <tbody  id="listsedes">                    
          </tbody>

       </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>




<div  style=" background-color: rgba(0,0,0,.0001) !important;" id="show_modallocales" class="modal fade" role="dialog" style="background: #000;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;"> Locales</h3>
      </div>
      <div class="modal-body">
        <table id = "locales" class="table table-bordered table-striped">
          <thead class="btn-success">
            <tr>
              <th>Codigo</th>
              <th>Descripcion</th>
              <th>Activo</th>
              <th></th>
            </tr>
          </thead>
          <tbody  id="listlocales">                    
          </tbody>

       </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>




<div  style=" background-color: rgba(0,0,0,.0001) !important;" id="show_modalareas" class="modal fade" role="dialog" style="background: #000;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;"> Areas</h3>
      </div>
      <div class="modal-body">
        <table id = "areas" class="table table-bordered table-striped">
          <thead class="btn-success">
            <tr>
              <th>Codigo</th>
              <th>Descripcion</th>
              <th>Activo</th>
              <th></th>
            </tr>
          </thead>
          <tbody  id="listareas">                    
          </tbody>

       </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<div  style=" background-color: rgba(0,0,0,.0001) !important;" id="show_modalresponsables" class="modal fade" role="dialog" style="background: #000;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;"> Responsables</h3>
      </div>
      <div class="modal-body">
        <table id = "responsables" class="table table-bordered table-striped">
          <thead class="btn-success">
            <tr>
              <th>Codigo</th>
              <th>Descripcion</th>
              <th>Activo</th>
              <th></th>
            </tr>
          </thead>
          <tbody  id="listresponsables">                    
          </tbody>

       </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>




<div  style=" background-color: rgba(0,0,0,.0001) !important;" id="show_modalsupervisores" class="modal fade" role="dialog" style="background: #000;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;"> Supervisores</h3>
      </div>
      <div class="modal-body">
        <table id = "supervisores" class="table table-bordered table-striped">
          <thead class="btn-success">
            <tr>
              <th>Codigo</th>
              <th>Descripcion</th>
              <th>Activo</th>
              <th></th>
            </tr>
          </thead>
          <tbody  id="listsupervisores">                    
          </tbody>

       </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>





<div  style=" background-color: rgba(0,0,0,.0001) !important;" id="show_modaledificios" class="modal fade" role="dialog" style="background: #000;">
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
          <tbody  id="listedificios">                    
          </tbody>

       </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>




<div  style=" background-color: rgba(0,0,0,.0001) !important;" id="show_modalpisos" class="modal fade" role="dialog" style="background: #000;">
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
          <tbody  id="listpisos">                    
          </tbody>

       </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

