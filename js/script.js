const hamburguer = document.getElementById('hamburguer');
const menu = document.getElementById('menu');
const x = document.getElementById('x');
const modo = document.getElementById('modo');

let tema = localStorage.getItem("tema");

const body = document.querySelector('body');
const main = document.querySelector('main');

const sections = document.querySelectorAll('section');

const containerCardH1 = document.querySelectorAll('.container-card h1');
const containerCardDetails = document.querySelectorAll('.container-card details');

const containerNavegadorIcons = document.querySelectorAll('.container-navegador a img');

// eventos do cabeçalho
hamburguer.addEventListener("click", function () {
    menu.style.display = 'flex';
    x.style.display = 'flex';
    main.style.filter = 'blur(1px)';
    document.body.style.overflow = 'hidden';
})

x.addEventListener("click", function () {
    menu.style.display = 'none';
    x.style.display = 'none';
    main.style.filter = 'blur(0)';
    document.body.style.overflow = '';
})

// se caso o tema for claro, permanece claro
if (tema == null || tema.includes("claro")) {
    temaClaro();
}
// se caso o tema for escuro, permanece escuro
else if (tema.includes("escuro")) {
    temaEscuro();
}

// evento de trocar o tema do site
modo.addEventListener("click", function () {
    // Atualiza o valor de tema antes de verificar
    tema = localStorage.getItem("tema");
    // se caso o tema for claro, indica que o usuário quer trocar pro tema escuro
    if (tema.includes("claro")) {
        temaEscuro();
    }
    // mas se caso o tema for escuro, indica que o usuário quer trocar pro tema claro
    else if (tema.includes("escuro")) {
        temaClaro();
    }
});

// função do tema Claro
function temaClaro() {
    localStorage.setItem("tema", "claro");
    modo.textContent = '🌑';

    body.classList.remove("dark-mode");
    modo.classList.remove("dark-emoji");

    sections.forEach(section => {
        section.classList.remove("dark-sectionBefore");
    });

    containerNavegadorIcons.forEach(icon => {
        icon.classList.remove("dark-navIcons");
    });

    containerCardH1.forEach(h1 => {
        h1.style.color = 'rgb(0, 0, 0)';
    });
    containerCardDetails.forEach(details => {
        details.style.color = 'rgb(0, 0, 0)';
    });
};

// função do tema Escuro
function temaEscuro() {
    localStorage.setItem("tema", "escuro");
    modo.textContent = '☀️';

    body.classList.add("dark-mode");
    modo.classList.add("dark-emoji");

    sections.forEach(section => {
        section.classList.add("dark-sectionBefore");
    });

    containerNavegadorIcons.forEach(icon => {
        icon.classList.add("dark-navIcons");
    });

    containerCardH1.forEach(h1 => {
        h1.style.color = 'rgb(0, 0, 0)';
    });
    containerCardDetails.forEach(details => {
        details.style.color = 'rgb(0, 0, 0)';
    });
};

// função de imprimir relatórios
function printDiv(divID) {
    // define o conteúdo
    var conteudo = document.getElementById(divID).innerHTML;
    // cria uma nova janela 600x800
    var novaJanela = window.open('', 'Oi', 'height=600,width=850,top=100,left=800');

    // escreve o conteúdo na janela
    novaJanela.document.writeln(conteudo);
    // imprime
    novaJanela.print();
    // fecha (pra não ficar imprimindo repetidamente na mesma impressão)
    novaJanela.close();
};