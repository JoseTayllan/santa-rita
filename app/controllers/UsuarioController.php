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
        try {
            $this->usuario->criar($_POST['nome'], $_POST['email'], $_POST['senha'], $_POST['role_id']);
            $_SESSION['flash'] = ["type" => "success", "msg" => "Usuário criado com sucesso!"];
            header("Location: index.php?r=usuarios");
            exit;
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) { // erro de email duplicado
                $_SESSION['flash'] = ["type" => "danger", "msg" => "Já existe um usuário com este e-mail!"];
                header("Location: index.php?r=usuarios/create");
                exit;
            }
            throw $e;
        }
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

        try {
            $this->usuario->atualizar($_POST['id'], $_POST['nome'], $_POST['email'], $_POST['role_id'], $senha);
            $_SESSION['flash'] = ["type" => "success", "msg" => "Usuário atualizado com sucesso!"];
            header("Location: index.php?r=usuarios");
            exit;
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) { // email duplicado
                $_SESSION['flash'] = ["type" => "danger", "msg" => "Este e-mail já está em uso por outro usuário!"];
                header("Location: index.php?r=usuarios/edit&id=" . $_POST['id']);
                exit;
            }
            throw $e;
        }
    }

    public function delete() {
        verificarPermissao(['DevAdmin']);
        $id = $_GET['id'];

        // Protege o DevAdmin master (id=1)
        if ($id == 1) {
            $_SESSION['flash'] = ["type" => "danger", "msg" => "Não é permitido excluir o DevAdmin principal!"];
            header("Location: index.php?r=usuarios");
            exit;
        }

        $this->usuario->excluir($id);
        $_SESSION['flash'] = ["type" => "success", "msg" => "Usuário excluído com sucesso!"];
        header("Location: index.php?r=usuarios");
        exit;
    }

}
