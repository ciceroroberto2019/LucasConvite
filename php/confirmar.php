<?php
require_once('conexao.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $conexao->real_escape_string($_POST['nome']);
    $acompanhantes = $conexao->real_escape_string($_POST['acompanhantes']);

    $sql = "INSERT INTO convidados (nome, acompanhantes) VALUES ('$nome', '$acompanhantes')";

    if ($conexao->query($sql) === TRUE) {
        echo "Sua presença foi confirmada com sucesso! 🎉";
    } else {
        echo "Erro ao confirmar presença: " . $conexao->error;
    }

    $conexao->close();
} else {
    echo "Acesso inválido.";
}
?>