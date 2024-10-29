<?php
session_start();
include 'conexao.php';
include 'menu.php';

$produtos = $conn->query("SELECT * FROM produtos")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de produtos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="mt-4">Lista de produtos</h1>
    <a href="cadastro_produto.php" class="btn btn-success mb-3">Cadastrar produto</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Artista</th>
                <th>Ano</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Capa</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produtos as $produto): ?>
            <tr>
                <td><?= htmlspecialchars($produto['nome']) ?></td>
                <td><?= htmlspecialchars($produto['artista']) ?></td>
                <td><?= htmlspecialchars($produto['ano']) ?></td>
                <td><?= htmlspecialchars($produto['descricao']) ?></td>
                <td><?= htmlspecialchars($produto['preco']) ?></td>
                <td><?= htmlspecialchars($produto['quantidade']) ?></td>
                <td><a href="<?= htmlspecialchars($produto['imagem']) ?>" target="_blank">Ver capa</a></td>
                <td>
                    <?php if ($_SESSION['nivel_acesso'] == 'ADMINISTRADOR'): ?>
                        <a href="editar.php?id=<?= $produto['id'] ?>" class="btn btn-warning">Editar</a>
                        <a href="excluir.php?id=<?= $produto['id'] ?>" class="btn btn-danger" onclick="return confirm('A exclusão será permanente! Tem certeza disso?')">Excluir</a>
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
