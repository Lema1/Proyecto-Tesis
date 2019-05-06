$("#nuevoCliente").submit(function(event){
    if (event.isDefaultPrevented()) {
        // handle the invalid form...
    } else {
        // everything looks good!
        event.preventDefault();
        submitForm();
    }
});

function submitForm(){
    $.ajax({
        type: "POST",
        url: "PHP/Formularios/nuevocliente.php",
        data: $("#nuevoCliente").serialize(),
        beforeSend: function () {
                $("#resultado").html("Procesando, espere por favor...");
        },
        success: function (response) {
            if(response=="true"){
                alert("Agregado");
                location.href="clientes.php";
            }
            else{
                alert("Datos incorrectos");
            }
        }
    });
    return false;
}
