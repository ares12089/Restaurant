// archivo.js

//1
// Función para actualizar los datos en la página
// function actualizarDatos() {
//     $.ajax({
//         url: 'http://localhost/phpy/pruebas_pf/menu/chef.php',
//         method: 'GET',
//         dataType: 'html',
//         success: function (response) {
//             // Actualizar los datos en la página
//             $('#datos').html(response);
//         },
//         error: function (error) {
//             console.log(error);
//         }
//     });
// }

// Llamar a la función cada cierto intervalo de tiempo (por ejemplo, cada 5 segundos)
// setInterval(actualizarDatos, 2000);

//2
// setInterval(function () {
//     $.ajax({
//         url: 'ruta_del_script.php',
//         method: 'GET',
//         success: function (data) {
//             // Actualizar los datos en el DOM con los datos recibidos
//             $('#datos').html(data);
//         },
//         error: function (xhr, status, error) {
//             console.log('Error al obtener los datos: ' + error);
//         }
//     });
// }, 5000); // Actualizar cada 5 segundos

//3
// Elimina el código existente y reemplázalo con el siguiente

// Función para obtener y mostrar las órdenes actualizadas
function getOrdenes() {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "chef.php", true);
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
