<?php
require_once __DIR__ . '/../middlewares/AuthMiddleware.php';

class DashboardController {
    public function index() {
        verificarPermissao(['Administrador', 'Padre']); // só admins e padres acessam

        $usuario = $_SESSION['usuario'];
        include __DIR__ . '/../views/dashboard/index.php';
    }
}
