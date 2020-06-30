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
          <h3 style="background: blue;height:auto;width:auto;" class="text-center">Lista de activos</h3>  
           </div>
         <br>
        
         <div style="border: 1px solid #000; display:inline-block; width:180px; "  >
           <h5 style="background: #fff; margin-top: -10px; margin-left: 10px; padding: 0 10px; width: 150px;">Ordenar por</h5>
           <input type="radio" id="codigo" name="ordenar" value="codigo" checked = true > 
          <label for="codigo">Codigo</label> <br>
          <input type="radio" id="descripcion" name="ordenar" value="descripcion" >
          <label for="descripcion">Descripcion</label>
        </div>
        <div style="border: 1px solid #000; display:inline-block; width:350px;" >
           <h5 style="background: #fff; margin-top: -10px; margin-left: 10px; padding: 0 10px; width: 220px;">Tipo de depreciacion</h5>
           <input type="radio" id="tributaria" name="tipodepreciacion" value="tributaria" checked = true>
          <label for="tributaria">Tributaria</label> <br>
          <input type="radio" id="financiera" name="tipodepreciacion" value="financiera">
          <label for="financiera">Financiera</label>
          
        </div>
        <button class="btn btn-success" type="button" onclick="rpt_AF_Lista_general()">Mostrar Reporte</button>
        <br>
        <br>

        <div style="border: 1px solid #000; display:block; width:900px;" >
           <h5 style="background: #fff; margin-top: -10px; margin-left: 10px; padding: 0 10px; width: 220px;">Rango de activos</h5>
           <input type="checkbox" id="todos" name="todos" value="todos" style="float:right">
          <label for="todos" style="float:right">Todos los activos</label>
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