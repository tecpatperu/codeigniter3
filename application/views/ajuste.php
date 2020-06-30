<?php if($msg = $this->session->flashdata('msg')): ?>
  <div class="alert alert-success text-center" role="alert">
    <?= $msg ?>
  </div>
<?php endif; ?>
<style type="text/css">
  #div1 {
     overflow:auto;
     
     width:auto;
}

</style>
 


<script>
$codigo1=0;
  
  $('.codigonuevo').on('mousedown', function(e) {

   // $(this).click(function(){return false;});


   $.ajax({
        type: 'ajax',
         url : '/codeigniter3/ajuste/getcodigoajuste/',

      //data: JSON.stringify(data),
         dataType : 'JSON',
          method:'POST',
      
         success:function(data) {
       //  e.stopPropagation();
         for(i=0; i<data.length; i++){
  
          $codigo1=data[i].Codigo;

         }
    
          },
      error: function (jqXHR, textStatus, errorThrown)
      {
        alert(errorThrown+textStatus +jqXHR +'Error get data from ajax');
      }
      
    }); 

}); 

alert($codigo1);
</script>


<h3 class="text-center">Ajuste</h3>
      <div class="row form-inline" >
        <a href="<?=base_url('ajuste/')?>nuevo" class="btn btn-info btn-sm codigonuevo" role="button" >Nuevo</a>
        <input class="col-md-2" type="text"  id="mainsearch" name="mainsearch" class="form-control" value="" placeholder="Buscar...."> 
    &nbsp  <select class="col-md-2"  name="combobox">
    &nbsp
            <option value="volvo">Todos</option>
            <option value="saab">Rango Fecha</option>
          
          </select>
          &nbsp  
          <label >Fecha Inicial :   </label>
          &nbsp
          <input  class="col-md-2" type="date"  name="FechaInicial">
          &nbsp
          <label   >Fecha Final:   </label>
          &nbsp
          <input class="col-md-2" type="date"  name="FechaFinal">


         

      </div>
  <br>

    <div id="div1" class="row">
      
      <table  class="table w-auto small"  >
        <thead class="thead-dark">
          <tr>
            <th scope="col">Codigo.Ajuste</th>
            <th scope="col">Concepto.Ajuste</th>
            <th scope="col">Fecha</th>
      
            <th scope="col" style="padding-right: 100px;">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php 

          foreach($data as $item): ?>
          

          <tr><td style="display:none;"><?= $item['Codigo'] ?></td>
            <td scope="row"><?= $item['Codigo.Ajuste'] ?></td>
            <td scope="row"><?= $item['Concepto.Ajuste'] ?></td>
          
            <td scope="row"><?= $item['Fecha'] ?></td>
           
          


            <td >
                <a class="btn btn-warning btn-sm view_detailmejora" href="<?=base_url('mejoras/editar/'.$item['Codigo.Ajuste'])?>" role="button">Editar</a> <a class="btn btn-danger btn-sm" href="#" data-id="<?=$item['Codigo.Ajuste']?>" id="delete" role="button">Eliminar</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
   
    </div> 

<?= $this->pagination->create_links() ?>
