var modoOscuro = false;


function cambiarModo() {
var boton = document.getElementById("modoOscuroBtn");


if (modoOscuro) {
document.body.style.backgroundColor = "white";
document.body.style.color = "#060B12";
boton.innerHTML = '<i class="fa-solid fa-sun fa-bounce" style="color: #000000;"></i>';
modoOscuro = false;
} else {
document.body.style.backgroundColor = "#060B12";
document.body.style.color = "white";
boton.innerHTML = '<i class="fa-solid fa-moon fa-bounce" style="color: #000000;"></i>';
modoOscuro = true;
}
}