const inputs = document.querySelectorAll('.input')
const button = document.querySelector('.login__button')


document.addEventListener("DOMContentLoaded", function() {
    // Array de URLs de imágenes
    const imagenes = [
        '../img/wallpaper1.jpg',
        '../img/wallpaper2.jpg',
    '../img/wallpaper3.jpg',
    '../img/wallpaper4.jpg',
    '../img/wallpaper5.jpg',
    '../img/wallpaper6.jpg',
    '../img/wallpaper7.jpg',
    '../img/wallpaper8.jpg',
    '../img/wallpaper9.jpg',
    '../img/wallpaper10.jpg',
    '../img/wallpaper11.jpg',
    '../img/wallpaper12.jpg',
    '../img/wallpaper13.jpg',
    '../img/wallpaper14.jpg',
    '../img/wallpaper15.jpg'

    ];

    // Seleccionar un índice aleatorio
    const indiceAleatorio = Math.floor(Math.random() * imagenes.length);

    // Obtener el elemento con la clase .wallpaper
    const wallpaperElement = document.getElementById("wallpaper");

    // Aplicar la imagen de fondo al elemento .wallpaper
    wallpaperElement.style.backgroundImage = `url('${imagenes[indiceAleatorio]}')`;
});





const handleFocus = ({ target }) => {
    const span = target.previousElementSibling
    span.classList.add('span-active')
}

const handleFocusOut = ({ target }) => {
    if(target.value === ""){
        const span = target.previousElementSibling
        span.classList.remove('span-active')
    }
}

const handleChange = () => {
    // const username = inputs[0]
    // const password = inputs[1]
    const [username, password] = inputs;

    if(username.value && password.value.length >= 8) {
        button.removeAttribute('disabled')
    } else {
        button.setAttribute('disabled', '')
    }
}

inputs.forEach((input) => input.addEventListener('focus', handleFocus))
inputs.forEach((input) => input.addEventListener('focusout', handleFocusOut))
inputs.forEach((input) => input.addEventListener('input', handleChange))