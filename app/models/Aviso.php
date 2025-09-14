<?php
class Aviso {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function listar() {
        $stmt = $this->db->query("
            SELECT a.id, a.titulo, a.conteudo, a.tipo, u.nome as autor, a.criado_em
            FROM avisos a
            JOIN usuarios u ON a.usuario_id = u.id
            ORDER BY a.criado_em DESC
        ");
        return $stmt->fetchAll();
    }

    public function criar($titulo, $conteudo, $tipo, $usuarioId) {
        $stmt = $this->db->prepare("
            INSERT INTO avisos (titulo, conteudo, tipo, usuario_id, criado_em)
            VALUES (:titulo, :conteudo, :tipo, :usuario_id, NOW())
        ");
        return $stmt->execute([
            ':titulo' => $titulo,
            ':conteudo' => $conteudo,
            ':tipo' => $tipo,
            ':usuario_id' => $usuarioId
        ]);
    }

    public function buscarPorId($id) {
        $stmt = $this->db->prepare("SELECT * FROM avisos WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public function atualizar($id, $titulo, $conteudo, $tipo) {
        $stmt = $this->db->prepare("
            UPDATE avisos 
            SET titulo = :titulo, conteudo = :conteudo, tipo = :tipo 
            WHERE id = :id
        ");
        return $stmt->execute([
            ':titulo' => $titulo,
            ':conteudo' => $conteudo,
            ':tipo' => $tipo,
            ':id' => $id
        ]);
    }

    public function excluir($id) {
        $stmt = $this->db->prepare("DELETE FROM avisos WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }
    public function listarLimite($limite = 2) {
    $stmt = $this->db->prepare("
        SELECT a.id, a.titulo, a.conteudo, a.tipo, u.nome as autor, a.criado_em
        FROM avisos a
        JOIN usuarios u ON a.usuario_id = u.id
        ORDER BY a.criado_em DESC
        LIMIT :limite
    ");
    $stmt->bindValue(':limite', (int)$limite, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll();
}
public function listarPaginado($limit = 10, $offset = 0) {
    $stmt = $this->db->prepare("
        SELECT a.id, a.titulo, a.conteudo, a.tipo, u.nome as autor, a.criado_em
        FROM avisos a
        JOIN usuarios u ON a.usuario_id = u.id
        ORDER BY a.criado_em DESC
        LIMIT :limit OFFSET :offset
    ");
    $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
    $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll();
}

public function contarTodos() {
    $stmt = $this->db->query("SELECT COUNT(*) as total FROM avisos");
    return $stmt->fetch()['total'];
}


}
