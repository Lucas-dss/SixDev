const rowQuantidade = document.querySelectorAll('.rowQuantidade');
// A quantidade máxima dos produtos
const quantidadeMaxima = 100;

rowQuantidade.forEach(quantidade => {
    // O valor das quantidades (sendo texto o valor)
    const quantidades = parseInt(quantidade.textContent.trim(), 10);

    // O valor entre 0 a 100
    const porcentagem = quantidades / quantidadeMaxima; // Vai de 0 a 1

    // reseta automaticamente a cada linha
    let red = 0;
    let green = 0;

    // Gradiente que vai de Vermelho (0%) -> Amarelo (50%) -> Verde (100%)
    if (porcentagem <= 0.5) {
        // De Vermelho (porcentagem = 0/0%) para Amarelo (porcentagem = 0.5/50%)
        red = 255; // red fica no máximo
        // green aumenta de 0 a 255
        green = (porcentagem * 2) * 255;
    } else {
        // De Amarelo (porcentagem = 0.5/50%) para Verde (porcentagem = 1/100%)
        // red diminui de 255 a 0
        red = (1 - ((porcentagem - 0.5) * 2)) * 255;
        green = 255; // green fica no máximo
    }

    // Ajuste dos valores para garantir que sejam inteiros e dentro do limite 0-255
    red = Math.min(255, Math.round(red));
    green = Math.min(255, Math.round(green));

    // só aumenta o valor blue se for pra se caso quiser mudar de tonalidade
    quantidade.style.backgroundColor = `rgba(${red}, ${green}, 0, 0.7)`;

    // se caso estiver quase acabando, coloca uma exclamação no lado
    if (parseInt(quantidade.textContent.trim()) == 0) {
        quantidade.textContent = "(-)";
    } else if (parseInt(quantidade.textContent.trim()) < 6) {
        quantidade.textContent = quantidade.textContent + " (!!!)";
    } else if (parseInt(quantidade.textContent.trim()) < 16) {
        quantidade.textContent = quantidade.textContent + " (!!)";
    } else if (parseInt(quantidade.textContent.trim()) < 26) {
        quantidade.textContent = quantidade.textContent + " (!)";
    }
});