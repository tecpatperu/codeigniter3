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
          <h3 style="background: blue;height:auto;width:auto;" class="text-center">Rep. General de Movimientos</h3>  
           </div>
         <br>
        

         <div class="form-row">
              <label class="col-2" for="">Año</label>
              <input class="col-3" type="number" name="año" id="idaño" class="form-control" class="selectpicker" min="0" max="3000" value="2020">
              <div class="text-danger"><?= form_error('name') ?></div>   
            </div>


<br>


         <div style="border: 1px solid #000; display:inline-block; width:180px; "  >
           <h5 style="background: #fff; margin-top: -10px; margin-left: 10px; padding: 0 10px; width: 150px;">Movimientos por</h5>
           <input type="radio" id="activo" name="Movimiento" value="activo" checked = true > 
          <label for="activo">Activo</label> <br>
          <input type="radio" id="depreciacion" name="Movimiento" value="depreciacion" >
          <label for="depreciacion">Depreciacion</label>
        </div>
   
        <button class="btn btn-success" type="button" onclick="rpt_AF_Lista_general()">Mostrar Reporte</button>
        <br>
        <br>

        <div style="border: 1px solid #000; display:block; width:900px;" >
           <h5 style="background: #fff; margin-top: -10px; margin-left: 10px; padding: 0 10px; width: 220px;">Rango de Cuentas Contable</h5>
           <input type="checkbox" id="todos" name="todos" value="todos" style="float:right">
          <label for="todos" style="float:right">Todos las cuentas contables</label>
          <br>
          <div style="border: 1px solid #000;display:inline-block; width:900px;" >
          <label for="inicial">Inicial</label>  
          <input type="text" id="txtclienteinicial" name="txtclienteinicial"> 
          <input type="text" id="txtclienteinicialdesc" name="txtclienteinicialdesc" style=" width:500px;" ><br> <br>
          <label for="final">Final</label>&nbsp;&nbsp;
          <input type="text" id="txtclientefinal" name="txtclientefinal">
          <input type="text" id="txtclientefinaldesc" name="txtclientefinaldesc"  style=" width:500px;" > 
        
          </div>
        </div>

     
         


      </div>
     
        </tbody>
      </table>

      </form>
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