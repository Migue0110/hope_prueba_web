const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
    container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
    container.classList.remove("right-panel-active");
});

$(function () {
    /**
     * Funcion para registrar un usuario
     * @param {type} e
     */
    $(document).on('submit', '#formulario-registro', function (e) {
        e.preventDefault();
        $.ajax({
            url: RUTA_PUBLICA + 'usuarios/registrar',
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function (data) {
                if (data.resp == 1) {
                    Swal.fire({
                        icon: "success",
                        title: "Correcto",
                        html: data.msg,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.reload();
                        }
                    });
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        html: data.msg,
                    });
                }
            }
        })
    })
    /**
     * Funcion para loguear un usuario
     * @param {type} e
     */
    $(document).on('submit', '#formulario-login', function (e) {
        e.preventDefault();
        $.ajax({
            url: RUTA_PUBLICA + 'login/iniciar_sesion',
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function (data) {
                if (data.resp == 1) {
                    location.replace(data.url);
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        html: data.msg,
                    });
                }
            }
        })
    })
})