<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css">

 <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"></script>                                                           <button type="button" class="btn btn-block btn-light" data-toggle="modal" data-target="#mapModal">انتخاب</button>
<!-- Map Modal -->
    <div class="modal fade" id="mapModal" tabindex="-1" role="dialog" aria-labelledby="mapModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mapModalLabel">انتخاب موقعیت مکانی ملک از روی نقشه:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="mapId" style="height: 300px;"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-danger btn-sm">ثبت</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /Map Modal -->

<script>
 // add a tile layer to our map
var url = 'http://{s}.tile.osm.org/{z}/{x}/{y}.png';
var attr = '&copy; <a href="http://openstreetmap.org/copyright">OpenStreetMap</a> contributors',
    osm = L.tileLayer(url, {
        maxZoom: 18,
        attribution: attr
    });
// initialize the map
var map = L.map('mapId').setView([35.6892, 51.3890], 10).addLayer(osm);
// Script for adding marker on map click

$('#mapModal').on('shown.bs.modal', function(){
    setTimeout(function() {
        map.invalidateSize();
    }, 10);
});
</script>
