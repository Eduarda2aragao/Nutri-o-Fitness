<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anamnese-Enviada</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Alegreya', serif;
            background-image: url('img/Design-sem-nome-4.png');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        
        .success-container {
            max-width: 600px;
            margin: 2rem auto;
            padding: 2.5rem;
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            border: 1px solid rgba(0, 0, 0, 0.1);
        }
        
        .success-icon {
            font-size: 5rem;
            color: #28a745;
            margin-bottom: 1.5rem;
            animation: bounce 1s;
        }
        
        .success-title {
            color: #2c3e50;
            font-weight: 700;
            margin-bottom: 1.5rem;
            font-size: 2.2rem;
        }
        
        .success-text {
            color: #495057;
            font-size: 1.2rem;
            margin-bottom: 2rem;
            line-height: 1.6;
        }
        
        .next-steps {
            background-color: #e9f7ef;
            border-left: 4px solid #28a745;
            padding: 1rem;
            margin: 2rem 0;
            text-align: left;
            border-radius: 0 8px 8px 0;
        }
        
        .btn-next {
            background: linear-gradient(45deg, #0047ab, #007cf0);
            color: white;
            padding: 0.8rem 2.5rem;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            text-decoration: none;
            display: inline-block;
            font-size: 1.1rem;
            margin-top: 1rem;
        }
        
        .btn-next:hover {
            background: linear-gradient(45deg, #007cf0, #0047ab);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 123, 255, 0.3);
            color: white;
        }
        
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {transform: translateY(0);}
            40% {transform: translateY(-20px);}
            60% {transform: translateY(-10px);}
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="success-container">
            <div class="success-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <h1 class="success-title">Anamnese Enviada com Sucesso!</h1>
            <p class="success-text">
                Obrigado por completar seu formulário de anamnese nutricional.
            </p>
            <a href="MeuPerfil.php" class="btn-next">
                <i class="fas fa-user-circle me-2"></i>Acessar Meu Perfil
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>