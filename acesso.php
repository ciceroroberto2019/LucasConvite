<?php
session_start();

// Se já estiver autenticado, redireciona para a lista
if (isset($_SESSION['autenticado']) && $_SESSION['autenticado'] === true) {
    header("Location: php/listar.php");
    exit;
}
 
// Verifica se foi enviada uma senha
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $senha = $_POST['senha'] ?? '';
    $senha_correta = "123456"; // Altere para uma senha mais segura

    if ($senha === $senha_correta) {
        $_SESSION['autenticado'] = true;
        header("Location: php/listar.php");
        exit;
    } else {
        $erro = "Senha incorreta!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesso à Lista de Convidados</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 0;
            color: #333;
            background: url('img/fundo_login.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: #e91e63;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.1em;
            margin-bottom: 30px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            font-size: 1.1em;
            margin-bottom: 5px;
        }

        input[type="password"] {
            padding: 12px;
            margin-bottom: 25px;
            border: 1px solid #ddd;
            border-radius: 8px;
            width: 80%;
            max-width: 300px;
            font-size: 1em;
        }

        button {
            padding: 14px 30px;
            background-color: #e91e63;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1.1em;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #c2185b;
        }

        .erro {
            color: #e91e63;
            margin-bottom: 15px;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Acesso à Lista de Convidados</h1>
        <?php if (isset($erro)): ?>
            <p class="erro"><?php echo htmlspecialchars($erro); ?></p>
        <?php endif; ?>
        <p>Digite a senha para acessar a lista de convidados confirmados:</p>
        <form method="post">
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" required>
            <button type="submit">Acessar Lista</button>
        </form>
    </div>
</body>
</html>