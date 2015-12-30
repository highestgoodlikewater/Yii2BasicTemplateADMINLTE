<div class="form-group">
    <label class="control-label" for="lat">Latitude</label>
    <input class="form-control" type="text" value="-6.903429" name="lat" id="lat">
</div>
<div class="form-group">
    <label class="control-label" for="lng">Longitude</label>
    <input class="form-control" type="text" value="107.5030708" name="lng" id="lng">
</div>
<div class="form-group">
    <label class="control-label" for="zoom">Zoom</label>
    <input class="form-control" type="text" name="zoom" id="zoom">
</div>
 
<?= \ibrarturi\latlngfinder\LatLngFinder::widget([
    'latAttribute' => 'lat',        // Latitude text field id
    'lngAttribute' => 'lng',        // Longitude text field id
    'zoomAttribute' => 'zoom',      // Zoom text field id
    'mapCanvasId' => 'map',         // Map Canvas id
    'mapWidth' => 450,              // Map Canvas width
    'mapHeight' => 300,             // Map Canvas mapHeight
    'defaultLat' => -6.903429,        // Default latitude for the map
    'defaultLng' =>107.5030708,         // Default Longitude for the map
    'defaultZoom' => 8,             // Default zoom for the map
    'enableZoomField' => true,      // True: for assigning zoom values to the zoom field, False: Do not assign zoom value to the zoom field
]); ?>