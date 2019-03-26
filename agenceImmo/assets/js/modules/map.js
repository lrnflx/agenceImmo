import L from 'leaflet'
import 'leaflet/dist/leaflet.css'


export class Map{
    static init(){
        let map = document.querySelector('#map')
        if(map === null){
            return 
        }
        let icon = L.icon({
            iconUrl: '/images/marker-icon.png'
        });


        let center = [map.dataset.lat, map.dataset.lng]
        map = L.map('map').setView(center, 13)
        let token = 'pk.eyJ1IjoibHJuZmx4IiwiYSI6ImNqdHB1am41ZDAzdWUzeXFkcmYzN3RqbWkifQ.2BgDPL2JpBg3NUP32byc6w'
        L.tileLayer('https://api.mapbox.com/v4/mapbox.streets/{z}/{x}/{y}.png?access_token='+token, {
        attribution: '<a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        minZoom: 12,
        }).addTo(map)
        L.marker(center, {icon: icon}).addTo(map)
    }
}