<?php

    $host = "localhost";
    $dbname = "sistema_clientes";
    $userName = "root";
    $password = "leti97*SP";

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $userName, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Erro na conecção: " . $e->getMessage());
    }   

?>