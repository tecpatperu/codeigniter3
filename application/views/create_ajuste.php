
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




  thead th .t-1 .t-2 .t-3 {
  position: -webkit-sticky;  
  position: sticky;
  top: 0;
}

tbody th .t-1 .t-2 .t-3 {
  position: -webkit-sticky; 
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
  height: 350px;
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



<form name= "ajuste" action="<?= base_url('ajuste/store') ?>" method="POST"  enctype="multipart/form-data"  >
 
  <h4>Ingreso de Ajustes </h4>

  <hr>
  
            <!--<div>
              <input type="file" name="profile_image" id="imgInp" />
              <img id="blah" src="#" alt="your image" />
            </div>-->
    <fieldset>
          <div class="col-12 ">
          <legend   class="w-auto" > Datos Generales:</legend>
          </div>
          <div class="form-row">
          <input type="hidden" name="ID_AJUSTE"   class="form-control"  value="<?=$id  ?>">    
                  <label class="col-2" for="">Codigo</label>
         
             <div class="btn-group col-4">
                  <input type="hidden" name="AM_IDACTIVO"   class="form-control"   value="<?= set_value('user') ?>">
                  <input type="hidden" name="AC_IDFAMILIA"   class="form-control"   value="<?= set_value('user') ?>">
                  <input type="text" name="DESC_CODIGO" readonly  class="form-control" placeholder="" value="<?= set_value('user') ?>">
                  
                  <button type="button"  class="btn btn-primary view_detailfamilias" ><i class="fa fa-search"></i></button>


                  
            </div>
    
                  <div class="text-danger"><?= form_error('user') ?></div>
                  <div class="btn-group col-4">

                  <input type="text" name="DESC_FAMILIA" readonly  class="form-control" placeholder="" value="<?= set_value('user') ?>">
      </div>
              
           </div>
<br>                                        

            <div class="form-row">
                
                    <label class="align-text-bottom col-2 " for="">Fecha Adquisición</label>                      
                    <input type="text" readonly  class="col-2" name="AC_FECHA"  class="form-control" placeholder="" value="<?= set_value('user') ?>">
                    <div id="Fichaerror" class="text-danger"><?= form_error('user') ?></div>
               
                    <label class="align-text-bottom col-2 " for="">Inicial</label>                      
                <input type="text" readonly class="col-2" name="AC_INICIAL_TRIB"  class="form-control" placeholder="" value="<?= set_value('user') ?>">

                <label class="align-text-bottom col-2 " for="">Inicial</label>                      
                <input type="text" readonly class="col-2" name="AC_INICIAL_FIN"  class="form-control" placeholder="" value="<?= set_value('user') ?>">


            </div>
   
            <div class="form-row">
                
                <label class="align-text-bottom col-2 " for="">Cuenta Contable</label>                      
                <input type="text" readonly class="col-2" name="AC_CUENTA_CONTABLE"  class="form-control" placeholder="" value="<?= set_value('user') ?>">

                <label class="align-text-bottom col-2 " for="">Ejercicio</label>                      
                <input type="text" readonly class="col-2" name="AC_EJERCICIO_TRIB"  class="form-control" placeholder="" value="<?= set_value('user') ?>">


                <label class="align-text-bottom col-2 " for="">Ejercicio</label>                      
                <input type="text" readonly class="col-2" name="AC_EJERCICIO_FIN"  class="form-control" placeholder="" value="<?= set_value('user') ?>">

                <div id="Fichaerror" class="text-danger"><?= form_error('user') ?></div>
             
           </div>
        
           <div class="form-row">
                
                <label class="align-text-bottom col-2 " for="">Moneda Original</label>           
                <input type="text" readonly class="col-2" name="AC_MONEDA_ORIGINAL"  class="form-control" placeholder="" value="<?= set_value('user') ?>">
               
                <label class="align-text-bottom col-2 " for="">Acumulada</label>                      
                <input type="text"  readonly class="col-2" name="AC_ACUMULADA_TRIB"  class="form-control" placeholder="" value="<?= set_value('user') ?>">
               
                <label class="align-text-bottom col-2 " for="">Acumulada</label>                      
                <input type="text" readonly  class="col-2" name="AC_ACUMULADA_FIN"  class="form-control" placeholder="" value="<?= set_value('user') ?>">
               

                <div id="Fichaerror" class="text-danger"><?= form_error('user') ?></div>
             
           </div>

           <div class="form-row">
                
                <label class="align-text-bottom col-2 " for="">Valor Libro</label>                      
                <input type="text" readonly class="col-2" name="AC_LIBRO"  class="form-control" placeholder="" value="<?= set_value('user') ?>">


                <label class="align-text-bottom col-2 " for="">Valor Residual</label>                      
                <input type="text" readonly class="col-2" name="AC_VALOR_RESIDUAL_TRIB"  class="form-control" placeholder="" value="<?= set_value('user') ?>">
                <label class="align-text-bottom col-2 " for="">Valor Residual</label>                      
                <input type="text" readonly class="col-2" name="AC_VALOR_RESIDUAL_FIN"  class="form-control" placeholder="" value="<?= set_value('user') ?>">
               
           <div id="Fichaerror" class="text-danger"><?= form_error('user') ?></div>

                
             
           </div>
       

 
    </fieldset>






    <fieldset>
    
<div class="row">
    <div class="col-12 ">

      <legend  class="w-auto" > Ajustes</legend>

    </div>


   
 </div>
 <div class="form-row">
 <label class="align-text-bottom col-6 " for="">Ajuste Libro</label>                      
 <label class="align-text-bottom col-6 " for="">Ajuste Dep. Financiera</label>                      

 </div>
   
     
 <div class="form-row">
 
 <input class="col-1" type="radio" name="chk_1" checked class="form-control" placeholder="chasis" value="1">
<label  for="">Cargo</label>


 <input class="col-1" type="radio" name="chk_1"  class="form-control" placeholder="chasis" value="2">
 <label  for="">Abono</label>
 
 &nbsp&nbsp
 <label class="align-text-bottom  " for="">Ajus.Val.Libro S/.</label>                      
<input type="text"  class="col-1" name="AC_CODIGO_VALORLIBRO"  class="form-control" placeholder="" value="<?= set_value('user') ?>">

<input class="col-1"  type="radio" name="chk_2" checked class="form-control" placeholder="chasis" value="1">
<label  for="">Cargo</label>


 <input class="col-1" type="radio" name="chk_2"  class="form-control" placeholder="chasis" value="2">
 <label  for="">Abono</label>
 &nbsp&nbsp
 
 <label class="align-text-bottom" for="">Ajus.Depre. S/.</label>                      
<input type="text"  class="col-1" name="AC_CODIGO_DEPRECIACION"  class="form-control" placeholder="" value="<?= set_value('user') ?>">

  
</div>

<div class="form-row">


<input class="col-1"  type="radio" name="chk_3" checked class="form-control" placeholder="chasis" value="1">
<label  for="">Cargo</label>


 <input class="col-1" type="radio" name="chk_3"  class="form-control" placeholder="chasis" value="2">
 <label  for="">Abono</label>
 &nbsp&nbsp
 <label class="align-text-bottom" for="">Ajus.Depre. S/.</label>                      
 &nbsp&nbsp&nbsp&nbsp<input type="text"  class="col-1" name="AC_CODIGO_DEPRECIACION1"  class="form-control" placeholder="" value="<?= set_value('user') ?>">
 
 
 &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
 &nbsp 
 
 <a  class="btn btn-primary btn-sm grabar1" href="#"  id="agregar" role="button">Agregar</a>
 &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
 &nbsp
 <a class="btn btn-warning btn-sm view_detailajuste" href="<?=base_url('ajuste/editar/')?>" role="button">Editar</a> 
 &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
 &nbsp 
 <a class="btn btn-danger btn-sm" href="#"  id="delete" role="button">Eliminar</a>

</div>
<br>
<div  id="tabla01">
      <table class="table w-auto small" id="t02" >
      <thead>
      <tr>
              <th scope="col">Item</th>
              <th scope="col">Codigo</th>
              <th scope="col">Descripción</th>
              <th scope="col">Valor Libro</th>
              <th scope="col">Ajuste</th>
              <th scope="col">Libro</th>
              <th scope="col">Ajuste</th>
              <th scope="col">Tributario</th>
              <th scope="col">Ajuste</th>
              <th scope="col">Financiero</th>
              <th class="col-1" scope="col">Cuenta Contable</th>
           
          </tr>
      </thead>
      <tbody  id="t01">

        </tbody>
      </table>

 


  </div>

    

     </fieldset>                  

     <fieldset>

     <div class="col-12 ">
     <legend  class="w-auto" > Documento de Ajustes</legend>
     </div>

           
    <div class="form-row">
          <label class="col-2"  for="AM_FDOC">Fecha :   </label>
         <input type="date" id="AM_FDOC" name="AM_FDOC">
    </div>
<br>
     <div class="form-row">
              <label  class="col-2" for="">Tip. Doc.</label>

              <?=form_dropdown('AM_TDOC',get_combo('AF_MA_TIPO_DOCUMENTO','PRO_ID','PRO_DESCRIPCION',array("Seleccione")),0,array('class'=>"form-control",'class'=>"selectpicker",'id'=>"AM_TDOC"))?>
              <div class="text-danger"><?= form_error('name') ?></div>   
    </div>

     <br>
       
          <div class="form-row">
                
                <label class="align-text-bottom col-2 " for="">Nro. de Voucher</label>                      
                <input type="text"  class="col-2" name="AM_VOUCHER"  class="form-control" placeholder="" value="<?= set_value('user') ?>">
                <div id="ErrorVoucher" class="text-danger"><?= form_error('user') ?></div>
              
          </div>
 <br>
      
          <div class="form-row">
                
                <label class="align-text-bottom col-2 " for="">Concepto de Ajuste</label>                      
                <input type="text"  class="col-2" name="AM_CONCEPTO_AJUSTE"  class="form-control" placeholder="" value="<?= set_value('user') ?>">
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
        <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;"> Lista de Activos</h3>
      </div>
      <div class="modal-body"  style="height: 400px;  overflow-y: auto;" >
        <table id = "familias" class="table table-bordered table-striped">
          <thead class="btn-success">
            <tr><input type="text" id="jobsearchfamilias" name="jobsearchfamilias" class="form-control" value="" placeholder="Buscar...." ></tr>
            </tr>
            <tr>
              <th class="t-1">Codigo</th>
              <th class="t-2">Descripcion</th>
              <th class="t-3">Id Activo</th>
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


<script>

$(document).ready(function(){

$('form[name="ajuste"]').submit(function (e) {
  alert(33);
  return;
  var $form = $(this);
  var $inputs = $form.find(":input");
  var len = $inputs.length/3; // calculate number of firstname, lastname and age per index

  for(var i=1; i<=len; i++){
    var $fn = $('input[name=' + i + '_firstname]');
    var $ln = $('input[name=' + i + '_lastname]');
    var $age = $('input[name=' + i + '_age]');
    var values = '<input type="hidden" name="' + i + '" value="';
      values += $fn.val() + ';';
      values += $ln.val() + ';';
      values += $age.val() + ';">';

      //remove read elements
      $fn.remove();
      $ln.remove();
      $age.remove();

     //append hidden input
     $form.append(values);
  };
  $form.submit();
});





});


</script>