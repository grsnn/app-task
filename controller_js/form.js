const formRegister = document.getElementById('formRegister');

formRegister.addEventListener('submit', e => {
    e.preventDefault();

    let error = '';
    let user = /^[a-zA-Z0-9\_\-]{4,16}$/;

    if (formRegister['user'].value == '') {
        error = 'Complete el campo usuario';
    } else if (!user.test(formRegister['user'].value)) {
        error = 'Ingrese un usario valido Letras, numeros, guión y guión bajo'
    }

    if (error != '') {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: error
        });
    } else {
        fetch("controller_php/sign_up.php", {
            method: "POST",
            body: new FormData(formRegister)
        }).then(response => response.text()).then(response => {
            if (response == 'ok') {

                //alerta sweetalert
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'success',
                    title: 'Creando usuario, Espere..'
                })
                setTimeout(() => {
                    location.href = "index.php";
                    formRegister.reset();
                }, 3000);

            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: response
                });
            }
        });
    }

});

const formSignin = document.getElementById('formSignin');

formSignin.addEventListener('submit', e => {
    e.preventDefault();

    let error = '';
    let user = /^[a-zA-Z0-9\_\-]{4,16}$/;

    if (formSignin['user'].value == '') {
        error = 'Complete el campo usuario';
    } else if (!user.test(formSignin['user'].value)) {
        error = 'Ingrese un usario valido';
    }

    if (error != '') {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: error
        });
    } else {
        fetch("controller_php/sign_in.php", {
            method: "POST",
            body: new FormData(formSignin)
        }).then(response => response.text()).then(response => {
            if (response == 'ok') {
                //alerta sweetalert
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'success',
                    title: 'Ingresando...'
                })

                setTimeout(() => {
                    location.href = "index.php";
                    formSignin.reset();
                }, 3000);

            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: response
                });
            }
        });
    }

});