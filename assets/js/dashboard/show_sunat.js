(function(){
  
 
$('#idmes').on('change', function () {
  var año = document.getElementById("idaño").value;
  var mes = document.getElementById("idmes").value;
  var date = año+mes;
  var year = parseInt(date.substring(0, 4));
  var month= date.substring(4, 6).padStart(2,"0");
  var lastDay = (new Date(year, month, 0)).getUTCDate();
  var newFullGivenDate = lastDay +"/" +month +"/"+ year ;

    $('input[name="fecha_proceso"]').val(newFullGivenDate);
  
 
 }); 


 

 
 $('#idaño').on('change', function () {
  var año = document.getElementById("idaño").value;
  var mes = document.getElementById("idmes").value;
  var date = año+mes;
  var year = parseInt(date.substring(0, 4));
  var month= date.substring(4, 6).padStart(2,"0");
  var lastDay = (new Date(year, month, 0)).getUTCDate();
  var newFullGivenDate = lastDay +"/" +month +"/"+ year ;

    $('input[name="fecha_proceso"]').val(newFullGivenDate);
  
 
 }); 



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


    //bienes
  $('#bienes > tbody').on('dblclick', '>tr', function () {
    id = $(this).attr("id");
    
    idesc = $(this).find('td:nth-child(2)').text();


    $(m).val(id);
    $('#'+ m.name +'desc').val(idesc);



$("#show_modalbienes").modal('hide');




 });   

 var m;
  $('#txtclienteinicial').dblclick(buscarbienes);
  $('#jobsearchbienes').keyup(buscarbienes);
  $('#txtclientefinal').dblclick(buscarbienes);


function buscarbienes(e){
    m=e.target;
      var b =$('#jobsearchbienes').val()  ;
     texto=b;
       $.ajax({
         type: 'ajax',
           url : '/codeigniter3/bien/get_bien_data/'+texto,

           //data: JSON.stringify(data),
           dataType : 'JSON',
           method:'POST',
      
           success:function(data) {
             console.log( data);
               var html = '';
               var i;
               for(i=0; i<data.length; i++){

                 html +=  '<tr   id="'+data[i].AC_CODIGO+'">'+
                     '<td>'+data[i].AC_CODIGO + '</td>'+
                     '<td>'+data[i].AC_ACTIVO_DES+'</td>'+
                     '</tr>';
               }
             $('#listbienes').html(html);
              $('#show_modalbienes').modal({backdrop: 'static', keyboard: true, show: true});         
           },
           error: function (jqXHR, textStatus, errorThrown)
           {
             alert(errorThrown+textStatus +jqXHR +'Error get data from ajax');
           }
       });
}


})();








function calcular_depreciacion(){
          
          
         var formData = $('#depreciacion').serialize();
          
          $.ajax({
            type: 'ajax',

              url : '/codeigniter3/depreciacion/calcular_depreciacion',
           
            dataType : 'json' ,
            method : 'POST',
              data:  $('#depreciacion').serialize(),
              success:function(data) {

            
               if(typeof data == 'object'){

                var html = '';
                var i;
                for(i=0; i<data.length; i++){

                  html +=  
                      '<tr><td>'+data[i].Codigo + '</td>'+
                      '<td>'+data[i].Descripción + '</td>'+
                      '<td>'+data[i].ValorLibro+'</td>'+
                      '<td>'+data[i].DeprecAcumInicial+'</td>'+
                      '<td>'+data[i]['F.Actividad']+'</td>'+
                      '<td>'+data[i]['%']+'</td>'+
                      '<td>'+data[i].Factor+'</td>'+
                      '<td>'+data[i].DeprecMensual+'</td>'+
                      '<td>'+data[i].Meses+'</td>'+
                      '<td>'+data[i].DeprecEjercicio+'</td>'+
                      '<td>'+data[i].DeprecAcumulada+'</td>'+
                      '<td>'+data[i].ValorResidual+'</td>'+
                      '<td>'+data[i].CuentaContable+'</td>'+
                      '<td>'+data[i]['Centro.Costo']+'</td>'+
                      '<td>'+data[i].Tipo+'</td>'+
                      '<td>'+data[i].Baja+'</td>'+
                      '<td>'+data[i].Grabar+'</td>'+
                      '<td>'+data[i].SUMA+'</td>'+

                      '</tr> ';
                }

            
                $('input[name="total_items"]').val(data.length-1);
                $('input[name="total_dep_inicial"]').val(data[data.length-1].DeprecAcumInicial);
                $('input[name="total_dep_ejercicio"]').val(data[data.length-1].DeprecEjercicio);
                $('input[name="total_dep_acumulada"]').val(data[data.length-1].DeprecAcumulada);
                $('input[name="total_valor_libros"]').val(data[data.length-1].ValorLibro);
                $('input[name="total_dep_mensual"]').val(data[data.length-1].DeprecMensual);
                
                
                

                
               }else{

                console.log("Información vacía");
               }
         

                 document.getElementById("t01").innerHTML = html;
     
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                alert(errorThrown +'Error get data from ajax');
              }
          });


          

         

}

var $mesT=0;
var $añoT=0;
var $mesCadena="";




function grabar_depreciacion(){
$mesT=document.getElementById("idmes").value;
$añoT= document.getElementById("idaño").value;

if($mesT == 1){
  $mesCadena="Enero";
}else if($mesT == 2) {
  $mesCadena="Febrero";
}else if($mesT == 3) {
  $mesCadena="Marzo";
}else if($mesT == 4) {
  $mesCadena="Abril";
}else if($mesT == 5) {
  $mesCadena="Mayo";
}else if($mesT == 6) {
  $mesCadena="Junio";
}else if($mesT == 7) {
  $mesCadena="Julio";
}else if($mesT == 8) {
  $mesCadena="Agosto";
}else if($mesT == 9) {
  $mesCadena="Setiembre";
}else if($mesT == 10) {
  $mesCadena="Octubre";
}else if($mesT == 11) {
  $mesCadena="Noviembre";
}else if($mesT == 12) {
  $mesCadena="Diciembre";
}

if (confirm("Esta seguro de guardar la depreciación al mes de "+$mesCadena+" del "+$añoT+" ?")) {

        var formData = $('#depreciacion').serialize();
        $.ajax({
          type: 'ajax',

            url : '/codeigniter3/depreciacion/grabar_depreciacion',
        
          dataType : 'json' ,
          method : 'POST',
            data:  $('#depreciacion').serialize(),
            success:function(data) {

                    
                      
                      
              alert("Registro de Depreciación Mensual correcto.");

      //reseteando los valores

      
      $('input[name="total_items"]').val("0.00");
      $('input[name="total_dep_inicial"]').val("0.00");
      $('input[name="total_dep_ejercicio"]').val("0.00");
      $('input[name="total_dep_acumulada"]').val("0.00");
      $('input[name="total_valor_libros"]').val("0.00");
      $('input[name="total_dep_mensual"]').val("0.00");
                        

                    

              

            },

          
            error: function (jqXHR, textStatus, errorThrown)
            {
              alert(errorThrown +'Error get data from ajax');
            }

        

          });

  }   
              

else{

  alert("Se ha cancelado la operación .");
  return ;

}


}

var reporte ,reporte2,reporte3;

function rpt_AF_Lista_general(){
  var ordenarpor = (document.querySelector('input[name=ordenar]:checked').value=='codigo')?1:2; 
  var tipo_depreciacion = (document.querySelector('input[name=tipodepreciacion]:checked').value=='tributaria')?1:2;
  var todos =      (document.getElementById("todos").checked)?'S':'N'  ;   

  window.open('/codeigniter3/reporte/mostrarReporte/'+ ordenarpor +'/'+tipo_depreciacion+'/'+todos+'/'+$('#txtclienteinicial').val()+'/'+$('#txtclientefinal').val()); 
     
  
    



}