    function actualizarContador() {
        // Realizar una solicitud AJAX al servidor para obtener el número actualizado de órdenes
        fetch('../controller/obtener_contador.php')
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
