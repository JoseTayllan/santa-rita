<?php
class Evento {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function listar() {
        $stmt = $this->db->query("
            SELECT e.id, e.titulo, e.descricao, e.data_inicio, e.local, u.nome as autor, e.criado_em
            FROM eventos e
            JOIN usuarios u ON e.usuario_id = u.id
            ORDER BY e.data_inicio ASC
        ");
        return $stmt->fetchAll();
    }

    public function criar($titulo, $descricao, $data_inicio, $local, $usuarioId) {
        $stmt = $this->db->prepare("
            INSERT INTO eventos (titulo, descricao, data_inicio, local, usuario_id, criado_em)
            VALUES (:titulo, :descricao, :data_inicio, :local, :usuario_id, NOW())
        ");
        return $stmt->execute([
            ':titulo' => $titulo,
            ':descricao' => $descricao,
            ':data_inicio' => $data_inicio,
            ':local' => $local,
            ':usuario_id' => $usuarioId
        ]);
    }

    public function buscarPorId($id) {
        $stmt = $this->db->prepare("SELECT * FROM eventos WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public function atualizar($id, $titulo, $descricao, $data_inicio, $local) {
        $stmt = $this->db->prepare("
            UPDATE eventos 
            SET titulo = :titulo, descricao = :descricao, data_inicio = :data_inicio, local = :local 
            WHERE id = :id
        ");
        return $stmt->execute([
            ':titulo' => $titulo,
            ':descricao' => $descricao,
            ':data_inicio' => $data_inicio,
            ':local' => $local,
            ':id' => $id
        ]);
    }

    public function excluir($id) {
        $stmt = $this->db->prepare("DELETE FROM eventos WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }
    public function listarProximos($limite = 10) {
    $stmt = $this->db->prepare("
        SELECT e.id, e.titulo, e.descricao, e.data_inicio, e.local, u.nome as autor, e.criado_em
        FROM eventos e
        JOIN usuarios u ON e.usuario_id = u.id
        WHERE e.data_inicio >= NOW()
        ORDER BY e.data_inicio ASC
        LIMIT :limite
    ");
    $stmt->bindValue(':limite', (int)$limite, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll();
}
public function listarPaginado($limit = 10, $offset = 0) {
    $stmt = $this->db->prepare("
        SELECT e.id, e.titulo, e.descricao, e.data_inicio, e.local, u.nome as autor, e.criado_em
        FROM eventos e
        JOIN usuarios u ON e.usuario_id = u.id
        WHERE e.data_inicio >= NOW()
        ORDER BY e.data_inicio ASC
        LIMIT :limit OFFSET :offset
    ");
    $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
    $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll();
}

public function contarTodosFuturos() {
    $stmt = $this->db->query("SELECT COUNT(*) as total FROM eventos WHERE data_inicio >= NOW()");
    return $stmt->fetch()['total'];
}


}
