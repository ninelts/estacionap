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
