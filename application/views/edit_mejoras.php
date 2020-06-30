<style>
  fieldset {
  
    border: 6px solid #ddd !important;
    margin: 0;
    xmin-width: 0;
    padding: 10px;       
    position: relative;
    border-radius:4px;
    background-color:#f5f5f5;
    padding-left:10px!important;

}

legend {
  background-color: #fff;
  border: 1px solid #ddd;
  border-radius: 4px;
  color: var(--purple);
  font-size: 17px;
  font-weight: bold;
  padding: 3px 5px 3px 7px;
  width: auto;
}
</style> 









<form action="<?= base_url('mejoras/update') ?>" method="POST"  enctype="multipart/form-data"  >
  <h4>Ingreso de Mejoras </h4>

  <hr>
  
            <!--<div>
              <input type="file" name="profile_image" id="imgInp" />
              <img id="blah" src="#" alt="your image" />
            </div>-->
    <fieldset>
    
          <legend   class="w-auto" > Datos Principales:</legend>
          <div class="form-row">
                  
                  <label class="col-2" for="">Codigo</label>
                  <br>
             <div class="btn-group col-4">
                  <input type="hidden" name="AC_IDFAMILIA"   class="form-control"   value="<?= set_value('user') ?>">
              
                  <input type="text" name="DESC_CODIGO" readonly  class="form-control" placeholder="" value="<?=set_value('AM_IDACTIVO',isset($mejora['AM_IDACTIVO']) ? $mejora['AM_IDACTIVO']  : '')?> ">
                  
                  <button type="button"  class="btn btn-primary view_detailfamilias" ><i class="fa fa-search"></i></button>
            </div>
    
                  <div class="text-danger"><?= form_error('user') ?></div>
                  <div class="btn-group col-4">



                  <input type="text" name="DESC_FAMILIA" readonly  class="form-control" placeholder="" value="<?=set_value('AC_ACTIVO_DES',isset($mejora['AC_ACTIVO_DES']) ? $mejora['AC_ACTIVO_DES']  : '')?> ">
      </div>
              
           </div>
<br>
            <div class="form-row">
                
                    <label class="align-text-bottom col-2 " for="">Marca</label>  

                                   
                    <input type="text"  readonly class="col-2" name="AC_CODIGO_ALT"  class="form-control" placeholder="" value="<?=set_value('AC_IDMARCA',isset($mejora['AC_IDMARCA']) ? $mejora['AC_IDMARCA']  : '')?> ">
                    <div id="Fichaerror" class="text-danger"><?= form_error('user') ?></div>
                  
                
                    <label class="col-2" style="text-align: right;" for="">Modelo</label>
                    <input type="text" readonly class="col-2" name="AC_CODIGO_MODELO"   class="form-control" placeholder="" value="<?=set_value('AC_MODELO',isset($mejora['AC_MODELO']) ? $mejora['AC_MODELO']  : '')?> ">
                    <div class="text-danger"><?= form_error('user') ?></div>
                  
            </div>
   
            <div class="form-row">
             
                <label class="align-text-bottom col-2 " for="">Serie</label>                      
                <input type="text" readonly class="col-2" name="AC_CODIGO_SERIE"  class="form-control" placeholder="" value="<?=set_value('AC_NUMSERIE',isset($mejora['AC_NUMSERIE']) ? $mejora['AC_NUMSERIE']  : '')?> ">
                <div id="Fichaerror" class="text-danger"><?= form_error('user') ?></div>
              
            
                <label class="col-2" style="text-align: right;" for="">Estado</label>
                <input type="text" readonly class="col-2" name="AC_CODIGO_ESTADO"   class="form-control" placeholder="" value="<?=set_value('EF_DESCRIPCION',isset($mejora['EF_DESCRIPCION']) ? $mejora['EF_DESCRIPCION']  : '')?> ">
                <div class="text-danger"><?= form_error('user') ?></div>
              
           </div>
        
       

 
    </fieldset>






    <fieldset>
    
<div class="row">
    <div class="col-6 ">

      <legend  class="w-auto" > Datos Contables</legend>

    </div>

    <div class="col-6 ">
    <legend  class="w-auto" >Valores del Activo</legend>

    </div>
   
 </div>
   
     
    <div class="form-row">
                  <label class="align-text-bottom  col-2  " for="">Ficha Inc.Numero</label>                      
                  <input readonly type="text"  class="col-2" name="AC_CODIGO_FICHA"  class="form-control" placeholder="" value="<?=set_value('AC_CODIGO_ALT',isset($mejora['AC_CODIGO_ALT']) ? $mejora['AC_CODIGO_ALT']  : '')?> ">
                  
                <label class="align-text-bottom col-2 " for="">Valor Libro</label>                      
                <input readonly type="text"  class="col-2" name="AC_CODIGO_VALOR"  class="form-control" placeholder=" " value="<?=set_value('AC_VALOR_LIBRO_CONTABLE',isset($mejora['AC_VALOR_LIBRO_CONTABLE']) ? $mejora['AC_VALOR_LIBRO_CONTABLE']  : '')?> ">

    </div>

    <div class="form-row">
                
                <label class="align-text-bottom col-2 " for="">Fecha Adquisición</label>                      
                <input readonly type="text"  class="col-2" name="AC_CODIGO_FECHA"  class="form-control" placeholder=" " value="<?=set_value('AC_FECHA_COMPRA',isset($mejora['AC_FECHA_COMPRA']) ? $mejora['AC_FECHA_COMPRA']  : '')?> ">
              
            
                <label class="col-2" style="text-align: right;" for="">Deprec. Acumulada</label>
                
                <input readonly type="text" class="col-2" name="AC_CODIGO_DEPRECIACION"   class="form-control" placeholder="" value="<?=set_value('AC_DEPREC_ACUMULADA_CONTABLE',isset($mejora['AC_DEPREC_ACUMULADA_CONTABLE']) ? $mejora['AC_DEPREC_ACUMULADA_CONTABLE']  : '')?> ">
                <div class="text-danger"><?= form_error('user') ?></div>
              
          </div>

    
          <div class="form-row">
                
                <label class="align-text-bottom col-2 " for="">Cta. Contable</label>  
                                    
                <input readonly type="text"  class="col-2" name="AC_CODIGO_CUENTA"  class="form-control" placeholder="" value="<?=set_value('AC_IDCUENTA_CONTABLE',isset($mejora['AC_IDCUENTA_CONTABLE']) ? $mejora['AC_IDCUENTA_CONTABLE']  : '')?> ">
                <div id="Fichaerror" class="text-danger"><?= form_error('user') ?></div>
              
            
                <label class="col-2" style="text-align: right;" for="">Valor Residual</label>
                
                <input readonly type="text" class="col-2" name="AC_CODIGO_VR"   class="form-control" placeholder=" " value="<?=set_value('[VALORRESIDUAL]',isset($mejora['VALORRESIDUAL']) ? $mejora['VALORRESIDUAL']  : '')?> ">
                <div class="text-danger"><?= form_error('user') ?></div>
              
          </div>


          <div class="form-row">
           <div class="col-md-4" >


            </div>
          <div class="col-md-8" >

          <label class="col-3" style="text-align: center;" for="">Moneda Orig.</label>
          
          <input readonly style="text-align: center;" type="text" class="col-3" name="AC_CODIGO_MONEDA"   class="form-control" placeholder="" value="<?=set_value('[MO_ABRE]',isset($mejora['MO_ABRE']) ? $mejora['MO_ABRE']  : '')?> ">
                <div class="text-danger"><?= form_error('user') ?></div>
          </div>
          </div>

     </fieldset>                  

     <fieldset>
    <legend  class="w-auto" > Regularización de la Mejora</legend>
      
           
    <div class="form-row">
        <label class="col-2"  for="birthday">Fecha :   </label>
       
        <?php 
     
 $convertido=       date("Y-m-d", strtotime($mejora['AM_FDOC']));

        ?>

      <input type="date" name="AM_FDOC"  value="<?=set_value('AM_FDOC',isset($convertido) ? $convertido  : '')?>">
    </div>
<br>
     <div class="form-row">
              <label  class="col-2" for="">Tipo de Bien</label>

              <?=form_dropdown('AM_TDOC',get_combo('AF_MA_TIPO_DOCUMENTO','PRO_ID','PRO_DESCRIPCION',array("Seleccione")),$mejora['AM_TDOC'],array('class'=>"form-control",'class'=>"selectpicker",'id'=>"tipo_doc"))?>
         
              <div class="text-danger"><?= form_error('name') ?></div>   
    </div>
    <br>
        <div class="form-row">
                
                <label class="align-text-bottom col-2 " for="">Serie</label>                      
                <input type="text"  class="col-2" name="Serie"  class="form-control" placeholder="" value="<?=set_value('AM_SDOC',isset($mejora['AM_SDOC']) ? $mejora['AM_SDOC']  : '')?> ">
                <div id="Fichaerror" class="text-danger"><?= form_error('user') ?></div>
              
            
                <label class="col-2" style="text-align: right;" for="">Numero</label>
                <input type="text" class="col-2" name="Numero"   class="form-control" placeholder="" value="<?=set_value('AM_NDOC',isset($mejora['AM_NDOC']) ? $mejora['AM_NDOC']  : '')?> ">
                <div class="text-danger"><?= form_error('user') ?></div>
              
        </div>
        <br>
        <div class="form-row">
              <label  class="col-2" for="">Moneda</label>


              <?=form_dropdown('AM_IDMONEDA',get_combo('CO_TB_MONEDA','MO_ABRE','MO_DESCRIPCION',array("Seleccione")),$mejora['AM_IDMONEDA'],array('class'=>"form-control",'class'=>"selectpicker",'id'=>"tipo_mon"))?>
              <div class="text-danger"><?= form_error('name') ?></div>      
         </div>
<br>

           <div class="form-row">
                
                <label class="align-text-bottom col-2 " for="">Tipo de Cambio</label>                      
                <input type="text"  class="col-2" name="Cambio"  class="form-control" placeholder="0.00" value="<?=set_value('AM_TCAM',isset($mejora['AM_TCAM']) ? $mejora['AM_TCAM']  : '')?> ">
                <div id="ErrorCambio" class="text-danger"><?= form_error('user') ?></div>
        
          </div>
<br>   
          <div class="form-row">
                
                <label class="align-text-bottom col-2 " for="">Nro. de Voucher</label>                      
                <input type="text"  class="col-2" name="Voucher"  class="form-control" placeholder="" value="<?=set_value('AM_VOUCHER',isset($mejora['AM_VOUCHER']) ? $mejora['AM_VOUCHER']  : '')?> ">
                <div id="ErrorVoucher" class="text-danger"><?= form_error('user') ?></div>
              
          </div>
 <br>
          <div class="form-row">
                
                <label class="align-text-bottom col-2 " for="">Importe Valor Libro</label>                      
                <input type="text"  class="col-2" name="Libro"  class="form-control" placeholder="" value="<?=set_value('AM_MDOC',isset($mejora['AM_MDOC']) ? $mejora['AM_MDOC']  : '')?> ">
                <div id="ErrorLibro" class="text-danger"><?= form_error('user') ?></div>
              
          </div>
<br>
          <div class="form-row">
                
                <label class="align-text-bottom col-2 " for="">Concepto de Mejora</label>                      
                <input type="text"  class="col-2" name="Concepto"  class="form-control" placeholder="" value="<?=set_value('AM_OBS',isset($mejora['AM_OBS']) ? $mejora['AM_OBS']  : '')?> ">
                <div id="ErrorMejora" class="text-danger"><?= form_error('user') ?></div>
              
          </div>
<br><br><br>

<input type="submit" class="btn btn-primary btn-sm" value="Grabar">
<input type="button" class="btn btn btn-dark btn-sm" onclick="history.back();" value="Regresar a la lista ">


</fieldset>
     
 
    <br>
 
</form>



<div  style=" background-color: rgba(0,0,0,.0001) !important;" id="show_modalfamilias" class="modal fade" role="dialog" style="background: #000;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;"> Familias</h3>
      </div>
      <div class="modal-body"  style="height: 400px;  overflow-y: auto;" >
        <table id = "familias" class="table table-bordered table-striped">
          <thead class="btn-success">
            <tr><input type="text" id="jobsearchfamilias" name="jobsearchfamilias" class="form-control" value="" placeholder="Buscar...." ></tr>
            </tr>
            <tr>
              <th>Codigo</th>
              <th>Descripcion</th>
              <th>Id Activo</th>
            </tr>
          </thead>
          <tbody  id="listfamilias">                    
          </tbody>

       </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>















<div  style=" background-color: rgba(0,0,0,.0001) !important;" id="show_modalbienes" class="modal fade" role="dialog" style="background: #000;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;">Bienes</h3>
      </div>
      <div class="modal-body" style="height: 400px;  overflow-y: auto;" >
        <table id = "bienes" class="table table-bordered table-striped">
          <thead class="btn-success">
<tr><input type="text" id="jobsearchbienes" name="jobsearchbienes" class="form-control" value="" placeholder="Buscar...." ></tr>
            <tr>
              <th>Codigo</th>
              <th>Descripcion</th>
            </tr>
          </thead>
          <tbody  id="listbienes">                    
          </tbody>

       </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>