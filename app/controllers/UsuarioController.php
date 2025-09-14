<?php
require_once __DIR__ . '/../middlewares/AuthMiddleware.php';
require_once __DIR__ . '/../models/Usuario.php';

class UsuarioController {
    private $usuario;

    public function __construct($db) {
        $this->usuario = new Usuario($db);
    }

    public function index() {
        verificarPermissao(['DevAdmin']);
        $usuarios = $this->usuario->listar();
        include __DIR__ . '/../views/usuarios/index.php';
    }

    public function create() {
        verificarPermissao(['DevAdmin']);
        $roles = $this->usuario->listarRoles();
        include __DIR__ . '/../views/usuarios/create.php';
    }

    public function store() {
        verificarPermissao(['DevAdmin']);
        $this->usuario->criar($_POST['nome'], $_POST['email'], $_POST['senha'], $_POST['role_id']);
        header("Location: index.php?r=usuarios");
    }

    public function edit() {
        verificarPermissao(['DevAdmin']);
        $usuario = $this->usuario->buscarPorId($_GET['id']);
        $roles = $this->usuario->listarRoles();
        include __DIR__ . '/../views/usuarios/edit.php';
    }

    public function update() {
        verificarPermissao(['DevAdmin']);
        $senha = !empty($_POST['senha']) ? $_POST['senha'] : null;
        $this->usuario->atualizar($_POST['id'], $_POST['nome'], $_POST['email'], $_POST['role_id'], $senha);
        header("Location: index.php?r=usuarios");
    }

    public function delete() {
        verificarPermissao(['DevAdmin']);
        $this->usuario->excluir($_GET['id']);
        header("Location: index.php?r=usuarios");
    }
}
