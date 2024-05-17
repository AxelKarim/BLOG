// Obtener todos los botones con la clase "accordion"
var acc = document.getElementsByClassName("boton");

// Iterar sobre cada botón y agregar un evento clic
for (var i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    // Alternar la clase "active" para resaltar el botón activo
    this.classList.toggle("active");

    // Obtener el panel asociado al botón actual
    var panel = this.nextElementSibling;

    // Mostrar u ocultar el panel
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
