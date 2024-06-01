<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php';
include 'connect_database.php'; //$database connection
?>

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
                                        <img src="images\aboutttt.jpg" alt="Second slide">
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
                            <h2>Build Your PC</h2>
                        </div>
                        <section class="content">
                            <?php

                            $total = 0;
                            $cabinet = $cpu = $gpu = $ram = $mb = $ssd = $hdd = $power_supply = $cpu_cooler = "";

                            if (isset($_POST['submit'])) // fetching values
                            {
                                if (!empty($_POST['cabinet'])) {
                                    $cabinet = $_POST['cabinet'];
                                }
                                if (!empty($_POST['cpu'])) {
                                    $cpu = $_POST['cpu'];
                                }
                                if (!empty($_POST['gpu'])) {
                                    $gpu = $_POST['gpu'];
                                }
                                if (!empty($_POST['ram'])) {
                                    $ram = $_POST['ram'];
                                }
                                if (!empty($_POST['mb'])) {
                                    $mb = $_POST['mb'];
                                }
                                if (!empty($_POST['ssd'])) {
                                    $ssd = $_POST['ssd'];
                                }
                                if (!empty($_POST['hdd'])) {
                                    $hdd = $_POST['hdd'];
                                }
                                if (!empty($_POST['power_supply'])) {
                                    $power_supply = $_POST['power_supply'];
                                }
                                if (!empty($_POST['cpu_cooler'])) {
                                    $cpu_cooler = $_POST['cpu_cooler'];
                                }

                                //  setting $_SESSION['cabinet_price'] and $_SESSION['cabinet_full_name']
                                $new1 = (int) $cabinet;
                                $_SESSION['cabinet_price'] = $new1;
                                $res1 = mysqli_query($database, "select full_name from cabinet where price= $new1");
                                $data1 = mysqli_fetch_assoc($res1);
                                $_SESSION['cabinet_full_name'] = $data1['full_name'];
                                echo $_SESSION['cabinet_full_name'];

                                //  setting $_SESSION['cpu_price'] and $_SESSION['cpu_full_name']
                                $new2 = (int) $cpu;
                                $_SESSION['cpu_price'] = $new2;
                                $res2 = mysqli_query($database, "select cpu_full_name from processor where price= $new2");
                                $data2 = mysqli_fetch_assoc($res2);
                                $_SESSION['cpu_full_name'] = $data2['cpu_full_name'];

                                //  setting $_SESSION['gpu_price'] and $_SESSION['gpu_full_name']
                                $new3 = (int) $gpu;
                                $_SESSION['gpu_price'] = $new3;
                                $res3 = mysqli_query($database, "select gpu_full_name from gpu where price= $new3");
                                $data3 = mysqli_fetch_assoc($res3);
                                $_SESSION['gpu_full_name'] = $data3['gpu_full_name'];

                                //  setting $_SESSION['ram_price'] and $_SESSION['ram_full_name']
                                $new4 = (int) $ram;
                                $_SESSION['ram_price'] = $new4;
                                $res4 = mysqli_query($database, "select ram_full_name from ram where price= $new4");
                                $data4 = mysqli_fetch_assoc($res4);
                                $_SESSION['ram_full_name'] = $data4['ram_full_name'];

                                //  setting $_SESSION['mb_price'] and $_SESSION['mb_full_name']
                                $new5 = (int) $mb;
                                $_SESSION['mb_price'] = $new5;
                                $res5 = mysqli_query($database, "select mb_full_name from motherboard where price= $new5");
                                $data5 = mysqli_fetch_assoc($res5);
                                $_SESSION['mb_full_name'] = $data5['mb_full_name'];

                                //  setting $_SESSION['ssd_price'] and $_SESSION['ssd_full_name']
                                $new6 = (int) $ssd;
                                $_SESSION['ssd_price'] = $new6;
                                $res6 = mysqli_query($database, "select ssd_full_name from ssd where price= $new6");
                                $data6 = mysqli_fetch_assoc($res6);
                                $_SESSION['ssd_full_name'] = $data6['ssd_full_name'];

                                //  setting $_SESSION['hdd_price'] and $_SESSION['hdd_full_name']
                                $new7 = (int) $hdd;
                                $_SESSION['hdd_price'] = $new7;
                                $res7 = mysqli_query($database, "select hdd_full_name from hdd where price= $new7");
                                $data7 = mysqli_fetch_assoc($res7);
                                $_SESSION['hdd_full_name'] = $data7['hdd_full_name'];

                                //  setting $_SESSION['power_supply_price'] and $_SESSION['power_supply_full_name']
                                $new8 = (int) $power_supply;
                                $_SESSION['power_supply_price'] = $new8;
                                $res8 = mysqli_query($database, "select ps_full_name from power_supply where price= $new8");
                                $data8 = mysqli_fetch_assoc($res8);
                                $_SESSION['power_supply_full_name'] = $data8['ps_full_name'];

                                //  setting $_SESSION['cpu_cooler_price'] and $_SESSION['cpu_cooler_full_name']
                                $new9 = (int) $cpu_cooler;
                                $_SESSION['cpu_cooler_price'] = $new9;
                                $res9 = mysqli_query($database, "select cooler_full_name from cpu_cooler where price= $new9");
                                $data9 = mysqli_fetch_assoc($res9);
                                $_SESSION['cpu_cooler_full_name'] = $data9['cooler_full_name'];

                                //  redirecting
                                echo '<script>
                window.location.href = "cart.php";
              </script>';
                            }


                            ?>
                            <div class="it_service">

                                <div class="build_image"> <!-- cabinet images -->
                                    <img id='cabinet_image' src="images\lenovo-legion-y520-gaming-pc.jpg"
                                        alt="Please select a cabinet" style="width: 300px;">
                                </div>

                                <div class="build_inputs"> <!-- form inputs -->
                                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                        <label for="">Cabinet :</label>
                                        <select required name="cabinet" id="cabinet_select"
                                            onchange="input_entered(this.name);calc_total(this.value);display(this.text)">
                                            <option disabled selected value='0'>-- Select Your Cabinet --</option>
                                            <?php

                                            $res = mysqli_query($database, "select * from cabinet");
                                            while ($data = mysqli_fetch_array($res)) {
                                                echo "<option value='" . $data['price'] . "'>" . $data['full_name'] . "</option>";
                                                // echo "<option value='". $data['price'] ."'>" .$data['full_name'] ."</option>";
                                            

                                            }
                                            ?>

                                        </select>
                                        <br>
                                        <br>
                                        <!-- PROCESSOR -->
                                        <label for="">PROCESSOR :</label>
                                        <select name="cpu" class="build_inputs" id="cpu_select"
                                            onchange="input_entered(this.name);calc_total(this.value);">
                                            <option disabled selected value='0'>-- Select Your Processor --</option>
                                            <?php
                                            // $sql = "select company from cabinet where company='Corsair'";
                                            $res = mysqli_query($database, "select * from processor");
                                            while ($data = mysqli_fetch_array($res)) {
                                                echo "<option value='" . $data['price'] . "'>" . $data['cpu_full_name'] . "</option>";

                                            }
                                            ?>

                                        </select>
                                        <br>
                                        <br>
                                        <!-- GPU -->
                                        <label for="">GPU :</label>
                                        <select name="gpu" class="build_inputs" id="gpu_select"
                                            onchange="input_entered(this.name);calc_total(this.value);">
                                            <option disabled selected value='0'>-- Select Your Graphic Card --</option>
                                            <?php
                                            // $sql = "select company from cabinet where company='Corsair'";
                                            $res = mysqli_query($database, "select * from gpu");
                                            while ($data = mysqli_fetch_array($res)) {
                                                echo "<option value='" . $data['price'] . "'>" . $data['gpu_full_name'] . "</option>";

                                            }
                                            ?>

                                        </select>
                                        <br>
                                        <br>
                                        <!-- RAM -->
                                        <label for="">RAM :</label>
                                        <select name="ram" class="build_inputs" id="ram_select"
                                            onchange="input_entered(this.name);calc_total(this.value);">
                                            <option disabled selected value='0'>-- Select Your RAM --</option>
                                            <?php
                                            // $sql = "select company from cabinet where company='Corsair'";
                                            $res = mysqli_query($database, "select * from ram");
                                            while ($data = mysqli_fetch_array($res)) {
                                                echo "<option value='" . $data['price'] . "'>" . $data['ram_full_name'] . "</option>";

                                            }
                                            ?>

                                        </select>
                                        <br>
                                        <br>
                                        <!-- MOTHERBOARD -->
                                        <label for="">MOTHERBOARD :</label>
                                        <select name="mb" class="build_inputs" id="mb_select"
                                            onchange="input_entered(this.name);calc_total(this.value);">
                                            <option disabled selected value='0'>-- Select Your Motherboard --</option>
                                            <?php
                                            // $sql = "select company from cabinet where company='Corsair'";
                                            $res = mysqli_query($database, "select * from motherboard");
                                            while ($data = mysqli_fetch_array($res)) {
                                                echo "<option value='" . $data['price'] . "'>" . $data['mb_full_name'] . "</option>";

                                            }
                                            ?>

                                        </select>
                                        <br>
                                        <br>
                                        <!-- SSD -->
                                        <label for="">SSD :</label>
                                        <select name="ssd" class="build_inputs" id="ssd_select"
                                            onchange="input_entered(this.name);calc_total(this.value);">
                                            <option disabled selected value='0'>-- Select Your SSD --</option>
                                            <?php
                                            // $sql = "select company from cabinet where company='Corsair'";
                                            $res = mysqli_query($database, "select * from ssd");
                                            while ($data = mysqli_fetch_array($res)) {
                                                echo "<option value='" . $data['price'] . "'>" . $data['ssd_full_name'] . "</option>";

                                            }
                                            ?>

                                        </select>
                                        <br>
                                        <br>
                                        <!-- HDD -->
                                        <label for="">HDD :</label>
                                        <select name="hdd" class="build_inputs" id="hdd_select"
                                            onchange="input_entered(this.name);calc_total(this.value);">
                                            <option disabled selected value='0'>-- Select Your HDD --</option>
                                            <?php
                                            // $sql = "select company from cabinet where company='Corsair'";
                                            $res = mysqli_query($database, "select * from hdd");
                                            while ($data = mysqli_fetch_array($res)) {
                                                echo "<option value='" . $data['price'] . "'>" . $data['hdd_full_name'] . "</option>";

                                            }
                                            ?>

                                        </select>
                                        <br>
                                        <br>
                                        <!-- POWER SUPPLY -->
                                        <label for="">POWER SUPPLY :</label>
                                        <select name="power_supply" class="build_inputs" id="psu_select"
                                            onchange="input_entered(this.name);calc_total(this.value);">
                                            <option disabled selected value='0'>-- Select Your Power Supply --</option>
                                            <?php
                                            // $sql = "select company from cabinet where company='Corsair'";
                                            $res = mysqli_query($database, "select * from power_supply");
                                            while ($data = mysqli_fetch_array($res)) {
                                                echo "<option value='" . $data['price'] . "'>" . $data['ps_full_name'] . "</option>";

                                            }
                                            ?>

                                        </select>
                                        <br>
                                        <br>
                                        <!-- CPU COOLER -->
                                        <label for="">CPU COOLER :</label>
                                        <select name="cpu_cooler" class="build_inputs" id="cpu_cooler_select"
                                            onchange="input_entered(this.name);calc_total(this.value);">
                                            <option disabled selected value='0'>-- Select Your CPU Cooler --</option>
                                            <?php
                                            // $sql = "select company from cabinet where company='Corsair'";
                                            $res = mysqli_query($database, "select * from cpu_cooler");
                                            while ($data = mysqli_fetch_array($res)) {
                                                echo "<option value='" . $data['price'] . "'>" . $data['cooler_full_name'] . "</option>";

                                            }
                                            ?>

                                        </select>
                                        <br>
                                        <br>

                                        <label for="" id="total_label">Total: 0</label>

                                        <button class="button-inp" onclick="reset_selection()"
                                            style="margin: 20px;
padding: 10px;background-color: rgb(51, 1, 109);border:none;color:white;border-radius:15px;font-size:1em;cursor: pointer;">Reset</button>
                                        <input class="button-inp" type="submit" name="submit" value="Place Order"
                                            onclick="submit_redirect()"
                                            style="margin: 20px;
padding: 10px;background-color: rgb(51, 1, 109);border:none;color:white;border-radius:15px;font-size:1em;cursor: pointer;">
                                    </form>
                                </div>
                                <div class="col-sm-3">
                                    <?php include 'includes/sidebar.php'; ?>
                                </div>
                            </div>
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

<script>
    function calc_total(value) {
  total_cost = 0;
  total_cost = total_cost + parseInt(value);
  console.log(total_cost);
//   let selected_list = document.querySelectorAll('select');
//   for (let i = 0; i < selected_list.length; i++) {
//     console.log(selected_list[i].value);
//     total_cost += parseInt(selected_list[i].value);
//   }
//    console.log(total_cost);
  document.getElementById('total_label').innerText =
    'Total: ' + total_cost + '  Rs';
}
</script>
        <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap"></script>
</body>

</html>