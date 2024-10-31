<?php
include 'conexao.php';

$id = $_GET['id'];

// Preparar e executar a consulta DELETE
$stmt = $conn->prepare("DELETE FROM usuarios WHERE id = ?");
$stmt->execute([$id]);

header("Location: lista_usuario.php");
exit;
?>
