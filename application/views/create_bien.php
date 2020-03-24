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
<form action="<?= base_url('bien/store') ?>" method="POST"  enctype="multipart/form-data"  >
  <h4>Bien Nuevo <i class="fas fa-exclamation-triangle" style="font-size:24px;color:red; float: right;">Activo sin uso</i></h4>

  <hr>
  
            <!--<div>
              <input type="file" name="profile_image" id="imgInp" />
              <img id="blah" src="#" alt="your image" />
            </div>-->
          <fieldset>
          <legend  class="w-auto" > Datos Generales:</legend>
            <div class="form-row ">
              
                  <label class="col-2" for="">Codigo</label>
                  
                   <input  style="background-color: gray " class="col-2" type="text" name="AC_IDACTIVO" readonly class="form-control" placeholder="Codigo" value="<?=$id ?>"  >
   
                  <div class="text-danger"><?= form_error('user') ?></div>
                  
             
            </div>

            <div class="form-row">
                
                    <label class="align-text-bottom col-2 " for="">Ficha Nro</label>                      
                    <input type="text"  class="col-2" name="AC_CODIGO_ALT"  class="form-control" placeholder="Ficha" value="<?= set_value('user') ?>">
                    <div id="Fichaerror" class="text-danger"><?= form_error('user') ?></div>
                  
                
                    <label class="col-2" style="text-align: right;" for="">Codigo Barra</label>
                    <input type="text" class="col-2" name="AC_CODIGO_BARRA"   class="form-control" placeholder="Codigo de barra" value="<?= set_value('user') ?>">
                    <div class="text-danger"><?= form_error('user') ?></div>
                  
                      
           
              
              <input  class="col-1"    type="checkbox" name="AC_COMPONENTE_DE"  value="0" >
              <label  style="text-align: left"  for="">Es componente de</label>
              <div class="text-danger"><?= form_error('user') ?></div>
           
 
           </div>
   
          <div class="form-row">
              
              <label class="col-2" for="">Descripcion</label>
              <input class="col-8" name="AC_ACTIVO_DES" class="form-control" type="text" placeholder="Descripcion" value="<?= set_value('name') ?>">
              <div class="text-danger"><?= form_error('name') ?></div>   
           
            </div>
   
        
            <div class="form-row">
              <label  class="col-2" for="">Tipo de Bien</label>

              <?=form_dropdown('AC_TIPO_BIEN',get_combo('AF_MA_TIPO_BIEN','OR_ID','OR_DESCRIPCION',array("Seleccione")),0,array('class'=>"form-control",'class'=>"selectpicker",'id'=>"tipo_bien"))?>
              <div class="text-danger"><?= form_error('name') ?></div>   
            </div>


            
            <div class="form-row">
              <label  class="col-2" for="">Origen</label>

              <?=form_dropdown('AC_IDORIGEN_REQ',get_combo('AF_MA_ORIGEN_REQ','OR_ID','OR_DESCRIPCION',array("Seleccione")),0,array('class'=>"form-control",'class'=>"selectpicker",'id'=>"origen"))?>

              <div class="text-danger"><?= form_error('name') ?></div>   


            
                    <br>
                    <div class="btn-group">
                        <label class="col-4" for="" style="text-align: right" >Codigo Prin.</label>
                    <input type="hidden" name="AC_CODIGO_PRINCIPAL"   class="form-control"   value="<?= set_value('user') ?>">
                    <input type="text" name="DESC_CODIGO_PRINCIPAL" readonly class="form-control" placeholder="Codigo Principal" value="<?= set_value('user') ?>">
                     <button type="button"  class="btn btn-primary view_detailbienes" ><i class="fa fa-search"></i></button>
                    </div>
                    <div class="text-danger"><?= form_error('user') ?></div>
            </div>
   
 

 
          </fieldset>






    <fieldset>
    <legend  class="w-auto" > Clasificación</legend>
 
    <div class="form-row">
                  
                    <label class="col-2" for="">Familia</label>
                    <br>
                    <div class="btn-group">
                    <input type="hidden" name="AC_IDFAMILIA"   class="form-control"   value="<?= set_value('user') ?>">
                    <input type="text" name="DESC_FAMILIA" readonly class="form-control" placeholder="Familia" value="<?= set_value('user') ?>">
                     <button type="button"  class="btn btn-primary view_detailfamilias" ><i class="fa fa-search"></i></button>
                    </div>
                    <div class="text-danger"><?= form_error('user') ?></div>
                  
                     
                
    </div>
     
     <div class="form-row">
                  
                    <label class="col-2" for="">SubFamilia</label>
                    <br>
                    <div class="btn-group">
                    <input type="hidden" name="AC_SUBFAMILIA"   class="form-control"   value="<?= set_value('user') ?>">
                    <input type="text" name="DESC_SUBFAMILIA" readonly class="form-control" placeholder="SubFamilia" value="<?= set_value('user') ?>">
                     <button type="button"  class="btn btn-primary view_detailsubfamilias" ><i class="fa fa-search"></i></button>
                    </div>
                    <div id="subfamiliaerror"  class="text-danger"><?= form_error('user') ?></div>
                  
                     
                
     </div>
     </fieldset>                  

     <fieldset>
    <legend  class="w-auto" > Ubicación</legend>
      
            <div class="form-row">

                    <label class="col-2" for="">Sede</label>
                    
                    <div  class="btn-group">
                    <input type="hidden" name="AC_IDSEDE"   class="form-control"   value="<?= set_value('user') ?>">
                    <input type="text" name="DESC_SEDE" readonly class="form-control" placeholder="Sede" value="<?= set_value('user') ?>">
                     <button type="button"  class="btn btn-primary view_detailsedes" ><i class="fa fa-search"></i></button>
                    </div>
                    <div class="text-danger"><?= form_error('user') ?></div>
                  
             
            </div>

            <div class="form-row">
                
                    <label class="col-2" for="">Local</label>
                   
                    <div  class="btn-group">
                    <input type="hidden" name="AC_IDLOCAL"   class="form-control"   value="<?= set_value('user') ?>">
                    <input type="text" name="DESC_LOCAL" readonly class="form-control" placeholder="Local" value="<?= set_value('user') ?>">
                     <button type="button"  class="btn btn-primary view_detaillocales" ><i class="fa fa-search"></i></button>
                    </div>
                    <div id="localerror" class="text-danger"><?= form_error('user') ?></div>
                  
                     
                
            </div>
            <div class="form-row">
                
                    <label class="col-2" for="">Area</label>
                  
                    <div  class="btn-group">
                    <input type="hidden" name="AC_IDAREA"   class="form-control"   value="<?= set_value('user') ?>">
                    <input type="text" name="DESC_AREA" readonly class="form-control" placeholder="Area" value="<?= set_value('user') ?>">
                     <button type="button"  class="btn btn-primary view_detailareas" ><i class="fa fa-search"></i></button>
                    </div>
                    <div id="areaerror" class="text-danger"><?= form_error('user') ?></div>
                  
                     
               
            </div>
 
 
                       
     <div class="form-row">
                  
                    <label class="col-2" for="">Oficina</label>
                    <br>
                    <div class="btn-group">
                    <input type="hidden" name="AC_IDOFICINA"   class="form-control"   value="<?= set_value('user') ?>">
                    <input type="text" name="DESC_OFICINA" readonly class="form-control" placeholder="Oficina" value="<?= set_value('user') ?>">
                     <button type="button"  class="btn btn-primary view_detailoficinas" ><i class="fa fa-search"></i></button>
                    </div>
                    <div class="text-danger"><?= form_error('user') ?></div>
                  
       
    </div>

         <div class="form-row">
                  
                    <label class="col-2" for="">Edificio</label>
                    <br>
                    <div class="btn-group">
                    <input type="hidden" name="AC_IDEDIFICIO"   class="form-control"   value="<?= set_value('user') ?>">
                    <input type="text" name="DESC_EDIFICIO" readonly class="form-control" placeholder="Edificio" value="<?= set_value('user') ?>">
                     <button type="button"  class="btn btn-primary view_detailedificios" ><i class="fa fa-search"></i></button>
                    </div>
                    <div class="text-danger"><?= form_error('user') ?></div>
                  
       
    </div>
                        
    <div class="form-row">
                  
                    <label class="col-2" for="">Piso</label>
                    <br>
                    <div class="btn-group">
                    <input type="hidden" name="AC_IDPISO"   class="form-control"   value="<?= set_value('user') ?>">
                    <input type="text" name="DESC_PISO" readonly class="form-control" placeholder="Piso" value="<?= set_value('user') ?>">
                     <button type="button"  class="btn btn-primary view_detailpisos" ><i class="fa fa-search"></i></button>
                    </div>
                    <div class="text-danger"><?= form_error('user') ?></div>
                  
                   
    </div>
</fieldset>
     <fieldset>
    <legend  class="w-auto" > Asignación</legend>

   <div class="form-row">
                  
                    <label class="col-2" for="">Responsable</label>
                    <br>
                    <div class="btn-group">
                    <input type="hidden" name="AC_IDRESPON_ACTI"   class="form-control"   value="<?= set_value('user') ?>">
                    <input type="text" name="DESC_RESPON_ACTI" readonly class="form-control" placeholder="Responsable" value="<?= set_value('user') ?>">
                     <button type="button"  class="btn btn-primary view_detailresponsables" ><i class="fa fa-search"></i></button>
                    </div>
                    <div class="text-danger"><?= form_error('user') ?></div>
                  
                     
                
    </div>
     
     <div class="form-row">
                  
                    <label class="col-2" for="">Supervisor</label>
                    <br>
                    <div class="btn-group">
                    <input type="hidden" name="AC_SUPERVISOR"   class="form-control"   value="<?= set_value('user') ?>">
                    <input type="text" name="DESC_SUPERVISOR" readonly class="form-control" placeholder="Supervisor" value="<?= set_value('user') ?>">
                     <button type="button"  class="btn btn-primary view_detailsupervisores" ><i class="fa fa-search"></i></button>
                    </div>
                    <div class="text-danger"><?= form_error('user') ?></div>
                  
                     
                
     </div>



     <div class="form-row">
                  
                    <label class="col-2" for="">Usuario</label>
                    <br>
                    <div class="btn-group">
                    <input type="hidden" name="AC_USUARIO_UBICACION"   class="form-control"   value="<?= set_value('user') ?>">
                    <input type="text" name="DESC_USUARIO_UBICACION" readonly class="form-control" placeholder="Usuario" value="<?= set_value('user') ?>">
                     <button type="button"  class="btn btn-primary view_detailusuarios" ><i class="fa fa-search"></i></button>
                    </div>
                    <div class="text-danger"><?= form_error('user') ?></div>
                  
                     
                
     </div>

   </fieldset>
 
    <br>
 
   <ul class="nav nav-tabs" >
    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#Datos">Datos<br/>.</a></li>
    <li class='nav-item'><a     class="nav-link"  data-toggle="tab" href="#Adquisicion">Adquisición<br/>.<br></a></li>
    <li class='nav-item'><a class="nav-link" data-toggle="tab" href="#Tributario">Tributario<br/>.<br></a></li>
    <li class='nav-item'><a  class="nav-link" data-toggle="tab" href="#Financiera">Financiera<br/>.<br></a></li>
    <li class='nav-item'><a  class="nav-link" data-toggle="tab" href="#Ajustes">Lista de <br>Ajustes</a></li>
    <li class='nav-item'><a  class="nav-link" data-toggle="tab" href="#Mejoras">Lista de <br>Mejoras</a></li>
    <li class='nav-item'><a  class="nav-link" data-toggle="tab" href="#Traslado">Lista de <br>Traslado</a></li>
    <li class='nav-item'><a  class="nav-link" data-toggle="tab" href="#Reclasificacion">Lista de <br>Reclasificación</a></li>
    <li class='nav-item'><a  class="nav-link" data-toggle="tab" href="#Revaluacion">Lista de<br>Revaluación</a></li>
    <li class='nav-item'><a  class="nav-link" data-toggle="tab" href="#Cambio">Lista de <br>Ajustes X Dif. Cambio</a></li>
    <li class='nav-item'><a  class="nav-link" data-toggle="tab" href="#Otros">Otros<br/>.</a></li>
    <li class='nav-item'><a  class="nav-link" data-toggle="tab" href="#Foto">Foto<br/>.</a></li>
  </ul>

  <div class="tab-content"  >
    <div id="Datos" class="tab-pane   fade in show active"   >
      <br>
            <div class="form-row ">
               
                  <label class="col-2" for="">Marca</label>
                  
                   <input class="col-3" type="text" name="AC_IDMARCA"  class="form-control" placeholder="Marca" value="<?= set_value('user') ?>">
   
                  <div class="text-danger"><?= form_error('user') ?></div>
                  
             
            </div>
            <div class="form-row ">
                
                  <label class="col-2" for="">Modelo</label>
                  
                  <input class="col-3" type="text" name="AC_MODELO"  class="form-control" placeholder="Modelo" value="<?= set_value('user') ?>">
   
                  <div class="text-danger"><?= form_error('user') ?></div>
                  
             
            </div>
            <div class="form-row ">
              
                  <label class="col-2" for="">Num. Serie</label>
                  
                   <input class="col-3" type="text" name="AC_NUMSERIE"  class="form-control" placeholder="Numero Serie" value="<?= set_value('user') ?>">
   
                  <div class="text-danger"><?= form_error('user') ?></div>
                  
             
            </div>
            <div class="form-row">
             
              <label class="col-2" for="">Color</label>
              <?=form_dropdown('AC_IDCOLOR',get_combo('AF_MA_COLOR','CO_ID','CO_DESCRIPCION',array("Seleccione")),0,array('class'=>"form-control",'class'=>"selectpicker",'id'=>"color"))?>
              <div class="text-danger"><?= form_error('name') ?></div>   
           
            </div>
          <div class="form-row">
             
              <label class="col-2" for="">Estado Conser.</label>
              <?=form_dropdown('AC_IDESTADO_FISICO',get_combo('AF_MA_ESTADO_FISICO','EF_ID','EF_DESCRIPCION',array("Seleccione")),0,array('class'=>"form-control",'class'=>"selectpicker",'id'=>"estadofisico"))?>
              <div class="text-danger"><?= form_error('name') ?></div>   
           
            </div>
          <div class="form-row">
             
              <label class="col-2" for="">Condicion</label>
              <?=form_dropdown('AC_IDCONDIBIEN',get_combo('AF_MA_CONDICION_BIEN','CB_ID','CB_DESCRIPCION',array("Seleccione")),0,array('class'=>"form-control",'class'=>"selectpicker",'id'=>"condicionbien"))?>
              <div class="text-danger"><?= form_error('name') ?></div>   
           
            </div>
          <div class="form-row">
             
              <label class="col-2" for="">Procedencia</label>
              <?=form_dropdown('AC_IDPROCEDENCIA',get_combo('AF_MA_PROCEDENCIA','PR_ID','PR_DESCRIPCION',array("Seleccione")),0,array('class'=>"form-control",'class'=>"selectpicker",'id'=>"procedenciabien"))?>
              <div class="text-danger"><?= form_error('name') ?></div>   
           
            </div>
          <div class="form-row">
             
              <label class="col-2" for="">Est. Inventario</label>
              <?=form_dropdown('AC_FLAG_ESTADO_INVENTARIO',get_combo('AF_LT_FLAG_ESTADO_INV','EI_ID','EI_DES',array("Seleccione")),0,array('class'=>"form-control",'class'=>"selectpicker",'id'=>"estadoinventario"))?>
              <div class="text-danger"><?= form_error('name') ?></div>   
           
            </div>
          <div class="form-row">
             
              <label class="col-2" for="">Dimensiones</label>
              <input class="col-3" type="text" name="AC_DIMENSION"  class="form-control" placeholder="Dimensiones" value="<?= set_value('user') ?>">
              <div class="text-danger"><?= form_error('name') ?></div>   
           
            </div>
          <div class="form-row">
             
              <label class="col-2" for="">Obs.</label>
              <input class="col-3" type="text" name="AC_OBSERVACIONES"  class="form-control" placeholder="Observaciones" value="<?= set_value('user') ?>">
              <div class="text-danger"><?= form_error('name') ?></div>   
           
            </div>
    </div>
    <div id="Adquisicion" class="tab-pane fade" >
        <br>
            <div class="form-row">
                <label class="col-2" for="">Tip. Doc.</label>
              <?=form_dropdown('AC_TDOC',get_combo('AF_MA_TIPO_DOCUMENTO','PRO_ID','PRO_DESCRIPCION',array("Seleccione")),0,array('class'=>"form-control",'class'=>"selectpicker",'id'=>"tipo_documento"))?>
                <div class="text-danger"><?= form_error('name') ?></div>   
            </div>
            <div class="form-row">
              <label class="col-2" for="">Serie/Num.</label>
              <input class="col-1" type="text" name="AC_SDOC"  class="form-control" placeholder="Serie" value="<?= set_value('user') ?>">
              <input class="col-1" type="text" name="AC_NDOC"  class="form-control" placeholder="Numero" value="<?= set_value('user') ?>">
              <div class="text-danger"><?= form_error('name') ?></div>   
            </div>
            <div class="form-row">
                <label class="col-2" for="">Proveedor</label>
            <?=form_dropdown('AC_IDPROVE',get_combo('AF_MA_PROVEEDOR','PRO_ID','PRO_DESCRIPCION',array("Seleccione")),0,array('class'=>"form-control",'class'=>"selectpicker",'id'=>"tipo_documento"))?>
                <div class="text-danger"><?= form_error('name') ?></div>   
            </div>
            <div class="form-row">
                <label class="col-2" >Fec. Adq.</label>
                   
                <input class="col-2" name="AC_FECHA_COMPRA" class="form-control" type="date"   >
            </div>
           <div class="form-row">
                <label class="col-2" >Fec. en Act.</label>
                   
                <input class="col-2" name="AC_FECHA_INI_OPE" class="form-control" type="date"   >
            </div>
            <div class="form-row">
              <label class="col-2" for="">Guia Remisión.</label>
              <input class="col-3" type="text" name="AC_SERIE_GUIA_REMISION"  class="form-control" placeholder="Guia remision" value="<?= set_value('user') ?>">
              <div class="text-danger"><?= form_error('name') ?></div>   
            </div>
            <div class="form-row">
              <label class="col-2" for="">N° DUA</label>
              <input class="col-3" type="text" name="AC_NUM_DUA"  class="form-control" placeholder="AC_NUM_DUA" value="<?= set_value('user') ?>">
              <div class="text-danger"><?= form_error('name') ?></div>   
            </div>
            <div class="form-row">
                  
                    <label class="col-2"  for="">Cod. Proyecto</label>
                    <br>
                    <div class="btn-group">
                    <input type="hidden" name="AC_CODPROYECTO"   class="form-control"   value="<?= set_value('user') ?>">
                    <input type="text" name="DESC_PROYECTO" readonly class="form-control" placeholder="Proyecto"   value="<?= set_value('user') ?>">
                     <button type="button"  class="btn btn-primary view_detailproyectos"  ><i class="fa fa-search"></i></button>
                    </div>
                    <div class="text-danger"><?= form_error('user') ?></div>
             </div>
            <div class="form-row" >
                  
                    <label class="col-2" for="" >Contrato Leasing</label>
                    <br>
                    <div class="btn-group">
                    <input type="hidden" name="AC_NUM_CONTRATO"   class="form-control"   value="<?= set_value('user') ?>">
                    <input type="text"   name="DESC_CONTRATO" readonly class="form-control" placeholder="Contrato"  value="<?= set_value('user') ?>">
                     <button type="button"  class="btn btn-primary view_detailcontratos"   ><i class="fa fa-search"></i></button>
                    </div>
                    <div class="text-danger"><?= form_error('user') ?></div>
             </div>
    </div>
    <div id="Tributario" class="tab-pane   fade">
        <br>
            <div class="form-row">
                <label class="col-2" for="">Centro Costo</label>
            <?=form_dropdown('AC_IDCENCOS',get_combo('AF_MA_CENCOS','CC_ID','CC_DESCRIPCION',array("Seleccione")),0,array('class'=>"form-control",'class'=>"selectpicker",'id'=>"centrocosto"))?>
                <div class="text-danger"><?= form_error('name') ?></div>   
            </div>
            <div class="form-row">
                <label class="col-2" for="">Cuenta Contable</label>
               <?=form_dropdown('AC_IDCUENTA_CONTABLE',get_combo('AF_MA_CUENTA_CONTABLE','AR_ID','AR_ID',array("Seleccione"),'AR_DESCRIPCION'),0,array('class'=>"form-control",'class'=>"selectpicker",'id'=>"cuentacontable"))?>
                <div class="text-danger"><?= form_error('name') ?></div>   
            </div>
            <div class="form-row">
              <label class="col-2" for="">Tasa Depreciación.</label>
              <input class="col-1" type="text" name="AC_TASA_DEPREC_CONTABLE"   readonly class="form-control"  value="<?= set_value('user') ?>" >
              <label class="col-2" for="">%</label>
              <div class="text-danger"><?= form_error('name') ?></div>   










            </div>
            <div class="form-row">
                <label class="col-2" for="">Moneda de compra </label>
            <?=form_dropdown('AC_MONEDACOMPRA',get_combo('CO_TB_MONEDA','MO_ABRE','MO_DESCRIPCION',array("Seleccione")),'0',array('class'=>"form-control",'class'=>"selectpicker",'id'=>"monedacompracreate"))?>
                <div class="text-danger"><?= form_error('name') ?></div>   
            </div>
            <div class="form-row">
              <label class="col-2" for="">Número de Voucher.</label>
              <input class="col-3" type="text" name="AC_NUM_VOUCHER"  class="form-control" placeholder="Numero voucher" value="<?= set_value('user') ?>">
              <div class="text-danger"><?= form_error('name') ?></div>   
            </div>
            <div class="form-row">
              <label class="col-2" for="">T.C de Voucher.</label>
              <input class="col-3" type="text" name="AC_TC_VOUCHER"  class="form-control" placeholder="0.000" value="<?= set_value('user') ?>" >
              <div class="text-danger"><?= form_error('name') ?></div>   
            </div>
            <div class="form-row">
              <label class="col-2" for="">Valor Historico S/.</label>
              <input class="col-3" type="text" name="AC_VH_SOLES"  class="form-control" placeholder="0.00" value="<?= set_value('user') ?>" readonly>
              <div class="text-danger"><?= form_error('name') ?></div>   
            </div>
            <div class="form-row">
              <label class="col-2" for="">Valor Historico $</label>
              <input class="col-3" type="text" name="AC_VH_DOLARES"  class="form-control" placeholder="0.00" value="<?= set_value('user') ?>" disabled>
              <div class="text-danger"><?= form_error('name') ?></div>   
            </div>
            <div class="form-row">
              <label class="col-2" for="">Precio Compra S/.</label>
              <input class="col-1" type="text" name="pc_soles_contable"  class="form-control" placeholder="0.00" value="<?= set_value('user') ?>" readonly>
              <input class="col-1" type="text" name="igv_general_contable"  class="form-control" placeholder="0.00" value="18" disabled>
             
              <input class="col-1" type="text" name="total_cuenta_contable"  class="form-control" placeholder="0.00" value="<?= set_value('user') ?>" readonly>




              <div class="text-danger"><?= form_error('name') ?></div>   
            </div>
            <div class="form-row">
              <label class="col-2" for="">Al cambio $</label>
              <input class="col-1" type="text" name="pc_dolares_contable"  class="form-control" placeholder="" value="<?= set_value('user') ?>" disabled>
              <label class="col-1" for="">T.C.</label><input class="col-1" type="text" name="tc_compra_contable"  class="form-control" placeholder="" value="<?= set_value('user') ?>" disabled>
              <div class="text-danger"><?= form_error('name') ?></div>   
            </div>
            <div class="form-row">
              <label class="col-2" for="">Valor Libro $</label>
              <input class="col-1" type="text" name="AC_VALOR_LIBRO_CONTABLE"  class="form-control" placeholder="0.00" value="<?= set_value('user') ?>" readonly>
              <input   type="checkbox" name="prec_compra_sin_igv"  value="0" >
              <label   for="">Precio Compra sin IGV</label>
              <div class="text-danger"><?= form_error('name') ?></div>   
            </div>
            <div class="form-row">
              <label class="col-2" for="">Deprec. Ejercicio</label>
              <input class="col-1" type="text" name="AC_DEPREC_EJERCICIO_CONTABLE"  class="form-control" placeholder="0.00" value="<?= set_value('user') ?>" disabled>
              <div class="text-danger"><?= form_error('name') ?></div>   
            </div>
            <div class="form-row">
              <label class="col-2" for="">Deprec. Acumulada</label>
              <input class="col-1" type="text" name="AC_DEPREC_ACUMULADA_CONTABLE"  class="form-control" placeholder="0.00" value="<?= set_value('user') ?>" disabled>
              <div class="text-danger"><?= form_error('name') ?></div>   
            </div>
            <div class="form-row">
              <label class="col-2" for="">Valor Residual</label>
              <input class="col-1" type="text" name="AC_VALOR_RESIDUAL"  class="form-control" placeholder="0.00" value="<?= set_value('user') ?>" disabled>
              <div class="text-danger"><?= form_error('name') ?></div>   
            </div>
    </div>
    <div id="Financiera" class="tab-pane   fade">
        <br>



            <div class="form-row">
              <label class="col-2" for="">Tiempo de vida</label>
              <input class="col-2" type="text" name="AC_TIEMPO_VIDA"  class="form-control" placeholder="Tiempo vida" value="<?= set_value('user') ?>" readonly>
               <label class="col-1" for="">Años</label>

                <input   type="checkbox" name="AC_DEPREC_INDIVIDUAL"  value="0" >
               <label class="col-2" for="">Depreciación individual</label>
               
              <div class="text-danger"><?= form_error('name') ?></div>   
            </div>
           

            <div class="form-row">
              <label class="col-2" for="">Tasa anual</label>
              <input class="col-2" type="text" name="AC_TASA_DEPREC_INDIVIDUAL"  class="form-control" placeholder="0.00" value="<?= set_value('user') ?>" readonly>
               <label class="col-1" for="">%</label>
                
              <div class="text-danger"><?= form_error('name') ?></div>   
            </div>



            <div class="form-row">
              <label class="col-2" for="">Referencia</label>
              <input class="col-2" type="text" name="AC_REFERENCIA_FINANCIERA"  class="form-control" placeholder="referencia" value="<?= set_value('user') ?>" >
              <div class="text-danger"><?= form_error('name') ?></div>   
            </div>



            <div class="form-row">
              <label class="col-2" for="">Deprec. de Ejerc.</label>
              <input class="col-2" type="text" name="AC_REFERENCIA_FINANCIERA-2"  class="form-control" placeholder="0.00" value="<?= set_value('user') ?>" disabled>
              <div class="text-danger"><?= form_error('name') ?></div>   
            </div>
            <div class="form-row">
              <label class="col-2" for="">Deprec. Acu.</label>
              <input class="col-2" type="text" name="AC_DEPREC_EJERCICIO_FINANCIERA-3"  class="form-control" placeholder="0.00" value="<?= set_value('user') ?>" disabled>
              <div class="text-danger"><?= form_error('name') ?></div>   
            </div>
            <div class="form-row">
              <label class="col-2" for="">Valor Residual</label>
              <input class="col-2" type="text" name="AC_DEPREC_ACUMULADA_FINANCIERA-1"  class="form-control" placeholder="0.00" value="<?= set_value('user') ?>" disabled>
              <div class="text-danger"><?= form_error('name') ?></div>   
            </div>
    </div>
    <div id="Ajustes" class="tab-pane   fade">
      
      <p> </p>
    </div>
    <div id="Mejoras" class="tab-pane   fade">
       
      <p> </p>
    </div>
    <div id="Traslado" class="tab-pane   fade">
     
      <p> </p>
    </div>
    <div id="Reclasificacion" class="tab-pane   fade">
      
      <p></p>
    </div>
    <div id="Revaluacion" class="tab-pane   fade">
      
      <table>
        <tr>
        <th></th>
        <th>Activo</th>
        <th>Dep- Tributaria</th>
        <th>Dep. Financiera</th>
        </tr>
        <tr>
        <td>Revaluación</td>
        <td> 
            <input class="col-5" type="text" name="activo"  class="form-control" placeholder="0" value="<?= set_value('user') ?>">
        </td>
        <td>
          <input class="col-5" type="text" name="dep_tributaria"  class="form-control" placeholder="0" value="<?= set_value('user') ?>">
        </td>
        <td>
          <input class="col-5" type="text" name="dep_financiera"  class="form-control" placeholder="0" value="<?= set_value('user') ?>">
        </td>
        </tr>
      </table>
    </div>
    <div id="Cambio" class="tab-pane   fade">
      
       <table>
        <tr>
        <th></th>
        <th>Activo</th>
        </tr>
        <tr>
        <td>Dif. de Cambio</td>
        <td> 
            <input class="col-5" type="text" name="activo"  class="form-control" placeholder="0" value="<?= set_value('user') ?>">
        </td>
        </tr>
      </table>
    </div>
    <div id="Otros" class="tab-pane   fade">
       <br>
            <div class="form-row">
              <label class="col-2" for="">Placa</label>
              <input class="col-3" type="text" name="AC_NUMPLACA"  class="form-control" placeholder="placa" value="<?= set_value('user') ?>">
              <div class="text-danger"><?= form_error('name') ?></div>   
            </div>
            <div class="form-row">
              <label class="col-2" for="">Año</label>
              <input class="col-3" type="text" name="AC_ANIO_OTROS"  class="form-control" placeholder="año" value="<?= set_value('user') ?>">
              <div class="text-danger"><?= form_error('name') ?></div>   
            </div>
            <div class="form-row">
              <label class="col-2" for="">N° Chasis</label>
              <input class="col-3" type="text" name="AC_CHASIS"  class="form-control" placeholder="chasis" value="<?= set_value('user') ?>">
              <div class="text-danger"><?= form_error('name') ?></div>   
            </div>
            <div class="form-row">
              <label class="col-2" for="">N° Motor</label>
              <input class="col-3" type="text" name="AC_NUMMOTOR"  class="form-control" placeholder="motor" value="<?= set_value('user') ?>">
              <div class="text-danger"><?= form_error('name') ?></div>   
            </div>
    </div>
    <div id="Foto" class="tab-pane   fade">
       
        <br>
            <div>
              
               <input type="file" name="profile_image" id="imgInp" value="Agregar foto"/>
              <img id="blah" src="#"   />
            </div>
    </div>
  </div>
 
 <br>
 <br>
 <br>
        <input type="submit" class="btn btn-primary btn-sm" value="Grabar">
        <input type="button" class="btn btn btn-dark btn-sm" onclick="history.back();" value="Regresar a la lista ">
     
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

<div  style=" background-color: rgba(0,0,0,.0001) !important;" id="show_modalsubfamilias" class="modal fade" role="dialog" style="background: #000;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;">Sub Familias</h3>
      </div>
      <div class="modal-body"  style="height: 400px;  overflow-y: auto;" >
        <table id = "subfamilias" class="table table-bordered table-striped">
          <thead class="btn-success">
            <tr><input type="text" id="jobsearchsubfamilias" name="jobsearchsubfamilias" class="form-control" value="" placeholder="Buscar...." ></tr>
            </tr>
            <tr>
              <th>Codigo</th>
              <th>Descripcion</th>
            </tr>
          </thead>
          <tbody  id="listsubfamilias">                    
          </tbody>

       </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<div  style=" background-color: rgba(0,0,0,.0001) !important;" id="show_modalsedes" class="modal fade" role="dialog" style="background: #000;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;">Sedes</h3>
      </div>
      <div class="modal-body" style="height: 400px;  overflow-y: auto;" >
        <table id = "sedes" class="table table-bordered table-striped">
          <thead class="btn-success">
            <tr><input type="text" id="jobsearchsedes" name="jobsearchsedes" class="form-control" value="" placeholder="Buscar...." ></tr>
            <tr>
              <th>Codigo</th>
              <th>Descripcion</th>
 
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
      <div class="modal-body" style="height: 400px;  overflow-y: auto;" >
        <table id = "locales" class="table table-bordered table-striped">
          <thead class="btn-success">
            <tr>
              <th>Codigo</th>
              <th>Descripcion</th>
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
      <div class="modal-body" style="height: 400px;  overflow-y: auto;" >
        <table id = "areas" class="table table-bordered table-striped">
          <thead class="btn-success">
       <tr><input type="text" id="jobsearchareas" name="jobsearchareas" class="form-control" value="" placeholder="Buscar...." ></tr>
            <tr>
              <th>Codigo</th>
              <th>Descripcion</th>
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


<div  style=" background-color: rgba(0,0,0,.0001) !important;" id="show_modaloficinas" class="modal fade" role="dialog" style="background: #000;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;"> Oficinas</h3>
      </div>
      <div class="modal-body" style="height: 400px;  overflow-y: auto;" >
        <table id = "oficinas" class="table table-bordered table-striped">
          <thead class="btn-success">
       <tr><input type="text" id="jobsearchoficinas" name="jobsearchoficinas" class="form-control" value="" placeholder="Buscar...." ></tr>
            <tr>
              <th>Codigo</th>
              <th>Descripcion</th>
            </tr>
          </thead>
          <tbody  id="listoficinas">                    
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
      <div class="modal-body" style="height: 400px;  overflow-y: auto;" >
        <table id = "edificios" class="table table-bordered table-striped">
          <thead class="btn-success">
       <tr><input type="text" id="jobsearchedificios" name="jobsearchedificios" class="form-control" value="" placeholder="Buscar...." ></tr>
            <tr>
              <th>Codigo</th>
              <th>Descripcion</th>
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
      <div class="modal-body" style="height: 400px;  overflow-y: auto;" >
        <table id = "pisos" class="table table-bordered table-striped">
          <thead class="btn-success">
       <tr><input type="text" id="jobsearchpisos" name="jobsearchpisos" class="form-control" value="" placeholder="Buscar...." ></tr>
            <tr>
              <th>Codigo</th>
              <th>Descripcion</th>
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


<div  style=" background-color: rgba(0,0,0,.0001) !important;" id="show_modalresponsables" class="modal fade" role="dialog" style="background: #000;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;"> Responsables</h3>
      </div>
      <div class="modal-body" style="height: 400px;  overflow-y: auto;" >
        <table id = "responsables" class="table table-bordered table-striped">
          <thead class="btn-success">
 <tr><input type="text" id="jobsearchresponsables" name="jobsearchresponsables" class="form-control" value="" placeholder="Buscar...." ></tr>
            <tr>
              <th>Codigo</th>
              <th>Descripcion</th>
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
      <div class="modal-body" style="height: 400px;  overflow-y: auto;" >
        <table id = "supervisores" class="table table-bordered table-striped">
          <thead class="btn-success">
<tr><input type="text" id="jobsearchsupervisores" name="jobsearchsupervisores" class="form-control" value="" placeholder="Buscar...." ></tr>
            <tr>
              <th>Codigo</th>
              <th>Descripcion</th>
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



<div  style=" background-color: rgba(0,0,0,.0001) !important;" id="show_modalusuarios" class="modal fade" role="dialog" style="background: #000;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;"> Usuarios</h3>
      </div>
      <div class="modal-body" style="height: 400px;  overflow-y: auto;" >
        <table id = "usuarios" class="table table-bordered table-striped">
          <thead class="btn-success">
      <tr><input type="text" id="jobsearchusuarios" name="jobsearchusuarios" class="form-control" value="" placeholder="Buscar...." ></tr>
            <tr>
              <th>Codigo</th>
              <th>Descripcion</th>
            </tr>
          </thead>
          <tbody  id="listusuarios">                    
          </tbody>

       </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<div  style=" background-color: rgba(0,0,0,.0001) !important;" id="show_modalproyectos" class="modal fade" role="dialog" style="background: #000;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;">Proyectos</h3>
      </div>
      <div class="modal-body" style="height: 400px;  overflow-y: auto;" >
        <table id = "proyectos" class="table table-bordered table-striped">
          <thead class="btn-success">
<tr><input type="text" id="jobsearchusuarios" name="jobsearchproyectos" class="form-control" value="" placeholder="Buscar...." ></tr>
            <tr>
              <th>Codigo</th>
              <th>Descripcion</th>
            </tr>
          </thead>
          <tbody  id="listproyectos">                    
          </tbody>

       </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div  style=" background-color: rgba(0,0,0,.0001) !important;" id="show_modalcontratos" class="modal fade" role="dialog" style="background: #000;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;">Contratos</h3>
      </div>
      <div class="modal-body" style="height: 400px;  overflow-y: auto;" >
        <table id = "contratos" class="table table-bordered table-striped">
          <thead class="btn-success">
<tr><input type="text" id="jobsearchcontratos" name="jobsearchcontratos" class="form-control" value="" placeholder="Buscar...." ></tr>
            <tr>
              <th>Codigo</th>
              <th>Descripcion</th>
            </tr>
          </thead>
          <tbody  id="listcontratos">                    
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