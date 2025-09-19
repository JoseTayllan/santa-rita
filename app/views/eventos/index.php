<?php $title = "Eventos - Administração"; ?>
<?php include __DIR__ . '/../layouts/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
  <h1 class="h3 text-gray-800">📅 Gerenciar Eventos</h1>
  <div>
    <a href="index.php?r=dashboard" class="btn btn-outline-primary btn-sm">
      <i class="fas fa-home"></i> Dashboard
    </a>
    <a href="index.php?r=eventos/create" class="btn btn-success">
      <i class="fas fa-plus"></i> Novo Evento
    </a>
  </div>
</div>

<div class="card shadow-sm">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-striped table-hover align-middle">
        <thead class="table-dark">
          <tr>
            <th>Título</th>
            <th>Descrição</th>
            <th>Data</th>
            <th>Local</th>
            <th>Autor</th>
            <th class="text-center">Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($eventos)): ?>
            <?php foreach ($eventos as $evento): ?>
              <tr>
                <td><?= htmlspecialchars($evento['titulo']) ?></td>
                <td class="text-truncate" style="max-width:220px;">
                  <?= htmlspecialchars($evento['descricao']) ?>
                </td>
                <td><?= date('d/m/Y H:i', strtotime($evento['data_inicio'])) ?></td>
                <td><?= htmlspecialchars($evento['local']) ?></td>
                <td><?= htmlspecialchars($evento['autor']) ?></td>
                <td class="text-center">
                  <a href="index.php?r=eventos/edit&id=<?= $evento['id'] ?>" class="btn btn-sm btn-warning">
                    <i class="fas fa-edit"></i>
                  </a>
                  <a href="index.php?r=eventos/delete&id=<?= $evento['id'] ?>" 
                     class="btn btn-sm btn-danger"
                     onclick="return confirm('Tem certeza que deseja excluir este evento?')">
                    <i class="fas fa-trash"></i>
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="6" class="text-center text-muted">Nenhum evento cadastrado.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>
