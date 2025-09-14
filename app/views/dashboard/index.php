<?php $title = "Dashboard - Administração"; ?>
<?php include __DIR__ . '/../layouts/header.php'; ?>

<div class="container-fluid">

  <!-- Título -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Painel Administrativo</h1>
    <a href="index.php?r=logout" class="btn btn-danger btn-sm">
      <i class="fas fa-sign-out-alt"></i> Sair
    </a>
  </div>

  <!-- Cards de Resumo -->
  <div class="row">
    <!-- Avisos -->
    <div class="col-xl-3 col-md-6 mb-4">
      <a href="index.php?r=avisos" class="text-decoration-none">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                  Avisos</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">12</div>
                <small class="text-muted">Gerenciar e criar avisos</small>
              </div>
              <div class="col-auto">
                <i class="fas fa-bullhorn fa-2x text-primary"></i>
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>

    <!-- Eventos -->
    <div class="col-xl-3 col-md-6 mb-4">
      <a href="index.php?r=eventos" class="text-decoration-none">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                  Eventos</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">8</div>
                <small class="text-muted">Cadastrar e editar eventos</small>
              </div>
              <div class="col-auto">
                <i class="fas fa-calendar-alt fa-2x text-success"></i>
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>

    <!-- Usuários -->
    <div class="col-xl-3 col-md-6 mb-4">
     
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                  Usuários</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">25</div>
                <p class="card-text">
                  🔒 Acesso restrito: Apenas Engenheiros
                </p>
              </div>
              <div class="col-auto">
                <i class="fas fa-users fa-2x text-info"></i>
              </div>
            </div>
          </div>
        </div>
    </div>

    <!-- Acessos -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                Acessos Hoje</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">154</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-chart-line fa-2x text-warning"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ... resto do dashboard (gráficos, tabela etc.) ... -->

</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>