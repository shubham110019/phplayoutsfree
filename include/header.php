<?php
include "admin/db.php";
?>

	<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/css/mdb.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.css">
<link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.min.css">
<link rel="stylesheet" type="text/css" href="<?= $base_url ?>/css/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="<?= $base_url ?>/css/owl.carousel.min.css">

<link rel="stylesheet" type="text/css" href="<?= $base_url ?>/css/style.css">
</head>

<body>

	<!--Navbar -->
<nav class=" navbar navbar-expand-lg sticky-top navbar-dark  navbgnew " id="header">
<div class="container">	
  <a class="navbar-brand" href="home"><b>Layoutsfree</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="templates.htmlnavbarSupportedContent-333"
    aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="home">Home
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="templates">templates</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="templates.html">Pricing</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">Dropdown
        </a>
        <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
          <a class="dropdown-item" href="templates.html">Action</a>
          <a class="dropdown-item" href="templates.html">Another action</a>
          <a class="dropdown-item" href="templates.html">Something else here</a>
        </div>
      </li>
    </ul>
    
  </div>
</div>
</nav>
<!--/.Navbar -->