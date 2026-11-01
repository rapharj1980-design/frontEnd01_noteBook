document.getElementById('formUsuario').addEventListener('submit', async function (event) {
    event.preventDefault(); // Impede o formulário de recarregar a página

    const nome = document.getElementById('nome').value;
    const email = document.getElementById('email').value;
    const mensagemDiv = document.getElementById('mensagem');

    mensagemDiv.innerHTML = "Enviando dados...";
    mensagemDiv.style.color = "blue";

    try {
        // Envia dados para o backend PHP via requisição Fetch (AJAX)
        const response = await fetch('salvar.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `nome=${encodeURIComponent(nome)}&email=${encodeURIComponent(email)}`
        });

        const resultado = await response.json();

        if (resultado.sucesso) {
            mensagemDiv.innerHTML = "✅ " + resultado.mensagem;
            mensagemDiv.style.color = "green";
            document.getElementById('formUsuario').reset(); // Limpa os campos
        } else {
            mensagemDiv.innerHTML = "❌ " + resultado.mensagem;
            mensagemDiv.style.color = "red";
        }
    } catch (error) {
        mensagemDiv.innerHTML = "❌ Erro ao se comunicar com o servidor.";
        mensagemDiv.style.color = "red";
        console.error('Erro:', error);
    }
});