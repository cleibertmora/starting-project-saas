import { call_to_api, display_alert_after_action } from './global';

// ROLES & PERMISOS
const CONFIG_PATH_GROUP = 'config';
$("#btn_test").on("click", update_rol)

const checks = document.getElementsByClassName("assign_or_revome_permission");

Array.from(checks).forEach(function(element) {    
    element.addEventListener('change', ( e ) => {
        update_rol( e );
    });
});

async function update_rol(elem) {

    var data = {
        role: elem.target.dataset.role,
        permiso: elem.target.dataset.permiso,
        asignado: elem.target.checked ? 1 : 0
    };
    
    try {
        var toggle_permission_to_role = await call_to_api( `${CONFIG_PATH_GROUP}/update-rol`, data );
        display_alert_after_action(toggle_permission_to_role);
    } catch (error) {
        elem.target.checked ? elem.target.checked = false : elem.target.checked = true
        display_alert_after_action('Un error ocurrio, intente más tarde o contacte a soporte.', toggle_permission_to_role);
    }

}