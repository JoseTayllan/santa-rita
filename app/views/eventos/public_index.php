<?php $title = "Eventos"; ?>
<?php include __DIR__ . '/../layouts/header.php'; ?>

<div class="container my-5">
  <h1 class="mb-4">📅 Eventos da Paróquia</h1>
  <div class="row">
    <?php if (!empty($eventos)): ?>
      <?php foreach ($eventos as $evento): ?>
        <div class="col-md-4 mb-4">
          <div class="card shadow-sm h-100">
            <div class="card-body">
              <h5 class="card-title"><?= htmlspecialchars($evento['titulo']) ?></h5>
              <p class="card-text text-muted">
                <?= date("d/m/Y H:i", strtotime($evento['data_inicio'])) ?>
              </p>
              <p class="card-text"><?= substr($evento['descricao'], 0, 80) ?>...</p>
              <a href="index.php?r=eventos-publicos/show&id=<?= $evento['id'] ?>" class="btn btn-primary btn-sm">Ver detalhes</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <p class="text-muted">Nenhum evento cadastrado.</p>
    <?php endif; ?>
  </div>
</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>
