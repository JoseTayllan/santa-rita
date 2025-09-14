<?php
require_once __DIR__ . '/../middlewares/AuthMiddleware.php';

class DevDashboardController {
    public function index() {
        verificarPermissao(['DevAdmin']);
        $usuario = $_SESSION['usuario'];
        include __DIR__ . '/../views/devdashboard/index.php';
    }
}
