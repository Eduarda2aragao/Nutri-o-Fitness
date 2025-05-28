<?php
// Configurações do banco de dados
$host = 'localhost';
$dbname = 'nutricao';
$username = 'root';
$password = '';

try {
    // Conexão com o banco de dados
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Recebe os dados do formulário (esperando JSON via fetch/AJAX)
    $data = json_decode(file_get_contents('php://input'), true);

    // Sanitização dos dados
    $nome = filter_var($data['nome'], FILTER_SANITIZE_STRING);
    $categoria = filter_var($data['categoria'], FILTER_SANITIZE_STRING);
    $imagem = filter_var($data['imagem'], FILTER_SANITIZE_STRING);
    $ingredientes = filter_var($data['ingredientes'], FILTER_SANITIZE_STRING);
    $modoPreparo = filter_var($data['modo_preparo'], FILTER_SANITIZE_STRING);
    $observacoes = filter_var($data['observacoes'], FILTER_SANITIZE_STRING);

    // Prepara e executa a query
    $stmt = $conn->prepare("INSERT INTO receitas (nome, categoria, imagem, ingredientes, modo_preparo, observacoes) 
                           VALUES (:nome, :categoria, :imagem , :ingredientes, :modo_preparo, :observacoes)");

    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':categoria', $categoria);
    $stmt->bindParam(':imagem', $imagem);
    $stmt->bindParam(':ingredientes', $ingredientes);
    $stmt->bindParam(':modo_preparo', $modoPreparo);
    $stmt->bindParam(':observacoes', $observacoes);

    $stmt->execute();

    echo json_encode(['success' => true, 'message' => 'Receita salva com sucesso!']);

} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Erro ao salvar receita: ' . $e->getMessage()]);
}
?>