<style>
    .thank-you-message {
  background: linear-gradient(135deg, rgba(0,71,171,0.1) 0%, rgba(0,124,240,0.1) 100%);
  border: 1px solid rgba(0,71,171,0.2);
  border-radius: 15px;
  padding: 30px;
  margin: 20px 0;
  text-align: center;
  animation: fadeIn 0.5s ease-out;
}

.thank-you-container {
  max-width: 500px;
  margin: 0 auto;
}

.thank-you-icon {
  margin-bottom: 20px;
  animation: bounce 0.6s;
}

.thank-you-title {
  color: #0047ab;
  font-weight: 700;
  margin-bottom: 15px;
  font-size: 1.8rem;
}

.thank-you-text {
  color: #333;
  font-size: 1.1rem;
  margin-bottom: 20px;
}

.thank-you-rating {
  margin: 20px 0;
}

.thank-you-button {
  display: inline-block;
  background: linear-gradient(to right, #0047ab, #007cf0);
  color: white;
  padding: 10px 25px;
  border-radius: 30px;
  text-decoration: none;
  font-weight: 600;
  transition: all 0.3s ease;
  border: none;
  margin-top: 15px;
}

.thank-you-button:hover {
  background: linear-gradient(to right, #007cf0, #0047ab);
  transform: translateY(-2px);
  box-shadow: 0 5px 15px rgba(0,71,171,0.2);
  color: white;
}

@keyframes bounce {
  0%, 20%, 50%, 80%, 100% {transform: translateY(0);}
  40% {transform: translateY(-20px);}
  60% {transform: translateY(-10px);}
}
    </style>
<?php
    // Verifica se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Processa os dados
        $nome = $_POST['nome'] ?? 'Anônimo';
        $avaliacao = (int)($_POST['rating'] ?? 0);
        $comentario = $_POST['comentario'] ?? '';
        
        // Níveis de satisfação
        $niveis = [1 => 'Ruim', 2 => 'Regular', 3 => 'Bom', 4 => 'Ótimo', 5 => 'Excelente'];
        
        // Salva os dados (simulação com arquivo texto)
        $dados = [
            'data' => date('d/m/Y H:i:s'),
            'nome' => $nome,
            'avaliacao' => $avaliacao,
            'nivel' => $niveis[$avaliacao] ?? 'Não informado',
            'comentario' => $comentario
        ];
        
        file_put_contents('avaliacoes.txt', json_encode($dados).PHP_EOL, FILE_APPEND);
        
       
        // Mostra mensagem de agradecimento
        echo '<div class="thank-you-message">';
        echo '  <div class="thank-you-container">';
        echo '    <div class="thank-you-icon">';
        echo '      <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="#0047ab" viewBox="0 0 16 16">';
        echo '        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>';
        echo '      </svg>';
        echo '    </div>';
        echo '    <h4 class="thank-you-title">Obrigado por sua avaliação!</h4>';
        echo '    <p class="thank-you-text">Sua opinião é valiosa para continuarmos melhorando.</p>';
        echo '    <div class="thank-you-rating">';
        echo '      <span class="badge bg-primary">Você nos avaliou com: '.$niveis[$avaliacao].'</span>';
        echo '    </div>';
        echo '    <a href="duvidasfrequentes.php" class="thank-you-button">Voltar às Dúvidas Frequentes</a>';
        echo '  </div>';
        echo '</div>';
        
    } else {
    ?>
    
    <form class="rating-form" method="POST">
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
    
    <?php } ?>
  </div>