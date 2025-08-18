const hamburguer = document.getElementById('hamburguer');
const menu = document.getElementById('menu');
const x = document.getElementById('x');
const main = document.querySelector('main');

const cardCliente = document.getElementById('cardCliente');
const cardFornecedor = document.getElementById('cardFornecedor');
const cardEstoque = document.getElementById('cardEstoque');

// eventos do cabeçalho
hamburguer.addEventListener("click", function(){
    menu.style.display = 'flex';
    x.style.display = 'flex';
    main.style.filter = 'blur(1px)';
})

x.addEventListener("click", function(){
    menu.style.display = 'none';
    x.style.display = 'none';
    main.style.filter = 'blur(0)';
})

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