<?php $title = "Contato - Paróquia Santa Rita"; ?>
<?php include __DIR__ . '/../layouts/header.php'; ?>

<div class="container my-5">
  <h1 class="mb-4 text-primary"><i class="fas fa-envelope"></i> Contato & Informações</h1>

  <div class="row">
    <!-- Informações de contato -->
    <div class="col-md-6 mb-4">
      <div class="card shadow-sm h-100">
        <div class="card-body">
          <h5 class="card-title">📍 Endereço</h5>
          <p class="card-text">
            Rua Principal, 123 - Centro <br>
            Cidade - Estado, CEP 00000-000
          </p>

          <h5 class="card-title mt-4">📞 Telefone</h5>
          <p class="card-text">(00) 1234-5678</p>

          <h5 class="card-title mt-4">📧 E-mail</h5>
          <p class="card-text">contato@santarita.com</p>
        </div>
      </div>
    </div>

    <!-- Mapa -->
    <div class="col-md-6 mb-4">
      <div class="card shadow-sm h-100">
        <div class="card-body">
          <h5 class="card-title">🗺️ Localização</h5>
          <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3656.54864387022!2d-46.63330958502134!3d-23.588156784669745!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce59b0b5f44a8b%3A0xf7c10e25d0fdf9f4!2sPar%C3%B3quia!5e0!3m2!1spt-BR!2sbr!4v1699999999999!5m2!1spt-BR!2sbr" 
            width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
      </div>
    </div>
  </div>

  <!-- Formulário de contato -->
  <div class="row mt-4">
    <div class="col-md-12">
      <div class="card shadow-sm">
        <div class="card-body">
          <h5 class="card-title">✉️ Enviar uma mensagem</h5>
          <form method="post" action="#">
            <div class="mb-3">
              <label class="form-label">Nome</label>
              <input type="text" class="form-control" name="nome" required>
            </div>
            <div class="mb-3">
              <label class="form-label">E-mail</label>
              <input type="email" class="form-control" name="email" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Mensagem</label>
              <textarea class="form-control" name="mensagem" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>
