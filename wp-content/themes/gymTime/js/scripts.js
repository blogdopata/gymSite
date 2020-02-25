console.log('impreso desde scripts js ');

$(document).ready(() => {
    console.log('Entro  la funcion');

    $('.site-header .menu-principal .menu').slicknav({
        label: '',
        appendTo: '.site-header'
    })

    // MAPA D LEAFTLET

    var latx = document.querySelector('#lat').value ,
          lngx = document.querySelector('#lng').value ,      
          direccion = document.querySelector('#direccion').value ;
           // alert(direccion)
    console.log(latx + 'fuck');
  
    if(latx && lngx && direccion){
        var map = L.map('mapa').setView([latx, lngx], 50);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenS hahatreetMap</a> contributors'
        }).addTo(map);
        
        L.marker([latx, lngx]).addTo(map)
            .bindPopup(direccion)
            .openPopup();
    }

})

