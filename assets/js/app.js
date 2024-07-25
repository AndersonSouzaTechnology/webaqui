
// SCROLL MENU

window.addEventListener('scroll', function(){
    let header = document.querySelector('header')
    header.classList.toggle('rolagem', window.scrollY > 0)
})



// MENU HAMBURGER

const navOpenBtn = document.querySelector("[data-nav-open-btn]");
const navbar = document.querySelector("[data-navbar]");
const navCloseBtn = document.querySelector("[data-nav-close-btn]");
const menuCelular = document.querySelector("[data-overlay]");

const webaqui = [navCloseBtn, menuCelular, navOpenBtn];

for(let i = 0; i < webaqui.length; i++){
    webaqui[i].addEventListener("click", function (){
    navbar.classList.toggle("active");
    menuCelular.classList.toggle("active");
    });
}


// TEXTO GERAMOS RESULTADOS

let geramosResultados = document.querySelector("#text");
let intervalo = 70;

function escreverTexto(geramosResultados, text, intervalo){
    let char = text.split("").reverse();
    let tipo = setInterval( function() {
        if(!char.length){
            return clearInterval(tipo)
        }

        let next = char.pop();
        geramosResultados.innerHTML += next;

    }, intervalo);
}

escreverTexto(geramosResultados, text, intervalo);


// BOTAO RETORNO AO TOPO
const goTopBtn = document.querySelector("[data-go-top]");

window.addEventListener("scroll", function(){
    if(window.scrollY >= 400){
        goTopBtn.classList.add("active");
    }else{
        goTopBtn.classList.remove("active");
    }
});

