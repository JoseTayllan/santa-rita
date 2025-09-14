<?php
require_once __DIR__ . '/../models/Aviso.php';
require_once __DIR__ . '/../models/Evento.php';

class NoticiaController {
    private $aviso;
    private $evento;

    public function __construct($db) {
        $this->aviso = new Aviso($db);
        $this->evento = new Evento($db);
    }

    public function index() {
        // Paginação de avisos
        $pageAvisos = isset($_GET['pageAvisos']) ? (int)$_GET['pageAvisos'] : 1;
        $limitAvisos = 6;
        $offsetAvisos = ($pageAvisos - 1) * $limitAvisos;
        $avisos = $this->aviso->listarPaginado($limitAvisos, $offsetAvisos);
        $totalAvisos = $this->aviso->contarTodos();
        $totalPagesAvisos = ceil($totalAvisos / $limitAvisos);

        // Paginação de eventos
        $pageEventos = isset($_GET['pageEventos']) ? (int)$_GET['pageEventos'] : 1;
        $limitEventos = 6;
        $offsetEventos = ($pageEventos - 1) * $limitEventos;
        $eventos = $this->evento->listarPaginado($limitEventos, $offsetEventos);
        $totalEventos = $this->evento->contarTodosFuturos();
        $totalPagesEventos = ceil($totalEventos / $limitEventos);

        include __DIR__ . '/../views/noticias/index.php';
    }
}
