<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue layout-top-nav">
  <div class="wrapper">

    <?php include 'includes/navbar.php'; ?>

    <div class="content-wrapper">
      <div class="container">

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <?php
            if (isset($_SESSION['error'])) {
              echo "
	        					<div class='alert alert-danger'>
	        						" . $_SESSION['error'] . "
	        					</div>
	        				";
              unset($_SESSION['error']);
            }
            ?>

            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
              </ol>
              <div class="carousel-inner">
									<div class="item active">
										<img src="images/build.png" alt="First slide">
									</div>
									<div class="item">
										<img src="images\aboutttt.jpg"alt="Second slide">
									</div>
									<div class="item">
										<img src="images\no1.jpg" alt="Third slide">
									</div>
								</div>
              <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                <span class="fa fa-angle-left"></span>
              </a>
              <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                <span class="fa fa-angle-right"></span>
              </a>
            </div>
            
              <?php
              $month = date('m');
              $conn = $pdo->open();

              try {
                $inc = 3;
                $stmt = $conn->prepare("SELECT *, SUM(quantity) AS total_qty FROM details LEFT JOIN sales ON sales.id=details.sales_id LEFT JOIN products ON products.id=details.product_id WHERE MONTH(sales_date) = '$month' GROUP BY details.product_id ORDER BY total_qty DESC LIMIT 6");
                $stmt->execute();
                foreach ($stmt as $row) {
                  $image = (!empty($row['photo'])) ? 'images/' . $row['photo'] : 'images/noimage.jpg';
                  $inc = ($inc == 3) ? 1 : $inc + 1;
                  if ($inc == 1)
                    echo "<div class='row'>";
                  echo "
                  <p style='font-size: 24px; font-weight: bold;'>Top Selling Products</p>
	       							<div class='col-sm-4'>
	       								<div class='box box-solid'>
		       								<div class='box-body prod-body'>
		       									<img src='" . $image . "' width='100%' height='230px' class='thumbnail'>
		       									<h5><a href='product.php?product=" . $row['slug'] . "'>" . $row['name'] . "</a></h5>
		       								</div>
		       								<div class='box-footer'>
		       									<b>Rs " . number_format($row['price'], 2) . "</b>
		       								</div>
	       								</div>
	       							</div>
	       						";
                  if ($inc == 3)
                    echo "</div>";
                }
                if ($inc == 1)
                  echo "<div class='col-sm-4'></div><div class='col-sm-4'></div></div>";
                if ($inc == 2)
                  echo "<div class='col-sm-4'></div></div>";
              } catch (PDOException $e) {
                echo "There is some problem in connection: " . $e->getMessage();
              }

              $pdo->close();

              ?>
              <div class="col-md-12">
              <div class="full">
                <div class="main_heading text_align_center">
                  <h2>We are Leading Company</h2>
                  <p class="large">Fastest service with best price!</p>
                </div>
              </div>
            </div>
            <section class="content">
              <div class="row">
                <div class="col-sm-9">

                  <div class="row about_blog">
                    <div class=" ">
                      <div class="full text_align_left">
                        <h3>Company Overview</h3>
                        <p>
                          Lanka PC (PVT) Ltd is an innovative ICT product distributor and
                          service provider which established in 2019. We provide
                          cutting-edge and reliable technology solutions for PC, State
                          Institutions and Large Enterprises. Our certified and
                          specialized technology support team ensures to deliver efficient
                          and competent technical solutions from pre sales to after sales
                          levels. Today we partnered with more than twenty global vendors.
                          Our channel network consists of more than thousand retail
                          channel partners and more than hundred corporate channel
                          partners all around Sri Lanka.Lanka PC main strength is the
                          human resource work under us. Today more than 100 employees work
                          under Lanka PC family to deliver high standard value added
                          service to customers.
                        </p>
                        <br />
                        <h3>Retail Channel</h3>
                        <p>
                          Lanka PC provides a range of ICT products for the retail
                          partners in Sri Lanka covering a wider product scope. Our
                          business is focused via authorized retail partner channel. Our
                          authorized partner network exceeds more than one thousand
                          companies across Sri Lanka. Lanka PC is committed to deliver
                          high tech products with most competitive prices with a reliable
                          after sales and technical support.
                          <br />
                          <br />
                          We cover entire country through our Retail Partner Channel. This
                          Island wide partner channel allocated to our Retail Channel
                          Account Managers and they overlook all the partners in their
                          respective allocated region.
                        </p>
                        <ul>
                          <li>
                            <i class="fa fa-check-circle"></i>Cyber Security Solutions.
                          </li>
                          <li>
                            <i class="fa fa-check-circle"></i>Security & Surveillance
                            Solutions.
                          </li>
                          <li>
                            <i class="fa fa-check-circle"></i>Telecommunication Solutions.
                          </li>
                          <li>
                            <i class="fa fa-check-circle"></i>Network Management and
                            Storage Solutions.
                          </li>
                          <li>
                            <i class="fa fa-check-circle"></i>Technology Consultation
                            Solutions.
                          </li>
                          <li>
                            <i class="fa fa-check-circle"></i>Power and Energy Solutions.
                          </li>
                          <li>
                            <i class="fa fa-check-circle"></i>Document Management
                            Solutions.
                          </li>
                          <li>
                            <i class="fa fa-check-circle"></i>Point of Sale (POS)
                            Solutions.
                          </li>
                          <li>
                            <i class="fa fa-check-circle"></i>Audio Visual Solutions.
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-3">
                  <?php include 'includes/sidebar.php'; ?>
                </div>
              </div>
            </section>

          </div>
        </section>

      </div>
    </div>

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

        var image = 'https://maps.google.com/mapfiles/ms/icons/blue-dot.png';
        var beachMarker = new google.maps.Marker({
          position: { lat: 9.8043, lng: 80.1654 },
          map: map,
          icon: image,
        });
      }
    </script>
    <!-- google map js -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap"></script>
    <!-- end google map js -->
  </div>

  <?php include 'includes/scripts.php'; ?>
</body>

</html>