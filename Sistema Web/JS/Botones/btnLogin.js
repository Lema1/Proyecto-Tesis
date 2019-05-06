$("#loginForm").submit(function(event){
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
        url: "PHP/Formularios/login.php",
        data: $("#loginForm").serialize(),
        beforeSend: function () {
                $("#resultado").html("Procesando, espere por favor...");
        },
        success: function (response) {
            if(response=="true"){
                $("#resultado").html(response);
                alert("Redireccionando");
                location.href="taller.php";
            }
            else{
                alert("Datos incorrectos");
                
            }
        }
    });
    return false;
}
