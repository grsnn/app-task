//Mostrar tareas en el index
let taskS = document.getElementById('taskS');

const showTask = (search) => {

    fetch("controller_php/show_task.php", {
        method: "POST",
        body: search
    }).then(response => response.text()).then(response => {
        taskS.innerHTML = response;

        //borrar post
        const btnDelete = document.querySelectorAll('.btnDelete');
        btnDelete.forEach((btn) => {
            btn.addEventListener('click', e => {
                e.preventDefault();
                deleteTask(e.target.dataset.id);
            });
        });

    });

}

showTask();

//funcion eliminar post
const deleteTask = (id) => {
    Swal.fire({
        title: 'Esta seguro de eliminar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'NO'
    }).then((result) => {
        if (result.isConfirmed) {
            fetch("controller_php/delete_task.php", {
                method: "POST",
                body: id
            }).then(response => response.text()).then(response => {
                if (response == "ok") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Eliminado',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    showTask();
                }

            });

        }
    });
}

//BORRAR TODAS LAS TAREAS
const deleteAll = document.getElementById('deleteAll');

deleteAll.addEventListener('click', e => {
    fetch("controller_php/delete_all.php", {
        method: "POST"
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
                title: 'Eliminando...'
            })

            setTimeout(() => {
                showTask();
            }, 3000);

        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: response
            });
            showTask();
        }
    });
});

//Guardar tarea
const taskSave = document.getElementById('taskSave');

taskSave.addEventListener('submit', e => {
    e.preventDefault();

    fetch("controller_php/save_post.php", {
        method: "POST",
        body: new FormData(taskSave)
    }).then(response => response.text()).then(response => {
        if (response == 'publicado') {
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
                title: 'Guardando tarea...'
            })

            setTimeout(() => {
                showTask();
                taskSave.reset();
            }, 3000);

        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: response
            });
            showTask();
        }
    });
});