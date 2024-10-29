<?php
session_start();
include 'conexao.php'; // Conexão com banco de dados

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $artista = $_POST['artista'];
    $ano = $_POST['ano'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $qtd = $_POST['qtd'];

    // Verifica se a imagem foi enviada
    if (isset($_FILES['imagem']['name']) && $_FILES['imagem']['error'] == 0) {
        echo 'Você enviou o arquivo: <strong>' . $_FILES['imagem']['name'] . '</strong><br />';
        echo 'Este arquivo é do tipo: <strong>' . $_FILES['imagem']['type'] . '</strong><br />';
        echo 'Temporáriamente foi salvo em: <strong>' . $_FILES['imagem']['tmp_name'] . '</strong><br />';
        echo 'Seu tamanho é: <strong>' . $_FILES['imagem']['size'] . '</strong> Bytes<br /><br />';

        $arquivo_tmp = $_FILES['imagem']['tmp_name'];
        $nomeImagem = $_FILES['imagem']['name'];

        // Pega a extensão
        $extensao = pathinfo($nomeImagem, PATHINFO_EXTENSION);
        $extensao = strtolower($extensao);

        // Permite apenas certos tipos de imagem
        if (strstr('.jpg;.jpeg;.gif;.png', $extensao)) {
            // Cria um nome único para a imagem
            $novoNome = uniqid(time()) . '.' . $extensao;

            // Define o destino
            $destino = 'uploads/' . $novoNome;

            // Tenta mover o arquivo para o destino
            if (@move_uploaded_file($arquivo_tmp, $destino)) {
                echo 'Arquivo salvo com sucesso em: <strong>' . $destino . '</strong><br />';
                $imagem = $destino;
            } else {
                echo "<div class='alert alert-danger'>Erro ao salvar o arquivo. Aparentemente, você não tem permissão de escrita.</div>";
                exit;
            }
        } else {
            echo "<div class='alert alert-danger'>Você poderá enviar apenas arquivos '*.jpg; *.jpeg; *.gif; *.png'</div>";
            exit;
        }
    } else {
        echo "<div class='alert alert-danger'>Por favor, selecione uma imagem válida para o produto.</div>";
        exit;
    }

    // Insere o produto no banco de dados
    $sql = "INSERT INTO produtos (nome, artista, ano, descricao, preco, quantidade, imagem) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nome, $artista, $ano, $descricao, $preco, $qtd, $imagem]);

    echo "<div class='alert alert-success'>Produto registrado com sucesso!</div>";
    header('Location: lista_produtos.php'); // Redireciona para a lista de produtos
}
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário - Analog Echo Records</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Cadastro de Produto</h2>
                        <form action="cadastro_produto.php" method="post" enctype="multipart/form-data" class="mb-3"> 
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome:</label>
                                <input type="text" name="nome" id="nome" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="artista" class="form-label">Artista:</label>
                                <input type="text" name="artista" id="artista" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="ano" class="form-label">Ano:</label>
                                <input type="text" name="ano" id="ano" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="descricao" class="form-label">Descricao:</label>
                                <textarea id="descricao" name="descricao" rows="4" cols="50" class="form-control" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="preco" class="form-label">Preço:</label>
                                <input type="number" name="preco" id="preco" step="0.01" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="qtd" class="form-label">Quantidade:</label>
                                <input type="number" name="qtd" id="qtd" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="imagem" class="form-label">Imagem do Produto:</label>
                                <input type="file" name="imagem" id="imagem" class="form-control" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Registrar</button>
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
