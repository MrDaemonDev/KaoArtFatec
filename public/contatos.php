<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <title>Contatos - KaoArt</title>
</head>
<body>


<?php
    include ("../includes/header.php");
?>


<section class="text-center py-5" style="background-color: #f3f3f3;">
  <div class="container">
    <h1 class="fw-bold mb-3" style="color:#4B2C83;">Fale Conosco</h1>
    <p class="lead">Estamos aqui para ajudar você! Entre em contato pelo formulário ou por nossas redes.</p>
  </div>
</section>

<!-- Cards de Contato -->
<section class="py-5">
  <div class="container">
    <div class="row g-4 justify-content-center">
      <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100 text-center p-4">
          <i class="bi bi-envelope-fill fs-1 mb-3" style="color:#4B2C83;"></i>
          <h5>Email</h5>
          <p><a href="mailto:contato@kaoart.com.br">contato@kaoart.com.br</a></p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100 text-center p-4">
          <i class="bi bi-telephone-fill fs-1 mb-3" style="color:#4B2C83;"></i>
          <h5>Telefone</h5>
          <p><a href="tel:+5511999999999">(11) 99999-9999</a></p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100 text-center p-4">
          <i class="bi bi-chat-dots-fill fs-1 mb-3" style="color:#4B2C83;"></i>
          <h5>Mensagem</h5>
          <p><a href="mailto:contato@kaoart.com.br" class="btn btn-primary mt-2">Enviar Mensagem</a></p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Formulário de Contato -->
<section class="py-5" style="background-color:#f3f3f3;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="card shadow border-0 p-4">
          <h3 class="mb-4" style="color:#4B2C83;">Envie sua mensagem</h3>
          <form>
            <div class="row g-3">
              <div class="col-md-6">
                <input type="text" class="form-control form-control-lg" placeholder="Seu nome">
              </div>
              <div class="col-md-6">
                <input type="email" class="form-control form-control-lg" placeholder="Seu email">
              </div>
              <div class="col-12">
                <textarea class="form-control form-control-lg" rows="5" placeholder="Sua mensagem"></textarea>
              </div>
              <div class="col-12 text-center">
                <button type="submit" class="btn btn-lg btn-primary mt-3">Enviar Mensagem</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>


<footer class=" text-light text-center py-3">
  &copy; KaoArt 2026. Todos os direitos reservados.
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>