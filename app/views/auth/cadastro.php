<?php $title = "Cadastro - Paróquia Santa Rita"; ?>
<?php include __DIR__ . '/../layouts/header.php'; ?>

<div class="row justify-content-center">
  <div class="col-md-6 col-lg-4">
    <div class="card shadow-sm">
      <div class="card-body">
        <h4 class="text-center text-success mb-4">
          <i class="fas fa-user-plus"></i> Criar Conta
        </h4>

        <?php if (!empty($_GET['erro'])): ?>
          <div class="alert alert-danger">Preencha todos os campos corretamente.</div>
        <?php endif; ?>

        <form method="post" action="index.php?r=cadastro/store">
          <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="mb-3">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" class="form-control" id="senha" name="senha" required>
          </div>
          <button type="submit" class="btn btn-success w-100">
            <i class="fas fa-save"></i> Cadastrar
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>
