<?php
class Usuario {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function listar() {
        $stmt = $this->db->query("
            SELECT u.id, u.nome, u.email, r.nome as role, u.criado_em
            FROM usuarios u
            JOIN roles r ON u.role_id = r.id
            ORDER BY u.criado_em DESC
        ");
        return $stmt->fetchAll();
    }

    public function buscarPorId($id) {
        $stmt = $this->db->prepare("
            SELECT u.id, u.nome, u.email, u.role_id, r.nome as role
            FROM usuarios u
            JOIN roles r ON u.role_id = r.id
            WHERE u.id = :id
        ");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public function criar($nome, $email, $senha, $role_id) {
    $hash = password_hash($senha, PASSWORD_DEFAULT); // 🚀 agora seguro
    $stmt = $this->db->prepare("
        INSERT INTO usuarios (nome, email, senha, role_id, criado_em)
        VALUES (:nome, :email, :senha, :role_id, NOW())
    ");
    return $stmt->execute([
        ':nome' => $nome,
        ':email' => $email,
        ':senha' => $hash,
        ':role_id' => $role_id
    ]);
}

public function atualizar($id, $nome, $email, $role_id, $senha = null) {
    if ($senha) {
        $hash = password_hash($senha, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("
            UPDATE usuarios 
            SET nome = :nome, email = :email, role_id = :role_id, senha = :senha
            WHERE id = :id
        ");
        return $stmt->execute([
            ':nome' => $nome,
            ':email' => $email,
            ':role_id' => $role_id,
            ':senha' => $hash,
            ':id' => $id
        ]);
    } else {
        $stmt = $this->db->prepare("
            UPDATE usuarios 
            SET nome = :nome, email = :email, role_id = :role_id
            WHERE id = :id
        ");
        return $stmt->execute([
            ':nome' => $nome,
            ':email' => $email,
            ':role_id' => $role_id,
            ':id' => $id
        ]);
    }
}

    public function excluir($id) {
        $stmt = $this->db->prepare("DELETE FROM usuarios WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }

    public function listarRoles() {
        $stmt = $this->db->query("SELECT * FROM roles ORDER BY nome ASC");
        return $stmt->fetchAll();
    }
    public function getRoleIdByName($nome) {
    $stmt = $this->db->prepare("SELECT id FROM roles WHERE nome = :nome LIMIT 1");
    $stmt->execute([':nome' => $nome]);
    $role = $stmt->fetch();
    return $role ? $role['id'] : null;
}

}
