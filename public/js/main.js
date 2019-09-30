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
document.addEventListener('DOMContentLoaded', function() {
    var btnFloat = document.querySelectorAll('.fixed-action-btn');
    var instances = M.FloatingActionButton.init(btnFloat, {
        direction: 'left',
        hoverEnabled: false
    });
});
<<<<<<< HEAD
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
=======
>>>>>>> 6cc7bd29cbaa3d036aeddd0979f57af29b5eeb5f
