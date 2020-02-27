 

    
    <form method="POST" action="<?= base_url('subfamilia/update') ?>">
        <br>
    <h4 class = "text-left">Subfamilia</h4>
    <div class="card">
        <div class="card-body">
       
                 <div class="form-group row">
                     
                     
                            <label class="col-sm-3 col-form-label" for="">Familia</label>
                            <br>
                            <div class="btn-group">
                            <input type="hidden" name="LO_IDFAMILIA"   class="form-control"   value="<?=set_value('LO_IDFAMILIA',isset($subfamilia['LO_IDFAMILIA']) ? $subfamilia['LO_IDFAMILIA']  : '')?>">
                            <input  class="col-sm-12"  type="text" name="DESC_FAMILIA" readonly class="form-control" placeholder="Familia" value="<?=set_value('DESC_FAMILIA',isset($subfamilia['DESC_FAMILIA']) ? $subfamilia['DESC_FAMILIA']  : '')?>">
                             <button type="button"  class="btn btn-primary view_detail" ><i class="fa fa-search"></i></button>
                            </div>
                            <div class="text-danger"><?= form_error('user') ?></div>
                           
                      
                    
                </div>

                <div class="form-group row">
                    <input type="hidden" name="idSubfamilia" value="<?=set_value('idSubfamilia',isset($subfamilia['LO_ID']) ? $subfamilia['LO_ID']  : '')?>" class="form-control" placeholder="">
                    <label class="col-sm-3 col-form-label" >Descripcion</label>
                    <input class="col-sm-4"   type="text" name="descripcion" value="<?=set_value('descripcion',isset($subfamilia['LO_DESCRIPCION']) ? $subfamilia['LO_DESCRIPCION']  : '')?>" class="form-control-sm" placeholder="">
                    <?= form_error('descripcion','<p class="text-danger">','</p>') ?>
                </div>      
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" >Abreviatura</label>
                    <input class="col-sm-4"  type="text" name="abreviatura" value="<?=set_value('abreviatura',isset($subfamilia['LO_ABRE']) ? $subfamilia['LO_ABRE']  : '')?>" class="form-control-sm" placeholder="">
                    <?= form_error('abreviatura','<p class="text-danger">','</p>') ?>
                </div>      
                <div class="form-group row"  >
                    <label  class="col-sm-3 col-form-label" >Activo</label>
                    <input  class="col-sm-1" type="checkbox" id ="estado" name="estado" value="<?=set_value('estado',isset($subfamilia['LO_ESTADO']) ? $subfamilia['LO_ESTADO']  : '0')?>" class="form-control-sm " placeholder="">

                    <?= form_error('estado','<p class="text-danger">','</p>') ?>
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




