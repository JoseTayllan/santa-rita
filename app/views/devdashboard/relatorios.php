<?php $title = "Relatórios do Sistema"; ?>
<?php include __DIR__ . '/../layouts/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
  <h1 class="h3 text-gray-800">📊 Relatórios do Sistema</h1>
  <div>
    <a href="index.php?r=devdashboard" class="btn btn-outline-primary btn-sm">
      <i class="fas fa-home"></i> Dashboard
    </a>
  </div>
</div>

<div class="container-lg">
  <!-- Cards resumo -->
  <div class="row g-4 mb-4">
    <div class="col-12 col-md-4">
      <div class="card bg-primary text-white shadow-sm h-100">
        <div class="card-body text-center">
          <h5><i class="fas fa-bullhorn"></i> Avisos</h5>
          <h3><?= $totalAvisos ?? 0 ?></h3>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-4">
      <div class="card bg-success text-white shadow-sm h-100">
        <div class="card-body text-center">
          <h5><i class="fas fa-calendar-alt"></i> Eventos</h5>
          <h3><?= $totalEventos ?? 0 ?></h3>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-4">
      <div class="card bg-info text-white shadow-sm h-100">
        <div class="card-body text-center">
          <h5><i class="fas fa-users"></i> Usuários</h5>
          <h3><?= $totalUsuarios ?? 0 ?></h3>
        </div>
      </div>
    </div>
  </div>

  <!-- Gráficos -->
  <div class="row g-4">
    <!-- Avisos por Tipo -->
    <div class="col-12 col-lg-6">
      <div class="card shadow-sm h-100">
        <div class="card-body">
          <h5 class="card-title">Avisos por Tipo</h5>
          <?php if (empty($avisosPorTipo)): ?>
            <p class="text-muted">Sem dados disponíveis.</p>
          <?php else: ?>
            <canvas id="chartAvisos"></canvas>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <!-- Eventos por Mês -->
    <div class="col-12 col-lg-6">
      <div class="card shadow-sm h-100">
        <div class="card-body">
          <h5 class="card-title">Eventos por Mês</h5>
          <?php if (empty($eventosPorMes)): ?>
            <p class="text-muted">Sem dados disponíveis.</p>
          <?php else: ?>
            <canvas id="chartEventos"></canvas>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

  <div class="row g-4 mt-1">
  <!-- Usuários por Role -->
  <div class="col-12 col-lg-6 offset-lg-3">
    <div class="card shadow-sm">
      <div class="card-body">
        <h5 class="card-title text-center">Usuários por Papel</h5>
        <?php if (empty($usuariosPorRole)): ?>
          <p class="text-muted text-center">Sem dados disponíveis.</p>
        <?php else: ?>
          <canvas id="chartUsuarios"></canvas>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  <?php if (!empty($avisosPorTipo)): ?>
  new Chart(document.getElementById('chartAvisos'), {
    type: 'pie',
    data: {
      labels: <?= json_encode(array_column($avisosPorTipo, 'tipo')) ?>,
      datasets: [{
        data: <?= json_encode(array_column($avisosPorTipo, 'total')) ?>,
        backgroundColor: ['#007bff','#28a745','#ffc107','#dc3545']
      }]
    }
  });
  <?php endif; ?>

  <?php if (!empty($eventosPorMes)): ?>
  new Chart(document.getElementById('chartEventos'), {
    type: 'bar',
    data: {
      labels: <?= json_encode(array_column($eventosPorMes, 'mes')) ?>,
      datasets: [{
        label: 'Eventos',
        data: <?= json_encode(array_column($eventosPorMes, 'total')) ?>,
        backgroundColor: '#17a2b8'
      }]
    }
  });
  <?php endif; ?>

  <?php if (!empty($usuariosPorRole)): ?>
  new Chart(document.getElementById('chartUsuarios'), {
    type: 'doughnut',
    data: {
      labels: <?= json_encode(array_column($usuariosPorRole, 'role')) ?>,
      datasets: [{
        data: <?= json_encode(array_column($usuariosPorRole, 'total')) ?>,
        backgroundColor: ['#6f42c1','#20c997','#fd7e14','#6610f2','#e83e8c','#28a745']
      }]
    }
  });
  <?php endif; ?>
</script>

<?php include __DIR__ . '/../layouts/footer.php'; ?>
