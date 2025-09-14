<?php
$senha = "123456"; // 🔑 defina a senha que você quer
echo password_hash($senha, PASSWORD_DEFAULT);
