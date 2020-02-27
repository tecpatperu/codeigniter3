 

<div class="container-fluid">
   
    <form method="POST" action="<?= base_url('area/update') ?>">
        <br>
    <h4 class = "text-left">Area</h4>
    <div class="card">
        <div class="card-body">


                <div class="form-group row">
                    <input type="hidden" name="idArea" value="<?=set_value('idArea',isset($area['AR_ID']) ? $area['AR_ID']  : '')?>" class="form-control" placeholder="">
                    <label class="col-sm-3 col-form-label" >Descripcion</label>
                    <input class="col-sm-4" style="height:30px; type="text" name="descripcion" value="<?=set_value('descripcion',isset($area['AR_DESCRIPCION']) ? $area['AR_DESCRIPCION']  : '')?>" class="form-control-sm" placeholder="">
                    <?= form_error('descripcion','<p class="text-danger">','</p>') ?>
                </div>      
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" >Abreviatura</label>
                    <input class="col-sm-4" style="height:30px; type="text" name="abreviatura" value="<?=set_value('abreviatura',isset($area['AR_ABREVI']) ? $area['AR_ABREVI']  : '')?>" class="form-control-sm" placeholder="">
                    <?= form_error('abreviatura','<p class="text-danger">','</p>') ?>
                </div>      
                <div class="form-group row"  >
                    <label  class="col-sm-3 col-form-label" >Activo</label>
                    <input  class="col-sm-1" type="checkbox" id ="estado" name="estado" value="<?=set_value('estado',isset($area['AR_ESTADO']) ? $area['AR_ESTADO']  : '0')?>" class="form-control-sm " placeholder="">

                    <?= form_error('estado','<p class="text-danger">','</p>') ?>
                </div>    

                <div class="form-group row">
                                 <label class="col-sm-3 col-form-label" >Edificio</label>
                     <div class="btn-group">
                    <input  type="hidden" name="AR_IDEDIFICIO" value="<?=set_value('AR_IDEDIFICIO',isset($area['AR_IDEDIFICIO']) ? $area['AR_IDEDIFICIO']  : '')?>" class="form-control-sm" placeholder="">
                     <input    type="text" name="DESC_EDIFICIO" readonly class="form-control" placeholder="Edificio" value="<?=set_value('DESC_EDIFICIO',isset($area['DESC_EDIFICIO']) ? $area['DESC_EDIFICIO']  : '')?>">
                     <button type="button"  class="btn btn-primary view_detail" ><i class="fa fa-home"></i></button>
                    </div>
                    <?= form_error('descripcion','<p class="text-danger">','</p>') ?>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" >Piso</label>
                     <div class="btn-group">
                    <input  type="hidden" name="AR_IDPISO" value="<?=set_value('AR_IDPISO',isset($area['AR_IDPISO']) ? $area['AR_IDPISO']  : '')?>" class="form-control-sm" placeholder="">
                     <input    type="text" name="DESC_PISO" readonly class="form-control" placeholder="Piso" value="<?=set_value('DESC_PISO',isset($area['DESC_PISO']) ? $area['DESC_PISO']  : '')?>">
                     <button type="button"  class="btn btn-primary view_detail2" ><i class="fa fa-home"></i></button>
                    </div>
                    <?= form_error('descripcion','<p class="text-danger">','</p>') ?>
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


