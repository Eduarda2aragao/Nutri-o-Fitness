<?php
// MeuPerfil.php
session_start();

// 1) Se não logado, redireciona ao login
if (empty($_SESSION['usuario_id'])) {
    header('Location: Entrar.php');
    exit;
}

require_once 'conexão.php';
$pdo = Conexao::getInstance();

$sucesso = '';
$erro    = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao'])) {
    $acao = $_POST['acao'];

    if ($acao === 'atualizar') {
        $nomeCompleto = trim($_POST['nome_completo']);
        $parts        = explode(' ', $nomeCompleto, 2);
        $nome         = $parts[0] ?? '';
        $sobrenome    = $parts[1] ?? '';
        $email        = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $senhaNova    = trim($_POST['senha']);

        if (!$nome || !$sobrenome || !$email) {
            $erro = 'Nome completo e e-mail são obrigatórios!';
        } else {
            // Prepara UPDATE
            if ($senhaNova) {
                $hash = password_hash($senhaNova, PASSWORD_DEFAULT);
                $sql  = "UPDATE cadastro
                        SET Nome=?, Sobrenome=?, Email=?, Senha=?
                        WHERE id=?";
                $params = [$nome, $sobrenome, $email, $hash, $_SESSION['usuario_id']];
            } else {
                $sql  = "UPDATE cadastro
                        SET Nome=?, Sobrenome=?, Email=?
                        WHERE id=?";
                $params = [$nome, $sobrenome, $email, $_SESSION['usuario_id']];
            }
            $stmt = $pdo->prepare($sql);
            if ($stmt->execute($params)) {
                // Atualiza sessão
                $_SESSION['usuario_nome']  = "$nome $sobrenome";
                $_SESSION['usuario_email'] = $email;
                $sucesso = 'Perfil atualizado com sucesso!';
            } else {
                $erro = 'Erro ao atualizar perfil.';
            }
        }

    } elseif ($acao === 'deletar') {
        $stmt = $pdo->prepare("DELETE FROM cadastro WHERE id=?");
        if ($stmt->execute([$_SESSION['usuario_id']])) {
            session_destroy();
            header('Location: Entrar.php?msg=conta_removida');
            exit;
        } else {
            $erro = 'Erro ao excluir conta.';
        }
    }
}

// 2) Carrega valores da sessão (sempre existirão após o login)
$nomeCompleto = $_SESSION['usuario_nome'];
$emailLogado  = $_SESSION['usuario_email'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Meu Perfil – Nutrição Fitness</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
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
    :root {
      --primary: #0d6efd;
      --secondary: #0b5ed7;
      --light-bg: #e9f2ff;
      --card-bg: #ffffff;
      --text-dark: #212529;
    }

    body {
      background-color: var(--light-bg);
      color: var(--text-dark);
      font-family: 'Alegreya', serif;  
    }

    .navbar {
      background: linear-gradient(45deg, rgb(3, 11, 46), rgb(0, 69, 196), rgb(3, 17, 46));
      background-color: var(--primary) !important;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
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
      color: var(--secondary) !important;

    }

    .profile-container {
      margin-top: 100px;
      margin-bottom: 50px;
    }

    .profile-card {
      background: var(--card-bg);
      border-radius: 15px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.05);
      overflow: hidden;
    }

    .profile-header {
      background: var(--primary);
      color: #fff;
      padding: 2rem;
      text-align: center;
    }

    .profile-header h2 {
      margin-bottom: .5rem;
      font-weight: 600;
    }

    .profile-header p {
      margin-bottom: 0;
      font-size: 1rem;
    }

    .profile-body {
      padding: 2rem;
    }

    .form-control {
      border-radius: 8px;
      border: 1px solid #ced4da;
      height: 48px;
    }

    .form-control:focus {
      border-color: var(--primary);
      box-shadow: 0 0 0 0.2rem rgba(13,110,253,0.25);
    }

    .btn-primary {
      background: var(--primary);
      border: none;
      border-radius: 8px;
      padding: 0.75rem 1.5rem;
    }

    .btn-primary:hover {
      background: var(--secondary);
    }

    .btn-danger {
      border-radius: 8px;
      padding: 0.75rem 1.5rem;
    }

    @media (max-width: 768px) {
      .profile-header, .profile-body {
        padding: 1rem;
      }
      .profile-container {
        margin-top: 120px;
      }
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
          <a class="nav-link dropdown-toggle" href="#" id="perfilDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
<!--Apresentação do head do Usuario-->
<div class="container profile-container">
  <div class="profile-card">
    <div class="profile-header">
      <h2>Olá, <?= htmlspecialchars($nomeCompleto) ?></h2>
      <p><?= htmlspecialchars($emailLogado) ?></p>
    </div>
    <div class="profile-body">
      <?php if($sucesso): ?>
        <div class="alert alert-success"><?= htmlspecialchars($sucesso) ?></div>
      <?php endif; ?>
      <?php if($erro): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($erro) ?></div>
      <?php endif; ?>

      <form method="POST">
        <input type="hidden" name="acao" value="atualizar">
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label">Nome Completo</label>
            <input type="text" name="nome_completo" class="form-control"
                   value="<?= htmlspecialchars($nomeCompleto) ?>" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">E-mail</label>
            <input type="email" name="email" class="form-control"
                   value="<?= htmlspecialchars($emailLogado) ?>" required>
          </div>
          <div class="col-12">
            <label class="form-label">Nova Senha</label>
            <input type="password" name="senha" class="form-control"
                   placeholder="Deixe em branco para manter a atual">
          </div>
          <div class="col-12 text-end">
            <button type="submit" class="btn btn-primary me-2">
              <i class="bi bi-save me-1"></i>Salvar Alterações
            </button>
            <button type="submit" name="acao" value="deletar"
                    class="btn btn-danger"
                    onclick="return confirm('Deseja excluir sua conta de forma permanente?');">
              <i class="bi bi-trash me-1"></i>Excluir Conta
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- Novo Card de Anamnese -->
  <div class="mt-4">
    <div class="card border-0 shadow-lg rounded-4" style="background-color: var(--primary); color: #fff;">
      <div class="card-body d-flex flex-column flex-md-row align-items-center justify-content-between p-4">
        <div class="d-flex align-items-center mb-3 mb-md-0">
          <i class="bi bi-clipboard-heart fs-1 me-3"></i>
          <div>
            <h4 class="mb-1 fw-bold">Cadastre sua Anamnese</h4>
            <p class="mb-0">Preencha seu histórico de saúde para personalizar sua jornada nutricional.</p>
          </div>
        </div>
        <a href="anamnese.php" class="btn btn-light text-primary fw-semibold px-4 py-2 rounded-3">
          <i class="bi bi-pencil-square me-1"></i>Preencher Anamnese
        </a>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>