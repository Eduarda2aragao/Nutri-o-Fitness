<?php
// Entrar.php
session_start();

// 1) Logout
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header('Location: Entrar.php');
    exit;
}

// 2) Cabeçalhos de segurança
header("X-Frame-Options: DENY");
header("X-Content-Type-Options: nosniff");
header("X-XSS-Protection: 1; mode=block");

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 3) Validação básica
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $senha = $_POST['senha'] ?? '';

    if (!$email || !$senha) {
        $error = 'Preencha todos os campos!';
    } else {
        // 4) Conexão MySQLi
        $mysqli = new mysqli('localhost', 'root', '', 'nutricao');
        if ($mysqli->connect_errno) {
            $error = 'Falha na conexão com o banco.';
        } else {
            // 5) SELECT incluindo Nome, Sobrenome e Email
            $stmt = $mysqli->prepare(
              'SELECT id, Nome, Sobrenome, Email, Senha 
               FROM cadastro 
               WHERE Email = ?'
            );
            if ($stmt) {
                $stmt->bind_param('s', $email);
                $stmt->execute();
                $res = $stmt->get_result();

                if ($res->num_rows === 1) {
                    $user = $res->fetch_assoc();

                    // 6) Verifica senha com password_verify
                    $ok = false;
                    if (password_verify($senha, $user['Senha'])) {
                        $ok = true;
                    }
                    // fallback: senha em texto puro
                    elseif ($senha === $user['Senha']) {
                        // rehash e update
                        $newHash = password_hash($senha, PASSWORD_DEFAULT);
                        $upd = $mysqli->prepare('UPDATE cadastro SET Senha = ? WHERE id = ?');
                        $upd->bind_param('si', $newHash, $user['id']);
                        $upd->execute();
                        $upd->close();
                        $ok = true;
                    }

                    if ($ok) {
                        // 7) Sucesso: grava sessão e redireciona
                        session_regenerate_id(true);
                        $_SESSION['usuario_id']    = $user['id'];
                        $_SESSION['usuario_nome']  = $user['Nome'] . ' ' . $user['Sobrenome'];
                        $_SESSION['usuario_email'] = $user['Email'];
                        $stmt->close();
                        $mysqli->close();
                        header('Location: receitas.php');
                        exit;
                    } else {
                        $error = 'Senha incorreta.';
                    }
                } else {
                    $error = 'E-mail não cadastrado.';
                }
                $stmt->close();
            } else {
                $error = 'Erro na preparação da consulta.';
            }
            $mysqli->close();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Login – Nutrição Fitness</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Alegreya:wght@700;800&display=swap" rel="stylesheet">

  <style>
    :root {
      --primary-color: #0066cc;
      --secondary-color: #00dfd8;
      --dark-color: #121212;
      --light-color: #ffffff;
      --text-color: #2d3748;
      --shadow-sm: 0 1px 3px rgba(0,0,0,0.12);
      --shadow-md: 0 4px 10px rgba(0,0,0,0.15);
      --shadow-lg: 0 15px 35px rgba(0,0,0,0.2);
      --transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1);
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, rgba(0,100,200,0.85), rgba(0,200,180,0.9)),
                  url('https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?auto=format&fit=crop&w=1350&q=80') no-repeat center center fixed;
      background-size: cover;
      color: var(--text-color);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow-x: hidden;
    }

    .login-container {
      width: 100%;
      max-width: 400px;
      background: rgba(255, 255, 255, 0.97);
      border-radius: 20px;
      box-shadow: var(--shadow-lg);
      padding: 2.5rem;
      margin: 2rem;
      backdrop-filter: blur(8px);
      animation: fadeIn 0.8s ease-out forwards;
    }

    .logo-brand {
      font-family: 'Alegreya', serif;
      font-weight: 800;
      color: var(--primary-color);
      text-align: center;
      margin-bottom: 1.5rem;
      text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
    }

    .logo-brand .display-4 {
      font-size: 3rem;
      color: var(--secondary-color);
      vertical-align: middle;
      margin-right: 0.5rem;
    }

    h1 {
      font-family: 'Alegreya', serif;
      text-align: center;
      margin-bottom: 1.5rem;
      color: var(--primary-color);
      font-weight: 200;
    }

    .form-label {
      font-weight: 500;
    }

    .form-control {
      height: 50px;
      border-radius: 10px;
      border: 2px solid #e2e8f0;
      padding: 0.75rem 1.25rem;
      font-size: 1rem;
      transition: var(--transition);
      box-shadow: var(--shadow-sm);
    }

    .form-control:focus {
      border-color: var(--secondary-color);
      box-shadow: 0 0 0 0.25rem rgba(0, 223, 216, 0.3);
    }

    .btn-primary {
      background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
      border: none;
      border-radius: 12px;
      padding: 12px 24px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 1px;
      transition: var(--transition);
      box-shadow: var(--shadow-md);
      width: 100%;
    }

    .btn-primary:hover {
      transform: translateY(-3px);
      box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    }

    .btn-link {
      display: block;
      text-align: center;
      margin-top: 1rem;
      color: var(--primary-color);
      text-decoration: none;
      font-weight: 500;
      transition: var(--transition);
    }

    .btn-link:hover {
      color: var(--secondary-color);
      text-decoration: underline;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @media (max-width: 576px) {
      .login-container {
        padding: 2rem;
        margin: 1rem;
      }
    }
  </style>
</head>
<body>
  <div class="login-container">
    <div class="logo-brand">
      <i class="bi bi-activity display-4"></i>
      <span class="h2">Nutrição Fitness</span>
    </div>

    <h1>Acesse sua conta</h1>

    <?php if ($error): ?>
      <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form action="Entrar.php" method="POST">
      <div class="mb-3">
        <label for="email" class="form-label">E-mail</label>
        <input type="email" id="email" name="email" class="form-control"
               value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>
      </div>
      <div class="mb-4">
        <label for="senha" class="form-label">Senha</label>
        <input type="password" id="senha" name="senha" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-primary mb-3">
        <i class="bi bi-box-arrow-in-right me-2"></i>Entrar
      </button>
      <a href="UsuarioNovo.php" class="btn-link">
        <i class="bi bi-pencil-square me-2"></i>Criar / Atualizar cadastro
      </a>
    </form>
  </div>

  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
