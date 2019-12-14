@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-md-3">
            <div class="card mb-3">
                <div class="card-body text-center">
                    <img id="profilPic" src="{!!$profil->picture->large!!}" class="avatar img-circle card-img-top" alt="avatar">
                    <br>
                    <h3 class="profilNama" class="card-title">{!!$profil->name->first!!} {!!$profil->name->last!!}</h3>
                    <h6 class="profilEmail" class="card-subtitle mb-2 text-muted">{!!$profil->email!!}</h6>
                    <p id="profilSummary" class="card-text">{!!$profil->gender!!}, {!!$profil->dob->age!!} years old, i lived at
                        {!!$profil->location->street->name!!} number {!!$profil->location->street->number!!},
                        {!!$profil->location->city!!}, {!!$profil->location->state!!}, {!!$profil->location->country!!}
                        {!!$profil->location->postcode!!}</p>
                    <br> <button type="button" class="btn btn-link" data-toggle="modal" data-target="#mapModal">See my location</button>
                </div>
            </div>
            {{-- location modal --}}
            <div class="modal fade" id="mapModal" tabindex="-1" role="dialog" aria-labelledby="mapModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div id="mapId" style="height: 400px;"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-danger btn-sm">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- loading modal --}}
            <div id="loadingModal" class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <h4 class="text-center text-white">Loading...</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#akun" role="tab"
                        aria-controls="profile" aria-selected="false">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                        aria-controls="contact" aria-selected="false">Contact</a>
                </li>
            </ul>
            <div class="tab-content mt-5 px-5" id="myTabContent">
                <div class="tab-pane fade show active" id="akun" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-link pull-right">
                                <i class="fa fa-pencil"></i> Edit
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Username </label>
                        </div>
                        <div class="col-md-8">
                            <p id="profilUsername">{!!$profil->login->username!!}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Nama Lengkap </label>
                        </div>
                        <div class="col-md-8">
                            <p class="profilNama">{!!$profil->name->first!!} {!!$profil->name->last!!}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Alamat lengkap </label>
                        </div>
                        <div class="col-md-8">
                            <p id="profilAlamat">{!!$profil->location->street->name!!} #{!!$profil->location->street->number!!}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Kota </label>
                        </div>
                        <div class="col-md-8">
                            <p id="profilKota">{!!$profil->location->city!!}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Kodepos </label>
                        </div>
                        <div class="col-md-8">
                            <p id="profilPos">{!!$profil->location->postcode!!}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Negara </label>
                        </div>
                        <div class="col-md-8">
                            <p id="profilNegara">{!!$profil->location->country!!}</p>
                        </div>
                    </div>


                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Email </label>
                        </div>
                        <div class="col-md-8">
                            <p class="profilEmail">{!!$profil->email!!}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Nomor Telepon </label>
                        </div>
                        <div class="col-md-8">
                            <p id="profilTel">{!!$profil->phone!!}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Nomor HP </label>
                        </div>
                        <div class="col-md-8">
                            <p id="profilHP">{!!$profil->cell!!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <p>{!!$profil->name->first!!}</p> --}}
</div>
@endsection

@section('pagecss')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css">

<style>
#loadingModal .modal-dialog
{
    display: table;
    position: relative;
    margin: 0 auto;
    top: calc(50% - 24px);
}

#loadingModal .modal-dialog .modal-content
{
background-color: transparent;
border: none;
}

</style>
@endsection

@section('ajaxjs')
<script>
    function showLoadingModal(){
        $('#loadingModal').modal('show');
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#refreshProfile").click(function (e) {
        e.preventDefault();
        $.ajax({
            type: 'GET',
            url: '/profile/refresh',
            async: false,
            success: function (data) {
                console.log(data.profil);
                var profil = data.profil;
                var profilSummary = profil.gender+", "+profil.dob.age+"years old, i lived at "+
                                    profil.location.street.name+ ", No."+profil.location.street.number+
                                    ", "+profil.location.city+", "+profil.location.country+" "+
                                    profil.location.postcode;
                var profilAlamat = profil.location.street.name+ ", No."+profil.location.street.number;

                $('#profilPic').attr('src', profil.picture.large);
                $('.profilNama').html(profil.name.first+" "+profil.name.last);
                $('.profilEmail').html(profil.email);
                $('#profilSummary').html(profilSummary);
                $('#profilSummary').html(profilSummary);
                $('#profilUsername').html(profil.login.username);
                $('#profilAlamat').html(profilAlamat);
                $('#profilKota').html(profil.location.city);
                $('#profilPos').html(profil.location.postcode);
                $('#profilNegara').html(profil.location.country);
                $('#profilTel').html(profil.phone);
                $('#profilHP').html(profil.cell);

                $('#loadingModal').modal('hide');

                map = map;
                marker = marker;
                var newLatLng = new L.LatLng(profil.location.coordinates.latitude, profil.location.coordinates.longitude);
                marker.setLatLng(newLatLng);

                marker.bindPopup(profilAlamat + "<br>" + profil.location.city +" "+profil.location.country).openPopup();

                $('#mapModal').on('shown.bs.modal', function () {
                    setTimeout(function () {
                        map.invalidateSize();
                    }, 10);
                });
            }
        });
    });

</script>
@endsection

@section('mapjs')
<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"></script>

<script>
    var latitude = "{!!$profil->location->coordinates->latitude!!}";
    var longitude = "{!!$profil->location->coordinates->longitude!!}";

    var alamat = "{!!$profil->location->street->name!!} No.{!!$profil->location->street->number!!}";
    var kota = "{!!$profil->location->city!!}, {!!$profil->location->country!!}";

    var url = 'http://{s}.tile.osm.org/{z}/{x}/{y}.png';
    var attr = '&copy; <a href="http://openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        osm = L.tileLayer(url, {
            maxZoom: 18,
            attribution: attr
        });
    // initialize the map
    var map = L.map('mapId').setView([latitude, longitude], 10).addLayer(osm);
    // Script for adding marker
    marker = L.marker([latitude, longitude]).addTo(map);
    marker.bindPopup(alamat + "<br>" + kota).openPopup();

    $('#mapModal').on('shown.bs.modal', function () {
        setTimeout(function () {
            map.invalidateSize();
        }, 10);
    });

</script>
@endsection
