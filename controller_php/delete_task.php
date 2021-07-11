<?php session_start();
    $data = file_get_contents("php://input");
    require "conexion.php";

    $user = $_SESSION['user'];
    $statement = $pdo->prepare("DELETE FROM task WHERE ID_TASK = :id AND user = :user");
    $statement->execute(array(':id' => $data, ':user' => $user));
    echo "ok";
?>