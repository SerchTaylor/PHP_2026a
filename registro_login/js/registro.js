// párrafo para mostrar el mensaje de correo duplicado
const pEmailDuplicado = document.querySelector("body > div p:first-child")


let errorNombre = document.getElementById("error-nombre")
let errorEmail = document.getElementById("error-email");
let errorPassword = document.getElementById("error-password");
let errorEdad = document.getElementById("error-edad");

// Obtener el evento de carga de la página
document.addEventListener("DOMContentLoaded", (e) => {

  const URLPARAMS = new URLSearchParams(window.location.search)
  console.log(URLPARAMS);

  if(URLPARAMS.get("error") === "email_duplicado") {
    pEmailDuplicado.textContent = "El email ya existe. Acceda desde el login"
  }
});

// Obtener los datos del formulario mediante el evento SUBMIT
document.getElementById("formRegistro").addEventListener("submit", (e) => {
  let formularioValido = true;

  let nombre = document.getElementById("nombre").value.trim();
  let email = document.getElementById("email").value.trim().toLocaleLowerCase();
  let password = document.getElementById("password").value.trim();
  let edad = document.getElementById("edad").value;
  let idioma = document.getElementById("idioma").value;

  const regexNombre = /^[a-zA-ZáéíóúàèìòùüÁÉÍÓÚÀÈÌÒÙñÑçÇ\s]{2,}$/;
  if (!regexNombre.test(nombre)) {
    errorNombre.textContent = "El nombre debe tener como mínimo dos letras y no debe contener caracteres especiales (<>/+, etc.)."
    formularioValido = false;
  }

  const regexEmail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  if (!regexEmail.test(email)) {
    errorEmail.classList.remove("hidden");
    formularioValido = false;
  }

  const regexPassword =
    /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z0-9]).{8}$/;
  if (!regexPassword.test(password)) {
    errorPassword.classList.remove("hidden");
    formularioValido = false;
  }

  if (parseInt(edad) < 18) {
    errorEdad.classList.remove("hidden");
    formularioValido = false;
  }

  if (!formularioValido) {
    e.preventDefault();
    console.log("Errores detectados");
  }
});
