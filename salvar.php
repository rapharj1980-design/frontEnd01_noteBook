<?php
header('Content-Type: application/json');
require_once 'conexao.php';

// Verifica se os dados foram enviados por POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome  = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');

    // Validação simples dos dados
    if (empty($nome) || empty($email)) {
        echo json_encode(['sucesso' => false, 'mensagem' => 'Preencha todos os campos!']);
        exit;
    }

    try {
        // SQL com Prepared Statement para evitar SQL Injection
        $sql = "INSERT INTO usuarios (nome, email) VALUES (:nome, :email)";
        $stmt = $pdo->prepare($sql);
        
        // Executa passando os parâmetros
        $stmt->execute([
            ':nome'  => $nome,
            ':email' => $email
        ]);

        echo json_encode(['sucesso' => true, 'mensagem' => 'Usuário cadastrado com sucesso no PostgreSQL!']);

    } catch (PDOException $e) {
        echo json_encode(['sucesso' => false, 'mensagem' => 'Erro ao salvar: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Método de requisição inválido.']);
}