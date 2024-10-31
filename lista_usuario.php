<?php
session_start();
include 'conexao.php';
include 'menu.php';

$usuarios = $conn->query("SELECT * FROM usuarios")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de usuarios - Analog Echo Records</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f5f2e7;
            color: #4a3623;
        }
        .container {
            max-width: 80%;
        }
        h1 {
            font-weight: bold;
            color: #4a3623;
        }
        .btn-success {
            background-color: #555;
            border-color: #555;
            color: #f5f2e7;
        }
        .btn-success:hover {
            background-color: #3c3c3c;
            border-color: #3c3c3c;
        }
        .btn-danger {
            background-color: #7a1f1f;
            border-color: #7a1f1f;
            color: #f5f2e7;
        }
        .btn-danger:hover {
            background-color: #992626;
            border-color: #992626;
        }
        .btn-warning {
            background-color: #777;
            border-color: #777;
            color: #f5f2e7;
        }
        .btn-warning:hover {
            background-color: #3c3c3c;
            border-color: #3c3c3c;
        }
    </style>
</head>
<body>
<div class="container mt-4">
    <h1 class="mb-4">Lista de Usuário</h1>
    <a href="cadastrar.php" class="btn btn-success mb-3">Cadastrar Usuário</a>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Nivel de acesso</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?= htmlspecialchars($usuario['nome']) ?></td>
                <td><?= htmlspecialchars($usuario['email']) ?></td>
                <td><?= htmlspecialchars($usuario['nivel_acesso']) ?></td>
                <td>
                    <?php if ($_SESSION['nivel_acesso'] == 'ADMINISTRADOR'): ?>
                        <a href="editar_usuario.php?id=<?= $usuario['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="excluir_usuario.php?id=<?= $usuario['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('A exclusão será permanente! Tem certeza disso?')">Excluir</a>
                    <?php else: ?>
                        <span class="text-muted">Sem permissão</span>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
