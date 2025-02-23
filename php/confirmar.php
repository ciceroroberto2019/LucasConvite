<?php
require_once('conexao.php');

header('Content-Type: application/json');

try {
    // Pegar dados do POST
    $nome = $_POST['nome'] ?? '';
    $acompanhantes = $_POST['acompanhantes'] ?? '';
    $mensagem = $_POST['mensagem'] ?? '';
    
    // Validar dados
    if (empty($nome)) {
        throw new Exception('Nome é obrigatório');
    }
    
    // Preparar e executar a query
    $stmt = $conexao->prepare("INSERT INTO convidados (nome, acompanhantes, mensagem) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nome, $acompanhantes, $mensagem);
    
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Presença confirmada com sucesso!']);
    } else {
        throw new Exception('Erro ao salvar no banco de dados');
    }
    
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}

$conexao->close();
?>