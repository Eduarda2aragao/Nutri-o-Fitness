<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dúvidas Frequentes - Nutrição Fitness</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Alegreya:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

  <style>
    body {
      background-image: url('img/Design sem nome (4).png');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      font-family: 'Alegreya', serif;
      color: #333;
    }
  

    .navbar {
      background: linear-gradient(45deg, rgb(3, 11, 46), rgb(0, 69, 196), rgb(3, 17, 46));
    }

    .navbar-brand,
    .nav-link {
      color: #fff !important;
      text-transform: uppercase;
      font-weight: bold;
    }

    .nav-link:hover {
      background-color: rgba(104, 101, 101, 0.5);
      border-radius: 20px;
    }

    .container-box {
      max-width: 900px;
      background: rgba(255, 255, 255, 0.95);
      border-radius: 15px;
      padding: 30px;
      margin: 30px auto;
      box-shadow: 0 0 20px rgba(0,0,0,0.15);
      animation: fadeIn 1s ease-in-out;
    }

    .container-box h3 {
      text-align: center;
      margin-bottom: 25px;
      font-weight: bold;
    }

    .container-box li {
      margin-bottom: 15px;
      font-size: 18px;
    }

    .container-box a {
      color: #0047ab;
      text-decoration: none;
    }

    .container-box a:hover {
      text-decoration: underline;
    }

    .satisfaction-box {
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 20px;
    }

    .satisfaction-meter {
      width: 100%;
      max-width: 500px;
      margin: 15px 0;
    }

    meter {
      width: 100%;
      height: 30px;
      border-radius: 10px;
    }

    meter::-webkit-meter-bar {
      background: #eee;
      border-radius: 10px;
      box-shadow: 0 2px 3px rgba(0,0,0,0.2) inset;
    }

    meter::-webkit-meter-optimum-value {
      background: linear-gradient(to right, #4CAF50, #8BC34A);
      border-radius: 10px;
    }

    meter::-webkit-meter-suboptimum-value {
      background: linear-gradient(to right, #FFC107, #FF9800);
      border-radius: 10px;
    }

    meter::-webkit-meter-even-less-good-value {
      background: linear-gradient(to right, #F44336, #E91E63);
      border-radius: 10px;
    }

    /* Estilos para o formulário de avaliação */
    .rating-form {
      width: 100%;
      max-width: 500px;
      margin: 0 auto;
    }
    
    .rating-scale {
      display: flex;
      justify-content: space-between;
      margin: 10px 0;
    }
    
    .rating-option {
      text-align: center;
      cursor: pointer;
    }
    
    .rating-option input {
      display: none;
    }
    
    .rating-option label {
      display: block;
      padding: 8px 12px;
      border-radius: 20px;
      background: #f0f0f0;
      transition: all 0.3s ease;
    }
    
    .rating-option input:checked + label {
      background: #0047ab;
      color: white;
    }
    
    .rating-option:hover label {
      background: #ddd;
    }
    
    .rating-text {
      text-align: center;
      margin-top: 15px;
      font-weight: bold;
      font-size: 1.1em;
    }
    
    .bad {
      color: #dc3545;
    }
    
    .regular {
      color: #ffc107;
    }
    
    .good {
      color: #28a745;
    }

    .support-button {
      position: fixed;
      bottom: 20px;
      right: 20px;
      background-color: rgb(37, 63, 211);
      border: none;
      border-radius: 50%;
      width: 60px;
      height: 60px;
      display: flex;
      justify-content: center;
      align-items: center;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
      cursor: pointer;
      z-index: 10;
      transition: background-color 0.3s ease;
    }

    .support-button:hover {
      background-color: rgb(18, 61, 140);
    }

    .support-button img {
      width: 32px;
    }

    body {
      font-family: 'Alegreya', serif;
      background: linear-gradient(to right, rgba(0,124,240,0.85), rgba(0,223,216,0.85)), 
                  url('https://images.unsplash.com/photo-1554284126-aa88f22d8b74') no-repeat center center fixed;
      background-size: cover;
      margin: 0;
      color: #222;
    }

    footer {
      background-color: #0047ab;
      color: white;
      padding: 20px;
      text-align: center;
      margin-top: 30px;
    }

    footer a {
      color: white;
      margin-left: 10px;
    }

    footer a:hover {
      color: #00dfd8;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
     /*dr*/
  .dropdown-menu {
  font-size: 0.95rem;
  min-width: 180px;
  border-radius: 10px;
}

.dropdown-item:hover {
  background-color: rgba(0, 123, 255, 0.1);
}
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" href="#">Nutrição Fitness</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Alternar navegação">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="inicio.php">Início</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="receitas.php">Receitas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="duvidasfrequentes.php">Dúvidas</a>
        </li>

        <!-- Dropdown Perfil -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="MeuPerfil.php" id="perfilDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Meu Perfil
          </a>
          <ul class="dropdown-menu dropdown-menu-end shadow-sm rounded-3" aria-labelledby="perfilDropdown">
            <li>
              <a class="dropdown-item" href="MeuPerfil.php">
                <i class="bi bi-person-circle me-2"></i>Ver Perfil
              </a>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <a class="dropdown-item text-danger" href="index.php">
                <i class="bi bi-box-arrow-right me-2"></i>Sair
              </a>
            </li>
          </ul>
        </li>

      </ul>
    </div>
  </div>
</nav>

  <!-- Conteúdo -->
  <div class="container-box">
    <h3>DÚVIDAS FREQUENTES</h3>
    <ul class="list-unstyled">
      <li><i class="bi bi-info-circle-fill text-primary me-2"></i>
        <a href="https://www.instagram.com/cloverdetox?igsh=MXRqbHZsejcwNzR4Yg==" data-bs-toggle="tooltip" title="Perfil com dicas de alimentação fitness">Onde encontro informações sobre alimentação fitness?</a>
      </li>
      <li><i class="bi bi-heart-pulse-fill text-danger me-2"></i>
        <a href="https://portal.pucrs.br/noticias/saude/5-dicas-para-cuidar-da-saude-mental-e-emocional-o-ano-todo/" data-bs-toggle="tooltip" title="Artigo da PUCRS">Como está a relação entre seu corpo e mente?</a>
      </li>
      <li><i class="bi bi-cup-straw text-info me-2"></i>
        <a href="https://gauchazh.clicrbs.com.br/donna/noticia/2012/08/nutricionista-responde-a-10-perguntas-sobre-dietas-e-habitos-alimentares-cjplluv9701c326cn68z5hy1i.html">Beber água ajuda a emagrecer?</a>
      </li>
      <li><i class="bi bi-egg-fried text-warning me-2"></i>
        <a href="https://viverbem.unimedbh.com.br/qualidade-de-vida/prato-saudavel/">Como montar um prato saudável?</a>
      </li>
      <li><i class="bi bi-person-check-fill text-success me-2"></i>
        <a href="https://wa.me/5599999999999">Preciso me cadastrar para acessar os conteúdos exclusivos?</a>
      </li>
      <li><i class="bi bi-chat-dots-fill text-secondary me-2"></i>
        <a href="https://wa.me/5599999999999">Como contribuir com o blog?</a>
      </li>
    </ul>
  </div>

  <!-- Avaliação de Satisfação -->
  <div class="container-box">
    <h3>AVALIAÇÃO DE SATISFAÇÃO</h3>
    <form class="rating-form" action="processa_avaliacao.php" method="POST">
      <div class="mb-3">
        <label for="nome" class="form-label">Seu nome (opcional):</label>
        <input type="text" class="form-control" id="nome" name="nome">
      </div>
      
      <div class="mb-4">
        <label class="form-label">Como você avalia sua experiência em nosso site?</label>
        <div class="rating-scale">
          <div class="rating-option">
            <input type="radio" id="rating-1" name="rating" value="1" onchange="updateRatingText(1)">
            <label for="rating-1">1</label>
            <div>Ruim</div>
          </div>
          <div class="rating-option">
            <input type="radio" id="rating-2" name="rating" value="2" onchange="updateRatingText(2)">
            <label for="rating-2">2</label>
            <div>Regular</div>
          </div>
          <div class="rating-option">
            <input type="radio" id="rating-3" name="rating" value="3" onchange="updateRatingText(3)" checked>
            <label for="rating-3">3</label>
            <div>Bom</div>
          </div>
          <div class="rating-option">
            <input type="radio" id="rating-4" name="rating" value="4" onchange="updateRatingText(4)">
            <label for="rating-4">4</label>
            <div>Ótimo</div>
          </div>
          <div class="rating-option">
            <input type="radio" id="rating-5" name="rating" value="5" onchange="updateRatingText(5)">
            <label for="rating-5">5</label>
            <div>Excelente</div>
          </div>
        </div>
        <div id="rating-feedback" class="rating-text good">Sua avaliação: Bom</div>
      </div>
      
      <div class="mb-3">
        <label for="comentario" class="form-label">Deixe seu comentário (opcional):</label>
        <textarea class="form-control" id="comentario" name="comentario" rows="3"></textarea>
      </div>
      
      <div class="text-center">
        <button type="submit" class="btn btn-primary">Enviar Avaliação</button>
      </div>
    </form>
  </div>

  <!-- Suporte -->
  <a class="support-button" href="https://wa.me/5599999999999" target="_blank" title="Fale conosco no WhatsApp">
    <img src="https://cdn-icons-png.flaticon.com/512/733/733585.png" alt="WhatsApp">
  </a>

  <!-- Footer -->
  <footer>
    Siga-nos nas redes:
    <a href="https://www.instagram.com/"><i class="bi bi-instagram"></i></a>
    <a href="#"><i class="bi bi-facebook"></i></a>
    <a href="#"><i class="bi bi-youtube"></i></a>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  
  <!-- Script para atualizar o texto da avaliação -->
  <script>
    function updateRatingText(rating) {
      const ratingText = document.getElementById('rating-feedback');
      
      switch(rating) {
        case 1:
          ratingText.textContent = 'Sua avaliação: Ruim';
          ratingText.className = 'rating-text bad';
          break;
        case 2:
          ratingText.textContent = 'Sua avaliação: Regular';
          ratingText.className = 'rating-text regular';
          break;
        case 3:
          ratingText.textContent = 'Sua avaliação: Bom';
          ratingText.className = 'rating-text good';
          break;
        case 4:
          ratingText.textContent = 'Sua avaliação: Ótimo';
          ratingText.className = 'rating-text good';
          break;
        case 5:
          ratingText.textContent = 'Sua avaliação: Excelente';
          ratingText.className = 'rating-text good';
          break;
      }
    }
  </script>
  
  <!-- Tooltip script -->
  <script>
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    })
  </script>
</body>
</html>