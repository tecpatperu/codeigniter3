(function(){
    
 

 
$('#estado').on('click', function () {
    $(this).val(this.checked ? 1 : 0);
     
});
 
    if ($('#estado').val() == "0" ) {
 
       $("#estado").attr('checked', false);  
    }else{

      $("#estado").attr('checked', true);  
    }



    $("tr td #delete").click(function(ev){
        ev.preventDefault();
        var nombre = $(this).parents('tr').find('td:first').text();
        var id = $(this).attr('data-id');
        var self = this;

        Swal({
            title: '¿Realmente quieres eliminar el registro de '+ nombre +'?',
            text: "El registro será eliminado permanentemente",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si',
            cancelButtonText: 'No',
          }).then((result) => {
            if (result.value) {
              // ajax ....  
              $.ajax({
                type: 'POST',
                url: '/codeigniter3/sede/delete',
                data: {'id':id},
                success: function(){
                  $(self).parents('tr').remove();
                  Swal(
                    'Eliminado!',
                    'El registro ha sido eliminado satisfactoriamente.',
                    'success'
                  )
                },statusCode: {
                  400: function(data){
                    var json = JSON.parse(data.responseText);
                    Swal(
                      'Error!',
                      json.msg,
                      'error'
                    )
                  }
                }
              });
        
            }
        })
    })



  $('#familias > tbody').on('dblclick', '>tr', function () {
       id = $(this).attr("id");
       
       idesc = $(this).find('td:nth-child(2)').text();
 

       $("input[name='AC_IDFAMILIA']").val(id);
       $("input[name='DESC_FAMILIA']").val(idesc);



   $("#show_modalfamilias").modal('hide');




    });   
     $('.view_detailfamilias').click(buscarfamilias);
     $('#jobsearchfamilias').keyup(buscarfamilias);
   //  $('.view_detailfamilias').on('click', buscarfamilias(''));
function buscarfamilias(){
   //  if(typeof obj !== "undefined") {
         var b =$('#jobsearchfamilias').val()  ;
        
       
          texto=b;
         
          $.ajax({
            type: 'ajax',
              url : '/codeigniter3/bien/get_familia_data/'+texto,
           
              method:'GET',
              dataType:'json',
              success:function(data) {
            
         
 
                  var html = '';
                  var i;
                  for(i=0; i<data.length; i++){

                    html +=  '<tr   id="'+data[i].PRO_ID+'">'+
                        '<td>'+data[i].PRO_ID+'</td>'+
                        '<td>'+data[i].PRO_DESCRIPCION+'</td>'+
                        '</tr>';
                  }
                $('#listfamilias').html(html);
                 $('#show_modalfamilias').modal({backdrop: 'static', keyboard: true, show: true});         
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                alert(errorThrown +'Error get data from ajax');
              }
          });
}





$('#subfamilias > tbody').on('dblclick', '>tr', function () {
       id = $(this).attr("id");
      
       idesc = $(this).find('td:nth-child(2)').text();
 

       $("input[name='AC_SUBFAMILIA']").val(id);
       $("input[name='DESC_SUBFAMILIA']").val(idesc);



   $("#show_modalsubfamilias").modal('hide');
  

    });
 
     $('.view_detailsubfamilias').click(buscarsubfamilias);
     $('#jobsearchsubfamilias').keyup(buscarsubfamilias);
     function buscarsubfamilias(){    
          var familia = $("input[name='DESC_FAMILIA']").val() ;
          var idfamilia = $("input[name='AC_IDFAMILIA']").val() ;
          if (  !familia || familia == ""){
           $('#subfamiliaerror').html("Debe escoger una familia");
            return ;
          }
         
         
          
          $.ajax({
            type: 'ajax',
              url : '/codeigniter3/bien/get_subfamilia_data/'+idfamilia,
           
              method:'GET',
              dataType:'json',
              success:function(data) {
            
         
 
                  var html = '';
                  var i;
                  for(i=0; i<data.length; i++){

                    html +=  '<tr   id="'+data[i]['LO_ID']+'">'+
                        '<td>'+data[i]['LO_ID']+'</td>'+
                        '<td>'+data[i]['LO_DESCRIPCION']+'</td>'+            
                        '</tr>';
                  }
                  if (data.length == 0) {

                    $('#listsubfamilias').html('<tr><td colspan = "4">No hay data relacionada con la familia escogida</td></tr>');
                  }else{
                    $('#listsubfamilias').html(html);    
                  }
                
                 $('#show_modalsubfamilias').modal({backdrop: 'static', keyboard: true, show: true});         
                   $('#subfamiliaerror').html("");
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                alert(errorThrown +'Error get data from ajax');
              }
          });
      } 













})();