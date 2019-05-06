$("#bntAgregarVehiculo").submit(function(event){
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
        url: "PHP/Formularios/nuevo-vehiculo.php",
        data: $("#nuevo-vehiculoForm").serialize(),
        beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                    if(response == 'true'){
                     $("#resultado").html(response);
                     location.href="vehiculo.html";
                    }
                    else{
                        alert("Datos incorrectos");
                        location.href="vehiculo.php";
                    }
                }
    });
    return false;
}