(function(){
    
$('#estado').on('click', function () {
    $(this).val(this.checked ? 1 : 0);
     
});
 
    if ($('#estado').val() == "0" ) {
 
       $("#estado").attr('checked', false);  
    }else{

      $("#estado").attr('checked', true);  
    }




  $('#cuentascontable > tbody').on('dblclick', '>tr', function () {
       id = $(this).attr("id");
       //idesc = $("#sedes > tbody > tr > td").html();//[1].innerHTML;
       idesc = $(this).find('td:nth-child(2)').text();
 

       $("input[name='PRO_CUENTA']").val(id);
       $("input[name='DESC_CUENTA']").val(idesc);



   $("#show_modal").modal('hide');




    });
 

$('.view_detail').click(function(){
          
          
         
          
          $.ajax({
            type: 'ajax',
              url : '/codeigniter3/familia/get_cuentacontable_data',
           
              method:'GET',
              dataType:'json',
              success:function(data) {
            
         
 
                  var html = '';
                  var i;
                  var cuenta = '';
                  for(i=0; i<data.length; i++){

                    html +=  '<tr   id="'+data[i].Codigo+'">'+
                        '<td>'+data[i].Codigo+'</td>'+
                        '<td>'+data[i]['Cuenta.Contable']+'</td>'+
                        '<td>'+data[i].Estado+'</td>'+                  
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
                url: '/codeigniter3/familia/delete',
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