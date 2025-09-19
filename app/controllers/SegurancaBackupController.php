<?php
require_once __DIR__ . '/../middlewares/AuthMiddleware.php';

class SegurancaBackupController {
    public function index() {
        verificarPermissao(['DevAdmin']);
        include __DIR__ . '/../views/devdashboard/seguranca_backup.php';
    }
}
