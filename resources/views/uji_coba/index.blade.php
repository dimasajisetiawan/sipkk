@extends('layouts.main')
@section('section')
<div class="container mt-5">
    <h2>How to Add Google Map in Laravel? - ItSolutionStuff.com</h2>
    <div id="map" style="height: 400px"></div>
</div>
<script type="text/javascript">
    function initMap() {
      const myLatLng = { lat: 22.2734719, lng: 70.7512559 };
      const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 5,
        center: myLatLng,
      });

      new google.maps.Marker({
        position: myLatLng,
        map,
        title: "Hello Rajkot!",
      });
    }

    window.initMap = initMap;
</script>

<script type="text/javascript"
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9rdLjKX4UXD0zJCRZcQUN9LfrVQRQtRoz&callback=initMap" ></script>
@endsection
