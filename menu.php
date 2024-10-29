<!--Barra de Navegação com Bootstrap -->
<nav class="navbar navbar-expand-1g navbar-ligth bg-light">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
    <a class="navbar-brand" href="#">Sistema</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Página Inicial</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <span class="nav-link">Bem-vindo, <?php echo $_SESSION['nome_usuario']; ?></span>
        </li>
        <li class="nav-item">
          <a class="nav-link btn btn-outline-danger" href="logout.php">Sair</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Inclua Bootstrap -->
 <style>
    /* Estilos para a barra de navegação */
    .navbar {
        background-color: #fffaf0; /* Fundo bege suave */
    }

    .navbar-brand {
        color: #8B4513; /* Cor marrom para o título */
    }

    .navbar-brand:hover {
        color: #5a2e1c; /* Cor ao passar o mouse */
    }

    .nav-link {
        color: #8B4513; /* Cor marrom para os links */
    }

    .nav-link:hover {
        color: #5a2e1c; /* Cor ao passar o mouse nos links */
    }

    .nav-item .btn-outline-danger {
        border-color: #8B4513; /* Borda do botão sair */
        color: #8B4513; /* Cor do texto do botão sair */
    }

    .nav-item .btn-outline-danger:hover {
        background-color: #8B4513; /* Fundo do botão sair ao passar o mouse */
        color: #fff; /* Texto em branco ao passar o mouse */
    }
</style>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
