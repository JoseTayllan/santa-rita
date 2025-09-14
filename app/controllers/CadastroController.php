<?php
require_once __DIR__ . '/../models/Usuario.php';

class CadastroController {
    private $usuario;

    public function __construct($db) {
        $this->usuario = new Usuario($db);
    }

    public function form() {
        include __DIR__ . '/../views/auth/cadastro.php';
    }

    public function store() {
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if ($nome && $email && $senha) {
        $role_id = $this->usuario->getRoleIdByName('Visitante');
        $this->usuario->criar($nome, $email, $senha, $role_id);
        $_SESSION['flash'] = "✅ Conta criada com sucesso! Faça login para continuar.";
        header("Location: index.php?r=login&msg=cadastro_ok");
        exit;
    } else {
        header("Location: index.php?r=cadastro&erro=1");
        exit;
    }
}

}
