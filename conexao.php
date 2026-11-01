<?php
// Configurações de acesso ao banco de dados
$host = '127.0.0.1';
$port = '5432';
$db   = 'mcell_db';
$user = 'postgres';
$pass = 'aranha86'; // ⚠️ Substitua pela sua senha real do postgres

try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$db";
    
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    // Sem nenhum echo aqui! A conexão é silenciosa quando tudo dá certo.

} catch (PDOException $e) {
    header('Content-Type: application/json');
    echo json_encode(['sucesso' => false, 'mensagem' => 'Erro de conexão com o Banco: ' . $e->getMessage()]);
    exit;
}