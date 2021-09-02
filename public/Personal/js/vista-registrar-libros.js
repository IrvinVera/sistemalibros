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

    $( "#formRegistroNuevoLibro" ).validate( {
        rules: {
            nombre:{
                required:true,
                regex : /^([a-z-A-Z\s-ZñÑáéíóúÁÉÍÓÚ]+)$/,
            },
            autor:{  
                required:true, 
                regex : /^([a-z-A-Z\s-ZñÑáéíóúÁÉÍÓÚ]+)$/,
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
                regex: "Sólo letras"
            },
            autor :{
                required: 'Favor de completar el campo',
                regex: "Sólo letras",
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
                    url: "crear-libro",
                    type: "POST",
                data: $("#formRegistroNuevoLibro").serialize(),
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
                         location.href = route('clientes');
                    });


                    }

                    if(response == 2){

                        swal("Error interno!", "No se pudo registrar correctamente al residente.", "error");

                    }

                }

            });
        }

    });






});
