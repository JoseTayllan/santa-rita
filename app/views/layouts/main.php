<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Paróquia Santa Rita</title>

  <!-- Bootstrap & SB Admin 2 -->
  <link href="/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="/assets/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Nosso CSS custom -->
  <link href="/assets/css/custom.css" rel="stylesheet">
</head>
<body id="page-top">

  <!-- Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include __DIR__ . '/sidebar.php'; ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
        <?php include __DIR__ . '/topbar.php'; ?>

        <!-- Conteúdo dinâmico -->
        <div class="container-fluid">
          <?php echo $content ?? ''; ?>
        </div>
      </div>

    </div>
  </div>

  <!-- JS -->
  <script src="/assets/vendor/jquery/jquery.min.js"></script>
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="/assets/js/sb-admin-2.min.js"></script>
  <script src="/assets/js/custom.js"></script>
</body>
</html>
