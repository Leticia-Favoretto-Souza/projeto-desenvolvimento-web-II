<?php
include 'conexao.php';

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM usuarios WHERE id = ?");
$stmt->execute([$id]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $nivel_acesso = $_POST['nivel_acesso'];

    $stmt = $conn->prepare("UPDATE usuarios SET nome = ?, email = ?, nivel_acesso = ? WHERE id = ?");
    $stmt->execute([$nome, $email, $nivel_acesso, $id]);

    header('Location: lista_usuario.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="text-center">Editar Usuário</h1>
        <form method="POST">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" value="<?= htmlspecialchars($usuario['nome']) ?>" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($usuario['email']) ?>" required>
            </div>

            <div class="form-group">
                <label for="nivel_acesso">Nível de Acesso</label>
                <select class="form-control" name="nivel_acesso" required>
                    <option value="ADMINISTRADOR" <?= $usuario['nivel_acesso'] == 'ADMINISTRADOR' ? 'selected' : '' ?>>Administrador</option>
                    <option value="COMUM" <?= $usuario['nivel_acesso'] == 'COMUM' ? 'selected' : '' ?>>Comum</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
</body>

</html>
