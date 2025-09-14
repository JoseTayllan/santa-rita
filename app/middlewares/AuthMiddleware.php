<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function verificarPermissao(array $rolesPermitidos = []) {
    if (!isset($_SESSION['usuario'])) {
        header("Location: index.php?r=login&erro=nao_logado");
        exit;
    }

    if (!in_array($_SESSION['usuario']['role'], $rolesPermitidos)) {
        header("Location: index.php?r=dashboard&erro=sem_permissao");
        exit;
    }
}
