document.addEventListener("DOMContentLoaded", function () {
    // Oculta a mensagem após 5 segundos
    setTimeout(function () {
        var mensagem = document.getElementById("mensagem");
        if (mensagem) {
            mensagem.style.display = "none";
        }
    }, 5000);
});
