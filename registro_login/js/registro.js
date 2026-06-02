let errorNombre = document.getElementById("error-nombre");
errorNombre.classList.add("hidden");
document.getElementById("error-email").classList.add("hidden");
document.getElementById("error-password").classList.add("hidden");
document.getElementById("error-edad").classList.add("hidden");

// Obtener los datos del formulario
document.getElementById("formRegistro").addEventListener("submit", (e) => {
    
    let formularioValido = true;
  

  let nombre = document.getElementById("nombre").value.trim();
  alert(nombre);
  let email = document.getElementById("email").value.trim();
  let password = document.getElementById("password").value.trim();
  let edad = document.getElementById("edad").value;
  let idioma = document.getElementById("idioma").value;

  const regexNombre = /^[a-zA-ZáéíóúàèìòùüÁÉÍÓÚÀÈÌÒÙñÑçÇ\s]{2,}$/;
  if (!regexNombre.test(nombre)) {
    errorNombre.classList.remove("hidden");
    formularioValido = false;
  }

  if (!formularioValido) {
    e.preventDefault();
    console.log("Errores detectados");
  }
});
