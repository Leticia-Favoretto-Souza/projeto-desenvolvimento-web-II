<?php
session_start();

//Verifica se o usuário esta logado
if(!isset($_SESSION['usuario_nome'])){
    header('Location: login.php');
    exit;
}

?>