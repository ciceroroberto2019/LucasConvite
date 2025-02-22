document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');

    form.addEventListener('submit', function(event) {
        event.preventDefault();
        const nome = document.querySelector('input[name="nome"]').value;
        const acompanhantes = document.querySelector('input[name="acompanhantes"]').value;

        fetch('php/confirmar.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'nome=' + encodeURIComponent(nome) + '&acompanhantes=' + encodeURIComponent(acompanhantes)
        })
        .then(response => response.text())
        .then(data => {
            alert(data);
            form.reset();
        })
        .catch(error => {
            console.error('Erro:', error);
            alert('Ocorreu um erro ao confirmar sua presença.');
        });
    });
});

function openLightbox(imgSrc) {
    document.getElementById('lightboxImg').src = imgSrc;
    document.querySelector('.lightbox').style.display = 'block';
}

function closeLightbox() {
    document.querySelector('.lightbox').style.display = 'none';
}