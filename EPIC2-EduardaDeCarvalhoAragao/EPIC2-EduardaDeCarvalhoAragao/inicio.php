<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Blog Nutrição Fitness</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Alegreya:wght@500;700&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Alegreya', serif;
      background: url('img/alimentacao-fit.png') no-repeat center center fixed;
      background-size: cover;
      margin: 0;
      padding-top: 80px;
      min-height: 100vh;
      color: white;
    }

    .menu {
      background: linear-gradient(90deg, #021b79, #0575e6);
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 999;
      box-shadow: 0 4px 8px rgba(0,0,0,0.2);
      padding: 0 20px;
    }

    .menu .nav-link, .menu .button {
      color: #fff !important;
      text-transform: uppercase;
      margin: 0 10px;
      font-weight: 500;
      transition: 0.3s;
    }

    .menu .nav-link:hover, .menu .button:hover {
      color: #cfe8ff !important;
    }

    .logo {
      font-size: 28px;
      font-weight: bold;
      color: #ffffff;
    }

    .button {
      background-color: #0d6efd;
      border: none;
      padding: 10px 15px;
      border-radius: 5px;
    }

    .main-content {
      max-width: 960px;
      margin: 100px auto;
      background-color: rgba(0, 0, 0, 0.6);
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 0 20px rgba(0,0,0,0.3);
    }

    .main-content h1 {
      font-size: 48px;
      font-weight: bold;
      text-shadow: 2px 2px 15px black;
      text-align: center;
    }

    .main-content p {
      font-size: 18px;
      margin-top: 20px;
      text-align: justify;
    }

    .support-button {
      position: fixed;
      bottom: 20px;
      right: 20px;
      background-color: #0d6efd;
      border: none;
      border-radius: 50%;
      width: 60px;
      height: 60px;
      display: flex;
      justify-content: center;
      align-items: center;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .support-button:hover {
      background-color: #084298;
    }

    .support-button img {
      width: 35px;
      height: 35px;
    }
    footer {
      padding: 20px 0;
      text-align: center;
      margin-top: 30px;
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg menu">
    <a class="navbar-brand logo" href="#">Nutrição Fitness</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="#">Início</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Cadastro.php">Receitas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Entrar.php">Dúvidas frequentes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link button" href="Cadastro.php">Cadastrar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link button" href="Entrar.php">Entrar</a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Conteúdo principal -->
  <div class="container main-content">
    <h1>Nutrição Fitness</h1>
    <p>
      Afinal, o termo "fitness" é uma palavra inglesa que significa "estar em boa forma física".
      Opte por alimentos em sua forma mais natural, como frutas, legumes, verduras, grãos integrais 
      e proteínas magras. Esses alimentos fornecem os nutrientes essenciais para o bom funcionamento
      do organismo. O objetivo da nutrição fitness é desconstruir a noção de que refeições saudáveis 
      são sem graça, resultando em um planejamento alimentar saboroso e nutritivo.
    </p>
  </div>
<!-- Footer -->
<footer>
    <div class="container">
      <p>&copy; 2025 Nutrição Fitness. Todos os direitos reservados.</p>
    </div>
  </footer>
  

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
