<?php
require_once __DIR__ . '/../models/Aviso.php';
require_once __DIR__ . '/../models/Evento.php';

class HomeController {
    private $aviso;
    private $evento;

    public function __construct($db) {
        $this->aviso = new Aviso($db);
        $this->evento = new Evento($db);
    }

    public function index() {
        // últimos 2 avisos
        $avisos = $this->aviso->listarLimite(2);

        // próximos 2 eventos
        $eventos = $this->evento->listar();

        include __DIR__ . '/../views/home/index.php';
    }
}
