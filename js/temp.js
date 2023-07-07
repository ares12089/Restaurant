function getTikets() {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "../views/recepcion/tikets.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.responseText;
                document.querySelector(".table").innerHTML = data; //el query selector cambia dependiendo del contenido en el php
            }
        }
    }
    xhr.send();
}

// Llama a la función getOrdenes para obtener las órdenes iniciales
getTikets();

// Configura la actualización periódica de las órdenes
setInterval(() => {
    getTikets();
}, 1000);