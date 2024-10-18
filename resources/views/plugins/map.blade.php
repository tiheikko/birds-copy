<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    var map = L.map('map').setView([57.796772, 28.276392], 10);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
    }).addTo(map);

    var def_lat = 57.821985;
    var def_lng = 28.333067;
    var marker;

    var def_marker = L.marker([def_lat, def_lng]).addTo(map);
    document.getElementById('latitude').value = def_lat;
    document.getElementById('longitude').value = def_lng;

    map.on('click', function(e) {
        var lat = e.latlng.lat;
        var lng = e.latlng.lng;

        if (def_marker) {
            map.removeLayer(def_marker);
            def_marker = null;
        }

        if (marker) {
            marker.setLatLng([lat, lng]);
        } else {
            marker = L.marker([lat, lng]).addTo(map);
        }

        document.getElementById('latitude').value = lat;
        document.getElementById('longitude').value = lng;
    });
</script>
