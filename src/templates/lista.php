<?php require_once 'header.php'; ?>

<div class="container">
    <h1>Lista de Convidados Confirmados</h1>
    
    <?php if ($convidados): ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Acompanhantes</th>
                    <th>Mensagem</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($convidados as $convidado): ?>
                    <tr>
                        <td><?= htmlspecialchars($convidado['nome']) ?></td>
                        <td><?= htmlspecialchars($convidado['acompanhantes']) ?></td>
                        <td>
                            <textarea readonly class="mensagem">
                                <?= htmlspecialchars($convidado['mensagem']) ?>
                            </textarea>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Nenhum convidado confirmou presença ainda.</p>
    <?php endif; ?>
</div>

<?php require_once 'footer.php'; ?> 