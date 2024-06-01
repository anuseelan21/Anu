<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        <?php include 'styles/footer.css' ?>
    </style>
</head>
<body>
      <!-- section -->
      <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="full">
              <div class="contact_us_section">
                <div class="call_icon">
                  <img src="images/it_service/phone_icon.png" alt="#" />
                </div>
                <div class="inner_cont">
                  <h2>REQUEST A FREE QUOTE</h2>
                  <p>Get answers and advice from people you want it from.</p>
                </div>
                <div class="button_Section_cont">
                  <a class="btn dark_gray_bt" href="it_contact.html"
                    >Contact us</a
                  >
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end section -->

    <footer>
      <div class="container-fuild">
        <div class="map_section">
          <div id="map"></div>
        </div>

        <div class="cprt">
          <p>S.Anuseelan</p>
        </div>
      </div>
    </footer>
    <!-- end footer -->

    <!-- map js -->
    <script>
      // This example adds a marker to indicate the position of Bondi Beach in Sydney,
      // Australia.
      function initMap() {
        var map = new google.maps.Map(document.getElementById("map"), {
          zoom: 11,
          center: { lat: 9.8043, lng: 80.1654 },
          styles: [
            {
              elementType: "geometry",
              stylers: [{ color: "#fefefe" }],
            },
            {
              elementType: "labels.icon",
              stylers: [{ visibility: "off" }],
            },
            {
              elementType: "labels.text.fill",
              stylers: [{ color: "#616161" }],
            },
            {
              elementType: "labels.text.stroke",
              stylers: [{ color: "#f5f5f5" }],
            },
            {
              featureType: "administrative.land_parcel",
              elementType: "labels.text.fill",
              stylers: [{ color: "#bdbdbd" }],
            },
            {
              featureType: "poi",
              elementType: "geometry",
              stylers: [{ color: "#eeeeee" }],
            },
            {
              featureType: "poi",
              elementType: "labels.text.fill",
              stylers: [{ color: "#757575" }],
            },
            {
              featureType: "poi.park",
              elementType: "geometry",
              stylers: [{ color: "#e5e5e5" }],
            },
            {
              featureType: "poi.park",
              elementType: "labels.text.fill",
              stylers: [{ color: "#9e9e9e" }],
            },
            {
              featureType: "road",
              elementType: "geometry",
              stylers: [{ color: "#eee" }],
            },
            {
              featureType: "road.arterial",
              elementType: "labels.text.fill",
              stylers: [{ color: "#3d3523" }],
            },
            {
              featureType: "road.highway",
              elementType: "geometry",
              stylers: [{ color: "#eee" }],
            },
            {
              featureType: "road.highway",
              elementType: "labels.text.fill",
              stylers: [{ color: "#616161" }],
            },
            {
              featureType: "road.local",
              elementType: "labels.text.fill",
              stylers: [{ color: "#9e9e9e" }],
            },
            {
              featureType: "transit.line",
              elementType: "geometry",
              stylers: [{ color: "#e5e5e5" }],
            },
            {
              featureType: "transit.station",
              elementType: "geometry",
              stylers: [{ color: "#000" }],
            },
            {
              featureType: "water",
              elementType: "geometry",
              stylers: [{ color: "#c8d7d4" }],
            },
            {
              featureType: "water",
              elementType: "labels.text.fill",
              stylers: [{ color: "#b1a481" }],
            },
          ],
        });

        var image = "images/it_service/location_icon_map_cont.png";
        var beachMarker = new google.maps.Marker({
          position: { lat: 9.8043, lng: 80.1654 },
          map: map,
          icon: image,
        });
      }
    </script>
    <!-- google map js -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap"></script>
    <!-- end google map js -->
</body>
</html>