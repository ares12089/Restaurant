var modoOscuro = false;


function cambiarModo() {
    var boton = document.getElementById("modoOscuroBtn");
    var body = document.body;
    var navbar = document.querySelector(".navbar");
    var sidebar = document.querySelector(".sidebar");
  
    if (modoOscuro) {
      body.classList.remove("dark-mode");
      navbar.classList.remove("dark-mode");
      sidebar.classList.remove("dark-mode");
      boton.innerHTML = '<i class="fa-solid fa-moon fa-bounce" style="color: #000000;"></i>';
      modoOscuro = false;
    } else {
      body.classList.add("dark-mode");
      navbar.classList.add("dark-mode");
      sidebar.classList.add("dark-mode");
      boton.innerHTML = '<i class="fa-solid fa-sun fa-bounce" style="color: #000000;"></i>';
      modoOscuro = true;
    }
  }

