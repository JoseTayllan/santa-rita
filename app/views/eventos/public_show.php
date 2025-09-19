<?php $title = "Detalhes do Evento"; ?>
<?php include __DIR__ . '/../layouts/header.php'; ?>

<div class="container my-5">
  <?php if ($evento): ?>
    <h1 class="mb-3"><?= htmlspecialchars($evento['titulo']) ?></h1>
    <p><strong>📍 Local:</strong> <?= htmlspecialchars($evento['local']) ?></p>
    <p><strong>🕒 Data:</strong> <?= date("d/m/Y H:i", strtotime($evento['data_inicio'])) ?></p>
    <?php if ($evento['data_fim']): ?>
      <p><strong>Até:</strong> <?= date("d/m/Y H:i", strtotime($evento['data_fim'])) ?></p>
    <?php endif; ?>
    <p class="mt-4"><?= nl2br(htmlspecialchars($evento['descricao'])) ?></p>
  <?php else: ?>
    <p class="text-danger">Evento não encontrado.</p>
  <?php endif; ?>
  <a href="index.php?r=eventos-publicos" class="btn btn-secondary mt-3">⬅ Voltar</a>
</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>
