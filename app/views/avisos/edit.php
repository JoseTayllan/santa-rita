<?php $title = "Editar Aviso - Administração"; ?>
<?php include __DIR__ . '/../layouts/header.php'; ?>

<h1 class="h3 mb-4 text-gray-800">✏️ Editar Aviso</h1>

<form action="index.php?r=avisos/update" method="post" class="shadow-sm p-4 bg-white rounded">
  <input type="hidden" name="id" value="<?= $aviso['id'] ?>">

  <div class="mb-3">
    <label for="titulo" class="form-label">Título</label>
    <input type="text" class="form-control" id="titulo" name="titulo" value="<?= htmlspecialchars($aviso['titulo']) ?>" required>
  </div>

  <div class="mb-3">
    <label for="conteudo" class="form-label">Conteúdo</label>
    <textarea class="form-control" id="conteudo" name="conteudo" rows="4" required><?= htmlspecialchars($aviso['conteudo']) ?></textarea>
  </div>

  <div class="mb-3">
  <label for="tipo" class="form-label">Tipo</label>
  <select class="form-select" id="tipo" name="tipo">
    <option value="Padre" <?= $aviso['tipo']=='Padre'?'selected':'' ?>>Padre</option>
    <option value="Comunicado Geral" <?= $aviso['tipo']=='Comunicado Geral'?'selected':'' ?>>Comunicado Geral</option>
    <option value="Importante" <?= $aviso['tipo']=='Importante'?'selected':'' ?>>Importante</option>
    <option value="Urgente" <?= $aviso['tipo']=='Urgente'?'selected':'' ?>>Urgente</option>
  </select>
</div>


  <button type="submit" class="btn btn-success">
    <i class="fas fa-save"></i> Atualizar
  </button>
  <a href="index.php?r=avisos" class="btn btn-secondary">Cancelar</a>
</form>

<?php include __DIR__ . '/../layouts/footer.php'; ?>
