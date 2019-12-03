(function() {
    "use strict";

    document.addEventListener('DOMContentLoaded', function() {

        var map = L.map('mapa').setView([39.9874581, -0.0463639], 14);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        for (const key in prueba) {
            if (prueba.hasOwnProperty(key)) {
                const element = prueba[key];
                L.marker([element.coordLat,element.coordLong]).addTo(map)
            .bindPopup( key + ' <br> Stock: ' + element.stock)
            }
        }

            
    }); // DOM CONTENT LOADED
})();