<?php session_start();

    require 'conexion.php';

    if(!$pdo){
        echo 'NO HAY CONEXION CON EL SERVIDOR';
    }

    function cleanData($datas){
        $datas = trim($datas);
        $datas = stripcslashes($datas);
        $datas = htmlspecialchars($datas);
        return $datas;
    }

    if(isset($_POST)){
        $user = cleanData($_POST['user']);

        if(!empty($user)){
            $statement = $pdo->prepare('SELECT * FROM user WHERE user = :u');
            $statement->execute(array(':u' => $user));
            $result = $statement->fetch();

            if($result != false){
                $_SESSION['user'] = $result['user'];
                echo 'ok';
            }else{
                echo 'Los datos ingresados son ivalidos';
            }
        }else{
            echo 'Todo los campos son requeridos';
        }

    }
?>