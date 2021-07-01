import "toastify-js/src/toastify.css"
import Toastify from 'toastify-js'

const BASE_URL = $('meta[name="base-url"]').attr('content');
const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': CSRF_TOKEN
    }
});

function call_to_api( path, data, type='POST', dataType='json' ){
    return new Promise((resolve, reject) => {
        $.ajax({
            type,
            url: `${BASE_URL}/${path}`,
            dataType,
            data,
            success: function (data) {
                resolve(data);
            },
            error: function (error) {
                reject(error)
            },
        })
    })
}

function display_alert_after_action( text, backgroundColor='#3e8bfb' , duration=3000, gravity="top", position="right" ){
    Toastify({
        text,
        duration,
        // destination: "https://github.com/apvarun/toastify-js",
        // newWindow: true,
        close: true,
        gravity, // `top` or `bottom`
        position, // `left`, `center` or `right`
        backgroundColor, // "linear-gradient(to right, #00b09b, #96c93d)",
        stopOnFocus: true, // Prevents dismissing of toast on hover
        onClick: function(){} // Callback after click
      }).showToast();
}

export { call_to_api, display_alert_after_action };