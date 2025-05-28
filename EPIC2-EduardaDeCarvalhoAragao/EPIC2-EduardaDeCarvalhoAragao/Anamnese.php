<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anamnese Nutricional - Nutrição Fitness</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        h1 {
            text-align: center;
        }

        .form-section {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .form-title {
            color: #0d6efd;
            border-bottom: 2px solid #0d6efd;
            padding-bottom: 5px;
            margin-bottom: 20px;
        }

        .restriction-badge {
            font-size: 0.9rem;
            margin-right: 5px;
            margin-bottom: 5px;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container py-5">
        <h1>Anamnese Nutricional Fitness</h1> <br>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0"><i class="bi bi-clipboard2-pulse"></i> Anamnese Nutricional Fitness</h3>
                        <p class="mb-0">Nosso foco: Dietas Low Carb, Alimentos Termogênicos e Doces Fitness</p>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="Processar.php">
                            <!-- Dados Pessoais -->
                            <div class="form-section">
                                <h4 class="form-title"><i class="bi bi-person"></i> Dados Pessoais</h4>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Nome Completo</label>
                                        <input type="text" name="nome" class="form-control" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Data de Nascimento</label>
                                        <input type="date" name="data_nascimento" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <!-- Perfil Alimentar -->
                            <div class="form-section">
                                <h4 class="form-title"><i class="bi bi-egg-fried"></i> Perfil Alimentar</h4>

                                <div class="mb-3">
                                    <label class="form-label">Quais destas abordagens você já experimentou?</label>
                                    <div class="d-flex flex-wrap">
                                        <span class="badge bg-info text-dark restriction-badge">
                                            <input type="checkbox" class="form-check-input me-1" name="abordagens[]"
                                                value="low_carb" id="low_carb">
                                            <label class="form-check-label" for="low_carb">Low Carb</label>
                                        </span>
                                        <span class="badge bg-warning text-dark restriction-badge">
                                            <input type="checkbox" class="form-check-input me-1" name="abordagens[]"
                                                value="termogenica" id="termogenica">
                                            <label class="form-check-label" for="termogenica">Termogênica</label>
                                        </span>
                                        <span class="badge bg-success text-white restriction-badge">
                                            <input type="checkbox" class="form-check-input me-1" name="abordagens[]"
                                                value="doces_fit" id="doces_fit">
                                            <label class="form-check-label" for="doces_fit">Doces Fitness</label>
                                        </span>
                                        <span class="badge bg-secondary text-white restriction-badge">
                                            <input type="checkbox" class="form-check-input me-1" name="abordagens[]"
                                                value="outra" id="outra_abordagem">
                                            <label class="form-check-label" for="outra_abordagem">Outra</label>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control mt-2" name="outra_abordagem_text"
                                        placeholder="Qual outra abordagem?">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Qual sua experiência com dietas low carb?</label>
                                    <select class="form-select" name="exp_lowcarb">
                                        <option value="nenhuma">Nenhuma experiência</option>
                                        <option value="pouca">Pouca experiência</option>
                                        <option value="moderada">Experiência moderada</option>
                                        <option value="muita">Muita experiência</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Quais alimentos termogênicos você consome
                                        regularmente?</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="termogenicos[]"
                                                    value="cafe" id="cafe">
                                                <label class="form-check-label" for="cafe">Café</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="termogenicos[]"
                                                    value="cha_verde" id="cha_verde">
                                                <label class="form-check-label" for="cha_verde">Chá Verde</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="termogenicos[]"
                                                    value="gengibre" id="gengibre">
                                                <label class="form-check-label" for="gengibre">Gengibre</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="termogenicos[]"
                                                    value="pimenta" id="pimenta">
                                                <label class="form-check-label" for="pimenta">Pimenta</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="termogenicos[]"
                                                    value="canela" id="canela">
                                                <label class="form-check-label" for="canela">Canela</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="termogenicos[]"
                                                    value="vinagre" id="vinagre">
                                                <label class="form-check-label" for="vinagre">Vinagre de Maçã</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Quais ingredientes você usa para preparar doces
                                        fitness?</label>
                                    <textarea class="form-control" name="ingredientes_doces" rows="3"
                                        placeholder="Ex: Banana, aveia, whey protein, cacau em pó..."></textarea>
                                </div>
                            </div>


                            <!-- Objetivos Fitness -->
                            <div class="form-section">
                                <h4 class="form-title"><i class="bi bi-bullseye"></i> Objetivos Fitness</h4>

                                <div class="mb-3">
                                    <label class="form-label">Qual seu principal objetivo com a alimentação?</label>
                                    <select class="form-select" name="objetivo_alimentacao">
                                        <option value="emagrecimento">Emagrecimento</option>
                                        <option value="definicao">Definição muscular</option>
                                        <option value="energia">Mais energia para treinos</option>
                                        <option value="saude">Melhoria da saúde</option>
                                        <option value="outro">Outro</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Qual dessas opções você mais tem interesse em
                                        receber?</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="interesse"
                                            id="receitas_lowcarb" value="receitas_lowcarb" checked>
                                        <label class="form-check-label" for="receitas_lowcarb">Receitas Low Carb</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="interesse"
                                            id="alimentos_termogenicos" value="alimentos_termogenicos">
                                        <label class="form-check-label" for="alimentos_termogenicos">Alimentos
                                            Termogênicos</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="interesse" id="doces_fitness"
                                            value="doces_fitness">
                                        <label class="form-check-label" for="doces_fitness">Doces Fitness</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="interesse" id="todos"
                                            value="todos">
                                        <label class="form-check-label" for="todos">Todos os tipos</label>
                                    </div>
                                </div>
                            </div>

                            <div class="d-grid gap-2 mt-4">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="bi bi-check-circle"></i> Enviar Anamnese
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>