(function(){
    
 

 
$('#estado').on('click', function () {
    $(this).val(this.checked ? 1 : 0);
     
});
 
    if ($('#estado').val() == "0" ) {
 
       $("#estado").attr('checked', false);  
    }else{

      $("#estado").attr('checked', true);  
    }



var base64image = $('#blah').attr('src');
$('#imagencontenido').val(base64image);


$('#pcsoles').val($('input[name="AC_VH_SOLES"]').val());
$('#totalcuenta').val($('input[name="AC_VH_SOLES"]').val());
$('#acvalorlibro').val($('input[name="AC_VH_SOLES"]').val());

 $('input[name="AC_TC_VOUCHER"]').val("0.00");




if($('#monedacompra').val()=='Seleccione'){

  $('input[name="AC_TC_VOUCHER"]').prop("readonly", true);
   $('input[name="AC_VH_DOLARES"]').prop("readonly", true);
                  
}else if($('#monedacompra').val()=='Nuevos Soles'){

   $('input[name="AC_TC_VOUCHER"]').prop("readonly", true);
   $('input[name="AC_VH_DOLARES"]').prop("readonly", true);




 }
 else if($('#monedacompra').val()=='Dolares'){
  $('input[name="AC_TC_VOUCHER"]').prop("readonly", false);
  $('input[name="AC_VH_DOLARES"]').prop("readonly", false);
 }




$('#cuentacontable').on('change', function () {
 
      
          texto  =$('#cuentacontable').val()  ; 
         
          $.ajax({
            type: 'ajax',
              url : '/codeigniter3/bien/get_tasa_depre_cuenta/'+texto,
           
              method:'GET',
              dataType:'json',
              success:function(data) {
                console.log(data);
                $('input[name="AC_TASA_DEPREC_CONTABLE"]').val(data);
                    
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                alert(errorThrown +'Error get data from ajax');
              }
          });


});

$('#monedacompra').on('change', function () {
 
      
   texto  =$('#monedacompra').val()  ; 
         
            if (texto == "MN" ){
                $('input[name="AC_VH_SOLES"]').prop("readonly", false);
                $('input[name="AC_VH_DOLARES"]').prop("readonly", true);
                $('input[name="AC_TC_VOUCHER"]').prop("readonly", true);
                $('input[name="tc_compra_contable"]').prop("readonly", true);
                $('input[name="AC_VH_SOLES"]').val("0.00");



                  $('input[name="pc_soles_contable"]').val("0.00");

                 $('input[name="total_cuenta_contable"]').val("0.00");
                 $('input[name="AC_VALOR_LIBRO_CONTABLE"]').val("0.00");

             
           var inputVal = document.getElementById("AC_VH_SOLESp");

                          inputVal.style.backgroundColor = "white";

           var inputVal = document.getElementById("AC_TC_VOUCHERp");

                          inputVal.style.backgroundColor = "Gainsboro";

           $('input[name="AC_TC_VOUCHER"]').val("0.00");
           $('input[name="AC_VH_DOLARES"]').val("0.00");


             var inputVal = document.getElementById("AC_VH_DOLARESp");

                          inputVal.style.backgroundColor = "Gainsboro";

            




        
            }else if(texto == "ME") {
                            
                var inputVal = document.getElementById("AC_VH_SOLESp");

                inputVal.style.backgroundColor = "Gainsboro";

                 var inputVal = document.getElementById("AC_TC_VOUCHERp");

                inputVal.style.backgroundColor = "white";

                var inputVal = document.getElementById("AC_VH_DOLARESp");

                inputVal.style.backgroundColor = "white";


                $('input[name="AC_VH_SOLES"]').prop("readonly", true);
                $('input[name="AC_VH_SOLES"]').val("0.00")

            
                $('input[name="AC_VH_DOLARES"]').prop("readonly", false);

               $('input[name="AC_TC_VOUCHER"]').prop("readonly", false);

                $('input[name="tc_compra_contable"]').prop("readonly", false);
              

                  $('input[name="pc_soles_contable"]').val("0.00");

                 $('input[name="total_cuenta_contable"]').val("0.00");
                 $('input[name="AC_VALOR_LIBRO_CONTABLE"]').val("0.00");



            }


});


 







 //   $('#textosoles1').on('change', function () {
     
          
  //     texto  =$('input[name="AC_VH_SOLES"]').val()  ;
             
              
//    $('input[name="pc_soles_contable"]').val(texto);

                

  //  });





$('input[name="AC_VH_SOLES"]').on('keyup', function () {
 
      
          texto  =$('input[name="AC_VH_SOLES"]').val()  ; 


         
           if($('#monedacompra').val() == 'MN' ){




                $('input[name="pc_soles_contable"]').val(texto);
                $('input[name="total_cuenta_contable"]').val(texto);
                $('input[name="AC_VALOR_LIBRO_CONTABLE"]').val(texto);
      
          }else if (('#monedacompra').val() == 0){

                $('input[name="pc_soles_contable"]').val('');
                $('input[name="total_cuenta_contable"]').val('');
                $('input[name="AC_VALOR_LIBRO_CONTABLE"]').val('');
            }

});



$('input[name="AC_VH_DOLARES"]').on('keyup', function () {
        

        if($('#monedacompra').val() == 'ME' ){
          texto  =$('input[name="AC_VH_DOLARES"]').val() ; 
    

                $('input[name="pc_soles_contable"]').val($('input[name="AC_TC_VOUCHER"]').val()*texto);
                $('input[name="total_cuenta_contable"]').val($('input[name="AC_TC_VOUCHER"]').val()*texto);
                $('input[name="AC_VALOR_LIBRO_CONTABLE"]').val($('input[name="AC_TC_VOUCHER"]').val()*texto);
                 $('input[name="AC_VH_SOLES"]').val($('input[name="AC_TC_VOUCHER"]').val()*texto);
        }
 
 



});

$('input[name="AC_TC_VOUCHER"]').on('keyup', function () {
        

        if($('#monedacompra').val() == 'ME' ){
          texto  =$('input[name="AC_VH_DOLARES"]').val() ; 
    

                $('input[name="pc_soles_contable"]').val($('input[name="AC_TC_VOUCHER"]').val()*texto);
                $('input[name="total_cuenta_contable"]').val($('input[name="AC_TC_VOUCHER"]').val()*texto);
                $('input[name="AC_VALOR_LIBRO_CONTABLE"]').val($('input[name="AC_TC_VOUCHER"]').val()*texto);
                 $('input[name="AC_VH_SOLES"]').val($('input[name="AC_TC_VOUCHER"]').val()*texto);
        }
 
 



});












$('input[name="AC_TIEMPO_VIDA"]').on('keyup', function () {
 
      
          texto  =$('input[name="AC_TIEMPO_VIDA"]').val()  ; 
         
           if (texto != 0)    {

            $('input[name="AC_TASA_DEPREC_INDIVIDUAL"]').val(100/texto); 
           }else{

            $('input[name="AC_TASA_DEPREC_INDIVIDUAL"]').val('0.00'); 
           }
      
 

});


 
$('input[name="prec_compra_sin_igv"]').on('click', function () {
   texto  =$('input[name="AC_VH_SOLES"]').val()  ; 
      texto = texto/1.18;
       texto =  Math.round(texto * 100) / 100;
           
 
    if (this.checked){
       $(this).val("1");
       $('input[name="total_cuenta_contable"]').val(texto);
          $('input[name="pc_soles_contable"]').val(texto);
          $('input[name="AC_VALOR_LIBRO_CONTABLE"]').val(texto);
    }else{
        texto = texto*1.18;
       texto =  Math.round(texto * 100) / 100; 

      $(this).val("0");
          $('input[name="pc_soles_contable"]').val(texto);
          $('input[name="AC_VALOR_LIBRO_CONTABLE"]').val(texto);
                 $('input[name="total_cuenta_contable"]').val(texto);

    }
               
       

      
          
     
});
 
    if ($('input[name="prec_compra_sin_igv"]').val() == "0" ) {
 
       $('input[name="prec_compra_sin_igv"]').attr('checked', false);  
    }else{

      $('input[name="prec_compra_sin_igv"]').attr('checked', true);  
    }

 

$('input[name="AC_DEPREC_INDIVIDUAL"]').on('click', function () {
   
    if (this.checked){
       $(this).val("1");

          $('input[name="AC_TIEMPO_VIDA"]').prop("readonly", false);
          
    }else{
         
      $(this).val("0");
          $('input[name="AC_TIEMPO_VIDA"]').prop("readonly", true);
           









    }

               
 }); 


  if ($('input[name="AC_COMPONENTE_DE"]').val() == "0" ) {
       $('input[name="AC_CODIGO_PRINCIPAL"]').next().hide();
        $('input[name="AC_CODIGO_PRINCIPAL"]').next().next().hide();
       $('input[name="AC_CODIGO_PRINCIPAL"]').hide();
       $('input[name="AC_CODIGO_PRINCIPAL"]').prev().hide();

       $('input[name="AC_COMPONENTE_DE"]').attr('checked', false);  
    }else{
        $('input[name="AC_CODIGO_PRINCIPAL"]').next().next().show();
       $('input[name="AC_CODIGO_PRINCIPAL"]').next().show();
      $('input[name="AC_CODIGO_PRINCIPAL"]').show();
      $('input[name="AC_CODIGO_PRINCIPAL"]').prev().show();
      $('input[name="AC_COMPONENTE_DE"]').attr('checked', true);  
    }

 

$('input[name="AC_COMPONENTE_DE"]').on('click', function () {
   
    if (this.checked){
       $(this).val("1");
       $('input[name="AC_CODIGO_PRINCIPAL"]').next().next().show();
       $('input[name="AC_CODIGO_PRINCIPAL"]').next().show();
       $('input[name="AC_CODIGO_PRINCIPAL"]').show();
       $('input[name="AC_CODIGO_PRINCIPAL"]').prev().show();

    }else{
         
      $(this).val("0");
       $('input[name="AC_CODIGO_PRINCIPAL"]').next().next().hide();
       $('input[name="AC_CODIGO_PRINCIPAL"]').next().hide();
      $('input[name="AC_CODIGO_PRINCIPAL"]').hide();
        $('input[name="AC_CODIGO_PRINCIPAL"]').prev().hide();

          
    }
         
      
          
     
});
 
    if ($('input[name="AC_DEPREC_INDIVIDUAL"]').val() == "0" ) {
 
       $('input[name="AC_DEPREC_INDIVIDUAL"]').attr('checked', false);  
    }else{

      $('input[name="AC_DEPREC_INDIVIDUAL"]').attr('checked', true);  
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
  
function buscarfamilias(){
    
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



$('#sedes > tbody').on('dblclick', '>tr', function () {
       id = $(this).attr("id");
       
       idesc = $(this).find('td:nth-child(2)').text();
 

       $("input[name='AC_IDSEDE']").val(id);
       $("input[name='DESC_SEDE']").val(idesc);



   $("#show_modalsedes").modal('hide');




    });   
     $('.view_detailsedes').click(buscarsedes);
     $('#jobsearchsedes').keyup(buscarsedes);

function buscarsedes(){
 
         var b =$('#jobsearchsedes').val()  ;
        
       
          texto=b;
         
          $.ajax({
            type: 'ajax',
              url : '/codeigniter3/bien/get_sede_data/'+texto,
           
              method:'GET',
              dataType:'json',
              success:function(data) {
            
         
 
                  var html = '';
                  var i;
                  for(i=0; i<data.length; i++){

                    html +=  '<tr   id="'+data[i].SE_ID+'">'+
                        '<td>'+data[i].SE_ID+'</td>'+
                        '<td>'+data[i].SE_DESCRIPCION+'</td>'+
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
}


$('#locales > tbody').on('dblclick', '>tr', function () {
       id = $(this).attr("id");
      
       idesc = $(this).find('td:nth-child(2)').text();
 

       $("input[name='AC_IDLOCAL']").val(id);
       $("input[name='DESC_LOCAL']").val(idesc);



   $("#show_modallocales").modal('hide');
  

    });
 
     $('.view_detaillocales').click(buscarlocales);
     //$('#jobsearchlocales').keyup(buscarlocales);
     function buscarlocales(){    
          var sede = $("input[name='DESC_SEDE']").val() ;
          var idsede = $("input[name='AC_IDSEDE']").val() ;

          if (  !sede || sede == ""){
           $('#localerror').html("Debe escoger un local");
            return ;
          }
         
         
          
          $.ajax({
            type: 'ajax',
              url : '/codeigniter3/bien/get_local_data/'+idsede,
           
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

                    $('#listlocales').html('<tr><td colspan = "4">No hay data relacionada con el local escogido</td></tr>');
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
      } 


//areas
$('#areas > tbody').on('dblclick', '>tr', function () {
       id = $(this).attr("id");
       
       idesc = $(this).find('td:nth-child(2)').text();
 

       $("input[name='AC_IDAREA']").val(id);
       $("input[name='DESC_AREA']").val(idesc);



   $("#show_modalareas").modal('hide');




    });   
     $('.view_detailareas').click(buscarareas);
     $('#jobsearchareas').keyup(buscarareas);

function buscarareas(){
 
         var b =$('#jobsearchareas').val()  ;
        
       
          texto=b;
         
          $.ajax({
            type: 'ajax',
              url : '/codeigniter3/bien/get_area_data/'+texto,
           
              method:'GET',
              dataType:'json',
              success:function(data) {
            
         
 
                  var html = '';
                  var i;
                  for(i=0; i<data.length; i++){

                    html +=  '<tr   id="'+data[i].AR_ID+'">'+
                        '<td>'+data[i].AR_ID+'</td>'+
                        '<td>'+data[i].AR_DESCRIPCION+'</td>'+
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
}

//oficinas

$('#oficinas > tbody').on('dblclick', '>tr', function () {
       id = $(this).attr("id");
       
       idesc = $(this).find('td:nth-child(2)').text();
 

       $("input[name='AC_IDOFICINA']").val(id);
       $("input[name='DESC_OFICINA']").val(idesc);



   $("#show_modaloficinas").modal('hide');




    });   
     $('.view_detailoficinas').click(buscaroficinas);
     $('#jobsearchoficinas').keyup(buscaroficinas);

function buscaroficinas(){
 
         var b =$('#jobsearchoficinas').val()  ;
        
       
          texto=b;
         
          $.ajax({
            type: 'ajax',
              url : '/codeigniter3/bien/get_oficina_data/'+texto,
           
              method:'GET',
              dataType:'json',
              success:function(data) {
            
         
 
                  var html = '';
                  var i;
                  for(i=0; i<data.length; i++){

                    html +=  '<tr   id="'+data[i].OF_ID+'">'+
                        '<td>'+data[i].OF_ID+'</td>'+
                        '<td>'+data[i].OF_DESCRIPCION+'</td>'+
                        '</tr>';
                  }
                $('#listoficinas').html(html);
                 $('#show_modaloficinas').modal({backdrop: 'static', keyboard: true, show: true});         
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                alert(errorThrown +'Error get data from ajax');
              }
          });
}

//edificios

$('#edificios > tbody').on('dblclick', '>tr', function () {
       id = $(this).attr("id");
       
       idesc = $(this).find('td:nth-child(2)').text();
 

       $("input[name='AC_IDEDIFICIO']").val(id);
       $("input[name='DESC_EDIFICIO']").val(idesc);



   $("#show_modaledificios").modal('hide');




    });   
     $('.view_detailedificios').click(buscaredificios);
     $('#jobsearchedificios').keyup(buscaredificios);

function buscaredificios(){
 
         var b =$('#jobsearchedificios').val()  ;
        
       
          texto=b;
         
          $.ajax({
            type: 'ajax',
              url : '/codeigniter3/bien/get_edificio_data/'+texto,
           
              method:'GET',
              dataType:'json',
              success:function(data) {
            
         
 
                  var html = '';
                  var i;
                  for(i=0; i<data.length; i++){

                    html +=  '<tr   id="'+data[i].SE_ID+'">'+
                        '<td>'+data[i].SE_ID+'</td>'+
                        '<td>'+data[i].SE_DESCRIPCION+'</td>'+
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
}

//pisos
$('#pisos > tbody').on('dblclick', '>tr', function () {
       id = $(this).attr("id");
       
       idesc = $(this).find('td:nth-child(2)').text();
 

       $("input[name='AC_IDPISO']").val(id);
       $("input[name='DESC_PISO']").val(idesc);



   $("#show_modalpisos").modal('hide');




    });   
     $('.view_detailpisos').click(buscarpisos);
     $('#jobsearchpisos').keyup(buscarpisos);

function buscarpisos(){
 
         var b =$('#jobsearchpisos').val()  ;
        
       
          texto=b;
         
          $.ajax({
            type: 'ajax',
              url : '/codeigniter3/bien/get_piso_data/'+texto,
           
              method:'GET',
              dataType:'json',
              success:function(data) {
            
         
 
                  var html = '';
                  var i;
                  for(i=0; i<data.length; i++){

                    html +=  '<tr   id="'+data[i].SE_ID+'">'+
                        '<td>'+data[i].SE_ID+'</td>'+
                        '<td>'+data[i].SE_DESCRIPCION+'</td>'+
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
}


//responsables
$('#responsables > tbody').on('dblclick', '>tr', function () {
  debugger
       id = $(this).attr("id");
       
       idesc = $(this).find('td:nth-child(2)').text();
 

       $("input[name='AC_IDRESPON_ACTI']").val(id);
       $("input[name='DESC_RESPON_ACTI']").val(idesc);



   $("#show_modalresponsables").modal('hide');




    });   
     $('.view_detailresponsables').click(buscarresponsables);
     $('#jobsearchresponsables').keyup(buscarresponsables);

function buscarresponsables(){
 
         var b =$('#jobsearchresponsables').val()  ;
        
       
          texto=b;
         
          $.ajax({
            type: 'ajax',
              url : '/codeigniter3/bien/get_responsable_data/'+texto,
           
              method:'GET',
              dataType:'json',
              success:function(data) {
            
         
 
                  var html = '';
                  var i;
                  for(i=0; i<data.length; i++){

                    html +=  '<tr   id="'+data[i].RA_ID+'">'+
                        '<td>'+data[i].RA_ID+'</td>'+
                        '<td>'+data[i].RA_DESCRIPCION+'</td>'+
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
}

//supervisores
$('#supervisores > tbody').on('dblclick', '>tr', function () {
       id = $(this).attr("id");
       
       idesc = $(this).find('td:nth-child(2)').text();
 

       $("input[name='AC_SUPERVISOR']").val(id);
       $("input[name='DESC_SUPERVISOR']").val(idesc);



   $("#show_modalsupervisores").modal('hide');




    });   
     $('.view_detailsupervisores').click(buscarsupervisores);
     $('#jobsearchsupervisores').keyup(buscarsupervisores);

function buscarsupervisores(){
 
         var b =$('#jobsearchsupervisores').val()  ;
        
       
          texto=b;
         
          $.ajax({
            type: 'ajax',
              url : '/codeigniter3/bien/get_supervisor_data/'+texto,
           
              method:'GET',
              dataType:'json',
              success:function(data) {
            
         
 
                  var html = '';
                  var i;
                  for(i=0; i<data.length; i++){

                    html +=  '<tr   id="'+data[i].RA_ID+'">'+
                        '<td>'+data[i].RA_ID+'</td>'+
                        '<td>'+data[i].RA_DESCRIPCION+'</td>'+
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
}

//usuarios
$('#usuarios > tbody').on('dblclick', '>tr', function () {
       id = $(this).attr("id");
       
       idesc = $(this).find('td:nth-child(2)').text();
 

       $("input[name='AC_USUARIO_UBICACION']").val(id);
       $("input[name='DESC_USUARIO_UBICACION']").val(idesc);



   $("#show_modalusuarios").modal('hide');




    });   
     $('.view_detailusuarios').click(buscarusuarios);
     $('#jobsearchusuarios').keyup(buscarusuarios);

function buscarusuarios(){
 
         var b =$('#jobsearchusuarios').val()  ;
        
       
          texto=b;
         
          $.ajax({
            type: 'ajax',
              url : '/codeigniter3/bien/get_usuario_data/'+texto,
           
              method:'GET',
              dataType:'json',
              success:function(data) {
            
         
 
                  var html = '';
                  var i;
                  for(i=0; i<data.length; i++){

                    html +=  '<tr   id="'+data[i].RA_ID+'">'+
                        '<td>'+data[i].RA_ID+'</td>'+
                        '<td>'+data[i].RA_DESCRIPCION+'</td>'+
                        '</tr>';
                  }
                $('#listusuarios').html(html);
                 $('#show_modalusuarios').modal({backdrop: 'static', keyboard: true, show: true});         
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                alert(errorThrown +'Error get data from ajax');
              }
          });
}


//proyectos
$('#proyectos > tbody').on('dblclick', '>tr', function () {
       id = $(this).attr("id");
       
       idesc = $(this).find('td:nth-child(2)').text();
 

       $("input[name='AC_CODPROYECTO']").val(id);
       $("input[name='DESC_PROYECTO']").val(idesc);



   $("#show_modalproyectos").modal('hide');




    });   
     $('.view_detailproyectos').click(buscarproyectos);
     $('#jobsearchproyectos').keyup(buscarproyectos);

function buscarproyectos(){
 
         var b =$('#jobsearchproyectos').val()  ;
        
       
          texto=b;
         
          $.ajax({
            type: 'ajax',
              url : '/codeigniter3/bien/get_proyecto_data/'+texto,
           
              method:'GET',
              dataType:'json',
              success:function(data) {
            
         
 
                  var html = '';
                  var i;
                  for(i=0; i<data.length; i++){

                    html +=  '<tr   id="'+data[i].PY_ID+'">'+
                        '<td>'+data[i].PY_ID+'</td>'+
                        '<td>'+data[i].PY_DESCRIPCION+'</td>'+
                        '</tr>';
                  }
                $('#listproyectos').html(html);
                 $('#show_modalproyectos').modal({backdrop: 'static', keyboard: true, show: true});         
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                alert(errorThrown +'Error get data from ajax');
              }
          });
}

//contratos
$('#contratos > tbody').on('dblclick', '>tr', function () {
       id = $(this).attr("id");
       
       idesc = $(this).find('td:nth-child(2)').text();
 

       $("input[name='AC_NUM_CONTRATO']").val(id);
       $("input[name='DESC_CONTRATO']").val(idesc);



   $("#show_modalcontratos").modal('hide');




    });   
     $('.view_detailcontratos').click(buscarproyectos);
     $('#jobsearchcontratos').keyup(buscarproyectos);

function buscarproyectos(){
 
         var b =$('#jobsearchcontratos').val()  ;
        
       
          texto=b;
         
          $.ajax({
            type: 'ajax',
              url : '/codeigniter3/bien/get_contrato_data/'+texto,
           
              method:'GET',
              dataType:'json',
              success:function(data) {
            
         
 
                  var html = '';
                  var i;
                  for(i=0; i<data.length; i++){

                    html +=  '<tr   id="'+data[i].CO_ID+'">'+
                        '<td>'+data[i].CO_ID+'</td>'+
                        '<td>'+data[i].CO_MODALIDAD+'</td>'+
                        '</tr>';
                  }
                $('#listcontratos').html(html);
                 $('#show_modalcontratos').modal({backdrop: 'static', keyboard: true, show: true});         
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                alert(errorThrown +'Error get data from ajax');
              }
          });
}


//bienes
$('#bienes > tbody').on('dblclick', '>tr', function () {
       id = $(this).attr("id");
       
       idesc = $(this).find('td:nth-child(2)').text();
 

       $("input[name='AC_CODIGO_PRINCIPAL']").val(id);
       $("input[name='DESC_CODIGO_PRINCIPAL']").val(idesc);



   $("#show_modalbienes").modal('hide');




    });   
     $('.view_detailbienes').click(buscarbienes);
     $('#jobsearchbienes').keyup(buscarbienes);

function buscarbienes(){
 
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


 var inputVal = document.getElementById("AC_TC_VOUCHERp");

                          inputVal.style.backgroundColor = "Gainsboro";



 var inputVal = document.getElementById("AC_VH_DOLARESp");

                          inputVal.style.backgroundColor = "Gainsboro";










})();