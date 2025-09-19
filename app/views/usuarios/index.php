<?php $title = "Usuários - Administração"; ?>
<?php include __DIR__ . '/../layouts/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
  <h1 class="h3 text-gray-800">👥 Gerenciar Usuários</h1>
  <div>
    <a href="index.php?r=devdashboard" class="btn btn-outline-primary btn-sm me-2">
      <i class="fas fa-home"></i> Dashboard
    </a>
    <a href="index.php?r=usuarios/create" class="btn btn-primary btn-sm">
      <i class="fas fa-user-plus"></i> Novo Usuário
    </a>
  </div>
</div>

<div class="card shadow-sm">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-striped table-hover align-middle">
        <thead class="table-dark">
          <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Papel</th>
            <th>Criado em</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($usuarios)): ?>
            <?php foreach ($usuarios as $u): ?>
              <tr>
                <td><?= htmlspecialchars($u['nome']) ?></td>
                <td><?= htmlspecialchars($u['email']) ?></td>
                <td><span class="badge bg-secondary"><?= htmlspecialchars($u['role']) ?></span></td>
                <td><?= date('d/m/Y H:i', strtotime($u['criado_em'])) ?></td>
                <td>
                  <a href="index.php?r=usuarios/edit&id=<?= $u['id'] ?>" 
                     class="btn btn-sm btn-warning" title="Editar">
                    <i class="fas fa-edit"></i>
                  </a>
                  <a href="index.php?r=usuarios/delete&id=<?= $u['id'] ?>" 
                     class="btn btn-sm btn-danger"
                     onclick="return confirm('Tem certeza que deseja excluir este usuário?')"
                     title="Excluir">
                    <i class="fas fa-trash"></i>
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="5" class="text-center text-muted">Nenhum usuário cadastrado.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>
