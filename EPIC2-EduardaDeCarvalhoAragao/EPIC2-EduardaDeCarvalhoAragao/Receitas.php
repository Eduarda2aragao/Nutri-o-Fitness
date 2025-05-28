<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Nutrição Fitness - Receitas</title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Alegreya:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bungee+Spice&family=Special+Gothic+Condensed+One&display=swap" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
   <link
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined"
    rel="stylesheet"
  />
  
  <style>
    body {
      background-image: url('img/Design sem nome (4).png');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      font-family: 'Alegreya', serif;
      color: #333;
    }
    /* Navbar customizada */
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
    /* Estilo dos cards */
    .card {
      margin-bottom: 30px;
      border: none;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }
    .card-img-top {
      object-fit: cover;
      height: 200px;
    }
    footer {
      background-color: #f8f9fa;
      padding: 20px 0;
      text-align: center;
      margin-top: 30px;
    }

    /* Estilo para o container da imagem com texto */
    .image-container {
      position: relative;
      text-align: center;
      font-family:"Special Gothic Condensed One", sans-serif;
      font-weight: 400;
      font-style: normal;
    }

    /* Estilo para o texto sobreposto */
    .image-text {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      color:rgb(255, 255, 255); 
      text-shadow: 4px 4px 6px rgba(0, 0, 0, 0.7);
      width: 80%;
    }

    /* Ajustes responsivos para o texto */
    @media (max-width: 768px) {
      .image-text h1 {
        font-size: 2.0rem;
      }
      .image-text p {
        font-size: 1.5rem;
      }
    }

    /*Botões de navegação para filtrar as receitas por categoria */
    .btn-filter.active {
  transform: translateY(-3px);
  box-shadow: 0 4px 8px rgba(0,0,0,0.2);
  border: 2px solid #fff;
}

    /*PDF */
    .btn-download-pdf {
        transition: all 0.3s ease;
        font-weight: bold;
        border-radius: 50px;
        padding: 10px 25px;
    }

    .btn-download-pdf:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    /*modal receita */
    .modal-receita {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 1000;
    }

    .modal-content {
      background: white;
      padding: 25px;
      border-radius: 8px;
      width: 90%;
      max-width: 500px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h2 {
      margin-top: 0;
      color: #333;
    }

    .form-group {
      margin-bottom: 15px;
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-weight: 600;
    }

    input, textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 4px;
      font-family: Arial, sans-serif;
    }

    textarea {
      resize: vertical;
    }

    .modal-actions {
      display: flex;
      justify-content: flex-end;
      gap: 10px;
      margin-top: 20px;
    }

    .cancelar-btn, .salvar-btn {
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .cancelar-btn {
      background: #f1f1f1;
    }

    .salvar-btn {
      background: #4CAF50;
      color: white;
    }

    /* Campo obrigatório */
    label[for]:after {
      content: " *";
      color: red;
    }
    <style>
  /* Estilo do ícone de editar */
  .editar-receita {
    background: none;
    border: none;
    padding: 0;
    margin-left: 8px;
    cursor: pointer;
  }
  .editar-receita i {
    color: inherit;
    transition: color 0.2s;
  }
  .editar-receita:hover i {
    color: var(--hover-color, yellow); /*--------------> Troque de cor aqui e pode passar cores assim tbm ex: #A020F0 */<--------------------/
  }

  /* Estilo do ícone de excluir */
  .excluir-receita {
    background: none;
    border: none;
    padding: 0;
    margin-left: 4px;
    cursor: pointer;
  }
  .excluir-receita i {
    color: inherit;
    transition: color 0.2s;
  }
  .excluir-receita:hover i {
    color: red;
  }
</style>

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

  <!-- Imagem de topo com texto sobreposto -->
  <div class="container mt-4 position-relative">
    <div class="row">
      <div class="col-12">
        <div class="image-container">
          <img src="img\img1.jpg" class="img-fluid rounded" alt="Imagem de destaque">
          <div class="image-text">
            <h1 class="display-4">Sabor e Saúde em Cada Receita</h1>
            <p class="lead">Descubra opções deliciosas e nutritivas para manter uma alimentação balanceada</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--Botões de navegação para filtrar as receitas por categoria -->
  <div class="container mt-4 mb-4 text-center">
  <div class="btn-group" role="group" aria-label="Filtrar receitas">
    <button class="btn btn-primary mx-2 rounded-pill btn-filter" data-category="all">
      <i class="fas fa-utensils"></i> Todos
    </button>
    <button class="btn btn-primary mx-2 rounded-pill btn-filter" data-category="Low-Carb">
      <i class="fas fa-leaf"></i> Low Carb
    </button>
    <button class="btn btn-danger mx-2 rounded-pill btn-filter" data-category="Termogenica">
      <i class="fas fa-fire"></i> Termogênica
    </button>
    <button class="btn btn-warning mx-2 rounded-pill btn-filter" data-category="Doces">
      <i class="fas fa-candy-cane"></i> Doces
    </button>
  </div>
</div>

  <!-- Seção de Receitas -->
  <div class="container mt-5">
    <div class="row" id="receitas-container">
      <!-- Card 1: Arroz Integral Colorido -->
      <div class="col-md-4">
        <div class="card" id="Termogenica">
          <img src="img/arroz_colorido (2).jpeg" class="card-img-top" alt="Arroz Integral Colorido">
          <div class="card-body">
            <h5 class="card-title">Arroz Integral Colorido</h5>
            <p class="card-text">
              <strong>Ingredientes:</strong>
              <ul>
                <li>50g de arroz integral</li>
                <li>150g de carne desfiada</li>
                <li>1 fio de azeite</li>
                <li>Cenoura, cebola e alho a gosto</li>
                <li>Gengibre a gosto</li>
                <li>3 xícaras de água</li>
                <li>Sal a gosto</li>
                <li>Hortelã para decorar</li>
              </ul>
            </p><br><br>
            <a href="https://www.youtube.com/watch?v=eLy0ogosdV0" class="btn btn-primary">Modo de Preparo</a>
          </div>
        </div>
      </div>

      <!-- Card 10: Salada de frango e abacate -->
      <div class="col-md-4">
        <div class="card" id="Termogenica">
          <img src="img\salada.jpg" class="card-img-top" alt="Salada de frango e abacate">
          <div class="card-body">
            <h5 class="card-title">Salada de frango e abacate</h5>
            <p class="card-text">
              <strong>Ingredientes:</strong>
              <ul>
                <li>1 xícara de chá de folhas de rúcula</li>
                <li>8 tomates-cerejas cortados ao meio</li>
                <li>1 peito de frango</li>
                <li>Suco de 1 limão</li>
                <li>Polpa de 1 abacate cortada em fatias</li>
                <li>1 pimenta dedo-de-moça sem sementes e picada</li>
                <li>Azeite, sal e orégano a gosto</li>
              </ul>
            </p><br><br>
            <a href="https://www.youtube.com/watch?v=0-wvzJS6Uis" class="btn btn-primary">Modo de Preparo</a>
          </div>
        </div>
      </div>

      <!-- Card 13: SOPA DE LENTILHA -->
      <div class="col-md-4">
        <div class="card" id="Termogenica">
          <img src="img\sopa.jpg" class="card-img-top" alt="Sopa de Lentilha">
          <div class="card-body">
            <h5 class="card-title">Sopa de Lentilha</h5>
            <p class="card-text">
              <strong>Ingredientes:</strong>
              <ul>
                <li>2 colheres de sopa de azeite </li>
                <li>1/2 cebola pequena picada</li>
                <li>2 dentes de alho picado</li>
                <li>1 colher de chá de páprica doce ou defumada</li>
                <li>1/2 xícara de lentilha</li>
                <li>1/2 xícara de chá de pimentão picado </li>
                <li>1/2 xícara de chá de cenoura cortada em cubos</li>
                <li>1 xícara de chá de batata cortada em cubos</li>
                <li>1 xícara de chá de molho de tomate caseiro</li>
                <li>Sal e pimenta a gosto</li>
              </ul>
            </p>
            <a href="https://www.youtube.com/watch?v=UBTqwWOWZ0s" class="btn btn-primary">Modo de Preparo</a>
          </div>
        </div>
      </div>

      <!-- LOW-CARB -->

      <!-- Card 2: Crepioca -->
      <div class="col-md-4">
        <div class="card" id="Low-Carb">
          <img src="img/crepioca.jpeg" class="card-img-top" alt="Crepioca">
          <div class="card-body">
            <h5 class="card-title">Crepioca</h5>
            <p class="card-text">
              <strong>Ingredientes:</strong>
              <ul>
                <li>2 ovos</li>
                <li>1 colher de sopa de farinha de linhaça</li>
                <li>Queijo ralado a gosto</li>
                <li>Orégano e pitada de sal</li>
                <li>Sal e pimenta a gosto</li>
              </ul>
            </p><br><br><br>
            <a href="https://www.youtube.com/watch?v=UZEwDBk6T_0" class="btn btn-primary">Modo de Preparo</a>
          </div>
        </div>
      </div>

      <!-- Card 3: Filé de Peixe Assado -->
      <div class="col-md-4">
        <div class="card" id="Low-Carb">
          <img src="img/peixe.jpg" class="card-img-top" alt="Filé de Peixe Assado">
          <div class="card-body">
            <h5 class="card-title">Filé de Peixe Assado</h5>
            <p class="card-text">
              <strong>Ingredientes:</strong>
              <ul>
                <li>150g de filé de peixe</li>
                <li>2 batatas grandes em rodelas</li>
                <li>1/2 pimentão</li>
                <li>1 cebola média picada</li>
                <li>1 dente de alho espremido</li>
                <li>Coentro e cheiro verde a gosto</li>
                <li>Sal e pimenta a gosto</li>
              </ul>
            </p><br>
            <a href="https://www.youtube.com/watch?v=K0E6xL08qxE" class="btn btn-primary">Modo de Preparo</a>
          </div>
        </div>
      </div>

      <!-- Card 5: Sulflê de Frango -->
      <div class="col-md-4">
        <div class="card" id="Low-Carb">
          <img src="img\Sufle-frango.jpg" class="card-img-top" alt="Sulflê de Frango">
          <div class="card-body">
            <h5 class="card-title">Sulflê de Frango</h5>
            <p class="card-text">
              <strong>Ingredientes:</strong>
              <ul>
                <li>150g de frango desfiado</li>
                <li>1 ovo</li>
                <li>1 clara</li>
                <li>Salsinha a gosto</li>
                <li>Manjericão a gosto</li>
                <li>1 colher de cubinhos de tomate</li>
                <li>1 colher de queijo cottage</li>
                <li>1 colher de parmesão para finalizar</li>
                <li>Sal e pimenta a gosto</li>
              </ul>
            </p>
            <a href="https://www.youtube.com/watch?v=5JgBEzMJ-Rw" class="btn btn-primary">Modo de Preparo</a>
          </div>
        </div>
      </div>
      <!-- Card 6: Creme de Abacate -->
      <div class="col-md-4">
        <div class="card" id="Low-Carb">
          <img src="img\creme.jpg" class="card-img-top" alt="Creme de Abacate">
          <div class="card-body">
            <h5 class="card-title">Creme de Abacate</h5>
            <p class="card-text">
              <strong>Ingredientes:</strong>
              <ul>
                <li>100g de abacate maduro</li>
                <li>2 colheres de sopa de creme de leite</li>
                <li>1 colher de sopa de leite de coco</li>
                <li>1 colher de sopa de nata</li>
                <li>1 colher de sopa de suco de limão</li>
                <li>Adoçante a gosto</li>
              </ul>
            </p><br><br><br>
            <a href="https://www.youtube.com/watch?v=gq8V-20wjBM" class="btn btn-primary">Modo de Preparo</a>
          </div>
        </div>
      </div>
      <!-- Card 7: Pão de queijo -->
      <div class="col-md-4">
        <div class="card" id="Low-Carb">
          <img src="img\pao_queijo.jpg" class="card-img-top" alt="Pão de queijo">
          <div class="card-body">
            <h5 class="card-title">Pão de queijo</h5>
            <p class="card-text">
              <strong>Ingredientes:</strong>
              <ul>
                <li>1 ovo pequeno</li>
                <li>2 colheres (sopa) cheias de queijo parmesão ralado</li>
                <li>3 fatias de queijo provolone</li>
                <li>1 colher (sobremesa) fermento químico em pó</li>
              </ul>
            </p><br><br><br>
            <a href="https://www.youtube.com/watch?v=gw7zC-zweW4" class="btn btn-primary">Modo de Preparo</a>
          </div>
        </div>
      </div>
      <!-- Card 8: Lasanha de berinjela -->
      <div class="col-md-4">
        <div class="card" id="Low-Carb">
          <img src="img\lasanha-de-berinjela" class="card-img-top" alt="Lasanha de berinjela">
          <div class="card-body">
            <h5 class="card-title">Lasanha de berinjela</h5>
            <p class="card-text">
              <strong>Ingredientes:</strong>
              <ul>
                <li>3 berinjelas grandes</li>
                <li>1 maço de coentro cortado em pedaços pequenos</li>
                <li>300 g de queijo mussarela fatiado</li>
                <li> 2 colheres de azeite</li>
                <li> 1 lata de molho de tomate</li>
                <li> Azeitonas sem caroço cortadas</li>
                <li> 300 g de presunto fatiado</li>
                <li> Queijo catupiry</li>
              </ul>
            </p>
            <a href="https://www.youtube.com/watch?v=yCknO5FzlVM" class="btn btn-primary">Modo de Preparo</a>
          </div>
        </div>
      </div>

      <!-- DOCES -->

      <!-- Card 4: Bolo de Caneca -->
      <div class="col-md-4">
        <div class="card" id="Doces">
          <img src="img/bolo_caneca.jpg" class="card-img-top" alt="Bolo de Caneca">
          <div class="card-body">
            <h5 class="card-title">Bolo de Caneca</h5>
            <p class="card-text">
              <strong>Ingredientes:</strong>
              <ul>
                <li>15g de óleo de coco</li>
                <li>1 ovo</li>
                <li>Canela e cacau a gosto</li>
                <li>Adoçante a gosto</li>
                <li>1 pitada de fermento</li>
                <li>1 pitada de sal</li>
              </ul>
            </p><br><br><br>
            <a href="https://www.youtube.com/watch?v=0HDC2BrgvL8" class="btn btn-primary">Modo de Preparo</a>
          </div>
        </div>
      </div>

      <!-- Card 11: Barrinha de banana com aveia e canela -->
      <div class="col-md-4">
        <div class="card" id="Doces">
          <img src="img\barras.jpg" class="card-img-top" alt="Barrinha de banana com aveia e canela">
          <div class="card-body">
            <h5 class="card-title">Barrinha de banana com aveia e canela</h5>
            <p class="card-text">
              <strong>Ingredientes:</strong>
              <ul>
                <li>3 bananas-nanicas bem maduras</li>
                <li>6 colheres de sopa de farinha de aveia</li>
                <li>Canela em pó a gosto</li>
                <li>Noz-pecã a gosto (opcional)</li>
                <li>40 gramas de chocolate meio amargo derretido (opcional)</li>
              </ul>
            </p><br><br><br>
            <a href="https://www.youtube.com/watch?app=desktop&v=F_3StTyujzk" class="btn btn-primary">Modo de Preparo</a>
          </div>
        </div>
      </div>
      <!-- Card 12: Sorvete de abacaxi com 2 ingredientes -->
      <div class="col-md-4">
        <div class="card" id="Doces">
          <img src="img\sorvete" class="card-img-top" alt="Sorvete de abacaxi">
          <div class="card-body">
            <h5 class="card-title">Sorvete de abacaxi</h5>
            <p class="card-text">
              <strong>Ingredientes:</strong>
              <ul>
                <li>3 xícaras de chá de abacaxi picados e congelados</li>
                <li>1/2 xícara de chá de leite de coco</li>
                <li>Cubinhos de abacaxi (opcional)</li>
              </ul>
            </p><br><br><br><br><br>
            <a href="https://www.youtube.com/watch?v=D4Qx-N4oIZo" class="btn btn-primary">Modo de Preparo</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Seção para adicionar nova receita e e-book -->
  <div class="container mt-5">
    <div class="row justify-content-center">
      <!-- Card para adicionar nova receita -->
      <div class="col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body text-center d-flex flex-column justify-content-center">
            <i class="fas fa-plus-circle fa-5x mb-3 text-primary"></i>
            <h5 class="card-title">Adicionar Nova Receita</h5>
            <p class="card-text">Compartilhe sua receita saudável favorita com a comunidade</p>
            <button class="btn btn-primary mt-auto" data-bs-toggle="modal" data-bs-target="#novaReceitaModal">
              <i class="fas fa-plus me-2"></i> Adicionar Receita
            </button>
          </div>
        </div>
      </div>

      <!-- Card do E-book -->
      <div class="col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body text-center d-flex flex-column justify-content-center">
            <i class="fas fa-book-open fa-5x mb-3 text-success"></i>
            <h5 class="card-title">E-Book Completo de Receitas</h5>
            <p class="card-text">Baixe todas as receitas em um único arquivo PDF</p>
            <a href="receitas-nutricao-fitness.pdf" class="btn btn-success mt-auto" download>
              <i class="fas fa-download me-2"></i> Baixar PDF
            </a>
            <div class="mt-2 text-muted small">
              <i class="fas fa-download me-1"></i> 
              <span id="download-count">1.234</span> downloads
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal de nova receita -->
  <div class="modal fade" id="novaReceitaModal" tabindex="-1" aria-labelledby="novaReceitaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title" id="novaReceitaModalLabel">Adicionar Nova Receita</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="formNovaReceita">
            <!-- Nome da Receita -->
            <div class="mb-3">
              <label for="nome-receita" class="form-label">Nome da Receita*</label>
              <input type="text" class="form-control" id="nome-receita" placeholder="Ex: Panqueca de Banana" required>
            </div>
            
            <!-- Categoria -->
            <div class="mb-3">
              <label for="categoria-receita" class="form-label">Categoria*</label>
              <select class="form-select" id="categoria-receita" required>
                <option value="">Selecione uma categoria</option>
                <option value="Low-Carb">Low Carb</option>
                <option value="Termogenica">Termogênica</option>
                <option value="Doces">Doces</option>
              </select>
            </div>
            
            <!-- Imagem (opcional) -->
            <div class="mb-3">
              <label for="imagem-receita" class="form-label">Imagem (opcional)</label>
              <input class="form-control" type="file" id="imagem-receita" accept="image/*">
            </div> 
            
            <!-- Ingredientes -->
            <div class="mb-3">
              <label for="ingredientes" class="form-label">Ingredientes*</label>
              <textarea class="form-control" id="ingredientes" rows="4" placeholder="Ex:
                - 2 bananas maduras
                - 1 xícara de farinha de trigo
                - 1 ovo" required></textarea>
            </div>  
            
            <!-- Modo de Preparo -->
            <div class="mb-3">
              <label for="modo-preparo" class="form-label">Modo de Preparo*</label>
              <textarea class="form-control" id="modo-preparo" rows="6" placeholder="Passo a passo detalhado..." required></textarea>
            </div>
            
            <!-- Observações (opcional) -->
            <div class="mb-3">
              <label for="observacoes" class="form-label">Observações (link ou comentário)</label>
              <textarea class="form-control" id="observacoes" rows="2" placeholder="Ex: Receita adaptada do site..."></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary" id="salvar-receita">Salvar Receita</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer>
    <div class="container">
      <p>&copy; 2025 Nutrição Fitness. Todos os direitos reservados.</p>
    </div>
  </footer>

  <!-- depois do link do Bootstrap -->
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
/>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Scripts Adicionar receita -->
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      let editModeId = null;
      carregarReceitasSalvas();

      // Salvar (nova ou edição)
      document.getElementById('salvar-receita').addEventListener('click', () => {
        const nome  = document.getElementById('nome-receita').value.trim();
        const cat   = document.getElementById('categoria-receita').value;
        const file  = document.getElementById('imagem-receita').files[0];
        const ingr  = document.getElementById('ingredientes').value.trim();
        const modo  = document.getElementById('modo-preparo').value.trim();
        const obs   = document.getElementById('observacoes').value.trim();

        if (!nome || !cat || !ingr || !modo) {
          return alert('Preencha todos os campos obrigatórios!');
        }
        // imagem
        const processarImagem = cb => {
          if (file) {
            if (!file.type.match('image.*')) return alert('Selecione uma imagem válida!');
            if (file.size > 2*1024*1024) return alert('Imagem maior que 2MB!');
            const reader = new FileReader();
            reader.onload = e => cb(e.target.result);
            reader.readAsDataURL(file);
          } else cb(null);
        };

        processarImagem(imBase64 => {
          const receitas = JSON.parse(localStorage.getItem('receitas')) || [];//Salvar no banco
          const timestamp = new Date().toISOString();

          if (editModeId) {
            // Atualiza no localStorage
            const updated = receitas.map(r => {
              if (r.id === editModeId) {
                return {
                  ...r,
                  nome,
                  categoria: cat,
                  imagem: imBase64 || r.imagem,
                  ingredientes: ingr,
                  modoPreparo: modo,
                  observacoes: obs,
                  data: timestamp
                };
              }
              return r;
            });
            localStorage.setItem('receitas', JSON.stringify(updated));

            // Atualiza apenas o card editado
            atualizarCardReceita({
              id: editModeId,
              nome,
              ingredientes: ingr,
              modoPreparo: modo,
              observacoes: obs,
              imagem: imBase64
            });
          } else {
            // Cria nova receita e injeta
            const novaReceita = {
              id: 'receita-' + Date.now(),
              nome,
              categoria: cat,
              imagem: imBase64,
              ingredientes: ingr,
              modoPreparo: modo,
              observacoes: obs,
              data: timestamp
            };
            receitas.push(novaReceita);
            localStorage.setItem('receitas', JSON.stringify(receitas));
            adicionarCardReceita(novaReceita);
          }

          // Reset & fecha modal
          editModeId = null;
          document.getElementById('formNovaReceita').reset();
          bootstrap.Modal.getInstance(
            document.getElementById('novaReceitaModal')
          ).hide();
        });
      });

      // Delegação editar/excluir
      document.getElementById('receitas-container').addEventListener('click', e => {
        const btnEdit = e.target.closest('.editar-receita');
        if (btnEdit) {
          const id = btnEdit.dataset.id;
          const receitas = JSON.parse(localStorage.getItem('receitas')) || [];
          const rec = receitas.find(r => r.id === id);
          if (!rec) return;
          document.getElementById('nome-receita').value      = rec.nome;
          document.getElementById('categoria-receita').value = rec.categoria;
          document.getElementById('ingredientes').value      = rec.ingredientes;
          document.getElementById('modo-preparo').value      = rec.modoPreparo;
          document.getElementById('observacoes').value       = rec.observacoes;
          editModeId = id;
          new bootstrap.Modal(document.getElementById('novaReceitaModal')).show();
          return;
        }

        const btnDel = e.target.closest('.excluir-receita');
        if (btnDel) {
          const id = btnDel.dataset.id;
          if (!confirm('Deseja realmente excluir esta receita?')) return;
          let receitas = JSON.parse(localStorage.getItem('receitas')) || [];
          receitas = receitas.filter(r => r.id !== id);
          localStorage.setItem('receitas', JSON.stringify(receitas));
          // remove do DOM
          const col = document.querySelector(`.editar-receita[data-id="${id}"]`)
                            .closest('.col-md-4');
          col.remove();
          const modal = document.getElementById(id + '-modal');
          if (modal) modal.remove();
        }
      });
    });

    function formatarObservacoes(texto) {
  const urlRegex = /((https?:\/\/[^\s]+))/g;
  return texto
    .replace(urlRegex, '<a href="$1" target="_blank" rel="noopener noreferrer">$1</a>')
    .replace(/\n/g, '<br>');
}


    function carregarReceitasSalvas() {
      const receitas = JSON.parse(localStorage.getItem('receitas')) || [];
      receitas.forEach(r => adicionarCardReceita(r));
    }// 873 transforma em link 

    function adicionarCardReceita(r) {
      const container = document.getElementById('receitas-container');
      const html = `
        <div class="col-md-4 mb-4">
          <div class="card">
            ${r.imagem ? `<img src="${r.imagem}" class="card-img-top" style="height:200px;object-fit:cover;">` : ''}
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">${r.nome}</h5>
                <div class="icones-acoes">
                  <button class="editar-receita" data-id="${r.id}" aria-label="Editar receita">
                    <span class="material-symbols-outlined">edit</span>
                  </button>
                  <button class="excluir-receita" data-id="${r.id}" aria-label="Excluir receita">
                    <span class="material-symbols-outlined">delete</span>
                  </button>
                </div>
              </div>
              <p class="mt-3"><strong>Ingredientes:</strong></p>
              <ul>
                ${r.ingredientes.split('\n').map(i => `<li>${i}</li>`).join('')}
              </ul>
              <button class="btn btn-primary mt-2"
                      data-bs-toggle="modal"
                      data-bs-target="#${r.id}-modal">
                Ver Modo de Preparo
              </button>
            </div>
          </div>
        </div>
        <div class="modal fade" id="${r.id}-modal" tabindex="-1">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-primary text-white">
                <h5 class="modal-title mb-0">${r.nome}</h5>
                <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
              </div>
              <div class="modal-body">
                ${r.imagem ? `<img src="${r.imagem}" class="img-fluid mb-3">` : ''}
                <h6>Modo de Preparo:</h6>
                <p>${r.modoPreparo.replace(/\n/g, '<br>')}</p>
                 ${r.observacoes ? `<h6>Observações:</h6><p>${formatarObservacoes(r.observacoes)}</p>` : ''}

              </div>
            </div>
          </div>
        </div>`;
      container.insertAdjacentHTML('beforeend', html);
    }

    function atualizarCardReceita(r) {
      const col = document.querySelector(`.editar-receita[data-id="${r.id}"]`).closest('.col-md-4');
      if (!col) return;
      col.querySelector('.card-title').textContent = r.nome;
      col.querySelector('ul').innerHTML =
        r.ingredientes.split('\n').map(i => `<li>${i}</li>`).join('');
      if (r.imagem) {
        let img = col.querySelector('.card-img-top');
        if (!img) {
          img = document.createElement('img');
          img.className = 'card-img-top';
          img.style.height = '200px';
          img.style.objectFit = 'cover';
          col.querySelector('.card').insertBefore(img, col.querySelector('.card-body'));
        }
        img.src = r.imagem;
      }
    }
  </script>
<!-- Scripts Filtro-->
  <script>
  // Filtro de receitas
  document.querySelectorAll('.btn-filter').forEach(btn => {
    btn.addEventListener('click', function() {
      const category = this.dataset.category;
      
      // Atualiza a classe ativa nos botões
      document.querySelectorAll('.btn-filter').forEach(b => {
        b.classList.remove('active');
      });
      this.classList.add('active');
      
      // Filtra as receitas
      document.querySelectorAll('#receitas-container .col-md-4').forEach(card => {
        if (category === 'all') {
          card.style.display = 'block';
        } else {
          const cardCategory = card.querySelector('.card').id;
          if (cardCategory === category) {
            card.style.display = 'block';
          } else {
            card.style.display = 'none';
          }
        }
      });
    });
  });

  // Mostra todas as receitas ao carregar a página
  document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('.btn-filter[data-category="all"]').click();
  });
</script>
</body>
</html>
