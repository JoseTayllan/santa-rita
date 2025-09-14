<?php
require_once __DIR__ . '/../middlewares/AuthMiddleware.php';
require_once __DIR__ . '/../models/Aviso.php';

class AvisoController {
    private $aviso;

    public function __construct($db) {
        $this->aviso = new Aviso($db);
    }

    public function index() {
        verificarPermissao(['Administrador', 'Padre', 'Coordenador']);
        $avisos = $this->aviso->listar();
        include __DIR__ . '/../views/avisos/index.php';
    }

    public function create() {
        verificarPermissao(['Administrador', 'Padre']);
        include __DIR__ . '/../views/avisos/create.php';
    }

    public function store() {
        verificarPermissao(['Administrador', 'Padre']);
        session_start();

        $this->aviso->criar($_POST['titulo'], $_POST['conteudo'], $_POST['tipo'], $_SESSION['usuario']['id']);
        header("Location: index.php?r=avisos");
    }

    public function edit() {
        verificarPermissao(['Administrador', 'Padre']);
        $aviso = $this->aviso->buscarPorId($_GET['id']);
        include __DIR__ . '/../views/avisos/edit.php';
    }

    public function update() {
        verificarPermissao(['Administrador', 'Padre']);
        $this->aviso->atualizar($_POST['id'], $_POST['titulo'], $_POST['conteudo'], $_POST['tipo']);
        header("Location: index.php?r=avisos");
    }

    public function delete() {
        verificarPermissao(['Administrador']);
        $this->aviso->excluir($_GET['id']);
        header("Location: index.php?r=avisos");
    }
}
