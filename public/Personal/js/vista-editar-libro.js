
$.validator.setDefaults( {


} );

$.validator.addMethod(
    "regex",
    function(value, element, regexp) {
        if (regexp.constructor != RegExp)
            regexp = new RegExp(regexp);
        else if (regexp.global)
            regexp.lastIndex = 0;
        return this.optional(element) || regexp.test(value);
    },
    "Please check your input."
);


$( document ).ready(function() {
    var ruta = $("#ruta").val();
       
    obtenerCategorias(ruta);

    $( "#formActualizarLibro" ).validate( {
        rules: {
            nombre:{
                required:true,
            },
            autor:{  
                required:true, 
            },
            fecha:{
                required: true,
            },
            categoria:{
                required: true
            }
        },
        messages:{
            nombre :{
                required: 'Favor de completar el campo',
            },
            autor :{
                required: 'Favor de completar el campo',
            },
            fecha :{
                required: 'Favor de completar el campo',
            },
            categoria :{
                required: 'Favor de completar el campo',
            },
        },
            errorElement: "em",
            errorPlacement: function ( error, element ) {
                // Add the `help-block` class to the error element
                error.addClass( "help-block" );

                if ( element.prop( "type" ) === "checkbox" ) {
                    error.insertAfter( element.parent( "label" ) );
                } else {
                    error.insertAfter( element );
                }
            },
            highlight: function ( element, errorClass, validClass ) {
                $( element ).parents( "classerror" ).addClass( "has-error" ).removeClass( "has-success" );
            },
            unhighlight: function (element, errorClass, validClass) {
                $( element ).parents( "classerror" ).addClass( "has-success" ).removeClass( "has-error" );
            },
            submitHandler: function () {
            
                $.ajax({
                    url: route('actualizar-libro'),
                    type: "POST",
                data: $("#formActualizarLibro").serialize(),
                dataType: "json",
                success : function(response) {

                    if(response == 1){

                        swal({
                            title: "Acción realizada con éxito",
                            type: "success",
                        showCancelButton: false,
                        confirmButtonColor: "#a08300",
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Aceptar",
                        timer: 9000,
                    }).then(function () {
                         location.href = route('home');
                    });

                    }

                    if(response == 2){

                        swal("Nombre repetido!", "El correo ingresado ya se encuentra registrado.", "warning");

                    }

                    if(response == 3){

                        swal("Error interno!", "No se pudo registrar correctamente al residente.", "error");

                    }                

                }

            });
        }

    });

});


function obtenerCategorias(url){
    var uerreele = url;
    $.ajax({
        url: uerreele+"/obtener-categorias",
        type: "GET",
        dataType: "json",
    success : function(response) {
        console.log(response);
        let idSelected = $('#idCategoriaSeleccionada').val();
        cargarDatosSelect($('#categoria'), idSelected, response);

    }

    });


}


function cargarDatosSelect(divContent = null, idSelected = null, datos = null, extras = null) {
    divContent.empty();
    html = '';
    $.each(datos, function(key, value) {
        html += '<option ';
        html += ' value="' + value.id + '" ';
        html += (idSelected == value.id) ? 'selected ' : '';
        html += '>' + value.nombre + '</option>';
    });
    divContent.append(html);
}
