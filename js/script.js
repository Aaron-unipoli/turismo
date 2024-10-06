// Seleccionamos los enlaces para abrir los modales
const btnAbrirModalLogin = document.querySelector("#openModal");
const btnAbrirModalRegistro = document.querySelector("#openModal2");

// Seleccionamos los botones de cierre de cada modal
const btnCerrarModalLogin = document.querySelector("#btn-cerraModal");
const btnCerrarModalRegistro = document.querySelector("#btn-cerraModalRegistro");

// Seleccionamos los modales
const modalLogin = document.querySelector("#modal");
const modalRegistro = document.querySelector("#modalRegistro");

// Abrir el modal de Login
btnAbrirModalLogin.addEventListener("click", (event) => {
  event.preventDefault();  // Evitar el comportamiento por defecto del link
  modalLogin.showModal();  // Abre el modal de Login
});

// Abrir el modal de Registro (Suscripción)
btnAbrirModalRegistro.addEventListener("click", (event) => {
  event.preventDefault();  // Evitar el comportamiento por defecto del link
  modalRegistro.showModal(); // Abre el modal de Registro
});

// Cerrar el modal de Login con el botón 'X'
btnCerrarModalLogin.addEventListener("click", () => {
  modalLogin.close();      // Cierra el modal de Login
});

// Cerrar el modal de Registro con el botón 'X'
btnCerrarModalRegistro.addEventListener("click", () => {
  modalRegistro.close();    // Cierra el modal de Registro
});