<?php session_start();

require 'conexion.php';

if(!$pdo){
    echo  'ERROR DE CONEXION';
}


function cleanData($datas){
    $datas = trim($datas);
    $datas = stripcslashes($datas);
    $datas = htmlspecialchars($datas);
    return $datas;
}

if(isset($_POST)){
    $task = cleanData($_POST['task']);
    $user = $_SESSION['user'];

    if(empty($task)){
        echo 'Ingresa una tarea valida !';
    }else{
        
        $statement = $pdo->prepare("INSERT INTO task(ID_TASK,task,user) VALUES(null,:t,:u)");
        $statement->execute(array(':t' => $task, ':u' => $user));
   
        if($statement){
            echo 'publicado';
        }else{
            echo 'Hubo un error, intentelo de nuevo más tarde';
        }
   
    }

}
?>