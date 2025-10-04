const hamburguer = document.getElementById('hamburguer');
const menu = document.getElementById('menu');
const x = document.getElementById('x');
const modo = document.getElementById('modo');
let apertos = 0;
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
    modo.classList.toggle("dark-emoji");

    sections.forEach(section => {
        section.classList.toggle("dark-sectionBefore");
    });

    containerNavegadorIcons.forEach(icon => {
        icon.classList.toggle("dark-navIcons");
    })

    apertos++;
    if (apertos % 2 == 0) {
        modo.textContent = '🌑';
    } else {
        modo.textContent = '☀️';

        containerCardH1.forEach(h1 => {
            h1.style.color = 'rgb(0, 0, 0)';
        });
        containerCardDetails.forEach(details => {
            details.style.color = 'rgb(0, 0, 0)';
        });
    }
});