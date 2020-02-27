 

<div class="container-fluid">
   
    <form method="POST" action="<?= base_url('local/update') ?>">
        <br>
    <h4 class = "text-left">Local</h4>
    <div class="card">
        <div class="card-body">
                 <div class="form-group row">
                    <input type="hidden" name="idLocal" value="<?=set_value('idLocal',isset($local['LO_ID']) ? $local['LO_ID']  : '')?>" class="form-control" placeholder="">
                    <label class="col-sm-3 col-form-label" >Sede</label>
                     <div class="btn-group">
                    <input  type="hidden" name="LO_IDSEDE" value="<?=set_value('LO_IDSEDE',isset($local['LO_IDSEDE']) ? $local['LO_IDSEDE']  : '')?>" class="form-control-sm" placeholder="">
                     <input    type="text" name="DESC_SEDE" readonly class="form-control" placeholder="Sede" value="<?=set_value('DESC_SEDE',isset($local['SE_DESCRIPCION']) ? $local['SE_DESCRIPCION']  : '')?>">
                     <button type="button"  class="btn btn-primary view_detail" ><i class="fa fa-search"></i></button>
                    </div>
                    <?= form_error('descripcion','<p class="text-danger">','</p>') ?>
                </div>                      
                <div class="form-group row">
                    <input type="hidden" name="idLocal" value="<?=set_value('idLocal',isset($local['LO_ID']) ? $local['LO_ID']  : '')?>" class="form-control" placeholder="">
                    <label class="col-sm-3 col-form-label" >Descripcion</label>
                    <input class="col-sm-4" style="height:30px; type="text" name="descripcion" value="<?=set_value('descripcion',isset($local['LO_DESCRIPCION']) ? $local['LO_DESCRIPCION']  : '')?>" class="form-control-sm" placeholder="">
                    <?= form_error('descripcion','<p class="text-danger">','</p>') ?>
                </div>      
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" >Abreviatura</label>
                    <input class="col-sm-4" style="height:30px; type="text" name="abreviatura" value="<?=set_value('abreviatura',isset($local['LO_ABRE']) ? $local['LO_ABRE']  : '')?>" class="form-control-sm" placeholder="">
                    <?= form_error('abreviatura','<p class="text-danger">','</p>') ?>
                </div>      
                <div class="form-group row"  >
                    <label  class="col-sm-3 col-form-label" >Activo</label>
                    <input  class="col-sm-1" type="checkbox" id ="estado" name="estado" value="<?=set_value('estado',isset($local['LO_ESTADO']) ? $local['LO_ESTADO']  : '0')?>" class="form-control-sm " placeholder="">

                    <?= form_error('estado','<p class="text-danger">','</p>') ?>
                </div>    
  
        </div>
    </div>
    <br>
    <input type="submit" class="btn btn-primary btn-sm" value="Actualizar">
    <input type="button" class="btn btn btn-dark btn-sm" onclick="history.back();" value="Regresar a la lista ">
    </form>
</div>


<div  style=" background-color: rgba(0,0,0,.0001) !important;" id="show_modal" class="modal fade" role="dialog" style="background: #000;">
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

