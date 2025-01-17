<?php
include 'conexao.php';

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM clientes WHERE id = ?");
$stmt->execute([$id]);
$cliente = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $arquivoNovo = $_FILES['arquivo_pdf'];

    if ($arquivoNovo['error'] === UPLOAD_ERR_OK) {
        $nomeArquivoNovo = uniqid() . '_' . $arquivoNovo['name'];
        move_uploaded_file($arquivoNovo['tmp_name'], 'uploads/' . $nomeArquivoNovo);

        // Remove o arquivo antigo
        if (file_exists('uploads/' . $cliente['arquivo_pdf'])) {
            unlink('uploads/' . $cliente['arquivo_pdf']);
        }

        $stmt = $conn->prepare("UPDATE clientes SET nome = ?, email = ?, arquivo_pdf = ? WHERE id = ?");
        $stmt->execute([$nome, $email, $nomeArquivoNovo, $id]);
    } else {
        $stmt = $conn->prepare("UPDATE clientes SET nome = ?, email = ? WHERE id = ?");
        $stmt->execute([$nome, $email, $id]);
    }

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="text-center">Editar Cliente</h1>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" value="<?= htmlspecialchars($cliente['nome']) ?>" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($cliente['email']) ?>" required>
            </div>

            <div class="form-group">
                <label for="arquivo_pdf">Arquivo PDF Assinado</label>
                <input type="file" class="form-control" name="arquivo_pdf" accept=".pdf">
            </div>

            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
</body>

</html>
