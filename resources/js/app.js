require('./bootstrap');
require('alpinejs');

import Swal from 'sweetalert2';

$(document).ready(function(){
    let ajaxForm = $('form.ajax-form');

    $(ajaxForm).each(function() {
        $(this).on('submit', (e) => {
            e.preventDefault();
            let method = $(this).find('input[name="_method"]').val() || $(this).attr('method');
            //alert(method);
            let data = $(this).serialize();
            //alert(data); return false;
            $.ajax({
                type: method,
                url: $(this).attr('action'),
                data: data,
                dataType: 'json',
                success: (response) => {
                    console.log(response);
                    if(response.success) {
                        let redirect = response.redirect || null;
                        handleSuccess(response.success, redirect);
                    }
                },
                error: (xhr, status, err) => {
                    //console.log(xhr, status, err);
                    //console.log(xhr.status);
                    handleErrors(xhr);
                }
            })
        });
    });
});

function handleSuccess(success, redirect) {
    Swal.fire({
        icon: 'success',
        title: 'Oh Yeah !',
        html: success,
        allowOutsideClick: false,
    }).then((result) => {
        if(result.value && redirect) window.location = redirect;
    });
}

function handleErrors(xhr) {
    switch(xhr.status) {
        case 404:
            Swal.fire({
                icon: 'error',
                title: 'Ouh lalaaa !',
                text: 'Cette page n\'existe pas !'
            });
            break;
        case 419:
            Swal.fire({
                icon: 'error',
                title: 'Ouh lalaaa !',
                text: 'Jeton de sécurité invalide ! Veuillez recharger la page en cliquant sur OK.'
            }).then((result) => {
                if(result.value) window.location.reload(true);
            });
            break;
        case 422: //erreur de validation
            //console.log(xhr.responseJSON.errors);
            let errorString = '';
            $.each(xhr.responseJSON.errors, function(key, value) {
                errorString += '<p>'+value+'</p>';
            });
            Swal.fire({
                icon: 'error',
                title: 'Erreur !',
                html: errorString
            });
            break;
        default:
            Swal.fire({
                icon: 'error',
                title: 'Ouh lalaaa !',
                text: 'Une erreur est survenue, veuillez recharger la page en cliquant sur OK.'
            }).then((result) => {
                if(result.value) window.location.reload(true);
            });
            break;
    }
}
