<?php
class Noticia {
    public function ultimosAvisos() {
        return [
            [
                'titulo' => 'Aviso de Missa',
                'conteudo' => 'Missa de domingo às 19h na Matriz.',
                'autor' => 'Pe. Carlos',
                'data' => '12/09/2025 10:00'
            ],
            [
                'titulo' => 'Secretaria fechada',
                'conteudo' => 'A secretaria não funcionará na segunda-feira.',
                'autor' => 'João Admin',
                'data' => '11/09/2025 09:00'
            ],
        ];
    }

    public function proximosEventos() {
        return [
            [
                'titulo' => 'Encontro de Jovens',
                'descricao' => 'Reunião mensal dos jovens da comunidade.',
                'data' => '20/09/2025 14:00',
                'local' => 'Salão Paroquial'
            ],
            [
                'titulo' => 'Festa da Padroeira',
                'descricao' => 'Celebração em honra à Santa Rita.',
                'data' => '25/09/2025 19:00',
                'local' => 'Igreja Matriz'
            ],
        ];
    }
}
