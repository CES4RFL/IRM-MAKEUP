/*=================================
========VALIDA FORMULARIO==========
=================================*/ 

let formulario = $('#formularioEjemplo');

var isEmpty = ( input ) => ( input.length === 0 ) ? true : false ;

formulario.submit( (e) => {
    
    let datos = {
        nombre : this.nombre.value,
        email : this.email.value,
        mensaje : this.mensaje.value
    }

    if(!isEmpty(datos.nombre))
        peticion(datos);
    else
        console.log("no se pudo entrar a la funcion");
    return false;
});

var peticion = ( object ) => {
    $.ajax({
        data : object,
        type : "post",
        url : "ajax/correo.ajax.php",
        success : (response) => {

            if(response = "true"){

                swal({
                    type: "success",
                    title: "¡Mensaje enviado!",
                    text: 'En breve te responderemos a tu correo electronico',
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                })

                $("#nombre").val("");
                $("#email").val("");
                $("#mensaje").val("");
                    
            }
        }
    });
}