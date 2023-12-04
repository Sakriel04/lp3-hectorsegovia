
$('#formLogin').submit(function (e) {
    e.preventDefault();
    var usuario = $.trim($("#usuario").val());
    var password = $.trim($("#password").val());

    if (usuario == "" || password == "") {
        $.notify("Ingrese datos válidos", "error");
        return false;
    } else {
        $.ajax({
            url: "validate.php",
            type: "post",
            datatype: "json",
            data: { usuario: usuario, password: password },
            success: function (data) {
                console.log(data);
                if (data == 'null') {
                    $.notify("Usuario y/o Contraseña incorrectos", "error");
                    return false;
                } else {
                    $.notify("Conexión exitosa", "success");
                    setTimeout(
                        function () {
                            window.location.href = '/ExamenFinal_LP3/';
                        }, 800);
                }
            }
        });
    }
});