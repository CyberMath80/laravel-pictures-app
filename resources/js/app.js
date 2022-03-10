require('./bootstrap');
require('alpinejs');

import Swal from 'sweetalert2';

$(document).ready(function(){
    let ajaxForm = $('form.ajax-form');

    $(ajaxForm).each(function() {
        $(this).on('submit', (e) => {
            e.preventDefault();
            let method = $(this).find('input[name="_method"]').val() || $(this).attr('method');
            alert(method);
        });
    });
});
