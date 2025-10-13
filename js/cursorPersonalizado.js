const cursorPersonalizado = document.querySelector('.custom-cursor.site-wide');

document.addEventListener('mouseenter', () => {
	cursorPersonalizado.style.display = 'block';
});

document.addEventListener('mouseleave', () => {
	cursorPersonalizado.style.display = 'none';
});

document.addEventListener('mousemove', seguirCursor);

// quando pressiona o click, adiciona a classe 'ativa'
document.addEventListener('mousedown', () => cursorPersonalizado.classList.add('active'));
// quando solta o click, remove a classe 'ativa'
document.addEventListener('mouseup', () => cursorPersonalizado.classList.remove('active'));

function seguirCursor(event) {
	const posicaoDoX = cursorPersonalizado.clientWidth;
	const posicaoDoY = cursorPersonalizado.clientHeight;

	cursorPersonalizado.style.transform = `translate(${event.clientX - posicaoDoX / 2}px, ${event.clientY - posicaoDoY / 2}px)`;
}