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
						<div class="col-sm-9">
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
								<h2>Products</h2>
						</div>
						<section class="content">
							<div class="row">
								<div class="col-sm-9">

									<?php

									$conn = $pdo->open();

									try {
										$inc = 3;
										$stmt = $conn->prepare("SELECT * FROM products ");
										$stmt->execute();
										foreach ($stmt as $row) {
											$image = (!empty($row['photo'])) ? 'images/' . $row['photo'] : 'images/noimage.jpg';
											$inc = ($inc == 3) ? 1 : $inc + 1;
											if ($inc == 1)
												echo "<div class='row'>";
											echo "
	       							<div class='col-sm-4'>
	       								<div class='box box-solid'>
		       								<div class='box-body prod-body'>
		       									<img src='" . $image . "' width='100%' height='230px' class='thumbnail'>
		       									<h5><a href='product.php?product=" . $row['slug'] . "'>" . $row['name'] . "</a></h5>
		       								</div>
		       								<div class='box-footer'>
		       									<b>Rs  " . number_format($row['price'], 2) . "</b>
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

		<?php include 'includes/footer.php'; ?>
	</div>

	<?php include 'includes/scripts.php'; ?>

	<script>
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
          position: { lat: 9.798367571043093, lng: 80.18522906622412 },
          map: map,
          icon: image,
        });
      }
    </script>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap"></script>


 
</body>

</html>