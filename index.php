<?php
include 'conexao.php';

$clientes = $conn->query("SELECT * FROM clientes")->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de clientes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
        <h1 class="mt-4">Sistema Shop</h1>
        <?php
            echo '<h2>Bem-vindo, visitante!</h2><br><br>';
            echo '<a href="login.php" class="btn btn-success mb-3">Fazer login</a> ou <a href="cadastro_usuario.php" class="btn btn-warning mb-3">Criar conta</a>';
        ?>
    </div>
</body>
</html>