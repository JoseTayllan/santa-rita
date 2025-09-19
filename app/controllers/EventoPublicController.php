<?php
require_once __DIR__ . '/../models/Evento.php';

class EventoPublicController {
    private $evento;

    public function __construct($db) {
        $this->evento = new Evento($db);
    }

    // Lista todos os eventos
    public function index() {
        $eventos = $this->evento->listar();
        include __DIR__ . '/../views/eventos/public_index.php';
    }

    // Mostra detalhes de um evento
    public function show() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header("Location: index.php?r=eventos-publicos");
            exit;
        }
        $evento = $this->evento->buscarPorId($id);
        include __DIR__ . '/../views/eventos/public_show.php';
    }
}
