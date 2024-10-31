<?php
include 'conexao.php';

$clientes = $conn->query("SELECT * FROM clientes")->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Shop - Página Inicial</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('logos/imagem-fundo.webp'); /* Adicione o caminho da sua imagem aqui */
            background-size: cover; /* Faz com que a imagem cubra toda a área */
            background-position: center; /* Centraliza a imagem */
            background-repeat: no-repeat; /* Não repete a imagem */
            background-attachment: fixed; /* Mantém a imagem fixa na tela */

        }
        h2{
            color: #fcfcfc
        }
        .logo-clientes img {
            width: 150px;
            margin: 30px;
        }
        .menu-acesso {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
        }
        .descritivo {
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 5px;
            margin-top: 20px;
        }
        .header-custom {
            background-color: #f5f5dc; /* Cor de fundo bege clara */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2); /* Sombra suave */
            margin-bottom: 30px;
        }
        .header-title {
            font-size: 2rem; /* Ajuste do tamanho do título */
            color: #8B4513; /* Cor marrom suave para o título */
            font-family: 'Georgia', serif; /* Fonte mais clássica e sofisticada */
            text-transform: none; /* Mantém as letras normais, sem caixa alta */
            letter-spacing: 1px; /* Espaçamento mais suave entre letras */
        }
        .descritivo-paragrafo {
            font-family: 'Georgia', serif; /* Mesma fonte elegante e clássica do header */
            font-size: 1.2rem; /* Tamanho um pouco maior para fácil leitura */
            color: #8B4513; /* Mesma cor marrom suave usada no header */
            padding: 15px;
            border-radius: 8px;
            line-height: 1.6; /* Espaçamento entre as linhas para melhor legibilidade */
            margin-top: 20px;
        }

    /* Centraliza e ajusta o espaçamento do container de descritivo */
    .descritivo {
        padding: 30px;
        background-color: #fffaf0; /* Fundo bege claro no container geral */
        border-radius: 10px;
    }
    </style>
    <script>
        function mostrarDataHora() {
            const dataHora = new Date();
            document.getElementById('data-hora').textContent = dataHora.toLocaleString();
        }
        setInterval(mostrarDataHora, 1000);
    </script>
</head>
<body>

<div class="container">
    <div class="menu-acesso">
        <div>
            <span id="data-hora" class="text-white font-weight-bold"></span> 
        </div>
        <div>
            <a href="login.php" class="btn btn-success">Fazer login</a>
            <a href="cadastro_usuario.php" class="btn btn-warning">Criar conta</a>
        </div>
    </div>


    <header class="mt-4 d-flex justify-content-center align-items-center header-custom">
    <img src="logos/AnalogEchoRecords.webp" alt="Analog Echo Records Logo" style="width: 150px; margin-right: 20px;">
    <h1>Bem-vindo à Analog Echo Records</h1>
    </header>



    <div class="descritivo text-center">
        <p class="descritivo-paragrafo">
            A Analog Echo Records é uma gravadora especializada em discos de vinil, 
            trazendo o melhor da música em formato físico para colecionadores e amantes da boa música. 
            Nosso catálogo conta com artistas consagrados e edições limitadas de álbuns clássicos e contemporâneos. 
            Explore nossa loja, descubra lançamentos exclusivos e participe de pré-vendas para garantir sua cópia.
        </p>
        <p class="descritivo-paragrafo">
            Se você é apaixonado pelo som analógico autêntico, está no lugar certo!
        </p>
    </div>


    <section class="logo-clientes text-center mt-5">
        <h2>Clientes Parceiros</h2>
        <div class="d-flex justify-content-around flex-wrap">
            <img src="logos/loja2.jpg" alt="Cliente 2">
            <img src="logos/loja3.webp" alt="Cliente 3">
            <img src="logos/loja4.png" alt="Cliente 4">
            <img src="logos/loja5.png" alt="Cliente 5">
            <img src="logos/loja6.webp" alt="Cliente 6">
            <img src="logos/loja1.png" alt="Cliente 1">
        </div>
    </section>

</div>

</body>
</html>
