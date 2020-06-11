//Fija la barra de navegación en el borde superior de la página para evitar que desaparezca cuando se hace scroll hacia abajo

// Cuando el usuario desplaza la página hacia abajo, ejecuta "myFunction"
window.onscroll = function() {myFunction()};

// Obtiene el elmento navbar (barra de navegación)
var navbar = document.getElementById("navbar");

// Obtiene la posición del borde superior de la barra de navegación
var sticky = navbar.offsetTop;

// Cuando la página tiene un valor de desplazamiento vertical superior al al valor de la posición de barra de navegación, se agrega a ésta la clase "sticky", en caso contrario se remueve dicha clase.
function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky");
  } else {
    navbar.classList.remove("sticky");
  }
}