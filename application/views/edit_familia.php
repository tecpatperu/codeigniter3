 
 
   
    <form method="POST" action="<?= base_url('familia/update') ?>">
        <br>
    <h4 class = "text-left">Familia</h4>
    <div class="card">
        <div class="card-body">
       
                <div class="form-group row">
                    <input type="hidden" name="idFamilia" value="<?=set_value('idFamilia',isset($familia['PRO_ID']) ? $familia['PRO_ID']  : '')?>" class="form-control" placeholder="">
                    <label class="col-sm-3 col-form-label" >Descripcion</label>
                    <input class="col-sm-4" style="height:30px;" type="text" name="descripcion" value="<?=set_value('descripcion',isset($familia['PRO_DESCRIPCION']) ? $familia['PRO_DESCRIPCION']  : '')?>" class="form-control-sm" placeholder="">
                    <?= form_error('descripcion','<p class="text-danger">','</p>') ?>
                </div>      
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" >Abreviatura</label>
                    <input class="col-sm-4"  style="height:30px;" type="text" name="abreviatura" value="<?=set_value('abreviatura',isset($familia['PRO_ABREV']) ? $familia['PRO_ABREV']  : '')?>" class="form-control-sm" placeholder="">
                    <?= form_error('abreviatura','<p class="text-danger">','</p>') ?>
                </div>      
                <div class="form-group row"  >
                    <label  class="col-sm-3 col-form-label" >Activo</label>
                    <input  class="col-sm-1" type="checkbox" id ="estado" name="estado" value="<?=set_value('estado',isset($familia['PRO_ESTADO']) ? $familia['PRO_ESTADO']  : '0')?>" class="form-control-sm " placeholder="">

                    <?= form_error('estado','<p class="text-danger">','</p>') ?>
                </div> 

                <div class="form-group row">
               
                        <label class="col-sm-3 col-form-label"   for="">Cuenta</label>
                        <br>
           
                        <input  type="hidden" name="PRO_CUENTA"   class="form-control" value="<?=set_value('PRO_CUENTA',isset($familia['PRO_CUENTA']) ? $familia['PRO_CUENTA']  : '')?>">
                        <input  class="col-sm-4" style="height:30px;"   type="text" name="DESC_CUENTA" readonly class="form-control" placeholder="Cuenta contable" value="<?=set_value('DESC_CUENTA',isset($familia['DESC_CUENTA']) ? $familia['DESC_CUENTA']  : '')?>">
                         <button type="button"  class="btn btn-primary view_detail" ><i class="fa fa-search"></i></button>
                
                        <div class="text-danger"><?= form_error('user') ?></div>
 
                 </div>   
  
        </div>
    </div>
    <br>
    <input type="submit" class="btn btn-primary btn-sm" value="Actualizar">
    <input type="button" class="btn btn btn-dark btn-sm" onclick="history.back();" value="Regresar a la lista ">
    </form>
 


<div  style=" background-color: rgba(0,0,0,.0001) !important;" id="show_modal" class="modal fade" role="dialog" style="background: #000;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;"> Cuentas Contable</h3>
      </div>
      <div class="modal-body">
        <table id = "cuentascontable" class="table table-bordered table-striped">
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

