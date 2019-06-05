document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, options = {
        dismissible: false,
        opacity: 0.5
    });
});
$(document).ready(function() {
    $('input.autocomplete').autocomplete({
        data: {
            "Apple": null,
            "Microsoft": null,
            "Google": 'https://placehold.it/250x250'
        },
    });
});

function ocultarBotones() {
    $('.botones').hide();
    $('.info-misreservas').hide();
    $('.menu-reser').hide();
}

function mostrarBotones() {
    $('.botones').show();
    $('.info-misreservas').show();
    $('.menu-reser').show();
}



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
/* function mostrarBotones(){
  document.getElementsByClassName('botones').style.display = 'flex';
}
function ocultarBotones(){
  document.getElementsByClassName('botones').style.display = 'none';
} */