// párrafo para mostrar el mensaje de identificación incorrecta
const pErrorLogin = document.querySelector("body > div p:first-child");

const errorEmail = document.getElementById("error-email");
const errorPassword = document.getElementById("error-password");

// Obtener el evento de carga de la página
document.addEventListener("DOMContentLoaded", (e) => {

  errorEmail.textContent = ""
  errorPassword.textContent = ""

  const URLPARAMS = new URLSearchParams(window.location.search)
  console.log(URLPARAMS);
  URLPARAMS.forEach(url => {
    console.log(url);
  });

  if(URLPARAMS.get("error") === "login") {
    pErrorLogin.textContent = "Error en el acceso. Revise el email y la contraseña."
  }
});


document.getElementById("formLogin").addEventListener("submit", (e) => {
  let formularioValido = true;

  let email = document.getElementById("email").value.trim().toLocaleLowerCase();
  let password = document.getElementById("password").value;

  const regexEmail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  if (!regexEmail.test(email)) {
    errorEmail.textContent = "Debe introducir un email válido.";
    formularioValido = false;
  }

  const regexPassword =
    /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z0-9]).{8}$/;
  if (!regexPassword.test(password)) {
    errorPassword.textContent =
      "La contraseña debe tener 8 caracteres, con como mínimo una letra mayúscula, una letra minúscula, un número y un carácter especial.";
    formularioValido = false;
  }

  if (!formularioValido) {
    e.preventDefault();
    console.log("Errores detectados");
  }
});
