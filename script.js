const hamburguer = document.getElementById('hamburguer');
const menu = document.getElementById('menu');
const x = document.getElementById('x');
const modo = document.getElementById('modo');
let apertos = 0;
const body = document.querySelector('body');
const main = document.querySelector('main');

const cardCliente = document.getElementById('cardCliente');
const cardFornecedor = document.getElementById('cardFornecedor');
const cardEstoque = document.getElementById('cardEstoque');

// eventos do cabeçalho
hamburguer.addEventListener("click", function () {
    menu.style.display = 'flex';
    x.style.display = 'flex';
    main.style.filter = 'blur(1px)';
})

x.addEventListener("click", function () {
    menu.style.display = 'none';
    x.style.display = 'none';
    main.style.filter = 'blur(0)';
})

// personalização da tela
modo.addEventListener("click", function () {
    // altera a classe do body para "dark-mode"
    body.classList.toggle("dark-mode");
    // mesma coisa com "dark-icon"
    modo.classList.toggle("dark-icon");
    apertos++;
    if (apertos % 2 == 0) {
        modo.textContent = '🌑'
    } else {
        modo.textContent = '☀️'
    }
});

// funções do main
function cliente() {
    cardCliente.style.filter = 'blur(0)';
    cardFornecedor.style.filter = 'blur(0.75px)';
    cardEstoque.style.filter = 'blur(0.75px)';
}
function fornecedor() {
    cardCliente.style.filter = 'blur(0.75px)';
    cardFornecedor.style.filter = 'blur(0)';
    cardEstoque.style.filter = 'blur(0.75px)';
}
function estoque() {
    cardCliente.style.filter = 'blur(0.75px)';
    cardFornecedor.style.filter = 'blur(0.75px)';
    cardEstoque.style.filter = 'blur(0)';
}
function voltar() {
    cardCliente.style.filter = 'blur(0)';
    cardFornecedor.style.filter = 'blur(0)';
    cardEstoque.style.filter = 'blur(0)';
}