<?php
    $server = "mysql:dbname=apptasks;host=localhost";
    $user = "root";
    $pass = "";

    try {
        $pdo = new PDO($server, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    } catch (PDOException $th) {
        echo "ERROR DE CONEXION" .$th->getMessage();
    }
?>