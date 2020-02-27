(function(){
    
$('#estado').on('click', function () {
    $(this).val(this.checked ? 1 : 0);
     
});
 
    if ($('#estado').val() == "0" ) {
 
       $("#estado").attr('checked', false);  
    }else{

      $("#estado").attr('checked', true);  
    }

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}

$("#imgInp").change(function() {
  readURL(this);
});
 
  $('#sedes > tbody').on('dblclick', '>tr', function () {
       id = $(this).attr("id");
       //idesc = $("#sedes > tbody > tr > td").html();//[1].innerHTML;
       idesc = $(this).find('td:nth-child(2)').text();
 

       $("input[name='OF_IDSEDE']").val(id);
       $("input[name='DESC_SEDE']").val(idesc);



   $("#show_modalsedes").modal('hide');




    });
 

$('.view_detailsedes').click(function(){
          
          
         
          
          $.ajax({
            type: 'ajax',
              url : '/codeigniter3/sede/get_sede_data',
           
              method:'GET',
              dataType:'json',
              success:function(data) {
            
         
 
                  var html = '';
                  var i;
                  for(i=0; i<data.length; i++){

                    html +=  '<tr   id="'+data[i].Codigo+'">'+
                        '<td>'+data[i].Codigo+'</td>'+
                        '<td>'+data[i].Descripcion+'</td>'+
                        '<td>'+data[i].Estado+'</td>'+                  
                        '<td style="text-align:right;">'+
                          
                         
                        '</td>'+
                        '</tr>';
                  }
                $('#listsedes').html(html);
                 $('#show_modalsedes').modal({backdrop: 'static', keyboard: true, show: true});         
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                alert(errorThrown +'Error get data from ajax');
              }
          });
      });



  $('#locales > tbody').on('dblclick', '>tr', function () {
       id = $(this).attr("id");
       //idesc = $("#sedes > tbody > tr > td").html();//[1].innerHTML;
       idesc = $(this).find('td:nth-child(2)').text();
 

       $("input[name='OF_IDLOCAL']").val(id);
       $("input[name='DESC_LOCAL']").val(idesc);



   $("#show_modallocales").modal('hide');
  

    });
 

$('.view_detaillocales').click(function(){
          var sede = $("input[name='DESC_SEDE']").val() ;
          var idsede = $("input[name='OF_IDSEDE']").val() ;
          if (  !sede || sede == ""){
           $('#localerror').html("Debe escoger una sede");
            return ;
          }
         
         
          
          $.ajax({
            type: 'ajax',
              url : '/codeigniter3/local/get_local_data/'+idsede,
           
              method:'GET',
              dataType:'json',
              success:function(data) {
            
         
 
                  var html = '';
                  var i;
                  for(i=0; i<data.length; i++){

                    html +=  '<tr   id="'+data[i]['Codigo.Local']+'">'+
                        '<td>'+data[i]['Codigo.Local']+'</td>'+
                        '<td>'+data[i]['Descripción']+'</td>'+
                        '<td>'+data[i]['Estado']+'</td>'+                  
                        '<td style="text-align:right;">'+
                          
                         
                        '</td>'+
                        '</tr>';
                  }
                  if (data.length == 0) {

                    $('#listlocales').html('<tr><td colspan = "4">No hay data relacionada con la sede escogida</td></tr>');
                  }else{
                    $('#listlocales').html(html);    
                  }
                
                 $('#show_modallocales').modal({backdrop: 'static', keyboard: true, show: true});         
                   $('#localerror').html("");
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                alert(errorThrown +'Error get data from ajax');
              }
          });
      });



  $('#areas > tbody').on('dblclick', '>tr', function () {
       id = $(this).attr("id");
       //idesc = $("#sedes > tbody > tr > td").html();//[1].innerHTML;
       idesc = $(this).find('td:nth-child(2)').text();
 

       $("input[name='OF_IDAREA']").val(id);
       $("input[name='DESC_AREA']").val(idesc);



   $("#show_modalareas").modal('hide');




    });
 

$('.view_detailareas').click(function(){
          

          
          $.ajax({
            type: 'ajax',
              url : '/codeigniter3/area/get_area_data',
           
              method:'GET',
              dataType:'json',
              success:function(data) {
            
         
 
                  var html = '';
                  var i;
                  for(i=0; i<data.length; i++){

                    html +=  '<tr   id="'+data[i]['Codigo.Area']+'">'+
                        '<td>'+data[i]['Codigo.Area']+'</td>'+
                        '<td>'+data[i]['Area']+'</td>'+
                        '<td>'+data[i].Estado+'</td>'+                  
                        '<td style="text-align:right;">'+
                          
                         
                        '</td>'+
                        '</tr>';
                  }
                $('#listareas').html(html);
                 $('#show_modalareas').modal({backdrop: 'static', keyboard: true, show: true});         
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                alert(errorThrown +'Error get data from ajax');
              }
          });
      });



  $('#responsables > tbody').on('dblclick', '>tr', function () {
       id = $(this).attr("id");
       //idesc = $("#sedes > tbody > tr > td").html();//[1].innerHTML;
       idesc = $(this).find('td:nth-child(2)').text();
 

       $("input[name='OF_RESPONSABLE']").val(id);
       $("input[name='DESC_RESPONSABLE']").val(idesc);



   $("#show_modalresponsables").modal('hide');




    });
 

$('.view_detailresponsables').click(function(){
          
          
         
          
          $.ajax({
            type: 'ajax',
              url : '/codeigniter3/usuario/get_usuario_data',
           
              method:'GET',
              dataType:'json',
              success:function(data) {
            
         
 
                  var html = '';
                  var i;
                  for(i=0; i<data.length; i++){

                    html +=  '<tr   id="'+data[i].RA_ID+'">'+
                        '<td>'+data[i].RA_ID+'</td>'+
                        '<td>'+data[i].RA_DESCRIPCION+'</td>'+
                        '<td>'+data[i].RA_ESTADO+'</td>'+                  
                        '<td style="text-align:right;">'+
                          
                         
                        '</td>'+
                        '</tr>';
                  }
                $('#listresponsables').html(html);
                 $('#show_modalresponsables').modal({backdrop: 'static', keyboard: true, show: true});         
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                alert(errorThrown +'Error get data from ajax');
              }
          });
      });


  $('#supervisores > tbody').on('dblclick', '>tr', function () {
       id = $(this).attr("id");
       //idesc = $("#sedes > tbody > tr > td").html();//[1].innerHTML;
       idesc = $(this).find('td:nth-child(2)').text();
 

       $("input[name='OF_SUPERVISOR']").val(id);
       $("input[name='DESC_SUPERVISOR']").val(idesc);



   $("#show_modalsupervisores").modal('hide');




    });
 

$('.view_detailsupervisores').click(function(){
          
          
         
          
          $.ajax({
            type: 'ajax',
              url : '/codeigniter3/usuario/get_usuario_data',
           
              method:'GET',
              dataType:'json',
              success:function(data) {
            
         
 
                  var html = '';
                  var i;
                  for(i=0; i<data.length; i++){

                    html +=  '<tr   id="'+data[i].RA_ID+'">'+
                        '<td>'+data[i].RA_ID+'</td>'+
                        '<td>'+data[i].RA_DESCRIPCION+'</td>'+
                        '<td>'+data[i].RA_ESTADO+'</td>'+                  
                        '<td style="text-align:right;">'+
                          
                         
                        '</td>'+
                        '</tr>';
                  }
                $('#listsupervisores').html(html);
                 $('#show_modalsupervisores').modal({backdrop: 'static', keyboard: true, show: true});         
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                alert(errorThrown +'Error get data from ajax');
              }
          });
      });


  $('#edificios > tbody').on('dblclick', '>tr', function () {
       id = $(this).attr("id");
       //idesc = $("#sedes > tbody > tr > td").html();//[1].innerHTML;
       idesc = $(this).find('td:nth-child(2)').text();
 

       $("input[name='OF_IDOFICINA']").val(id);
       $("input[name='DESC_OFICINA']").val(idesc);



   $("#show_modaledificios").modal('hide');




    });
 

$('.view_detailedificios').click(function(){
          
          
         
          
          $.ajax({
            type: 'ajax',
              url : '/codeigniter3/edificio/get_edificio_data',
           
              method:'GET',
              dataType:'json',
              success:function(data) {
            
         
 
                  var html = '';
                  var i;
                  for(i=0; i<data.length; i++){

                    html +=  '<tr   id="'+data[i].SE_ID+'">'+
                        '<td>'+data[i].SE_ID+'</td>'+
                        '<td>'+data[i].SE_DESCRIPCION+'</td>'+
                        '<td>'+data[i].SE_ESTADO+'</td>'+                  
                        '<td style="text-align:right;">'+
                          
                         
                        '</td>'+
                        '</tr>';
                  }
                $('#listedificios').html(html);
                 $('#show_modaledificios').modal({backdrop: 'static', keyboard: true, show: true});         
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
 

       $("input[name='OF_IDPISO']").val(id);
       $("input[name='DESC_PISO']").val(idesc);



   $("#show_modalpisos").modal('hide');




    });
 

$('.view_detailpisos').click(function(){
          
          
         
          
          $.ajax({
            type: 'ajax',
              url : '/codeigniter3/piso/get_piso_data',
           
              method:'GET',
              dataType:'json',
              success:function(data) {
            
         
 
                  var html = '';
                  var i;
                  for(i=0; i<data.length; i++){

                    html +=  '<tr   id="'+data[i].SE_ID+'">'+
                        '<td>'+data[i].SE_ID+'</td>'+
                        '<td>'+data[i].SE_DESCRIPCION+'</td>'+
                        '<td>'+data[i].SE_ESTADO+'</td>'+                  
                        '<td style="text-align:right;">'+
                          
                         
                        '</td>'+
                        '</tr>';
                  }
                $('#listpisos').html(html);
                 $('#show_modalpisos').modal({backdrop: 'static', keyboard: true, show: true});         
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