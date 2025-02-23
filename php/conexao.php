<?php
$host = 'localhost'; // ou o endereço do seu servidor MySQL
$usuario = 'root';  // Substitua pelo seu usuário MySQL
$senha = 'Plano@1602';    // Substitua pela sua senha MySQL
$banco = 'lucasjoseconvite'; // Nome do banco de dados

$conexao = new mysqli($host, $usuario, $senha, $banco);

if ($conexao->connect_error) {
    die('Erro de conexão: ' . $conexao->connect_error);
}

$conexao->set_charset("utf8"); // Define o charset para UTF-8

// Opcional: Cria a tabela se não existir
$sql = "CREATE TABLE IF NOT EXISTS convidados (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    acompanhantes VARCHAR(255),
    mensagem TEXT
)";

if ($conexao->query($sql) === TRUE) {
    //echo "Tabela 'convidados' criada com sucesso (ou já existia).";
} else {
    echo "Erro ao criar tabela: " . $conexao->error;
}
?>
