<?php if($msg = $this->session->flashdata('msg')): ?>
  <div class="alert alert-success text-center" role="alert">
    <?= $msg ?>
  </div>
<?php endif; ?>

     
    
    <br><br>
      
<style>
.container-fluid{border-style: solid;}

</style>

<div class="container-fluid" >
<form method="post"  action="<?php echo base_url(); ?>excel_export/action">
      <table class="table w-auto small" >
        <tbody>
        <div > 
          <div style="background: blue;color:white;height:auto;width:auto;">
          <h3 style="background: blue;height:auto;width:auto;" class="text-center">REPORTES SUNAT</h3>  
           </div>
         <br>
        
             <div class="form-row">
              <label class="col-3" for="">Año</label>
              <input class="col-3" type="number" name="año" id="idaño" class="form-control" class="selectpicker" min="2019" max="3000" value="2020">
              <div class="text-danger"><?= form_error('name') ?></div>   
            </div>
           <br>

           <div class="form-row">
               
                  <label class="col-3" for="">Formato 7.1 : Detalle de los Registros de Activos Fijos</label>
                



                  <div style="text-align: center;" class="col-3">
                   
                    <input   type="submit" name="export" class="btn btn-success" value="Formato 7.1 " />
                  </div>

                  
                    <div style="text-align: center;" class="col-3">
                       <button class="btn btn-success" type="button" onclick="calcular_depreciacion()">Financiero</button>

                    </div>
                  <div class="text-danger"><?= form_error('name') ?></div>   

            </div>
               
      <br>

                <div class="form-row">
                  <label class="col-3" for="">Formato 7.2 : Detalle de Activos Fijos Revaluados</label>
                
                  <div style="text-align: center;" class="col-3">
                  <button  type="button" onclick="calcular_depreciacion()">Formato 7.2</button>

                  </div>

                  
               
                  <div class="text-danger"><?= form_error('name') ?></div>   
                </div>

                <br>

                <div class="form-row">
                  <label class="col-3" for="">Formato 7.3 : Detalle de Activo Fijo de la Diferencia de Cambio</label>
                
                  <div style="text-align: center;" class="col-3">
                  <button  type="button" onclick="calcular_depreciacion()">Formato 7.3</button>

                </div>

              

              <label style="text-align: center;" class="col-3" for="">Tipo de Cambio: </label>


                  <div style="text-align: center;" class="col-3">

                  <input class="col-3" type="text" name="total_items"  readonly  class="form-control" style="height:30px;" placeholder="" value="<?= set_value('user') ?>">

                    </div>
                  <div class="text-danger"><?= form_error('name') ?></div>   


                </div>
      <br>
                <div class="form-row">
                  <label class="col-3" for="">Formato 7.4 : Activo Fijo Modalidad de Arrendamiento Financiero</label>
                
                  <div style="text-align: center;" class="col-3">
                  <button  type="button" onclick="calcular_depreciacion()">Formato 7.4</button>

                  </div>

                  
               
                  <div class="text-danger"><?= form_error('name') ?></div>   
                </div>
      <br>
                <div class="form-row">
                  <label class="col-3" for="">Comparación de Depreciación Acumulada Tributaria y Financiera</label>
                
                  <div style="text-align: center;" class="col-3">
                  <button  type="button" onclick="calcular_depreciacion()">Reportar</button>

                  </div>

                  
               
                  <div class="text-danger"><?= form_error('name') ?></div>   
                </div>
      <br>               
                <div class="form-row">
                  <label class="col-3" for="">Calculo de Diferencia Temportal de Depreciación Acumulada Tributaria y Financiera</label>
                
                  <div style="text-align: center;" class="col-3">
                  <button  type="button" onclick="calcular_depreciacion()">Reportar</button>

                  </div>

                  
               
                  <div class="text-danger"><?= form_error('name') ?></div>   
                </div>



      </div>
        
        </tbody>
      </table>

      </form>
  </div>

<?= $this->pagination->create_links() ?>
