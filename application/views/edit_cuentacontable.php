 

<div class="container-fluid">
   
    <form method="POST" action="<?= base_url('cuentacontable/update') ?>">
        <br>
    <h4 class = "text-left">Cuenta Contable</h4>
    <div class="card">
        <div class="card-body">
       
        <div class="form-group">
            <div class="form-row">
                
                    <label  class="col-sm-3 col-form-label"  for="">Codigo</label>
                    <input class="col-sm-4"  type="text" name="AR_ID" class="form-control" placeholder="Codigo contable" value="<?=set_value('AR_ID',isset($cuentacontable['AR_ID']) ? $cuentacontable['AR_ID']  : '')?>">
                    <div class="text-danger"><?= form_error('user') ?></div>
             
            </div>
    </div>
    <div class="form-group">
            <div class="form-row">
                 
                    <label class="col-sm-3 col-form-label"  for="">Descripcion</label>
                    <input class="col-sm-4" type="text" name="AR_DESCRIPCION" class="form-control" placeholder="Descripcion" value="<?=set_value('AR_DESCRIPCION',isset($cuentacontable['AR_DESCRIPCION']) ? $cuentacontable['AR_DESCRIPCION']  : '')?>">
                    <div class="text-danger"><?= form_error('user') ?></div>
                </div>
  
    </div>
    <div class="form-group">     
            <div class="form-row">
                 
                    <label class="col-sm-3 col-form-label"  for="">% Tasa</label>
                    <input class="col-sm-4" name="AR_TASA" id="tasa" class="form-control" type="number" placeholder="Tasa" value="<?=set_value('AR_TASA',isset($cuentacontable['AR_TASA']) ? $cuentacontable['AR_TASA']  : '')?>">
                    <div class="text-danger"><?= form_error('name') ?></div>   
                </div>
             
    </div>
 
        <div class="form-group">     
            <div class="form-row">
             
                    <label  class="col-sm-3 col-form-label"  for="">Tiempo de vida</label>
                    <input class="col-sm-4" id ="tiempovida" name="tiempovida" class="form-control" type="number   " placeholder="Tiempo de vida" value="<?=set_value('tiempovida',isset($cuentacontable['tiempovida']) ? $cuentacontable['tiempovida']  : '')?>"> (Meses)
                    <div class="text-danger"><?= form_error('name') ?></div>   
                 
            </div>
    </div>
 
         <div class="form-group">     
                <div class="form-group row"  >
                    <label  class="col-sm-3 col-form-label" >Estado</label>
                    <input  class="col-sm-1" type="checkbox" id ="estado" name="estado" value="<?=set_value('estado',isset($cuentacontable['AR_ESTADO']) ? $cuentacontable['AR_ESTADO']  : '0')?>" class="form-control-sm " placeholder="">

                    <?= form_error('estado','<p class="text-danger">','</p>') ?>
                </div> 

         </div>       
    <br>

Datos para el Asiento de Depreciación

        <div style="border:1px solid black">
            <div class="form-row">
          
                    <label class="col-sm-3 col-form-label"  for="">Cuenta Cargo</label>
                    <br>
                    <div class="btn-group">
                    <input type="hidden" name="AR_CUENTA_CARGO"   class="form-control"   value="<?=set_value('AR_CUENTA_CARGO',isset($cuentacontable['AR_CUENTA_CARGO']) ? $cuentacontable['AR_CUENTA_CARGO']  : '')?>">
                    <input   type="text" name="AR_DES_CUENTA_CARGO" readonly class="form-control" placeholder="Cuenta Cargo" value="<?=set_value('AR_DES_CUENTA_CARGO',isset($cuentacontable['AR_DES_CUENTA_CARGO']) ? $cuentacontable['AR_DES_CUENTA_CARGO']  : '')?>">
                     <button type="button"  class="btn btn-primary view_detail1" ><i class="fa fa-search"></i></button>
                    </div>
                    <div class="text-danger"><?= form_error('user') ?></div>
                  
                     
   
            </div>
            <div class="form-row">
              
                    <label class="col-sm-3 col-form-label"  for="">Cuenta Abono</label>
                    <br>
                    <div class="btn-group">
                    <input type="hidden" name="AR_CUENTA_ABONO"   class="form-control"  value="<?=set_value('AR_CUENTA_ABONO',isset($cuentacontable['AR_CUENTA_ABONO']) ? $cuentacontable['AR_CUENTA_ABONO']  : '')?>">
                    <input type="text" name="AR_DES_CUENTA_ABONO" readonly class="form-control" placeholder="Cuenta Abono" value="<?=set_value('AR_DES_CUENTA_ABONO',isset($cuentacontable['AR_DES_CUENTA_ABONO']) ? $cuentacontable['AR_DES_CUENTA_ABONO']  : '')?>">
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
                    <input type="hidden" name="AR_CUENTA_CARGO_DC"   class="form-control"   value="<?=set_value('AR_CUENTA_CARGO_DC',isset($cuentacontable['AR_CUENTA_CARGO_DC']) ? $cuentacontable['AR_CUENTA_CARGO_DC']  : '')?>">
                    <input   type="text" name="AR_DES_CUENTA_CARGO_DC" readonly class="form-control" placeholder="Cuenta Activo" value="<?=set_value('AR_DES_CUENTA_CARGO_DC',isset($cuentacontable['AR_DES_CUENTA_CARGO_DC']) ? $cuentacontable['AR_DES_CUENTA_CARGO_DC']  : '')?>">
                     <button type="button"  class="btn btn-primary view_detail3" ><i class="fa fa-search"></i></button>
                    </div>
                    <div class="text-danger"><?= form_error('user') ?></div>
                  
                     
   
            </div>
            <div class="form-row">
              
                    <label class="col-sm-3 col-form-label"  for="">Cuenta Cargo</label>
                    <br>
                    <div class="btn-group">
                    <input type="hidden" name="AR_CUENTA_ABONO_DC"   class="form-control"   value="<?=set_value('AR_CUENTA_ABONO_DC',isset($cuentacontable['AR_CUENTA_ABONO_DC']) ? $cuentacontable['AR_CUENTA_ABONO_DC']  : '')?>">
                    <input  type="text" name="AR_DES_CUENTA_ABONO_DC" readonly class="form-control" placeholder="Cuenta Cargo" value="<?=set_value('AR_DES_CUENTA_ABONO_DC',isset($cuentacontable['AR_DES_CUENTA_ABONO_DC']) ? $cuentacontable['AR_DES_CUENTA_ABONO_DC']  : '')?>">
                     <button type="button"  class="btn btn-primary view_detail4" ><i class="fa fa-search"></i></button>
                    </div>
                    <div class="text-danger"><?= form_error('user') ?></div>
                  
                     
    
            </div>
            <div class="form-row">
              
                    <label class="col-sm-3 col-form-label"  for="">Cuenta Abono</label>
                    <br>
                    <div class="btn-group">
                    <input type="hidden" name="AR_CUENTA_ABONO_DC_PERDIDA"   class="form-control"   value="<?=set_value('AR_CUENTA_ABONO_DC_PERDIDA',isset($cuentacontable['AR_CUENTA_ABONO_DC_PERDIDA']) ? $cuentacontable['AR_CUENTA_ABONO_DC_PERDIDA']  : '')?>">
                    <input   type="text" name="AR_DES_CUENTA_ABONO_DC_PERDIDA" readonly class="form-control" placeholder="Cuenta Abono" value="<?=set_value('AR_DES_CUENTA_ABONO_DC_PERDIDA',isset($cuentacontable['AR_DES_CUENTA_ABONO_DC_PERDIDA']) ? $cuentacontable['AR_DES_CUENTA_ABONO_DC_PERDIDA']  : '')?>">
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
                    <input type="hidden" name="AR_CUENTA_CARGO_R"   class="form-control"  value="<?=set_value('AR_CUENTA_CARGO_R',isset($cuentacontable['AR_CUENTA_CARGO_R']) ? $cuentacontable['AR_CUENTA_CARGO_R']  : '')?>">
                    <input   type="text" name="AR_DES_CUENTA_CARGO_R" readonly class="form-control" placeholder="Cuenta Cargo" value="<?=set_value('AR_DES_CUENTA_CARGO_R',isset($cuentacontable['AR_DES_CUENTA_CARGO_R']) ? $cuentacontable['AR_DES_CUENTA_CARGO_R']  : '')?>">
                     <button type="button"  class="btn btn-primary view_detail6" ><i class="fa fa-search"></i></button>
                    </div>
                    <div class="text-danger"><?= form_error('user') ?></div>
                  
                     
   
            </div>
            <div class="form-row">
              
                    <label  class="col-sm-3 col-form-label" for="">Cuenta Abono</label>
                    <br>
                    <div class="btn-group">
                    <input type="hidden" name="AR_CUENTA_ABONO_R"   class="form-control"   value="<?=set_value('AR_CUENTA_ABONO_R',isset($cuentacontable['AR_CUENTA_ABONO_R']) ? $cuentacontable['AR_CUENTA_ABONO_R']  : '')?>">
                    <input   type="text" name="AR_DES_CUENTA_ABONO_R" readonly class="form-control" placeholder="Cuenta Abono" value="<?=set_value('AR_DES_CUENTA_ABONO_R',isset($cuentacontable['AR_DES_CUENTA_ABONO_R']) ? $cuentacontable['AR_DES_CUENTA_ABONO_R']  : '')?>">
                     <button type="button"  class="btn btn-primary view_detail7" ><i class="fa fa-search"></i></button>
                    </div>
                    <div class="text-danger"><?= form_error('user') ?></div>
                  
                     
    
            </div>

  
        </div>     
        <br>
 



   
  
        </div>
    </div>
    <br>
    <input type="submit" class="btn btn-primary btn-sm" value="Actualizar">
    <input type="button" class="btn btn btn-dark btn-sm" onclick="history.back();" value="Regresar a la lista ">
    </form>
</div>




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


