<?php
session_start();

// Verificar autenticação
if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {
    header('Location: ../acesso.php');
    exit;
}

// Se chegou até aqui, está autenticado
require_once('conexao.php');

// Verificar se a conexão foi estabelecida
if (!$conexao) {
    die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
}

// Preparar e executar a consulta
$sql = "SELECT id, nome, acompanhantes, mensagem FROM convidados";
$resultado = $conexao->query($sql);

// Verificar se a consulta foi bem-sucedida
if ($resultado === false) {
    die("Erro na consulta: " . $conexao->error);
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Convidados Confirmados</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">
    <link rel="stylesheet" href="../assets/css/lista.css">
    <style>
        /* Estilos de fallback caso o arquivo CSS externo não carregue */
        body {
    font-family: 'Poppins', sans-serif;
    background: url('../img/fundo_lista.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    color: #333;
    margin: 0;
    padding: 20px;
}
.container {
    width: 90%;
    max-width: 1200px;
    margin: 20px auto;
    padding: 30px;
    background-color: rgba(255, 255, 255, 0.9);
    border-radius: 15px;
    box-shadow: 0 0 20px rgba(0,0,0,0.1);
}
        h1 {
            color: #e91e63;
            margin-bottom: 20px;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #e91e63;
            color: white;
            font-weight: 500;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .message-cell {
            max-width: 300px;
        }
        .message-area {
            width: 100%;
            min-height: 60px;
            resize: vertical;
            border: none;
            background: transparent;
            padding: 5px;
            box-sizing: border-box;
        }
        .no-guests {
            text-align: center;
            font-style: italic;
            color: #666;
            padding: 20px;
        }
        .logout-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #e91e63;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .logout-btn:hover {
            background-color: #c2185b;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="logout.php" class="logout-btn">Sair</a>
        <h1>Lista de Convidados Confirmados</h1>
        
        <?php if ($resultado->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Acompanhantes</th>
                        <th>Mensagem</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $resultado->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row["nome"]); ?></td>
                            <td><?php echo htmlspecialchars($row["acompanhantes"]); ?></td>
                            <td class="message-cell">
                                <textarea class="message-area" readonly><?php echo htmlspecialchars($row["mensagem"]); ?></textarea>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="no-guests">
                Nenhum convidado confirmou presença ainda.
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
<?php
$conexao->close();
?>