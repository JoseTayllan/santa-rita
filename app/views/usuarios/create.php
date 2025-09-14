<?php $title = "Novo Usuário - Administração"; ?>
<?php include __DIR__ . '/../layouts/header.php'; ?>

<h1 class="h3 mb-4 text-gray-800">➕ Criar Novo Usuário</h1>

<form action="index.php?r=usuarios/store" method="post" class="shadow-sm p-4 bg-white rounded">
    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">E-mail</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="mb-3">
        <label for="senha" class="form-label">Senha</label>
        <input type="password" class="form-control" id="senha" name="senha" required>
    </div>
    <div class="mb-3">
        <label for="role_id" class="form-label">Papel</label>

        <select class="form-select" id="role_id" name="role_id">

            <?php foreach ($roles as $r): ?>
                <option value="<?= $r['id'] ?>"><?= htmlspecialchars($r['nome']) ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Salvar</button>
    <a href="index.php?r=usuarios" class="btn btn-secondary">Cancelar</a>
</form>

<?php include __DIR__ . '/../layouts/footer.php'; ?>