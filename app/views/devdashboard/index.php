<?php $title = "Dashboard DevAdmin"; ?>
<?php include __DIR__ . '/../layouts/header.php'; ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <div>
    <h1 class="h3 mb-0 text-gray-800">👨‍💻 Painel do DevAdmin</h1>
    <p class="text-muted">Gerenciamento avançado do sistema.</p>
  </div>
  <a href="index.php?r=logout" class="btn btn-danger btn-sm">
    <i class="fas fa-sign-out-alt"></i> Sair
  </a>
</div>

<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">

  <!-- Card: Gerenciar Usuários -->
  <div class="col mb-4">
    <div class="card shadow-sm h-100 p-3">
      <div class="card-body text-center">
        <i class="fas fa-users-cog fa-2x text-primary mb-4"></i>
        <h5 class="card-title mb-3">Gerenciar Usuários</h5>
        <p class="card-text text-muted mb-4">Controle total sobre logins e permissões.</p>
        <a href="index.php?r=usuarios" class="btn btn-primary btn-sm px-4">Acessar</a>
      </div>
    </div>
  </div>

  <!-- Card: Configurações do Sistema -->
  <div class="col mb-4">
    <div class="card shadow-sm h-100 p-3">
      <div class="card-body text-center">
        <i class="fas fa-cogs fa-2x text-success mb-4"></i>
        <h5 class="card-title mb-3">Configurações do Sistema</h5>
        <p class="card-text text-muted mb-4">Gerenciar papéis, parâmetros e manutenção.</p>
        <a href="#" class="btn btn-success btn-sm px-4 disabled">Em breve</a>
      </div>
    </div>
  </div>

  <!-- Card: Relatórios -->
  <div class="col mb-4">
    <div class="card shadow-sm h-100 p-3">
      <div class="card-body text-center">
        <i class="fas fa-chart-line fa-2x text-info mb-4"></i>
        <h5 class="card-title mb-3">Relatórios</h5>
        <p class="card-text text-muted mb-4">Estatísticas do sistema.</p>
        <a href="index.php?r=relatorios" class="btn btn-info btn-sm px-4">Acessar</a>
      </div>
    </div>
  </div>

  <!-- Card: Segurança e Backup -->
  <div class="col mb-4">
    <div class="card shadow-sm h-100 p-3">
      <div class="card-body text-center">
        <i class="fas fa-shield-alt fa-2x text-danger mb-4"></i>
        <h5 class="card-title mb-3">Segurança e Backup</h5>
        <p class="card-text text-muted mb-4">Gerenciar segurança do sistema e cópias de dados.</p>
        <a href="index.php?r=seguranca-backup" class="btn btn-danger btn-sm px-4 disabled">Em breve</a>
      </div>
    </div>
  </div>

</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>
