<?php session_start();?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <title>Hotel</title>
    <?php include("head.php"); ?>
  </head>
  <body>
  <div class="tab-content" id="myTabContent">

    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <img src="mountains-1412683.png" class="img-fluid">

    <div class="position-absolute top-50 start-50 translate-middle">
    <h1 class="display-3 text-center text-light animate__animated animate__fadeInDown">ระบบจองห้องพักออนไลน์</h1><br>
    <h1 class="display-3 text-center text-light animate__animated animate__bounce animate__infinite"><i class="bi bi-chevron-double-down"></i></h1>
    
    <div class="container">
    <div class="card">
    <div class="card-header">
    <ul class="nav nav-tabs nav-pills nav-justified" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="starter-tab" data-bs-toggle="tab" data-bs-target="#starter" type="button" role="tab" aria-controls="starter" aria-selected="true">ห้องพักราคาเริ่มต้น</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">บริการรถเช่า</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">แลกเปลี่ยนสกุลเงิน</button>
  </li>
</ul>
</div>
    <div class="card-body">
    <div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="starter" role="tabpanel" aria-labelledby="starter-tab">


  
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
</div>
</div>
</div>
</div>

</div>



</div>
    <div class="tab-pane fade" id="hotel" role="tabpanel" aria-labelledby="hotel-tab"><?php include("product.php");?></div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"></div>
    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab"></div>
  </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

  </body>
</html>