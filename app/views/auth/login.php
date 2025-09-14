<?php $title = "Login - Paróquia Santa Rita"; ?>
<?php include __DIR__ . '/../layouts/header.php'; ?>

<div class="row justify-content-center">
  <div class="col-md-6 col-lg-4">
    <div class="card shadow-sm">
      <div class="card-body">
        <h4 class="text-center text-primary mb-4">
          <i class="fas fa-user-lock"></i> Acesso ao Sistema
        </h4>

        <?php if (!empty($erro)): ?>
          <div class="alert alert-danger">Usuário ou senha inválidos.</div>
        <?php endif; ?>

        <?php if (!empty($msg) && $msg === "cadastro_ok"): ?>
          <div class="alert alert-success">Conta criada com sucesso! Faça login para continuar.</div>
        <?php endif; ?>

        <form method="post" action="index.php?r=autenticar">
          <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="mb-3">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" class="form-control" id="senha" name="senha" required>
          </div>
          <button type="submit" class="btn btn-primary w-100">
            <i class="fas fa-sign-in-alt"></i> Entrar
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>
