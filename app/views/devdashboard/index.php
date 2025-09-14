<?php $title = "Dashboard DevAdmin"; ?>
<?php include __DIR__ . '/../layouts/header.php'; ?>

<div class="text-center mb-5">
  <h1 class="h3 text-gray-800">👨‍💻 Painel do DevAdmin</h1>
  <p class="text-muted">Gerenciamento avançado do sistema.</p>
</div>

<div class="row row-cols-1 row-cols-md-2 g-4">
  <div class="col">
    <div class="card shadow-sm h-100">
      <div class="card-body text-center">
        <i class="fas fa-users-cog fa-2x text-primary mb-3"></i>
        <h5 class="card-title">Gerenciar Usuários</h5>
        <p class="card-text text-muted">Controle total sobre logins e permissões.</p>
        <a href="index.php?r=usuarios" class="btn btn-primary btn-sm">Acessar</a>
      </div>
    </div>
  </div>

  <div class="col">
    <div class="card shadow-sm h-100">
      <div class="card-body text-center">
        <i class="fas fa-cogs fa-2x text-success mb-3"></i>
        <h5 class="card-title">Configurações do Sistema</h5>
        <p class="card-text text-muted">Gerenciar papéis, parâmetros e manutenção.</p>
        <a href="#" class="btn btn-success btn-sm disabled">Em breve</a>
      </div>
    </div>
  </div>
</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>
