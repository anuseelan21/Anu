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
                                            <div class="section padding_layout_1">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12">
                                                        </div>
                                                        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="row">
                                                                <div class="full">
                                                                    <div
                                                                        class="col-lg-6 col-md-6 col-sm-12 col-xs-12 adress_cont margin_bottom_30_all">
                                                                        <h4>Address</h4>
                                                                        <p>Contact with us.</p>
                                                                        <div class="">
                                                                            <div class="icon_bottom">
                                                                                <i class="fa fa-road"
                                                                                    aria-hidden="true"></i>
                                                                            </div>
                                                                            <div class="info_cont">
                                                                                <h4>MVK Road,Nelliady.</h4>
                                                                                <p>Jaffna,Sri Lanka.</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="">
                                                                            <div class="icon_bottom">
                                                                                <i class="fa fa-user"
                                                                                    aria-hidden="true"></i>
                                                                            </div>
                                                                            <div class="info_cont">
                                                                                <h4>077 8453537</h4>
                                                                                <p>Mon-Fri 8:30am-6:30pm</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="">
                                                                            <div class="icon_bottom">
                                                                                <i class="fa fa-envelope"
                                                                                    aria-hidden="true"></i>
                                                                            </div>
                                                                            <div class="info_cont">
                                                                                <h4>Lankapc21@gmail.com</h4>
                                                                                <p>24/7 online support</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="col-lg-12 col-md-12 col-sm-12 col-xs-12 contant_form">
                                                                        <h4>GET IN TOUCH</h4>
                                                                        <p>
                                                                            Our goal is to provide the best customer
                                                                            service and to
                                                                            answer all of your questions in a timely
                                                                            manner.
                                                                        </p>
                                                                        <div class="form_section">
                                                                            <form class="form_contant"
                                                                                action="index.html">
                                                                                <fieldset>
                                                                                    <div class="row">
                                                                                        <div
                                                                                            class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                                                            <input class="field_custom"
                                                                                                placeholder="Websire URL"
                                                                                                type="text" required />
                                                                                        </div>
                                                                                        <div
                                                                                            class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                                                            <input class="field_custom"
                                                                                                placeholder="Your name"
                                                                                                type="text" required />
                                                                                        </div>
                                                                                        <div
                                                                                            class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                                                            <input class="field_custom"
                                                                                                placeholder="Email adress"
                                                                                                type="email" required />
                                                                                        </div>
                                                                                        <div
                                                                                            class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                                                            <input class="field_custom"
                                                                                                placeholder="Phone number"
                                                                                                type="text" required />
                                                                                        </div>
                                                                                        <div
                                                                                            class="field col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                            <textarea
                                                                                                class="field_custom"
                                                                                                placeholder="Messager"
                                                                                                required></textarea>
                                                                                        </div>
                                                                                        <div class="center">
                                                                                            <a class="btn main_bt"
                                                                                                href="#">SUBMIT NOW</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </fieldset>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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