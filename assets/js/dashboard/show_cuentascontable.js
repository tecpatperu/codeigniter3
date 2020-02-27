(function(){
    
$('#estado').on('click', function () {
    $(this).val(this.checked ? 1 : 0);
     
});

 $('#tasa').on('change', function () {
    $('#tiempovida').val(12*100/this.value);
     
});
 
    if ($('#estado').val() == "0" ) {
 
       $("#estado").attr('checked', false);  
    }else{

      $("#estado").attr('checked', true);  
    }



  $('#cuentas1 > tbody').on('dblclick', '>tr', function () {
       id = $(this).attr("id");
       //idesc = $("#sedes > tbody > tr > td").html();//[1].innerHTML;
       idesc = $(this).find('td:nth-child(2)').text();
 

       $("input[name='AR_CUENTA_CARGO']").val(id);
       $("input[name='AR_DES_CUENTA_CARGO']").val(idesc);

   $("#show_modal1").modal('hide');

    });
 

$('.view_detail1').click(function(){
          
          
         
          
          $.ajax({
            type: 'ajax',
              url : '/codeigniter3/cuentacontable/get_plan_cuenta_data',
           
              method:'GET',
              dataType:'json',
              success:function(data) {
            
         
 
                  var html = '';
                  var i;
                  var cuenta = '';
                  for(i=0; i<data.length; i++){

                    html +=  '<tr   id="'+data[i].Codigo+'">'+
                        '<td>'+data[i].Codigo+'</td>'+
                        '<td>'+data[i].Descripcion+'</td>'+
                         
                        '<td style="text-align:right;">'+
                          
                         
                        '</td>'+
                        '</tr>';
                  }
                $('#listRecords1').html(html);
                 $('#show_modal1').modal({backdrop: 'static', keyboard: true, show: true});         
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                alert(errorThrown +'Error get data from ajax');
              }
          });
      });


 



  $('#cuentas2 > tbody').on('dblclick', '>tr', function () {
       id = $(this).attr("id");
       //idesc = $("#sedes > tbody > tr > td").html();//[1].innerHTML;
       idesc = $(this).find('td:nth-child(2)').text();
 

       $("input[name='AR_CUENTA_ABONO']").val(id);
       $("input[name='AR_DES_CUENTA_ABONO']").val(idesc);

   $("#show_modal2").modal('hide');

    });
 

$('.view_detail2').click(function(){
          
          
         
          
          $.ajax({
            type: 'ajax',
              url : '/codeigniter3/cuentacontable/get_plan_cuenta_data',
           
              method:'GET',
              dataType:'json',
              success:function(data) {
            
         
 
                  var html = '';
                  var i;
                  var cuenta = '';
                  for(i=0; i<data.length; i++){

                    html +=  '<tr   id="'+data[i].Codigo+'">'+
                        '<td>'+data[i].Codigo+'</td>'+
                        '<td>'+data[i].Descripcion+'</td>'+
                         
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



  $('#cuentas3 > tbody').on('dblclick', '>tr', function () {
       id = $(this).attr("id");
       //idesc = $("#sedes > tbody > tr > td").html();//[1].innerHTML;
       idesc = $(this).find('td:nth-child(2)').text();
 

       $("input[name='AR_CUENTA_CARGO_DC']").val(id);
       $("input[name='AR_DES_CUENTA_CARGO_DC']").val(idesc);

   $("#show_modal3").modal('hide');

    });
 

$('.view_detail3').click(function(){
          
          
         
          
          $.ajax({
            type: 'ajax',
              url : '/codeigniter3/cuentacontable/get_plan_cuenta_data',
           
              method:'GET',
              dataType:'json',
              success:function(data) {
            
         
 
                  var html = '';
                  var i;
                  var cuenta = '';
                  for(i=0; i<data.length; i++){

                    html +=  '<tr   id="'+data[i].Codigo+'">'+
                        '<td>'+data[i].Codigo+'</td>'+
                        '<td>'+data[i].Descripcion+'</td>'+
                         
                        '<td style="text-align:right;">'+
                          
                         
                        '</td>'+
                        '</tr>';
                  }
                $('#listRecords3').html(html);
                 $('#show_modal3').modal({backdrop: 'static', keyboard: true, show: true});         
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                alert(errorThrown +'Error get data from ajax');
              }
          });
      });






  $('#cuentas4 > tbody').on('dblclick', '>tr', function () {
       id = $(this).attr("id");
       //idesc = $("#sedes > tbody > tr > td").html();//[1].innerHTML;
       idesc = $(this).find('td:nth-child(2)').text();
 

       $("input[name='AR_CUENTA_ABONO_DC']").val(id);
       $("input[name='AR_DES_CUENTA_ABONO_DC']").val(idesc);

   $("#show_modal4").modal('hide');

    });
 

$('.view_detail4').click(function(){
          
          
         
          
          $.ajax({
            type: 'ajax',
              url : '/codeigniter3/cuentacontable/get_plan_cuenta_data',
           
              method:'GET',
              dataType:'json',
              success:function(data) {
            
         
 
                  var html = '';
                  var i;
                  var cuenta = '';
                  for(i=0; i<data.length; i++){

                    html +=  '<tr   id="'+data[i].Codigo+'">'+
                        '<td>'+data[i].Codigo+'</td>'+
                        '<td>'+data[i].Descripcion+'</td>'+
                         
                        '<td style="text-align:right;">'+
                          
                         
                        '</td>'+
                        '</tr>';
                  }
                $('#listRecords4').html(html);
                 $('#show_modal4').modal({backdrop: 'static', keyboard: true, show: true});         
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                alert(errorThrown +'Error get data from ajax');
              }
          });
      });





  $('#cuentas5 > tbody').on('dblclick', '>tr', function () {
       id = $(this).attr("id");
       //idesc = $("#sedes > tbody > tr > td").html();//[1].innerHTML;
       idesc = $(this).find('td:nth-child(2)').text();
 

       $("input[name='AR_CUENTA_ABONO_DC_PERDIDA']").val(id);
       $("input[name='AR_DES_CUENTA_ABONO_DC_PERDIDA']").val(idesc);

   $("#show_modal5").modal('hide');

    });
 

$('.view_detail5').click(function(){
          
          
         
          
          $.ajax({
            type: 'ajax',
              url : '/codeigniter3/cuentacontable/get_plan_cuenta_data',
           
              method:'GET',
              dataType:'json',
              success:function(data) {
            
         
 
                  var html = '';
                  var i;
                  var cuenta = '';
                  for(i=0; i<data.length; i++){

                    html +=  '<tr   id="'+data[i].Codigo+'">'+
                        '<td>'+data[i].Codigo+'</td>'+
                        '<td>'+data[i].Descripcion+'</td>'+
                         
                        '<td style="text-align:right;">'+
                          
                         
                        '</td>'+
                        '</tr>';
                  }
                $('#listRecords5').html(html);
                 $('#show_modal5').modal({backdrop: 'static', keyboard: true, show: true});         
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                alert(errorThrown +'Error get data from ajax');
              }
          });
      });





  $('#cuentas6 > tbody').on('dblclick', '>tr', function () {
       id = $(this).attr("id");
       //idesc = $("#sedes > tbody > tr > td").html();//[1].innerHTML;
       idesc = $(this).find('td:nth-child(2)').text();
 

       $("input[name='AR_CUENTA_CARGO_R']").val(id);
       $("input[name='AR_DES_CUENTA_CARGO_R']").val(idesc);

   $("#show_modal6").modal('hide');

    });
 

$('.view_detail6').click(function(){
          
          
         
          
          $.ajax({
            type: 'ajax',
              url : '/codeigniter3/cuentacontable/get_plan_cuenta_data',
           
              method:'GET',
              dataType:'json',
              success:function(data) {
            
         
 
                  var html = '';
                  var i;
                  var cuenta = '';
                  for(i=0; i<data.length; i++){

                    html +=  '<tr   id="'+data[i].Codigo+'">'+
                        '<td>'+data[i].Codigo+'</td>'+
                        '<td>'+data[i].Descripcion+'</td>'+
                         
                        '<td style="text-align:right;">'+
                          
                         
                        '</td>'+
                        '</tr>';
                  }
                $('#listRecords6').html(html);
                 $('#show_modal6').modal({backdrop: 'static', keyboard: true, show: true});         
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                alert(errorThrown +'Error get data from ajax');
              }
          });
      });




  $('#cuentas7 > tbody').on('dblclick', '>tr', function () {
       id = $(this).attr("id");
       //idesc = $("#sedes > tbody > tr > td").html();//[1].innerHTML;
       idesc = $(this).find('td:nth-child(2)').text();
 

       $("input[name='AR_CUENTA_ABONO_R']").val(id);
       $("input[name='AR_DES_CUENTA_ABONO_R']").val(idesc);

   $("#show_modal7").modal('hide');

    });
 

$('.view_detail7').click(function(){
          
          
         
          
          $.ajax({
            type: 'ajax',
              url : '/codeigniter3/cuentacontable/get_plan_cuenta_data',
           
              method:'GET',
              dataType:'json',
              success:function(data) {
            
         
 
                  var html = '';
                  var i;
                  var cuenta = '';
                  for(i=0; i<data.length; i++){

                    html +=  '<tr   id="'+data[i].Codigo+'">'+
                        '<td>'+data[i].Codigo+'</td>'+
                        '<td>'+data[i].Descripcion+'</td>'+
                         
                        '<td style="text-align:right;">'+
                          
                         
                        '</td>'+
                        '</tr>';
                  }
                $('#listRecords7').html(html);
                 $('#show_modal7').modal({backdrop: 'static', keyboard: true, show: true});         
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
})();