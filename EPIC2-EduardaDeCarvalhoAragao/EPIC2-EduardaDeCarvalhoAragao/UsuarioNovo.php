<?php
session_start();
require_once __DIR__ . '/conexão.php'; // Nome sem acento
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$errors = [];
$success = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $oldEmail = trim($_POST['old_email']);
        $newEmail = trim($_POST['new_email']);
        $newPassword = $_POST['new_password'];

        // Validação reforçada
        if (empty($oldEmail)) $errors['old_email'] = "Digite o email cadastrado";
        
        if (empty($newEmail)) {
            $errors['new_email'] = "Novo email obrigatório";
        } elseif (!filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
            $errors['new_email'] = "Email inválido";
        }
        
        if (empty($newPassword)) {
            $errors['new_password'] = "Digite uma nova senha";
        } else {
            if (strlen($newPassword) < 8) {
                $errors['new_password'] = "Mínimo 8 caracteres";
            }
            if (!preg_match('/[A-Z]/', $newPassword)) {
                $errors['new_password'] = "Pelo menos 1 letra maiúscula";
            }
            if (!preg_match('/[a-z]/', $newPassword)) {
                $errors['new_password'] = "Pelo menos 1 letra minúscula";
            }
            if (!preg_match('/[0-9]/', $newPassword)) {
                $errors['new_password'] = "Pelo menos 1 número";
            }
        }

        if (empty($errors)) {
            $pdo = Conexao::getInstance();
            
            // Verifica se email antigo existe
            $checkStmt = $pdo->prepare("SELECT id FROM cadastro WHERE Email = ?");
            $checkStmt->execute([$oldEmail]);
            
            if ($checkStmt->rowCount() === 0) {
                $errors['old_email'] = "Email não encontrado";
            } else {
                // Atualização segura
                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                
                $updateStmt = $pdo->prepare("
                    UPDATE cadastro 
                    SET Email = :novo_email, 
                        Senha = :nova_senha 
                    WHERE Email = :antigo_email
                ");
                
                $updateStmt->execute([
                    'novo_email' => $newEmail,
                    'nova_senha' => $hashedPassword,
                    'antigo_email' => $oldEmail
                ]);
                
                if ($updateStmt->rowCount() > 0) {
                    $success = "Perfil atualizado!";
                    // Atualiza sessão se necessário
                    if (isset($_SESSION['Email']) && $_SESSION['Email'] === $oldEmail) {
                        $_SESSION['Email'] = $newEmail;
                    }
                } else {
                    $errors['geral'] = "Nada foi alterado";
                }
            }
        }
    } catch (PDOException $e) {
        $errorCode = $e->getCode();
        if ($errorCode == 23000) {
            $errors['new_email'] = "Email já está em uso";
        } else {
            $errors['geral'] = "Erro #$errorCode: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #0066cc, #00dfd8);
            min-height: 100vh;
        }
        .card-custom {
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            background: rgba(255,255,255,0.98);
        }
        .password-rules {
            font-size: 0.9em;
            color: #666;
        }
    </style>
</head>
<body class="gradient-bg">
    <div class="container">
        <div class="row min-vh-100 align-items-center">
            <div class="col-md-6 mx-auto">
                <div class="card-custom p-4">
                    <div class="text-center mb-4">
                        <i class="bi bi-arrow-repeat display-6 text-primary"></i>
                        <h2 class="mt-3">Atualizar Cadastro</h2>
                    </div>

                    <?php if ($success): ?>
                        <div class="alert alert-success">✅ <?= $success ?></div>
                    <?php endif; ?>

                    <?php if (!empty($errors['geral'])): ?>
                        <div class="alert alert-danger">❌ <?= $errors['geral'] ?></div>
                    <?php endif; ?>

                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label">Email Atual</label>
                            <input type="email" name="old_email" 
                                   class="form-control <?= isset($errors['old_email']) ? 'is-invalid' : '' ?>" 
                                   value="<?= htmlspecialchars($_POST['old_email'] ?? '') ?>">
                            <?php if (isset($errors['old_email'])): ?>
                                <div class="invalid-feedback"><?= $errors['old_email'] ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Novo Email</label>
                            <input type="email" name="new_email" 
                                   class="form-control <?= isset($errors['new_email']) ? 'is-invalid' : '' ?>" 
                                   value="<?= htmlspecialchars($_POST['new_email'] ?? '') ?>">
                            <?php if (isset($errors['new_email'])): ?>
                                <div class="invalid-feedback"><?= $errors['new_email'] ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Nova Senha</label>
                            <input type="password" name="new_password" 
                                   class="form-control <?= isset($errors['new_password']) ? 'is-invalid' : '' ?>">
                            <?php if (isset($errors['new_password'])): ?>
                                <div class="invalid-feedback"><?= $errors['new_password'] ?></div>
                            <?php endif; ?>
                            <div class="password-rules mt-2">
                                🔒 Deve conter:
                                <ul class="list-unstyled">
                                    <li>• 8+ caracteres</li>
                                    <li>• 1 letra maiúscula</li>
                                    <li>• 1 letra minúscula</li>
                                    <li>• 1 número</li>
                                </ul>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-2">
                            <i class="bi bi-check2-circle me-2"></i>Atualizar
                        </button>

                        <div class="text-center mt-3">
                            <a href="Entrar.php" class="text-decoration-none">
                                ↩ Voltar para o login
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
