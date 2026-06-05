// párrafo para mostrar el mensaje de correo duplicado
const pEmailDuplicado = document.querySelector("body > div p:first-child")


let errorNombre = document.getElementById("error-nombre")
let errorEmail = document.getElementById("error-email");
let errorPassword = document.getElementById("error-password");
// let errorEdad = document.getElementById("error-edad");

// Obtener el evento de carga de la página
document.addEventListener("DOMContentLoaded", (e) => {

  errorNombre.textContent = ""
  errorEmail.textContent = ""
  errorPassword.textContent = ""
  // errorEdad.textContent = ""

  const URLPARAMS = new URLSearchParams(window.location.search)
  console.log(URLPARAMS);
  URLPARAMS.forEach(url => {
    console.log(url);
  });

  if(URLPARAMS.get("error") === "email_duplicado") {
    pEmailDuplicado.textContent = "El email ya existe. Utilice otro para registrarse o acceda desde el login"
  }
});

// Obtener los datos del formulario mediante el evento SUBMIT
document.getElementById("formRegistro").addEventListener("submit", (e) => {
  let formularioValido = true;

  let nombre = document.getElementById("nombre").value.trim();
  let email = document.getElementById("email").value.trim().toLocaleLowerCase();
  let password = document.getElementById("password").value;
  let edad = document.getElementById("edad").value;
  let idioma = document.getElementById("idioma").value;

  const regexNombre = /^[a-zA-ZáéíóúàèìòùüÁÉÍÓÚÀÈÌÒÙñÑçÇ\s]{2,}$/;
  if (!regexNombre.test(nombre)) {
    errorNombre.textContent = "El nombre debe tener como mínimo dos letras y no debe contener caracteres especiales (<>/+, etc.)."
    formularioValido = false;
  }

  const regexEmail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  if (!regexEmail.test(email)) {
    errorEmail.textContent = "Debe introducir un email válido."
    formularioValido = false;
  }

  const regexPassword =
    /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z0-9]).{8}$/;
  if (!regexPassword.test(password)) {
    errorPassword.textContent = "La contraseña debe tener 8 caracteres, con como mínimo una letra mayúscula, una letra minúscula, un número y un carácter especial."
    formularioValido = false;
  }

  // if (parseInt(edad) < 18) {
  //   errorEdad.textContent = "Debes ser mayor de 18 años.";
  //   formularioValido = false;
  // }

  if (!formularioValido) {
    e.preventDefault();
    console.log("Errores detectados");
  }
});
