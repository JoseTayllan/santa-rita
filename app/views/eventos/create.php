<?php $title = "Novo Evento - Administração"; ?>
<?php include __DIR__ . '/../layouts/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
  <h1 class="h3 text-gray-800">➕ Criar Novo Evento</h1>
  <a href="index.php?r=dashboard" class="btn btn-outline-primary btn-sm">
    <i class="fas fa-home"></i> Dashboard
  </a>
</div>

<form action="index.php?r=eventos/store" method="post" class="shadow-sm p-4 bg-white rounded">
  <div class="mb-3">
    <label for="titulo" class="form-label">Título</label>
    <input type="text" class="form-control" id="titulo" name="titulo" required>
  </div>

  <div class="mb-3">
    <label for="descricao" class="form-label">Descrição</label>
    <textarea class="form-control" id="descricao" name="descricao" rows="4" required></textarea>
  </div>

  <div class="mb-3">
    <label for="data_inicio" class="form-label">Data e Hora</label>
    <input type="datetime-local" class="form-control" id="data_inicio" name="data_inicio" required>
  </div>

  <div class="mb-3">
    <label for="local" class="form-label">Local</label>
    <input type="text" class="form-control" id="local" name="local" required>
  </div>

  <button type="submit" class="btn btn-success">
    <i class="fas fa-save"></i> Salvar Evento
  </button>
  <a href="index.php?r=eventos" class="btn btn-secondary">Cancelar</a>
</form>

<?php include __DIR__ . '/../layouts/footer.php'; ?>
