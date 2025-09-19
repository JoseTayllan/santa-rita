
<?php $title = "Início - Paróquia Santa Rita"; ?>
<?php include __DIR__ . '/../layouts/header.php'; ?>

<!-- Hero -->
<div class="row justify-content-center text-center my-5">
  <div class="col-lg-8">
    <h1 class="display-5 fw-bold text-primary mb-3">
      <i class="fas fa-church"></i> Bem-vindo à Paróquia Santa Rita
    </h1>
    <p class="lead text-muted mb-4">
      Aqui você encontra avisos, comunicados e próximos eventos da nossa comunidade.
    </p>
    <div class="d-flex flex-column flex-md-row justify-content-center gap-5">
      <a href="index.php?r=noticias" class="btn btn-primary btn-lg px-4">
        <i class="fas fa-bullhorn"></i> Ver Todas Notícias
      </a>

      <?php if (empty($_SESSION['usuario'])): ?>
        <!-- Visitante (não logado) -->
        <a href="index.php?r=login" class="btn btn-outline-primary btn-lg px-4">
          <i class="fas fa-sign-in-alt"></i> Login
        </a>
        <a href="index.php?r=cadastro" class="btn btn-outline-success btn-lg px-4">
          <i class="fas fa-user-plus"></i> Cadastre-se
        </a>
      <?php else: ?>
        <!-- Usuário logado -->
        <a href="index.php?r=logout" class="btn btn-outline-danger btn-lg px-4">
          <i class="fas fa-sign-out-alt"></i> Sair
        </a>
      <?php endif; ?>
    </div>
  </div>
</div>

<!-- Mensagem flash -->
<?php if (!empty($_SESSION['flash'])): ?>
  <div class="alert alert-success text-center">
    <?= $_SESSION['flash'] ?>
  </div>
  <?php unset($_SESSION['flash']); ?>
<?php endif; ?>

<!-- Últimos Avisos -->
<div class="mb-5">
  <h3 class="text-primary mb-3"><i class="fas fa-bullhorn"></i> Últimos Avisos</h3>
  <div class="row row-cols-1 row-cols-md-2 g-4">
    <?php if (!empty($avisos)): ?>
      <?php foreach ($avisos as $aviso): ?>
        <div class="col">
          <div class="card shadow-sm h-100">
            <div class="card-body">
              <h5 class="card-title"><?= htmlspecialchars($aviso['titulo']) ?></h5>
              <p class="card-text"><?= nl2br(htmlspecialchars($aviso['conteudo'])) ?></p>
              <span class="badge 
                <?= $aviso['tipo'] == 'Padre' ? 'bg-primary' : (
                  $aviso['tipo'] == 'Comunicado Geral' ? 'bg-secondary' : (
                    $aviso['tipo'] == 'Importante' ? 'bg-warning text-dark' : 'bg-danger'
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
</div>

<!-- Próximos Eventos -->
<div class="mb-5">
  <h3 class="text-success mb-3"><i class="fas fa-calendar-alt"></i> Próximos Eventos</h3>
  <div class="row row-cols-1 row-cols-md-2 g-4">
    <?php if (!empty($eventos)): ?>
      <?php foreach ($eventos as $evento): ?>
        <div class="col">
          <div class="card border-success shadow-sm h-100">
            <div class="card-body">
              <h5 class="card-title text-success"><?= htmlspecialchars($evento['titulo']) ?></h5>
              <p class="card-text"><?= nl2br(htmlspecialchars($evento['descricao'])) ?></p>
              <p class="mb-1">
                <span class="badge bg-success">
                  <?= date('d/m/Y H:i', strtotime($evento['data_inicio'])) ?>
                </span>
                <span class="ms-2"><i class="fas fa-map-marker-alt"></i> <?= htmlspecialchars($evento['local']) ?></span>
              </p>
            </div>
            <div class="card-footer bg-white border-0">
              <small class="text-muted">
                Publicado por <?= htmlspecialchars($evento['autor'] ?? 'Admin') ?>
                em <?= date('d/m/Y H:i', strtotime($evento['criado_em'])) ?>
              </small>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <p class="text-muted">Nenhum evento futuro cadastrado.</p>
    <?php endif; ?>
  </div>
</div>
  <!-- Botão para ver todos os eventos -->
  <div class="text-center mt-4">
    <a href="index.php?r=/eventos-publicos" class="btn btn-outline-success btn-lg px-5">
      <i class="fas fa-calendar"></i> Ver Todos os Eventos
    </a>
  </div>

<!-- 📩 CTA Fale Conosco -->
<div class="text-center mt-5">
  <div class="card shadow-sm border-0">
    <div class="card-body">
      <h4 class="card-title mb-3"><i class="fas fa-envelope"></i> Fale Conosco</h4>
      <p class="card-text text-muted">Precisa de mais informações? Entre em contato com a secretaria paroquial.</p>
      <a href="index.php?r=contato" class="btn btn-outline-primary btn-lg px-5">
        📩 Fale Conosco
      </a>
    </div>
  </div>
</div>

</div>

<?php include __DIR__ . '/../layouts/footer.php'; ?>

