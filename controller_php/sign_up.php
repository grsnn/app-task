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
            $statement = $pdo->prepare('SELECT * FROM user WHERE user = :user LIMIT 1');
            $statement->execute(array(':user' => $user));
            $result = $statement->fetch();

            if($result != false){
                echo 'El nombre ingresado ya se encuentra registrado!';
            }else{
                $statement = $pdo->prepare('INSERT INTO user(ID_USER,user) VALUES(null,:u)');
                $statement->execute(array(':u' => $user));

                if($statement){
                    $_SESSION['user'] = $user;
                    echo 'ok';
                }else{
                    echo 'A OCURRIDO UN ERROR';
                }
            }
        }else{
            echo 'Todos los campos son requeridos';
        }

    }


;?>