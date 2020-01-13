console.log('impreso desde scripts js ');

$(document).ready(() => {
    console.log('Entro  la funcion');

    $('.site-header .menu-principal .menu').slicknav({
        label: '',
        appendTo: '.site-header'
    })

})