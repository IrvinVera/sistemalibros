$(document).ready(function(){
    $('#TablaLibros').DataTable({
        responsive: true,
        fixedHeader: true,
        processing: true,
        pageLength: 10,
        searching: true,
        language: {
            url: routeBase+'/Personal/js/DataTable_Spanish.json'
        },
        ajax: {
            url: "obtener-libros",
            type: "GET"
        },
        columns: [
            { data:"nombre",     className: 'text-uppercase text-center fila' },
            { data:"autor",     className: 'text-uppercase text-center fila' },
            { data:"fecha",     className: 'text-uppercase text-center fila' },
            { data:"categoria",  className: 'text-uppercase text-center fila' },
            { data:"disponible",  className: 'text-uppercase text-center fila' },
            { data:"adquiridor" ,     className: 'text-uppercase text-center fila' },
            { data:"Acciones" ,      className: 'text-uppercase text-center ' }
        ],   
    });

});

$('#TablaLibros').on('click', '.btnDisponibilidad', function() {
    $("#modalCambioDisponibilidad").modal();
    $('#idLibro').val(this.name);
});

$('#TablaLibros').on('click', '.btnEntregarLibro', function() {
    
    swal({
        title:"¿Cambiar a estado de Entregado?",
        type:"warning",
        showCancelButton: true,
        cancelButtonText: "Cancelar",
        confirmButtonText: "Aceptar",
        buttons: true,
        dangerMode: true,
        allowOutsideClick: false
    }).then((willDelete) =>{
        if(willDelete){
            marcarLibroEntregado(this.name);
        }
    });

});

function marcarLibroEntregado(id){

    var form_data = new FormData();

    form_data.append('id', id);
    
    $.ajax({
        url: route('entregar-libro'), 
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      },
        data :  form_data,
        type : 'POST',
        dataType : 'json',
        contentType: false,
        processData: false,
        async: false,  
        success : function(response) {

            if(response == 1){

                swal({
                    title: "Libro entregado correctamente",
                    type: "success",
                    showCancelButton: false,
                    confirmButtonColor: "#a08300",
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Aceptar",
                    allowOutsideClick: false
                }).then(function () {
                    location.reload();
              });

            }else{
                
                swal({
                    title: "Ocurrió un error al entregar el libro",
                    type: "error",
                    showCancelButton: false,
                    confirmButtonColor: "#a08300",
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Aceptar",
                    allowOutsideClick: false,
                });

            }
  
        }
    });
}


$('#TablaLibros').on('click', '.btnEliminar', function() {
    
    swal({
        title:"¿Estás seguro de eliminar este libro?",
        text: "Al eliminarlo no se podrá recuperar",
        type:"warning",
        showCancelButton: true,
        cancelButtonText: "Cancelar",
        confirmButtonText: "Aceptar",
        buttons: true,
        dangerMode: true,
        allowOutsideClick: false
    }).then((willDelete) =>{
        if(willDelete){
            eliminarLibro(this.name);
        }
    });

});

function eliminarLibro(id){

    var form_data = new FormData();

    form_data.append('id', id);
    
    $.ajax({
        url: route('eliminar-libro'), 
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      },
        data :  form_data,
        type : 'POST',
        dataType : 'json',
        contentType: false,
        processData: false,
        async: false,  
        success : function(response) {

            if(response == 1){

                swal({
                    title: "Libro eliminado correctamente",
                    type: "success",
                    showCancelButton: false,
                    confirmButtonColor: "#a08300",
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Aceptar",
                    allowOutsideClick: false
                }).then(function () {
                    location.reload();
              });

            }else{
                
                swal({
                    title: "Ocurrió un error al eliminar el libro",
                    type: "error",
                    showCancelButton: false,
                    confirmButtonColor: "#a08300",
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Aceptar",
                    allowOutsideClick: false,
                });

            }
  
        }
    });
}

function cambiarDisponibilidad(){

    if($('#nombre_adquiriente').val().trim() != "" ){

        var form_data = new FormData();

        form_data.append('id', $('#idLibro').val());
        form_data.append('nombre_adquiriente', $('#nombre_adquiriente').val());
        
        $.ajax({
            url: route('cambiar-disponibilidad'), 
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
          },
            data :  form_data,
            type : 'POST',
            dataType : 'json',
            contentType: false,
            processData: false,
            async: false,  
            success : function(response) {
    
                if(response == 1){
    
                    swal({
                        title: "Disponibilidad modificada correctamente",
                        type: "success",
                        showCancelButton: false,
                        confirmButtonColor: "#a08300",
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Aceptar",
                        allowOutsideClick: false
                    }).then(function () {
                        location.reload();
                  });
    
                }else{
                    
                    swal({
                        title: "Ocurrió un error al modificar la disponibilidad",
                        type: "error",
                        showCancelButton: false,
                        confirmButtonColor: "#a08300",
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Aceptar",
                        allowOutsideClick: false,
                    });
    
                }
      
            }
        });
        
    }else{

        swal({
            title: "Debe completar todos los campos",
            type: "warning",
            showCancelButton: false,
            confirmButtonColor: "#a08300",
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Aceptar",
            allowOutsideClick: false,
        });

    }

}