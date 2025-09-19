<?php $title = "Novo Aviso - Administração"; ?>
<?php include __DIR__ . '/../layouts/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
  <h1 class="h3 text-gray-800">➕ Criar Novo Aviso</h1>
  <a href="index.php?r=devdashboard" class="btn btn-outline-primary btn-sm">
    <i class="fas fa-home"></i> Voltar ao Dashboard
  </a>
</div>

<form action="index.php?r=avisos/store" method="post" class="shadow-sm p-4 bg-white rounded">
  <div class="mb-3">
    <label for="titulo" class="form-label">Título</label>
    <input type="text" class="form-control" id="titulo" name="titulo" required>
  </div>

  <div class="mb-3">
    <label for="conteudo" class="form-label">Conteúdo</label>
    <textarea class="form-control" id="conteudo" name="conteudo" rows="4" required></textarea>
  </div>

  <div class="mb-3">
    <label for="tipo" class="form-label">Tipo</label>
    <select class="form-select" id="tipo" name="tipo" required>
      <option value="Padre">Padre</option>
      <option value="Comunicado Geral">Comunicado Geral</option>
      <option value="Importante">Importante</option>
      <option value="Urgente">Urgente</option>
    </select>
  </div>

  <button type="submit" class="btn btn-success">
    <i class="fas fa-save"></i> Salvar Aviso
  </button>
  <a href="index.php?r=avisos" class="btn btn-secondary">Cancelar</a>
</form>

<?php include __DIR__ . '/../layouts/footer.php'; ?>
