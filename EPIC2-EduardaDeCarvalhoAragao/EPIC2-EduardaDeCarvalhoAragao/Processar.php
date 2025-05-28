<?php

//processar Anamnese

// Conexão com o banco de dados
$mysqli = new mysqli("localhost", "root", "", "nutricao");

// Verifica erros de conexão
if ($mysqli->connect_errno) {
    die("Erro na conexão: " . $mysqli->connect_error);
}

// Função para sanitizar dados
function sanitizar($dado) {
    return htmlspecialchars(trim($dado ?? ''), ENT_QUOTES, 'UTF-8');
}

// Processar o formulário quando enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Dados Pessoais
    $nome = sanitizar($_POST['nome']);
    $data_nascimento = sanitizar($_POST['data_nascimento']);
    
    // Perfil Alimentar
    $abordagens = isset($_POST['abordagens']) ? implode(", ", array_map('sanitizar', $_POST['abordagens'])) : 'Nenhuma';
    $outra_abordagem = isset($_POST['outra_abordagem_text']) ? sanitizar($_POST['outra_abordagem_text']) : '';
    $exp_lowcarb = sanitizar($_POST['exp_lowcarb']);
    $termogenicos = isset($_POST['termogenicos']) ? implode(", ", array_map('sanitizar', $_POST['termogenicos'])) : 'Nenhum';
    $ingredientes_doces = sanitizar($_POST['ingredientes_doces']);
    
    // Objetivos
    $objetivo_alimentacao = sanitizar($_POST['objetivo_alimentacao']);
    $interesse = sanitizar($_POST['interesse']);
    
    // Inserir no banco de dados
    try {
        $stmt = $mysqli->prepare("INSERT INTO anamnese_restricoes (
            nome, data_nascimento,
            abordagens, outra_abordagem, exp_lowcarb, termogenicos, ingredientes_doces,
            objetivo_alimentacao, interesse, data_registro
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");
        
        $stmt->bind_param("sssssssss", 
            $nome, $data_nascimento,
            $abordagens, $outra_abordagem, $exp_lowcarb, $termogenicos, $ingredientes_doces,
            $objetivo_alimentacao, $interesse
        );
        
        if ($stmt->execute()) {
            header("Location: Agradecimento.php");
            exit;
        } else {
            throw new Exception("Erro ao salvar os dados: " . $stmt->error);
        }

        $stmt->close();
    } catch (Exception $e) {
        die("Erro: " . $e->getMessage());
    }

    $mysqli->close();
} else {
    header("Location: anamnese.php");
    exit;
}
?>
