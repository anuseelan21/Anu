<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        <?php include 'styles/navigation.css' ?>
    </style>
   <link rel="icon" href="images/fevicon/fevicon.png" type="image/gif" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/responsive.css" />
    <link rel="stylesheet" href="css/colors1.css" />
    <link rel="stylesheet" href="css/custom.css" />
    <link rel="stylesheet" href="css/animate.css" />
    <link rel="stylesheet" type="text/css" href="revolution/css/settings.css" />
    <link rel="stylesheet" type="text/css" href="revolution/css/layers.css" />
    <link
      rel="stylesheet"
      type="text/css"
      href="revolution/css/navigation.css"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,300;0,500;1,300&display=swap" rel="stylesheet">
</head>
<body>

  <body id="default_theme" class="it_service">
    <header id="default_header" class="header_style_1">
      <div class="header_top">
        <div class="container">
          <div class="row">
            <div class="col-md-8">
              <div class="full">
                <div class="topbar-left">
                  <ul class="list-inline">
                    <li>
                      <span class="topbar-label"
                        ><i class="fa fa-home"></i
                      ></span>
                      <span class="topbar-hightlight"> MVK Road,Nelliady.</span>
                    </li>
                    <li>
                      <span class="topbar-label"
                        ><i class="fa fa-envelope-o"></i
                      ></span>
                      <span class="topbar-hightlight"
                        ><a href="Lankapc12@hotmail.com"
                          >Lankapc12@hotmail.com</a
                        ></span
                      >
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-4 right_section_header_top"></div>
          </div>
        </div>
      </div>

      <div class="header_bottom">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
              <div class="logo">
                <a href="it_home.html"
                  ><img src="images\logos\lanka.png" alt="logo"
                /></a>
              </div>
            </div>
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
              <!-- menu start -->
              <div class="menu_side">
                <div id="navbar_menu">
                  <ul class="first-ul">
                    <li><a  href="it_home.html">Home</a></li>
                    <li><a href="it_about.html">About Us</a></li>
                    <li><a href="it_buildpc.html">Build Your PC</a></li>
                    <li><a href="it_products.html">Products</a></li>
                    <li><a href="it_laptops.html">Laptops</a></li>
                    <li><a href="it_contact.html">Contact</a></li>
                  </ul>
                </div>
                <div class="search_icon">
                  <ul>
                    <li>
                      <a href="#" data-toggle="modal" data-target="#search_bar"
                        ><i class="fa fa-search" aria-hidden="true"></i
                      ></a>
                    </li>
                  </ul>
                </div>
              </div>
              <!-- menu end -->
            </div>
          </div>
        </div>
      </div>
    </header>

</body>
</html>