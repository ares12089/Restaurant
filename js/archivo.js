
// Función para obtener y mostrar las órdenes actualizadas
function getOrdenes() {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "../views/chef/chef.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.responseText;
                document.querySelector(".bod").innerHTML = data; //el query selector cambia dependiendo del contenido en el php
            }
        }
    }
    xhr.send();
}

// Llama a la función getOrdenes para obtener las órdenes iniciales
getOrdenes();

// Configura la actualización periódica de las órdenes
setInterval(() => {
    getOrdenes();
}, 1000);
