<?php
    $errors = [];
    $success = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = trim($_POST['nome']);
        $sobrenome = trim($_POST['sobrenome']);
        $email = trim($_POST['email']);
        $senha = $_POST['senha'];

        // Validações
        if (empty($nome)) $errors['nome'] = "O campo Nome é obrigatório.";
        if (empty($sobrenome)) $errors['sobrenome'] = "O campo Sobrenome é obrigatório.";
        
        if (empty($email)) {
            $errors['email'] = "O campo Email é obrigatório.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Digite um email válido.";
        }
        
        if (empty($senha)) {
            $errors['senha'] = "O campo Senha é obrigatório.";
        } else {
            if (strlen($senha) < 8) $errors['senha'] = "A senha deve ter no mínimo 8 caracteres.";
            if (!preg_match('/[A-Z]/', $senha)) $errors['senha'] = "A senha deve ter pelo menos uma letra maiúscula.";
            if (!preg_match('/[a-z]/', $senha)) $errors['senha'] = "A senha deve ter pelo menos uma letra minúscula.";
            if (!preg_match('/[0-9]/', $senha)) $errors['senha'] = "A senha deve ter pelo menos um número.";
        }

        if (empty($errors)) {
            require_once 'conexão.php';
            require_once 'GeteSet.php';
            require_once 'ClassDao.php';

            // Cria hash da senha
            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

            $novoUsuario = new ClassUsuario($nome, $sobrenome, $email, $senhaHash);
            $usuarioDAO = new ClassUsuarioDAO();
            
            if ($usuarioDAO->cadastrar($novoUsuario)) {
                header("Location: Entrar.php");
                exit();
            } else {
                $errors['geral'] = "Erro ao cadastrar. Tente novamente.";
            }
        }
    }
    ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar - Nutrição Fitness</title>
    
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
            --accent-color: #ff6b6b;
            --dark-color: #121212;
            --light-color: #ffffff;
            --text-color: #2d3748;
            --text-light: #f8f9fa;
            --shadow-sm: 0 1px 3px rgba(0,0,0,0.12);
            --shadow-md: 0 4px 10px rgba(0,0,0,0.15);
            --shadow-lg: 0 15px 35px rgba(0,0,0,0.2);
            --transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1);
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, rgba(0,100,200,0.85), rgba(0,200,180,0.9)), 
                        url('https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') no-repeat center center fixed;
            background-size: cover;
            color: var(--text-color);
            min-height: 100vh;
            display: flex;
            align-items: center;
            overflow-x: hidden;
        }
        
        .register-container {
            max-width: 600px;
            background: rgba(255, 255, 255, 0.97);
            border-radius: 20px;
            box-shadow: var(--shadow-lg);
            padding: 2.5rem;
            margin: 2rem auto;
            backdrop-filter: blur(8px);
            animation: fadeIn 0.8s ease-out forwards;
        }
        
        .logo-brand {
            font-family: 'Alegreya', serif;
            font-weight: 800;
            color: var(--primary-color);
            text-align: center;
            margin-bottom: 2rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }
        
        .logo-brand .logo-text {
            font-size: 2.5rem;
            display: inline-block;
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            line-height: 1.2;
            letter-spacing: 1px;
        }
        
        h1 {
            text-align: center;
            margin-bottom: 1.5rem;
            color: var(--primary-color);
            font-weight: 700;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-label {
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: var(--text-color);
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
            margin-top: 1rem;
        }
        
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }
        
        .btn-back {
            display: inline-block;
            margin-top: 1.5rem;
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
            text-align: center;
            width: 100%;
        }
        
        .alert {
            border-radius: 10px;
            margin-bottom: 1.5rem;
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
    </style>
</head>
<body>
   

    <div class="register-container">
        <div class="logo-brand">
            <i class="bi bi-activity"></i>
            <span class="logo-text">Nutrição Fitness</span>
        </div>
        
        <h1>Criar Nova Conta</h1>

        <?php if (!empty($errors['geral'])): ?>
            <div class="alert alert-danger">
                <?= $errors['geral'] ?>
            </div>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control <?= isset($errors['nome']) ? 'is-invalid' : '' ?>" 
                       id="nome" name="nome" value="<?= htmlspecialchars($_POST['nome'] ?? '') ?>">
                <?php if (isset($errors['nome'])): ?>
                    <div class="invalid-feedback"><?= $errors['nome'] ?></div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="sobrenome" class="form-label">Sobrenome</label>
                <input type="text" class="form-control <?= isset($errors['sobrenome']) ? 'is-invalid' : '' ?>" 
                       id="sobrenome" name="sobrenome" value="<?= htmlspecialchars($_POST['sobrenome'] ?? '') ?>">
                <?php if (isset($errors['sobrenome'])): ?>
                    <div class="invalid-feedback"><?= $errors['sobrenome'] ?></div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>" 
                       id="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
                <?php if (isset($errors['email'])): ?>
                    <div class="invalid-feedback"><?= $errors['email'] ?></div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" class="form-control <?= isset($errors['senha']) ? 'is-invalid' : '' ?>" 
                       id="senha" name="senha">
                <?php if (isset($errors['senha'])): ?>
                    <div class="invalid-feedback"><?= $errors['senha'] ?></div>
                <?php endif; ?>
                <small class="form-text text-muted">A senha deve conter pelo menos 8 caracteres, incluindo letras maiúsculas, minúsculas e números.</small>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="bi bi-person-plus-fill me-2"></i>Criar Conta
            </button>
            
            <a href="Entrar.php" class="btn-back">
                <i class="bi bi-arrow-left me-2"></i>Já tem conta? Faça login
            </a>
        </form>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>