<?php
class AuthController {
    public function login() {
        $erro = $_GET['erro'] ?? null;
        $msg  = $_GET['msg'] ?? null;
        include __DIR__ . '/../views/auth/login.php';
    }

    public function autenticar() {
    require __DIR__ . '/../config/db.php';
    session_start();

    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    $stmt = $conn->prepare("SELECT u.id, u.nome, u.email, u.senha, r.nome as role 
                            FROM usuarios u
                            JOIN roles r ON u.role_id = r.id
                            WHERE u.email = :email LIMIT 1");
    $stmt->bindValue(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch();

    if ($user && password_verify($senha, $user['senha'])) {
        $_SESSION['usuario'] = [
            'id'    => $user['id'],
            'nome'  => $user['nome'],
            'email' => $user['email'],
            'role'  => $user['role'],
        ];

          $_SESSION['flash'] = "👋 Bem-vindo, {$user['nome']}!";

        if ($user['role'] === 'DevAdmin') {
            header("Location: index.php?r=devdashboard");
        } elseif (in_array($user['role'], ['Administrador', 'Padre', 'Coordenador'])) {
            header("Location: index.php?r=dashboard");
        } else {
            // Visitante ou Membro → volta para Home
            header("Location: index.php?msg=bemvindo");
        }
        exit;
    } else {
        header("Location: index.php?r=login&erro=1");
        exit;
    }
}


    public function logout() {
        session_start();
        session_destroy();
        header("Location: index.php");
        exit;
    }
}
