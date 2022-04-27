require('./bootstrap');

import Alpine from 'alpinejs';
Alpine.start();

import Swal from 'sweetalert2';

$(document).ready(function(){
    let ajaxForm = $('form.ajax-form');
    let progress = $('#progress');
    let progressbar = $(progress).find('#progressbar');
    let withFile = $('form.withFile');
    let vote = $('a.vote');
    let destroyForm = $('form.destroy');

    $(destroyForm).each(function(){
        $(this).on('submit', (e) => {
            e.preventDefault();
            let method = $(this).find('input[name="_method"]').val() || $(this).attr('method');
            let form = $(this);
            let url = $(this).attr('action');

            Swal.fire({
                title: 'Supprimer ?',
                text: 'Veuillez confirmer la suppression',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Oui',
                cancelButtonText: 'Annuler',
                allowOutsideClick: false,
            }).then((result) => {
                if(result.value) {
                    $.ajax({
                        url: url,
                        type: method,
                        data: $(form).serialize(),
                        dataType: 'json',
                        success: (response) => {
                            if(response.success) {
                                let redirect = response.redirect || null;
                                handleSuccess(response.success, redirect);
                            }
                        },
                        error: (xhr, status, err) => {
                            handleErrors(xhr);
                        }
                    })
                }
            })
        })
    })

    $(vote).each(function(){
        $(this).on('click', (e) => {
            e.preventDefault();
            //alert('Vote !');
            $.ajax({
                url: $(this).attr('href'),
                type: 'GET',
                dataType: 'json',
                success: (response) => {
                    if(response.success) {
                        let redirect = response.redirect || null;
                        handleSuccess(response.success, redirect);
                    }
                    if(response.error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Erreur !',
                            text: response.error,
                        });
                    }
                },
                error: (xhr, status, err) => {
                    handleErrors(xhr);
                }
            })
        })
    })

    $(withFile).each(function(){
        $(this).on('submit', (e) => {
            e.preventDefault();

            let form = $(this);
            let method = $(this).find('input[name="_method"]').val() || $(this).attr('method');
            let url = $(this).attr('action');
            let data = new FormData(this);
            let button = $(this).find('button');
            $(button).prop('disabled', true);
            let inputFile = $(this).find('input[type="file"]');
            let file = $(inputFile).get(0).files;

            if($(file).length)
            {
                let filename = $(inputFile).get(0).files[0].name;
                data.append(filename, $(inputFile.get(0).files[0]));

                $(progress).show();

                var config = {
                    url: url,
                    method: method,
                    data: data,
                    responseType: 'json',
                    onUploadProgress: (e) => {
                        let percentCompleted = Math.round((e.loaded * 100) / e.total);
                        //console.log(percentCompleted);
                        $(progressbar).width(percentCompleted+'%').text(percentCompleted+'%');
                        if(percentCompleted == 100){
                            $(progress).fadeOut().width('0%').text('0%');
                        }
                    }
                }

                axios(config)
                    .then(function(response){
                        $(button).prop('disabled', false);
                        //console.log(response);
                        if(response.data.success){
                            let redirect = response.data.redirect || null;
                            handleSuccess(response.data.success, redirect);
                        }
                    })
                    .catch(function(error){
                        $(button).prop('disabled', false);
                        if(error.response){
                            if(error.response.status === 422 && error.response.data.errors){
                                console.log(error.response.data.errors);
                                let errorString = '';
                                $.each(error.response.data.errors, function(key, value){
                                    errorString += '<p>'+value+'</p>';
                                })
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops... 😕',
                                    html: errorString,
                                    allowOutsideClick: false,
                                })
                                return false;
                            }
                            handleErrors(error.response);

                        } else if (error.request) {

                            console.log(error.request);
                        } else {
                            console.log('Error', error.message);
                        }
                        console.log(error.config);
                    });
            }
            else
            {
                Swal.fire({
                    icon: 'error',
                    title: 'Oups!',
                    text: 'Veuillez ajouter une image',
                })
                $(button).prop('disabled', false);
            }
        })
    })

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
    }).then((result) => {
        if((result.value && redirect) || redirect) window.location = redirect;
    });
}

function handleErrors(xhr) {
    switch(xhr.status) {
        case 404:
            Swal.fire({
                icon: 'error',
                title: 'Ouch !',
                text: 'Cette page n\'existe pas !',
                allowOutsideClick: false,
            });
            break;
        case 419:
            Swal.fire({
                icon: 'error',
                title: 'Ouch !',
                text: 'Jeton de sécurité invalide ! Veuillez recharger la page en cliquant sur OK.',
                allowOutsideClick: false,
            }).then((result) => {
                if(result.value) window.location.reload(true);
            });
            break;
        case 422: //erreur de validation
            console.log(xhr.responseJSON.errors);
            let errorString = '';
            $.each(xhr.responseJSON.errors, function(key, value) {
                errorString += '<p>'+value+'</p>';
            });
            Swal.fire({
                icon: 'error',
                title: 'Erreur !',
                html: errorString,
                allowOutsideClick: false,
            });
            break;
        default:
            Swal.fire({
                icon: 'error',
                title: 'Ouch !',
                text: 'Une erreur est survenue, veuillez recharger la page en cliquant sur OK.',
                allowOutsideClick: false,
            }).then((result) => {
                if(result.value) window.location.reload(true);
            });
            break;
    }
}
