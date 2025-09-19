<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title><?= $title ?? 'Paróquia Santa Rita' ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<!-- 🚀 Ajuste aqui -->
<body class="bg-light d-flex flex-column min-vh-100">

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">⛪ Santa Rita</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <!-- Links sempre visíveis -->
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?r=eventos-publicos">Eventos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?r=contato">Contato</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?r=noticias">Notícias</a>
          </li>

          <?php if (empty($_SESSION['usuario'])): ?>
            <!-- Visitante -->
            <li class="nav-item">
              <a class="nav-link" href="index.php?r=login">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?r=cadastro">Cadastro</a>
            </li>
          <?php else: ?>
            <!-- Usuário logado -->
            <?php $role = $_SESSION['usuario']['role'] ?? ''; ?>

            <?php if ($role === 'DevAdmin'): ?>
              <li class="nav-item">
                <a class="nav-link" href="index.php?r=devdashboard">Painel DevAdmin</a>
              </li>
            <?php elseif ($role === 'Administrador'): ?>
              <li class="nav-item">
                <a class="nav-link" href="index.php?r=dashboard">Painel Admin</a>
              </li>
            <?php elseif ($role === 'Padre'): ?>
              <li class="nav-item">
                <a class="nav-link" href="index.php?r=dashboard">Painel Padre</a>
              </li>
            <?php elseif ($role === 'Coordenador' || $role === 'Membro'): ?>
              <li class="nav-item">
                <a class="nav-link" href="index.php?r=dashboard">Painel</a>
              </li>
            <?php endif; ?>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid py-4">
    <?php if (!empty($_SESSION['flash']) && is_array($_SESSION['flash'])): ?>
      <div class="alert alert-<?= htmlspecialchars($_SESSION['flash']['type']) ?> alert-dismissible fade show" role="alert">
        <?= htmlspecialchars($_SESSION['flash']['msg']) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
      <?php unset($_SESSION['flash']); ?>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
