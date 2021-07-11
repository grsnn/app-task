<?php session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#7c2fe8">

    <title>APP TAREAS</title>

    <link rel="shortcut icon" href="assets/image/logo.ico">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
<?php if(!isset($_SESSION['user'])):?>
    <!-- ingresar -->
    <div class="container__signin" id="signIn">
        <div class="card">
            <span class="btn__close" id="close"><i class="fas fa-times"></i></span>
            <h2 class="card__title">INGRESA A TU CUENTA</h2>
            <form class="form" id="formSignin">
                <div class="form__group">
                    <input type="text" class="form__input" placeholder="Usuario" id="user" name="user">
                </div>
                <button type="submit" class="form__btn"><i class="fas fa-arrow-right"></i></button>
            </form>
            <a href="#" class="card__link" id="registerBtn">¿ No tienes nombre de usuario ?</a>
        </div>
    </div>

    <!-- registrate -->
    <div class="container__signup" id="signUp">
        <div class="card">
            <span class="btn__close" id="close"><i class="fas fa-times"></i></span>
            <h2 class="card__title">CREA UNA CUENTA</h2>
            <form class="form" id="formRegister">
                <div class="form__group">
                    <input type="text" class="form__input" placeholder="Usuario" name="user" id="user">
                </div>
                <button type="submit" class="form__btn"><i class="fas fa-arrow-right"></i></button>
            </form>
            <a href="#" class="card__link" id="loginBtn">¿ Ya tienes tu nombre de usuario ?</a>
        </div>
    </div>
<?php endif; ?>

    <div class="container">
        <header class="header">
            <?php if(!isset($_SESSION['user'])){?>

                <button type="button" class="footer__btn header__btn" id="loginBtn"><i class="fas fa-sign-in-alt"></i> INGRESAR</button>

            <?php } else { ?>

                <a href="controller_php/logout.php" class="footer__btn header__btn">
                    <i class="fas fa-times"></i> CERRAR SESION
                </a>

            <?php }?>
            
        </header>
        <div class="card">
            <h1 class="card__title">MIS TAREAS</h1>
            <?php if(isset($_SESSION['user'])): ?>
            <form class="form" id="taskSave">
                <div class="form__group">
                    <input type="text" class="form__input" placeholder="Ingresa una Tarea" id="task" name="task">
                </div>
                <button type="submit" class="form__btn"><i class="fas fa-plus"></i></button>
            </form>
            <?php endif; ?>
            <ul class="list" id="taskS">
                <?php if(!isset($_SESSION['user'])):?>
                    <li class="list__item">
                        <p class="list__item--text">Ingresa para guardar tus tareas</p>
                    </li>
                <?php endif; ?>

            </ul>
            <?php if(isset($_SESSION['user'])):?>
            <div class="footer">
                <button type="button" class="footer__btn" id="deleteAll"><i class="fas fa-trash"></i>  BORRAR TODO</button>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php if(!isset($_SESSION['user'])){ ?>
    <script src="assets/js/script.js"></script>
    <script src="controller_js/form.js"></script>
    <?php }else {?>
    <script src="controller_js/task.js"></script>
    <?php }?>
</body>

</html>