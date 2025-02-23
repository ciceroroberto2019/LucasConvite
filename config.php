<?php
return [
    'db' => [
        'host' => $_ENV['DB_HOST'] ?? 'localhost',
        'user' => $_ENV['DB_USER'] ?? 'root',
        'pass' => $_ENV['DB_PASS'] ?? '',
        'name' => $_ENV['DB_NAME'] ?? 'convite_db'
    ],
    'app' => [
        'admin_password' => password_hash('LucasJose1Ano', PASSWORD_DEFAULT),
        'title' => 'Aniversário Lucas José',
        'debug' => false
    ],
    'mail' => [
        'from' => 'noreply@seudominio.com',
        'name' => 'Convite Lucas José'
    ]
]; 