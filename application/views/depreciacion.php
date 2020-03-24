
  <p id="respuesta" class="alert alert-success text-center" role="alert">
   
  </p>



<form id ="depreciacion" action="<?= base_url('depreciacion/calcular_depreciacion') ?>" method="POST"  enctype="multipart/form-data">
<h3 class="text-center">Depreciacion</h3>
    <div class="row">
         <button type="button" onclick="calcular_depreciacion()">Calcular Depreciacion</button>
    </div>

   
 
<div class="row">
  <div class="col-6 border border-primary">
    <div style="background: blue;color:white;font-size:20px;"> Periodo</div>
    <br>
           <div class="form-row">
              <label class="col-2" for="">Año</label>
              <input class="col-3" type="number" name="año"  class="form-control" class="selectpicker" min="0" max="3000" value="2020">
              <input class="col-3" readonly type="text" name="fecha_proceso"  class="form-control" placeholder="" value="<?php echo date('d') . '/' . date('m') . '/' . date('Y');?>" >
              <div class="text-danger"><?= form_error('name') ?></div>   
            </div>
            <div class="form-row">
              <label class="col-2" for="">Mes  </label>
           <?=form_dropdown('mes', array(
        '0' => 'Seleccione',
        '1' => 'Enero',
        '2' => 'Febrero',
        '3' => 'Marzo',
        '4' => 'Abril',
        '5' => 'Mayo',
        '6' => 'Junio',
        '7' => 'Julio',
        '8' => 'Agosto',
        '9' => 'Setiembre',
        '10' => 'Octubre',
        '11' => 'Noviembre',
        '12' => 'Diciembre'), '',array('class'=>"form-control",'class'=>"col-3",'id'=>"AC_ANIO_OTROS"));?>
              <div class="text-danger"><?= form_error('name') ?></div>   
            </div>
            <div class="form-row">
 
              <input class="col-3" type="radio" name="chk_tributario" checked class="form-control" placeholder="chasis" value="1">
            <label class="col-2" for="">Tributario</label>
              <div class="text-danger"><?= form_error('name') ?></div>   
            </div>
 
             
                 
    <br>

 </div> 
     <div class="col-6 border border-primary">

        <div style="background: blue;color:white;height:30px;">   </div>
        <br>
             <div class="form-row">
              
              <label class="col-3" for="">Total items</label>
              <input class="col-3" type="text" name="total_items"  class="form-control" style="height:30px;" placeholder="" value="<?= set_value('user') ?>">
              <label class="col-3" for="">Total Valor Libros</label>
              <input class="col-3" type="text" name="total_valor_libros"  class="form-control" style="height:30px;" placeholder="" value="<?= set_value('user') ?>">
              <div class="text-danger"><?= form_error('name') ?></div>   
            </div>
            <div class="form-row">
              <label class="col-3" for="">Total Dep.Inicial</label>
              <input class="col-3" type="text" name="total_dep_inicial"  class="form-control"  style="height:30px;" placeholder="" value="<?= set_value('user') ?>">
              <label class="col-3" for="">Total Dep.Mensual</label>
              <input class="col-3" type="text" name="total_dep_mensual"  class="form-control"  style="height:30px;" placeholder="" value="<?= set_value('user') ?>">
              <div class="text-danger"><?= form_error('name') ?></div>   
            </div>
            <div class="form-row">
              <label class="col-3" for="">Total Dep. del Ejercicio</label>
              <input class="col-3" type="text" name="total_dep_ejercicio"  class="form-control" style="height:30px;" placeholder="" value="<?= set_value('user') ?>">
              <div class="text-danger"><?= form_error('name') ?></div>   
            </div>
            <div class="form-row">
              <label class="col-3" for="">Total Dep. Acumulada</label>
              <input class="col-3" type="text" name="total_dep_acumulada"  class="form-control" style="height:30px;" placeholder="" value="<?= set_value('user') ?>">
              <div class="text-danger"><?= form_error('name') ?></div>   
            </div>
               
  <br>
   
 
      </div> 
 </div>
 
</form>



 
<script type="text/javascript">
  
function calcular_depreciacion(){
          
          
         var formData = $('#depreciacion').serialize();
          
          $.ajax({
            type: 'POST',
              url : '/codeigniter3/depreciacion/calcular_depreciacion',
           
              data:  $('#depreciacion').serialize(),
             async: true,
              success:function(data) {
            
         

                 document.getElementById("respuesta").innerHTML = data;
     
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                alert(errorThrown +'Error get data from ajax');
              }
          });
}

</script>