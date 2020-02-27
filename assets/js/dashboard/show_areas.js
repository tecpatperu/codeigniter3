(function(){
    
$('#estado').on('click', function () {
    $(this).val(this.checked ? 1 : 0);
     
});
 
    if ($('#estado').val() == "0" ) {
 
       $("#estado").attr('checked', false);  
    }else{

      $("#estado").attr('checked', true);  
    }



  $('#edificios > tbody').on('dblclick', '>tr', function () {
       id = $(this).attr("id");
       //idesc = $("#sedes > tbody > tr > td").html();//[1].innerHTML;
       idesc = $(this).find('td:nth-child(2)').text();
 

       $("input[name='AR_IDEDIFICIO']").val(id);
       $("input[name='DESC_EDIFICIO']").val(idesc);



   $("#show_modal").modal('hide');




    });
 

$('.view_detail').click(function(){
          
          
         
          
          $.ajax({
            type: 'ajax',
              url : '/codeigniter3/area/get_edificios_data',
           
              method:'GET',
              dataType:'json',
              success:function(data) {
                     
                  var html = '';
                  var i;
                  for(i=0; i<data.length; i++){

                  html +=  '<tr   id="'+data[i].SE_ID +'">'+
                        '<td>'+data[i].SE_ID +'</td>'+
                        '<td>'+data[i].SE_DESCRIPCION +'</td>'+
                        '<td>'+  (data[i].SE_ESTADO  == 1 ? 'activo' : 'inactivo' )+ '</td>'+                  
                        '<td style="text-align:right;">'+
                
                        '</td>'+
                        '</tr>';
                  }
                $('#listRecords').html(html);
                $('#show_modal').modal({backdrop: 'static', keyboard: true, show: true});         
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                alert(errorThrown +'Error get data from ajax');
              }
          });
      });

  $('#pisos > tbody').on('dblclick', '>tr', function () {
       id = $(this).attr("id");
       //idesc = $("#sedes > tbody > tr > td").html();//[1].innerHTML;
       idesc = $(this).find('td:nth-child(2)').text();
 

       $("input[name='AR_IDPISO']").val(id);
       $("input[name='DESC_PISO']").val(idesc);



   $("#show_modal2").modal('hide');




    });

$('.view_detail2').click(function(){
          
          
         
          
          $.ajax({
            type: 'ajax',
              url : '/codeigniter3/area/get_pisos_data',
           
              method:'GET',
              dataType:'json',
              success:function(data) {
                     
                  var html = '';
                  var i;
                  for(i=0; i<data.length; i++){

                  html +=  '<tr   id="'+data[i].SE_ID +'">'+
                        '<td>'+data[i].SE_ID +'</td>'+
                        '<td>'+data[i].SE_DESCRIPCION +'</td>'+
                        '<td>'+  (data[i].SE_ESTADO  == 1 ? 'activo' : 'inactivo' )+ '</td>'+                  
                        '<td style="text-align:right;">'+
                
                        '</td>'+
                        '</tr>';
                  }
                $('#listRecords2').html(html);
                $('#show_modal2').modal({backdrop: 'static', keyboard: true, show: true});         
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                alert(errorThrown +'Error get data from ajax');
              }
          });
      });



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
                url: '/codeigniter3/area/delete',
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
})();