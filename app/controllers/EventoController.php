<?php
require_once __DIR__ . '/../middlewares/AuthMiddleware.php';
require_once __DIR__ . '/../models/Evento.php';

class EventoController {
    private $evento;

    public function __construct($db) {
        $this->evento = new Evento($db);
    }

    public function index() {
        verificarPermissao(['Administrador', 'Padre', 'Coordenador']);
        $eventos = $this->evento->listar();
        include __DIR__ . '/../views/eventos/index.php';
    }

    public function create() {
        verificarPermissao(['Administrador', 'Padre']);
        include __DIR__ . '/../views/eventos/create.php';
    }

    public function store() {
        verificarPermissao(['Administrador', 'Padre']);
        session_start();

        $this->evento->criar($_POST['titulo'], $_POST['descricao'], $_POST['data_inicio'], $_POST['local'], $_SESSION['usuario']['id']);
        header("Location: index.php?r=eventos");
    }

    public function edit() {
        verificarPermissao(['Administrador', 'Padre']);
        $evento = $this->evento->buscarPorId($_GET['id']);
        include __DIR__ . '/../views/eventos/edit.php';
    }

    public function update() {
        verificarPermissao(['Administrador', 'Padre']);
        $this->evento->atualizar($_POST['id'], $_POST['titulo'], $_POST['descricao'], $_POST['data_inicio'], $_POST['local']);
        header("Location: index.php?r=eventos");
    }

    public function delete() {
        verificarPermissao(['Administrador']);
        $this->evento->excluir($_GET['id']);
        header("Location: index.php?r=eventos");
    }
}
