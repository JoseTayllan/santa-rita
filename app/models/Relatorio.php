<?php
class Relatorio {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Quantidade de avisos por tipo
    public function avisosPorTipo() {
        $stmt = $this->db->query("
            SELECT tipo, COUNT(*) as total
            FROM avisos
            GROUP BY tipo
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Quantidade de eventos por mês
    public function eventosPorMes() {
        $stmt = $this->db->query("
            SELECT DATE_FORMAT(data_inicio, '%Y-%m') as mes, COUNT(*) as total
            FROM eventos
            GROUP BY mes
            ORDER BY mes ASC
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Quantidade de usuários por role
    public function usuariosPorRole() {
        $stmt = $this->db->query("
            SELECT r.nome as role, COUNT(u.id) as total
            FROM usuarios u
            JOIN roles r ON u.role_id = r.id
            GROUP BY r.nome
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
