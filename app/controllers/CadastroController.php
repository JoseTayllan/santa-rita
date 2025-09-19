<?php
require_once __DIR__ . '/../models/Usuario.php';

class CadastroController
{
    private $usuario;

    public function __construct($db)
    {
        $this->usuario = new Usuario($db);
    }

    public function form()
    {
        include __DIR__ . '/../views/auth/cadastro.php';
    }

    public function store()
    {
        $nome  = $_POST['nome'] ?? '';
        $email = $_POST['email'] ?? '';
        $senha = $_POST['senha'] ?? '';

        if ($nome && $email && $senha) {
            try {
                // papel padrão = Visitante
                $role_id = $this->usuario->getRoleIdByName('Visitante') ?? 5;

                $this->usuario->criar($nome, $email, $senha, $role_id);

                $_SESSION['flash'] = [
                    "type" => "success",
                    "msg"  => "✅ Conta criada com sucesso! Faça login para continuar."
                ];
                header("Location: index.php?r=login");
                exit;
            } catch (PDOException $e) {
                if ($e->getCode() == 23000) { // erro de duplicidade (email já existe)
                    $_SESSION['flash'] = [
                        "type" => "danger",
                        "msg"  => "⚠️ Este e-mail já está cadastrado. Faça login ou use outro e-mail."
                    ];
                    header("Location: index.php?r=cadastro");
                    exit;
                }
                throw $e; // outros erros não tratados
            }
        } else {
            $_SESSION['flash'] = [
                "type" => "danger",
                "msg"  => "⚠️ Preencha todos os campos obrigatórios."
            ];
            header("Location: index.php?r=cadastro");
            exit;
        }
    }
}
