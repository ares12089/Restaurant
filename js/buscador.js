(function(document) {
    'buscador';

    var LightTableFilter = (function(Arr) {

      var _input;

      function _onInputEvent(e) {
        _input = e.target;
        var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
        Arr.forEach.call(tables, function(table) {
          Arr.forEach.call(table.tBodies, function(tbody) {
            Arr.forEach.call(tbody.rows, _filter);
          });
        });
      }

      function _filter(row) {
        var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
        row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
      }

      return {
        init: function() {
          var inputs = document.getElementsByClassName('light-table-filter');
          Arr.forEach.call(inputs, function(input) {
            input.oninput = _onInputEvent;
          });
        }
      };
    })(Array.prototype);

    document.addEventListener('readystatechange', function() {
      if (document.readyState === 'complete') {
        LightTableFilter.init();
      }
    });

  })(document);

// Obtener la referencia a la tabla
var table = document.getElementById('table1');

// Establecer el color de fondo blanco
table.style.backgroundColor = '#ffffff';

// Eliminar los bordes de las celdas individuales
var cells = table.getElementsByTagName('td');
for (var i = 0; i < cells.length; i++) {
  cells[i].style.border = 'none';
}

// Establecer el sombreado en la parte inferior
table.style.boxShadow = '0px 5px 10px -5px #333333';


