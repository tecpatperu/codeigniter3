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
                url: '/codeigniter3/proveedor/delete',
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



 


function isNumber(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}