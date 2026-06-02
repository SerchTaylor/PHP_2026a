let errorNombre = document.getElementById("error-nombre");
errorNombre.classList.add("hidden");
let errorEmail = document.getElementById("error-email")
errorEmail.classList.add("hidden");
let errorPassword = document.getElementById("error-password")
errorPassword.classList.add("hidden");
let errorEdad = document.getElementById("error-edad")
errorEdad.classList.add("hidden");

// Obtener los datos del formulario
document.getElementById("formRegistro").addEventListener("submit", (e) => {
    
    let formularioValido = true;
  
  let nombre = document.getElementById("nombre").value.trim();
  let email = document.getElementById("email").value.trim().toLocaleLowerCase();
  let password = document.getElementById("password").value.trim();
  let edad = document.getElementById("edad").value;
  let idioma = document.getElementById("idioma").value;

  
  const regexNombre = /^[a-zA-ZáéíóúàèìòùüÁÉÍÓÚÀÈÌÒÙñÑçÇ\s]{2,}$/;
  if (!regexNombre.test(nombre)) {
    errorNombre.classList.remove("hidden");
    formularioValido = false;
  }

  const regexEmail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/
  if (!regexEmail.test(email)){
    errorEmail.classList.remove("hidden");
    formularioValido = false;
  }

  const regexPassword = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z0-9]).{8}$/
  if (!regexPassword.test(password)){
    errorPassword.classList.remove("hidden");
    formularioValido = false;
  }

  if (parseInt(edad) < 18){
    errorEdad.classList.remove('hidden')
    formularioValido = false;
  }

  if (!formularioValido) {
    e.preventDefault();
    console.log("Errores detectados");
  }
});
