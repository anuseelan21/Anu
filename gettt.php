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
                        // Assuming you have the necessary database connection code
                        include 'connect_database.php';

                        // Select options for each component

                        ?>
                        <select required name="cabinet" id="cabinet_select" onchange="input_entered(this.name);calc_total(this.value);display(this.text)">
                            <option disabled selected value='0'>-- Select Your Cabinet --</option>
                            <?php
                            $res = mysqli_query($conn, "SELECT * FROM products WHERE category_id= '1'");
                            while ($data = mysqli_fetch_array($res)) {
                                echo "<option value='" . $data['price'] . "'>" . $data['name'] . "</option>";
                            }
                            ?>
                        </select>

                        <!-- Repeat the above block for other components like CPU, GPU, RAM, etc. -->

                        <select name="cpu" id="cpu_select" onchange="input_entered(this.name);calc_total(this.value);">
                            <option disabled selected value='0'>-- Select Your Processor --</option>
                            <?php
                            $res = mysqli_query($conn, "SELECT * FROM products WHERE category_id= '2'");
                            while ($data = mysqli_fetch_array($res)) {
                                echo "<option value='" . $data['price'] . "'>" . $data['name'] . "</option>";
                            }
                            ?>
                        </select>

                        <!-- Repeat the above block for GPU, RAM, Motherboard, SSD, HDD, Power Supply, and CPU Cooler -->

                        <!-- ... (remaining code) -->

                        <button class="button-inp" onclick="reset_selection()" style="margin: 20px; padding: 10px; background-color: rgb(51, 1, 109); border: none; color: white; border-radius: 15px; font-size: 1em; cursor: pointer;">Reset</button>
                        <input class="button-inp" type="submit" name="submit" value="Place Order" onclick="submit_redirect()" style="margin: 20px; padding: 10px; background-color: rgb(51, 1, 109); border: none; color: white; border-radius: 15px; font-size: 1em; cursor: pointer;">

                    </div>
                    <div class="col-sm-3">
                        <?php include 'includes/sidebar.php'; ?>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
</body>
</html>
