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
	<h4>Bien Nuevo</h4>
	<hr>
	
            <!--<div>
              <input type="file" name="profile_image" id="imgInp" />
              <img id="blah" src="#" alt="your image" />
            </div>-->
          <fieldset>
          <legend  class="w-auto" > Datos Generales:</legend>
            <div class="form-row ">
                <input type="hidden" name="OF_IDSEDE"   class="form-control"   value="<?= set_value('user') ?>">
                  <label class="col-2" for="">Codigo</label>
                  
                   <input class="col-3" type="text" name="DESC_SEDE"  class="form-control" placeholder="Codigo" value="<?= set_value('user') ?>">
   
                  <div class="text-danger"><?= form_error('user') ?></div>
                  
             
            </div>

            <div class="form-row">
                
                    <label class="align-text-bottom col-2 " for="">Ficha Nro</label>
                   
                      
                    <input type="text"  class="col-2" name="DESC_LOCAL"  class="form-control" placeholder="Ficha" value="<?= set_value('user') ?>">
                    
                    <div id="localerror" class="text-danger"><?= form_error('user') ?></div>
                  
                
                    <label class="col-2" for="">Codigo Barra</label>
                  
                    
                    <input type="text" class="col-2" name="DESC_AREA"   class="form-control" placeholder="Codigo de barra" value="<?= set_value('user') ?>">
    
                    <div class="text-danger"><?= form_error('user') ?></div>
                  
                      
        	 
        			
        			<input   type="checkbox" name="OF_DESCRIPCION"  value="<?= set_value('user') ?>">
              <label   for="">Es componente de</label>
					    <div class="text-danger"><?= form_error('user') ?></div>
        	 
 
        	 </div>
   
        	<div class="form-row">
        		 
        			<label class="col-2" for="">Descripcion</label>
        			<input class="col-10" name="OF_ABREVI" class="form-control" type="text" placeholder="Descripcion" value="<?= set_value('name') ?>">
				    	<div class="text-danger"><?= form_error('name') ?></div>   
        	 
            </div>
   
          <div class="form-row">
             
              <label class="col-2" for="">Tipo de Bien</label>
              <select style="width:200px;" name="especialidades" id="especialidades" size="1">
                  
                  <?php
                      foreach($especialidades as $especialidad){
                  ?>
                    <option value="<?php echo $especialidad->cod_esp; ?>"><?php echo $especialidad->nom_esp; ?></option>
                  <?php }     ?>
              </select>
              <div class="text-danger"><?= form_error('name') ?></div>   
           
            </div>
   
            <div class="form-row">
             
              <label class="col-2" for="">Origen</label>
              <select style="width:200px;" name="especialidades" id="especialidades" size="1">
                  
                  <?php
                      foreach($especialidades as $especialidad){
                  ?>
                    <option value="<?php echo $especialidad->cod_esp; ?>"><?php echo $especialidad->nom_esp; ?></option>
                  <?php }     ?>
              </select>
              <div class="text-danger"><?= form_error('name') ?></div>   
           
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
                  
                    <label class="col-2" for="">Oficina</label>
                    <br>
                    <div class="btn-group">
                    <input type="hidden" name="OF_IDOFICINA"   class="form-control"   value="<?= set_value('user') ?>">
                    <input type="text" name="DESC_OFICINA" readonly class="form-control" placeholder="Ofiicna" value="<?= set_value('user') ?>">
                     <button type="button"  class="btn btn-primary view_detailedificios" ><i class="fa fa-search"></i></button>
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
</fieldset>
     <fieldset>
    <legend  class="w-auto" > Asignación</legend>

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
                  
                    <label class="col-2" for="">Usuario</label>
                    <br>
                    <div class="btn-group">
                    <input type="hidden" name="OF_SUPERVISOR"   class="form-control"   value="<?= set_value('user') ?>">
                    <input type="text" name="DESC_SUPERVISOR" readonly class="form-control" placeholder="Usuario" value="<?= set_value('user') ?>">
                     <button type="button"  class="btn btn-primary view_detailsupervisores" ><i class="fa fa-search"></i></button>
                    </div>
                    <div class="text-danger"><?= form_error('user') ?></div>
                  
                     
                
     </div>

   </fieldset>
 
    <br>
 
   <ul class="nav nav-tabs" >
    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#Datos">Datos</a></li>
    <li class='nav-item'><a     class="nav-link"  data-toggle="tab" href="#Adquisicion">Adquisición</a></li>
    <li class='nav-item'><a class="nav-link" data-toggle="tab" href="#Tributario">Tributario</a></li>
    <li class='nav-item'><a  class="nav-link" data-toggle="tab" href="#Financiera">Financiera</a></li>
    <li class='nav-item'><a  class="nav-link" data-toggle="tab" href="#Ajustes">Lista de Ajustes</a></li>
    <li class='nav-item'><a  class="nav-link" data-toggle="tab" href="#Mejoras">Lista de Mejoras</a></li>
    <li class='nav-item'><a  class="nav-link" data-toggle="tab" href="#Traslado">Lista de Traslado</a></li>
    <li class='nav-item'><a  class="nav-link" data-toggle="tab" href="#Reclasificacion">Lista de Reclasificación</a></li>
    <li class='nav-item'><a  class="nav-link" data-toggle="tab" href="#Revaluacion">Lista de Revaluación</a></li>
    <li class='nav-item'><a  class="nav-link" data-toggle="tab" href="#Cambio">Lista de Ajustes X Dif. Cambio</a></li>
    <li class='nav-item'><a  class="nav-link" data-toggle="tab" href="#Otros">Otros</a></li>
    <li class='nav-item'><a  class="nav-link" data-toggle="tab" href="#Foto">Foto</a></li>
  </ul>

  <div class="tab-content"  >
    <div id="Datos" class="tab-pane   fade in show active"  style=" font-size: 11px;">
      <br>
            <div class="form-row ">
               
                  <label class="col-2" for="">Marca</label>
                  
                   <input class="col-3" type="text" name="DESC_SEDE"  class="form-control" placeholder="Marca" value="<?= set_value('user') ?>">
   
                  <div class="text-danger"><?= form_error('user') ?></div>
                  
             
            </div>
            <div class="form-row ">
                
                  <label class="col-2" for="">Modelo</label>
                  
                   <input class="col-3" type="text" name="DESC_SEDE"  class="form-control" placeholder="Modelo" value="<?= set_value('user') ?>">
   
                  <div class="text-danger"><?= form_error('user') ?></div>
                  
             
            </div>
            <div class="form-row ">
              
                  <label class="col-2" for="">Num. Serie</label>
                  
                   <input class="col-3" type="text" name="DESC_SEDE"  class="form-control" placeholder="Numero Serie" value="<?= set_value('user') ?>">
   
                  <div class="text-danger"><?= form_error('user') ?></div>
                  
             
            </div>
            <div class="form-row">
             
              <label class="col-2" for="">Color</label>
              <select style="width:200px;" name="especialidades" id="especialidades" size="1">
                  
                  <?php
                      foreach($especialidades as $especialidad){
                  ?>
                    <option value="<?php echo $especialidad->cod_esp; ?>"><?php echo $especialidad->nom_esp; ?></option>
                  <?php }     ?>
              </select>
              <div class="text-danger"><?= form_error('name') ?></div>   
           
            </div>
          <div class="form-row">
             
              <label class="col-2" for="">Estado Conser.</label>
              <select style="width:200px;" name="especialidades" id="especialidades" size="1">
                  
                  <?php
                      foreach($especialidades as $especialidad){
                  ?>
                    <option value="<?php echo $especialidad->cod_esp; ?>"><?php echo $especialidad->nom_esp; ?></option>
                  <?php }     ?>
              </select>
              <div class="text-danger"><?= form_error('name') ?></div>   
           
            </div>
          <div class="form-row">
             
              <label class="col-2" for="">Condicion</label>
              <select style="width:200px;" name="especialidades" id="especialidades" size="1">
                  
                  <?php
                      foreach($especialidades as $especialidad){
                  ?>
                    <option value="<?php echo $especialidad->cod_esp; ?>"><?php echo $especialidad->nom_esp; ?></option>
                  <?php }     ?>
              </select>
              <div class="text-danger"><?= form_error('name') ?></div>   
           
            </div>
          <div class="form-row">
             
              <label class="col-2" for="">Procedencia</label>
              <select style="width:200px;" name="especialidades" id="especialidades" size="1">
                  
                  <?php
                      foreach($especialidades as $especialidad){
                  ?>
                    <option value="<?php echo $especialidad->cod_esp; ?>"><?php echo $especialidad->nom_esp; ?></option>
                  <?php }     ?>
              </select>
              <div class="text-danger"><?= form_error('name') ?></div>   
           
            </div>
          <div class="form-row">
             
              <label class="col-2" for="">Est. Inventario</label>
              <select style="width:200px;" name="especialidades" id="especialidades" size="1">
                  
                  <?php
                      foreach($especialidades as $especialidad){
                  ?>
                    <option value="<?php echo $especialidad->cod_esp; ?>"><?php echo $especialidad->nom_esp; ?></option>
                  <?php }     ?>
              </select>
              <div class="text-danger"><?= form_error('name') ?></div>   
           
            </div>
          <div class="form-row">
             
              <label class="col-2" for="">Dimensiones</label>
              <input class="col-3" type="text" name="DESC_SEDE"  class="form-control" placeholder="Dimensiones" value="<?= set_value('user') ?>">
              <div class="text-danger"><?= form_error('name') ?></div>   
           
            </div>
          <div class="form-row">
             
              <label class="col-2" for="">Obs.</label>
              <input class="col-3" type="text" name="DESC_SEDE"  class="form-control" placeholder="Observaciones" value="<?= set_value('user') ?>">
              <div class="text-danger"><?= form_error('name') ?></div>   
           
            </div>
    </div>
    <div id="Adquisicion" class="tab-pane fade" style=" font-size: 11px;">
            <div class="form-row">
                <label class="col-2" for="">Tip. Doc.</label>
                <select style="width:200px;" name="especialidades" id="especialidades" size="1">
                    
                    <?php
                        foreach($especialidades as $especialidad){
                    ?>
                      <option value="<?php echo $especialidad->cod_esp; ?>"><?php echo $especialidad->nom_esp; ?></option>
                    <?php }     ?>
                </select>
                <div class="text-danger"><?= form_error('name') ?></div>   
            </div>
            <div class="form-row">
              <label class="col-2" for="">Serie/Num.</label>
              <input class="col-3" type="text" name="DESC_SEDE"  class="form-control" placeholder="Observaciones" value="<?= set_value('user') ?>">
              <div class="text-danger"><?= form_error('name') ?></div>   
            </div>
            <div class="form-row">
                <label class="col-2" for="">Proveedor</label>
                <select style="width:200px;" name="especialidades" id="especialidades" size="1">
                    
                    <?php
                        foreach($especialidades as $especialidad){
                    ?>
                      <option value="<?php echo $especialidad->cod_esp; ?>"><?php echo $especialidad->nom_esp; ?></option>
                    <?php }     ?>
                </select>
                <div class="text-danger"><?= form_error('name') ?></div>   
            </div>
            <div class="form-row">
                <label class="col-2" >Fec. Adq.</label>
                   
                <input class="col-2" name="FEC_INICIO_OPE" class="form-control" type="date"   >
            </div>
           <div class="form-row">
                <label class="col-2" >Fec. en Act.</label>
                   
                <input class="col-2" name="FEC_INICIO_OPE" class="form-control" type="date"   >
            </div>
            <div class="form-row">
              <label class="col-2" for="">Guia Remisión.</label>
              <input class="col-3" type="text" name="DESC_SEDE"  class="form-control" placeholder="Observaciones" value="<?= set_value('user') ?>">
              <div class="text-danger"><?= form_error('name') ?></div>   
            </div>
            <div class="form-row">
              <label class="col-2" for="">N° DUA</label>
              <input class="col-3" type="text" name="DESC_SEDE"  class="form-control" placeholder="Observaciones" value="<?= set_value('user') ?>">
              <div class="text-danger"><?= form_error('name') ?></div>   
            </div>
            <div class="form-row">
                  
                    <label class="col-2"  for="">Cod. Proyecto</label>
                    <br>
                    <div class="btn-group">
                    <input type="hidden" name="OF_RESPONSABLE"   class="form-control"   value="<?= set_value('user') ?>">
                    <input type="text" name="DESC_RESPONSABLE" readonly class="form-control" placeholder="Proyecto" style="height:25px;font-size: 11px;" value="<?= set_value('user') ?>">
                     <button type="button"  class="btn btn-primary view_detailresponsables " style="height:25px;"><i class="fa fa-search" style="height:25px;font-size: 11px;"></i></button>
                    </div>
                    <div class="text-danger"><?= form_error('user') ?></div>
             </div>
            <div class="form-row" >
                  
                    <label class="col-2" for="" >Contrato Leasing</label>
                    <br>
                    <div class="btn-group">
                    <input type="hidden" name="OF_RESPONSABLE"   class="form-control"   value="<?= set_value('user') ?>">
                    <input type="text"   name="DESC_RESPONSABLE" readonly class="form-control" placeholder="Contrato" style="height:25px; font-size: 11px;" value="<?= set_value('user') ?>">
                     <button type="button"  class="btn btn-primary view_detailresponsables" style="height:25px;" ><i class="fa fa-search" style="height:25px;font-size: 11px;"></i></button>
                    </div>
                    <div class="text-danger"><?= form_error('user') ?></div>
             </div>
    </div>
    <div id="Tributario" class="tab-pane   fade">
            <div class="form-row">
                <label class="col-2" for="">Centro Costo</label>
                <select style="width:200px;" name="especialidades" id="especialidades" size="1">
                    
                    <?php
                        foreach($especialidades as $especialidad){
                    ?>
                      <option value="<?php echo $especialidad->cod_esp; ?>"><?php echo $especialidad->nom_esp; ?></option>
                    <?php }     ?>
                </select>
                <div class="text-danger"><?= form_error('name') ?></div>   
            </div>
            <div class="form-row">
                <label class="col-2" for="">Cuenta Contable</label>
                <select style="width:200px;" name="especialidades" id="especialidades" size="1">
                    
                    <?php
                        foreach($especialidades as $especialidad){
                    ?>
                      <option value="<?php echo $especialidad->cod_esp; ?>"><?php echo $especialidad->nom_esp; ?></option>
                    <?php }     ?>
                </select>
                <div class="text-danger"><?= form_error('name') ?></div>   
            </div>
            <div class="form-row">
              <label class="col-2" for="">Tasa Depreciación.</label>
              <input class="col-3" type="text" name="DESC_SEDE"  class="form-control" placeholder="%" value="<?= set_value('user') ?>">
              <div class="text-danger"><?= form_error('name') ?></div>   
            </div>
            <div class="form-row">
                <label class="col-2" for="">Moneda de compra </label>
                <select style="width:200px;" name="especialidades" id="especialidades" size="1">
                    
                    <?php
                        foreach($especialidades as $especialidad){
                    ?>
                      <option value="<?php echo $especialidad->cod_esp; ?>"><?php echo $especialidad->nom_esp; ?></option>
                    <?php }     ?>
                </select>
                <div class="text-danger"><?= form_error('name') ?></div>   
            </div>
            <div class="form-row">
              <label class="col-2" for="">Número de Voucher.</label>
              <input class="col-3" type="text" name="DESC_SEDE"  class="form-control" placeholder="%" value="<?= set_value('user') ?>">
              <div class="text-danger"><?= form_error('name') ?></div>   
            </div>
            <div class="form-row">
              <label class="col-2" for="">T.C de Voucher.</label>
              <input class="col-3" type="text" name="DESC_SEDE"  class="form-control" placeholder="%" value="<?= set_value('user') ?>">
              <div class="text-danger"><?= form_error('name') ?></div>   
            </div>
            <div class="form-row">
              <label class="col-2" for="">Valor Historico S/.</label>
              <input class="col-3" type="text" name="DESC_SEDE"  class="form-control" placeholder="%" value="<?= set_value('user') ?>">
              <div class="text-danger"><?= form_error('name') ?></div>   
            </div>
            <div class="form-row">
              <label class="col-2" for="">Valor Historico $</label>
              <input class="col-3" type="text" name="DESC_SEDE"  class="form-control" placeholder="%" value="<?= set_value('user') ?>">
              <div class="text-danger"><?= form_error('name') ?></div>   
            </div>
            <div class="form-row">
              <label class="col-2" for="">Precio Compra S/.</label>
              <input class="col-3" type="text" name="DESC_SEDE"  class="form-control" placeholder="%" value="<?= set_value('user') ?>">
              <div class="text-danger"><?= form_error('name') ?></div>   
            </div>
            <div class="form-row">
              <label class="col-2" for="">Al cambio $</label>
              <input class="col-3" type="text" name="DESC_SEDE"  class="form-control" placeholder="%" value="<?= set_value('user') ?>">
              <div class="text-danger"><?= form_error('name') ?></div>   
            </div>
            <div class="form-row">
              <label class="col-2" for="">Valor Libro $</label>
              <input class="col-3" type="text" name="DESC_SEDE"  class="form-control" placeholder="%" value="<?= set_value('user') ?>">
              <div class="text-danger"><?= form_error('name') ?></div>   
            </div>
            <div class="form-row">
              <label class="col-2" for="">Deprec. Ejercicio</label>
              <input class="col-3" type="text" name="DESC_SEDE"  class="form-control" placeholder="%" value="<?= set_value('user') ?>">
              <div class="text-danger"><?= form_error('name') ?></div>   
            </div>
            <div class="form-row">
              <label class="col-2" for="">Deprec. Acumulada</label>
              <input class="col-3" type="text" name="DESC_SEDE"  class="form-control" placeholder="%" value="<?= set_value('user') ?>">
              <div class="text-danger"><?= form_error('name') ?></div>   
            </div>
            <div class="form-row">
              <label class="col-2" for="">Valor Residual</label>
              <input class="col-3" type="text" name="DESC_SEDE"  class="form-control" placeholder="%" value="<?= set_value('user') ?>">
              <div class="text-danger"><?= form_error('name') ?></div>   
            </div>
    </div>
    <div id="Financiera" class="tab-pane   fade">
      
      <p> </p>
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
     
            <div class="form-row">
              <label class="col-2" for="">Placa</label>
              <input class="col-3" type="text" name="placa"  class="form-control" placeholder="placa" value="<?= set_value('user') ?>">
              <div class="text-danger"><?= form_error('name') ?></div>   
            </div>
            <div class="form-row">
              <label class="col-2" for="">Año</label>
              <input class="col-3" type="text" name="año"  class="form-control" placeholder="año" value="<?= set_value('user') ?>">
              <div class="text-danger"><?= form_error('name') ?></div>   
            </div>
            <div class="form-row">
              <label class="col-2" for="">N° Chasis</label>
              <input class="col-3" type="text" name="chasis"  class="form-control" placeholder="chasis" value="<?= set_value('user') ?>">
              <div class="text-danger"><?= form_error('name') ?></div>   
            </div>
            <div class="form-row">
              <label class="col-2" for="">N° Motor</label>
              <input class="col-3" type="text" name="motor"  class="form-control" placeholder="motor" value="<?= set_value('user') ?>">
              <div class="text-danger"><?= form_error('name') ?></div>   
            </div>
    </div>
    <div id="Foto" class="tab-pane   fade">
       
      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
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
        <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;"> Sub Familias</h3>
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
        <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;"> Sedes</h3>
      </div>
      <div class="modal-body">
        <table id = "sedes" class="table table-bordered table-striped">
          <thead class="btn-success">
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

