<?php $title = "Avisos - Administração"; ?>
<?php include __DIR__ . '/../layouts/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
  <h1 class="h3 text-gray-800">📢 Gerenciar Avisos</h1>
  <div>
    <a href="index.php?r=devdashboard" class="btn btn-outline-primary btn-sm me-2">
      <i class="fas fa-home"></i> Dashboard
    </a>
    <a href="index.php?r=avisos/create" class="btn btn-primary">
      <i class="fas fa-plus"></i> Novo Aviso
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
            <th>Conteúdo</th>
            <th>Tipo</th>
            <th>Autor</th>
            <th>Data</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($avisos)): ?>
            <?php foreach ($avisos as $aviso): ?>
              <tr>
                <td><?= htmlspecialchars($aviso['titulo']) ?></td>
                <td class="text-truncate" style="max-width: 200px;">
                  <?= htmlspecialchars($aviso['conteudo']) ?>
                </td>
                <td>
                  <?php
                    $tipo = $aviso['tipo'];
                    $badgeClass = match($tipo) {
                      'Padre' => 'bg-primary',
                      'Comunicado Geral' => 'bg-secondary',
                      'Importante' => 'bg-warning text-dark',
                      'Urgente' => 'bg-danger',
                      default => 'bg-light text-dark'
                    };
                  ?>
                  <span class="badge <?= $badgeClass ?>"><?= $tipo ?></span>
                </td>
                <td><?= htmlspecialchars($aviso['autor']) ?></td>
                <td><?= date('d/m/Y H:i', strtotime($aviso['criado_em'])) ?></td>
                <td>
                  <a href="index.php?r=avisos/edit&id=<?= $aviso['id'] ?>" class="btn btn-sm btn-warning">
                    <i class="fas fa-edit"></i>
                  </a>
                  <a href="index.php?r=avisos/delete&id=<?= $aviso['id'] ?>" 
                     class="btn btn-sm btn-danger"
                     onclick="return confirm('Tem certeza que deseja excluir este aviso?')">
                    <i class="fas fa-trash"></i>
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="6" class="text-center text-muted">Nenhum aviso cadastrado.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>
