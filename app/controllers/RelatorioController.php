<?php
require_once __DIR__ . '/../middlewares/AuthMiddleware.php';
require_once __DIR__ . '/../models/Relatorio.php';

class RelatorioController {
    private $relatorio;

    public function __construct($db) {
        $this->relatorio = new Relatorio($db);
    }

    public function index() {
        verificarPermissao(['DevAdmin']);

        $avisosPorTipo   = $this->relatorio->avisosPorTipo();
        $eventosPorMes   = $this->relatorio->eventosPorMes();
        $usuariosPorRole = $this->relatorio->usuariosPorRole();

        
        $totalAvisos   = !empty($avisosPorTipo)   ? array_sum(array_column($avisosPorTipo, 'total')) : 0;
        $totalEventos  = !empty($eventosPorMes)   ? array_sum(array_column($eventosPorMes, 'total')) : 0;
        $totalUsuarios = !empty($usuariosPorRole) ? array_sum(array_column($usuariosPorRole, 'total')) : 0;

        include __DIR__ . '/../views/devdashboard/relatorios.php';
    }
}
