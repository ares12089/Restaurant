//document.addEventListener("DOMContentLoaded", function () {

    //1
    //let contador = 0;

    // function aumentarContador() {
    //     contador++;
    //     document.getElementById("contador").textContent = contador;
    // }

    // 2
    // Función para obtener el número actualizado del contador del servidor
    // function obtenerContador() {
    // Realizar una solicitud AJAX al servidor
    //     var xhttp = new XMLHttpRequest();
    //     xhttp.onreadystatechange = function () {
    //         if (this.readyState == 4 && this.status == 200) {
    //             // Actualizar el contenido del contador con la respuesta del servidor
    //             document.getElementById("contador").textContent = this.responseText;
    //         }
    //     };
    //     xhttp.open("GET", "obtener_contador.php", true);  // Archivo PHP que devuelve el número actualizado
    //     xhttp.send();
    // }

    // Llamar a la función obtenerContador inicialmente y luego cada cierto intervalo de tiempo
    // obtenerContador();
    // setInterval(obtenerContador, 1000);  // Actualizar el contador cada 5 segundos (ajusta el intervalo según tus necesidades)


    //3
    function actualizarContador() {
        // Realizar una solicitud AJAX al servidor para obtener el número actualizado de órdenes
        fetch('obtener_contador.php')
            .then(response => response.text())
            .then(data => {
                // Actualizar el contenido del botón con el nuevo valor
                document.getElementById('btnOrdenes').innerHTML = 'Ordenes' + (data > 0 ? '(' + data + ')' : '') + '&nbsp;<i class="fa fa-shopping-cart"></i>';
            })
            .catch(error => {
                console.error('Error al obtener el conteo de órdenes:', error);
            });
    }
    
    // Actualizar el contador inicialmente
    actualizarContador();
    
    // Actualizar el contador cada 5 segundos (ajusta el intervalo según tus necesidades)
    setInterval(actualizarContador, 5000);
    
//});

