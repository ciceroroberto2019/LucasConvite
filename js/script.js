document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('formPresenca');
    
    form.addEventListener('submit', function(e) {
        e.preventDefault(); // Previne o envio padrão do formulário
        
        const nome = document.getElementById('nome').value.trim();
        const acompanhantes = document.getElementById('acompanhantes').value.trim();
        const mensagem = document.getElementById('mensagem').value.trim();
        
        if (!nome) {
            alert('Por favor, preencha seu nome.');
            return;
        }
        
        // Criar objeto com os dados do formulário
        const formData = new FormData(form);
        
        // Enviar dados via fetch
        fetch('php/confirmar.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Presença confirmada com sucesso!');
                form.reset();
            } else {
                alert('Erro ao confirmar presença. Por favor, tente novamente.');
            }
        })
        .catch(error => {
            console.error('Erro:', error);
            alert('Erro ao enviar dados. Por favor, tente novamente.');
        });
    });
    
    // Função para o lightbox
    window.openLightbox = function(imgSrc) {
        const lightbox = document.querySelector('.lightbox');
        const lightboxImg = document.getElementById('lightboxImg');
        lightboxImg.src = imgSrc;
        lightbox.style.display = 'flex';
    }
    
    window.closeLightbox = function() {
        document.querySelector('.lightbox').style.display = 'none';
    }
});