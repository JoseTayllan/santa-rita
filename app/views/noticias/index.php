<?php $title = "Notícias - Paróquia Santa Rita"; ?>
<?php include __DIR__ . '/../layouts/header.php'; ?>

<div class="text-center mb-5">
  <h1 class="h3 text-gray-800">📰 Notícias da Paróquia Santa Rita</h1>
  <p class="text-muted">Avisos e próximos eventos da nossa comunidade</p>
</div>

<!-- Avisos -->
<h4 class="text-primary mb-3"><i class="fas fa-bullhorn"></i> Últimos Avisos</h4>
<div class="row row-cols-1 row-cols-md-2 g-5">
  <?php if (!empty($avisos)): ?>
    <?php foreach ($avisos as $aviso): ?>
      <div class="col">
        <div class="card shadow-sm h-100">
          <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($aviso['titulo']) ?></h5>
            <p class="card-text"><?= nl2br(htmlspecialchars($aviso['conteudo'])) ?></p>
            <span class="badge 
              <?= $aviso['tipo']=='Padre'?'bg-primary':(
                  $aviso['tipo']=='Comunicado Geral'?'bg-secondary':(
                      $aviso['tipo']=='Importante'?'bg-warning text-dark':'bg-danger'
              )) ?>">
              <?= $aviso['tipo'] ?>
            </span>
          </div>
          <div class="card-footer bg-white border-0">
            <small class="text-muted">
              Publicado por <?= htmlspecialchars($aviso['autor']) ?> 
              em <?= date('d/m/Y H:i', strtotime($aviso['criado_em'])) ?>
            </small>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  <?php else: ?>
    <p class="text-muted">Nenhum aviso encontrado.</p>
  <?php endif; ?>
</div>
<!-- Paginação Avisos -->
<nav class="mt-3">
  <ul class="pagination justify-content-center">
    <?php for ($i = 1; $i <= $totalPagesAvisos; $i++): ?>
      <li class="page-item <?= ($i == $pageAvisos) ? 'active' : '' ?>">
        <a class="page-link" href="index.php?r=noticias&pageAvisos=<?= $i ?>&pageEventos=<?= $pageEventos ?>"><?= $i ?></a>
      </li>
    <?php endfor; ?>
  </ul>
</nav>


<!-- Eventos -->
<h4 class="text-success mt-5 mb-3"><i class="fas fa-calendar-alt"></i> Próximos Eventos</h4>
<div class="row row-cols-1 row-cols-md-2 g-5">
  <?php if (!empty($eventos)): ?>
    <?php foreach ($eventos as $evento): ?>
      <div class="col">
        <div class="card border-success shadow-sm h-100">
          <div class="card-body">
            <h5 class="card-title text-success"><?= htmlspecialchars($evento['titulo']) ?></h5>
            <p class="card-text"><?= nl2br(htmlspecialchars($evento['descricao'])) ?></p>
            <span class="badge bg-success"><?= date('d/m/Y H:i', strtotime($evento['data_inicio'])) ?></span>
            <p class="mt-2 mb-0"><i class="fas fa-map-marker-alt"></i> <?= htmlspecialchars($evento['local']) ?></p>
          </div>
          <div class="card-footer bg-white border-0">
            <small class="text-muted">
              Publicado por <?= htmlspecialchars($evento['autor']) ?> 
              em <?= date('d/m/Y H:i', strtotime($evento['criado_em'])) ?>
            </small>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  <?php else: ?>
    <p class="text-muted">Nenhum evento futuro encontrado.</p>
  <?php endif; ?>
</div>
<!-- Paginação Eventos -->
<nav class="mt-3">
  <ul class="pagination justify-content-center">
    <?php for ($i = 1; $i <= $totalPagesEventos; $i++): ?>
      <li class="page-item <?= ($i == $pageEventos) ? 'active' : '' ?>">
        <a class="page-link" href="index.php?r=noticias&pageEventos=<?= $i ?>&pageAvisos=<?= $pageAvisos ?>"><?= $i ?></a>
      </li>
    <?php endfor; ?>
  </ul>
</nav>

<?php include __DIR__ . '/../layouts/footer.php'; ?>
