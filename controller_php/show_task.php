<?php session_start();

require 'conexion.php';

    $user = $_SESSION['user'];

    $statement = $pdo->prepare("SELECT * FROM task WHERE user = :u ORDER BY ID_TASK DESC");
    $statement->execute(array(':u' => $user));
    $result = $statement->fetchAll();

        foreach ($result as $datas) {
            if($datas['user'] === $user){
            echo '  <li class="list__item">
                        <p class="list__item--text">'.$datas['task'].'</p>
                        <button class="list__item--btn btnDelete" data-id="'.$datas['ID_TASK'].'">
                            <i class="fas fa-trash" data-id="'.$datas['ID_TASK'].'"></i>
                        </button>
                    </li>';   
            }
        }

?>