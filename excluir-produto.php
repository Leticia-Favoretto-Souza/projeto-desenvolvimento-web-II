<?php
include 'conexao.php';

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT imagem FROM produtos WHERE id = ?");
$stmt->execute([$id]);
$produto = $stmt->fetch(PDO::FETCH_ASSOC);

// Exclui o arquivo PDF do servidor
if (file_exists('uploads/' . $produto['imagem'])) {
    unlink('uploads/' . $produto['imagem']);
}

$stmt = $conn->prepare("DELETE FROM produtos WHERE id = ?");
$stmt->execute([$id]);

header("Location: lista_produtos.php");
exit;
?>
