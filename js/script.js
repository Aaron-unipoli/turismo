// Obtener el primer modal
var modal = document.getElementById("modal");
// Obtener el segundo modal
var modal2 = document.getElementById("modal2");

// Obtener el botón que abre el primer modal
var btn = document.getElementById("openModal");
// Obtener el botón que abre el segundo modal
var btn2 = document.getElementById("openModal2");

// Obtener el elemento <span> que cierra el primer modal
var span = document.getElementsByClassName("close")[0];
// Obtener el elemento <span> que cierra el segundo modal
var span2 = document.getElementsByClassName("close")[1];

// Cuando el usuario hace clic en el botón del primer modal, lo abre
btn.onclick = function() {
  modal.style.display = "block";
}

// Cuando el usuario hace clic en el botón del segundo modal, lo abre
btn2.onclick = function() {
  modal2.style.display = "block";
}

// Cuando el usuario hace clic en <span> (x) del primer modal, lo cierra
span.onclick = function() {
  modal.style.display = "none";
}

// Cuando el usuario hace clic en <span> (x) del segundo modal, lo cierra
span2.onclick = function() {
  modal2.style.display = "none";
}

// Cuando el usuario hace clic en cualquier lugar fuera de los modales, los cierra
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  } else if (event.target == modal2) {
    modal2.style.display = "none";
  }
}