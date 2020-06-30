
  <p id="respuesta" class="alert alert-success text-center" role="alert">
   
  </p>

  <style>
  thead th {
  position: -webkit-sticky; /* for Safari */
  position: sticky;
  top: 0;
}

tbody th {
  position: -webkit-sticky; /* for Safari */
  position: sticky;
  left: 0;
}

#tabla01 {
     overflow:auto;
     
     width:auto;
}
table {
  width:100%;
  display: block;
  height: 500px;
  overflow-y: scroll;
}
table, th, td {
  border: 1px inset   black;
  border-collapse: collapse;
  
}
th, td {
  padding: 15px;
  text-align: center;

}
table#t02 tr:nth-child(even) {
  background-color: #eee;
}
table#t02 tr:nth-child(odd) {
 background-color: #fff;
}
table#t02 th {
  background-color: black;
  color: white;
}

table#t02{
  width:100%;
}
</style>

<div class="container-fluid">

    



      <form id ="depreciacion" action="<?= base_url('depreciacion/calcular_depreciacion') ?>" method="POST"  enctype="multipart/form-data">

      <h3 class="text-center">Depreciacion</h3>
          <div class="row">
          
            
              <button type="button" onclick="calcular_depreciacion()">Calcular Depreciacion</button>
              <button type="button" onclick="grabar_depreciacion()">Grabar Depreciacion</button>
          </div>

        <br>
        
        <div class="row">
          <div class="col-6 border border-primary">
            <div style="background: blue;color:white;font-size:20px;"> Periodo</div>
            <br>
            <div class="form-row">
              <label class="col-2" for="">Año</label>
              <input class="col-3" type="number" name="año" id="idaño" class="form-control" class="selectpicker" min="0" max="3000" value="2020">
              <input class="col-3" readonly type="text" name="fecha_proceso" id="fecha_proceso"  class="form-control" placeholder="" value="" >
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
        '12' => 'Diciembre'), '',array('class'=>"form-control",'class'=>"col-3",'id'=>"idmes"));?>
              <div class="text-danger"><?= form_error('name') ?></div>   
            </div>

            <div class="form-row">
 
              <input class="col-3" type="radio" name="chk_tributario" checked class="form-control" placeholder="chasis" value="1">
            <label class="col-2" for="">Tributario</label>
              <div class="text-danger"><?= form_error('name') ?></div>  

              <input class="col-3" type="radio" name="chk_tributario"  class="form-control" placeholder="chasis" value="2">
              <label class="col-2" for="">Financiero</label>
              <div class="text-danger"><?= form_error('name') ?></div> 
               
            </div>
 
                 
        <br>

    </div> 

           <div class="col-6 border border-primary">

                <div style="background: blue;color:white;height:30px;">   </div>
                <br>
                        
                  <div class="form-row">
                  <label class="col-3" for="">Total items</label>
                  <input class="col-3" type="text" name="total_items"  readonly  class="form-control" style="height:30px;" placeholder="" value="<?= set_value('user') ?>">
                  <label class="col-3" for="">Total Valor Libros</label>
                  <input class="col-3" type="text" name="total_valor_libros" readonly class="form-control" style="height:30px;" placeholder="" value="<?= set_value('user') ?>">
                  <div class="text-danger"><?= form_error('name') ?></div>   
                </div>
                <div class="form-row">
                  <label class="col-3" for="">Total Dep.Inicial</label>
                  <input class="col-3" type="text" name="total_dep_inicial" readonly class="form-control"  style="height:30px;" placeholder="" value="<?= set_value('user') ?>">
                  <label class="col-3" for="">Total Dep.Mensual</label>
                  <input class="col-3" type="text" name="total_dep_mensual" readonly  class="form-control"  style="height:30px;" placeholder="" value="<?= set_value('user') ?>">
                  <div class="text-danger"><?= form_error('name') ?></div>   
                </div>
                <div class="form-row">
                  <label class="col-3" for="">Total Dep. del Ejercicio</label>
                  <input class="col-3" type="text" name="total_dep_ejercicio" readonly class="form-control" style="height:30px;" placeholder="" value="<?= set_value('user') ?>">
                  <div class="text-danger"><?= form_error('name') ?></div>   
                </div>
                <div class="form-row">
                  <label class="col-3" for="">Total Dep. Acumulada</label>
                  <input class="col-3" type="text" name="total_dep_acumulada" readonly class="form-control" style="height:30px;" placeholder="" value="<?= set_value('user') ?>">
                  <div class="text-danger"><?= form_error('name') ?></div>   
                </div>
               
              
   
      
            </div> 
       </div>

        <br>

    
                  
      <div  id="tabla01">
      <table class="table w-auto small" id="t02" >
      <thead>
      <tr>
              <th scope="col">Codigo</th>
              <th scope="col">Descripción</th>
              <th scope="col">Valor Libro</th>
              <th scope="col">Deprecia. Acum. Inicial</th>
              <th scope="col">F.Actividad</th>
              <th scope="col">%</th>
              <th scope="col">Factor</th>
              <th scope="col">Deprec.Mensual</th>
              <th scope="col">Meses</th>
              <th scope="col">Deprec.Ejercicio</th>
              <th scope="col">Deprec.Acumulada</th>
              <th scope="col">ValorResidual</th>
              <th scope="col">Cuenta Contable</th>
              <th scope="col">Centro Costo</th>
              <th scope="col">Tipo</th>
              <th scope="col">Baja</th>
              <th scope="col">Grabar</th>
              <th scope="col">Suma</th>



            
                </tr>
          </tr>
      </thead>
      <tbody  id="t01">

        </tbody>
      </table>


      
      </form>


  </div>
 
<script type="text/javascript">
  


</script>