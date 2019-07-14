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
document.addEventListener('DOMContentLoaded', function() {
    var rDiaria = document.querySelectorAll('.collapsible');
    var instances = M.Collapsible.init(rDiaria);
});
document.addEventListener("DOMContentLoaded", event => {
    let scanner = new Instascan.Scanner({ video: document.getElementById('preview'), mirror: false });
    Instascan.Camera.getCameras().then(cameras => {
        if (cameras.lenght > 0) {
            scanner.camera = cameras[0];
            scanner.start();
        } else {
            scanner.camera = cameras[1];
            scanner.start();
        }

    }).catch(e => console.error(e));

    scanner.addListener('scan', content => {
        window.open(content);
    });

});