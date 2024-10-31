<?php
include 'conexao.php';

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM produtos WHERE id = ?");
$stmt->execute([$id]);
$produto = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $artista = $_POST['artista'];
    $ano = $_POST['ano'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $qtd = $_POST['qtd'];
    $imagem = $produto['imagem'];

    if (isset($_FILES['imagem']['name']) && $_FILES['imagem']['error'] == 0) {
        $arquivo_tmp = $_FILES['imagem']['tmp_name'];
        $nomeImagem = $_FILES['imagem']['name'];
        $extensao = strtolower(pathinfo($nomeImagem, PATHINFO_EXTENSION));

        if (strstr('.jpg;.jpeg;.gif;.png', $extensao)) {
            $novoNome = uniqid(time()) . '.' . $extensao;
            $destino = 'uploads/' . $novoNome;

            if (@move_uploaded_file($arquivo_tmp, $destino)) {
                if (file_exists($produto['imagem'])) {
                    unlink($produto['imagem']);
                }
                $imagem = $destino;
            } else {
                echo "<div class='alert alert-danger'>Erro ao salvar o novo arquivo de imagem.</div>";
                exit;
            }
        } else {
            echo "<div class='alert alert-danger'>Apenas arquivos '.jpg', '.jpeg', '.gif' e '.png' são permitidos.</div>";
            exit;
        }
    }

    $sql = "UPDATE produtos SET nome = ?, artista = ?, ano = ?, descricao = ?, preco = ?, quantidade = ?, imagem = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nome, $artista, $ano, $descricao, $preco, $qtd, $imagem, $id]);

    echo "<div class='alert alert-success'>Produto atualizado com sucesso!</div>";
    header('Location: lista_produtos.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto - Analog Echo Records</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Editar Produto</h2>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome:</label>
                                <input type="text" name="nome" id="nome" class="form-control" value="<?= htmlspecialchars($produto['nome']) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="artista" class="form-label">Artista:</label>
                                <input type="text" name="artista" id="artista" class="form-control" value="<?= htmlspecialchars($produto['artista']) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="ano" class="form-label">Ano:</label>
                                <input type="text" name="ano" id="ano" class="form-control" value="<?= htmlspecialchars($produto['ano']) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="descricao" class="form-label">Descrição:</label>
                                <textarea id="descricao" name="descricao" rows="4" cols="50" class="form-control" required><?= htmlspecialchars($produto['descricao']) ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="preco" class="form-label">Preço:</label>
                                <input type="number" name="preco" id="preco" step="0.01" class="form-control" value="<?= htmlspecialchars($produto['preco']) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="qtd" class="form-label">Quantidade:</label>
                                <input type="number" name="qtd" id="qtd" class="form-control" value="<?= htmlspecialchars($produto['quantidade']) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="imagem" class="form-label">Imagem do Produto (atual: <?= basename($produto['imagem']) ?>):</label>
                                <input type="file" name="imagem" id="imagem" class="form-control">
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Atualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
