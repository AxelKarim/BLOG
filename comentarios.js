function toggleComentarios() {
    var comentariosArea = document.getElementById("comentarios-area");
    if (comentariosArea.style.display === "none") {
        comentariosArea.style.display = "block";
    } else {
        comentariosArea.style.display = "none";
    }
}


function enviarComentario() {
    var comentario = document.querySelector("#comentarios-area textarea").value;
    console.log("Comentario enviado:", comentario);
    alert("Comentario enviado: " + comentario);
}