if ('serviceWorker' in navigator) {
    window.addEventListener('load', function() {
      navigator.serviceWorker.register('/sw.js').then(function(registration) {
        // Registration was successful
        console.log('ServiceWorker registration successful with scope: ', registration.scope);
      }, function(err) {
        // registration failed :(
        console.log('ServiceWorker registration failed: ', err);
      });
    });
  }

function editarcampos() {

    document.getElementById('txtNombre').contentEditable = true;
    document.getElementById('txtNombre').focus();
    document.getElementById('txtApellido').contentEditable = true;
    document.getElementById('txtCorreo').contentEditable = true;
    document.getElementById("btnsEdicion").innerHTML = '<button class="animated fadeIn slower boton-submit waves-effect waves-light col s5 left" type="submit" name="action">Guardar</button>' +
        '<button onClick="cancelarEditar()" class="animated fadeIn slower boton-submit red darken-1 waves-effect waves-light col s5 right" type="submit" name="action">Cancelar'

};

function cancelarEditar() {

    document.getElementById('txtNombre').contentEditable = false;
    document.getElementById('txtApellido').contentEditable = false;
    document.getElementById('txtCorreo').contentEditable = false;
    location.reload();
}

$(document).ready(function() {
    $('input.autocomplete').autocomplete({
        data: {
            "Apple": null,
            "Microsoft": null,
            "Google": 'https://placehold.it/250x250'
        },
    });
});
document.addEventListener('DOMContentLoaded', function() {
    var btnFloat = document.querySelectorAll('.fixed-action-btn');
    var instances = M.FloatingActionButton.init(btnFloat, {
        direction: 'left',
        hoverEnabled: false
    });
});
