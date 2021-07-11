<?php session_start();
    require "conexion.php";

    $user = $_SESSION['user'];
    $statement = $pdo->prepare("DELETE FROM task WHERE user = :user");
    $statement->execute(array(':user' => $user));
    echo "ok";
?>