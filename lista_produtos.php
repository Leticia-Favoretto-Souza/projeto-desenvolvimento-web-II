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
    <title>Lista de produtos - Analog Echo Records</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f5f2e7;
            color: #4a3623;
        }
        .container {
            max-width: 80%; /* Aumenta a largura da tabela */
        }
        h1 {
            font-weight: bold;
            color: #4a3623;
        }
        /* Botão de sucesso em tom preto */
        .btn-success {
            background-color: #555;
            border-color: #555;
            color: #f5f2e7;
        }
        .btn-success:hover {
            background-color: #3c3c3c;
            border-color: #3c3c3c;
        }

        /* Botão de aviso em tom de vermelho escuro */
        .btn-danger {
            background-color: #7a1f1f;
            border-color: #7a1f1f;
            color: #f5f2e7;
        }
        .btn-danger:hover {
            background-color: #992626;
            border-color: #992626;
        }

        /* Botão de perigo em tom de vermelho intenso */
        .btn-warning {
            background-color: #777;
            border-color: #777;
            color: #f5f2e7;
        }
        .btn-warning:hover {
            background-color: #3c3c3c;
            border-color: #3c3c3c;
        }

        /* Ajuste da largura das colunas */
        .descricao-col {
            width: 25%;
        }
        .acoes-col {
            width: 15%;
        }
    </style>
</head>
<body>
<div class="container mt-4">
    <h1 class="mb-4">Lista de produtos</h1>
    
    <?php if ($_SESSION['nivel_acesso'] == 'ADMINISTRADOR'): ?>
        <a href="cadastro_produto.php" class="btn btn-success mb-3">Cadastrar produto</a>
    <?php endif; ?>
    
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Nome</th>
                <th>Artista</th>
                <th>Ano</th>
                <th class="descricao-col">Descrição</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Capa</th>
                <th class="acoes-col">Ações</th>
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
                        <a href="editar_produto.php?id=<?= $produto['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="excluir-produto.php?id=<?= $produto['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('A exclusão será permanente! Tem certeza disso?')">Excluir</a>
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
