<?php
session_start(); // Inicia a sessão

// Senha para acessar a lista (mude para uma senha forte!)
$senha_correta = "LucasJose1Ano";

// Verifica se a senha foi enviada
if (isset($_POST['senha'])) {
    $senha_digitada = $_POST['senha'];

    // Verifica se a senha está correta
    if ($senha_digitada === $senha_correta) {
        $_SESSION['autenticado'] = true; // Define a sessão como autenticada
    } else {
        $erro = "Senha incorreta.";
    }
}

// Se não estiver autenticado, mostra o formulário de senha
if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Acesso Restrito</title>
    </head>
    <body>
        <h1>Acesso Restrito</h1>
        <?php if (isset($erro)) { echo "<p style='color:red;'>".$erro."</p>"; } ?>
        <form method="post">
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha">
            <button type="submit">Acessar</button>
        </form>
    </body>
    </html>
    <?php
    exit; // Encerra o script
}

// Se chegou até aqui, está autenticado. Mostra a lista de convidados.
require_once('conexao.php');

$sql = "SELECT nome, acompanhantes FROM convidados";
$resultado = $conexao->query($sql);

if ($resultado->num_rows > 0) {
    echo "<h1>Lista de Convidados Confirmados</h1>";
    echo "<table border='1'>";
    echo "<tr><th>Nome</th><th>Acompanhantes</th></tr>";
    while($row = $resultado->fetch_assoc()) {
        echo "<tr><td>" . $row["nome"]. "</td><td>" . $row["acompanhantes"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum convidado confirmou presença ainda.";
}

$conexao->close();
?>