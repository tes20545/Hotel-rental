<script src="https://unpkg.com/feather-icons"></script>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<style>
    body{
        font-family: 'Kanit', sans-serif;
        border-top: 4px solid #0d6efd;
    }
    .nav-tabs{
        border-bottom: 1px solid #a9a9a900;
        background-color: #f9f9f9;
    }
    #home-tab,#profile-tab,#contact-tab,#hotel-tab,#switch-tab,#starter-tab{
        color:black;
    }
    .bg-light1{
        background-color: white;
    }
    .nav-pills .nav-link.active, .nav-pills .show>.nav-link{
        color:white;
        background-color:white;
    }
        /* width */
    ::-webkit-scrollbar {
    width: 10px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
    background: #f1f1f1; 
    }
    
    /* Handle */
    ::-webkit-scrollbar-thumb {
    background: #888; 
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
    background: #555; 
    }
    .dark-mode {
    background-color: black;
    color: black;
    }
    ul.nav#maintab {
  box-shadow: 0 2px 4px 0 rgba(0,0,0,.2);
}
nav {
  box-shadow: 0 2px 4px 0 rgba(0,0,0,.2);
}
</style>
<?php error_reporting(E_ERROR | E_WARNING | E_PARSE); ?>
<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light1">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Hotel Rental</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#"><i class="bi bi-pen-fill" style="color:#81ff70"></i>&nbsp;บทความ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="whitelist.php"><i class="bi bi-bookmark-fill" style="color:#4762ff"></i>&nbsp;รายการที่จองไว้</a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
<div class="btn-group dropstart">
    <a class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="bi bi-person-fill"></i>&nbsp;
          <?php 
          if (!$_SESSION["username"]) {
            $notice = "ลงชื่อเข้าใช้";
            $link = "login.php"; 
            echo "ลงชื่อเข้าใช้";
          }else {
            $admin = "admin/index.php";
            $notice = "ลงชื่อออกจากระบบ";
            $link = "logout.php"; 
            $adminn = "เข้าหน้าแอดมิน";
            echo $_SESSION["username"];
          }
          ?>
</a>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="<?php echo $link;?>"><?php echo $notice;?></a></li>
    <li><a class="dropdown-item" href="<?php echo $admin;?>"><?php echo $adminn;?></a></li>
  </ul>
</div>
        </li>
      </ul>
    </div>
  </div>
</nav>

<ul class="nav nav-tabs nav-pills nav-justified" id="maintab" role="tablist">
    <li class="nav-item" role="presentation">
      <a href="index.php"><button class="nav-link" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"><i class="bi bi-house-door-fill" style="color: blueviolet;"></i>&nbsp;หน้าแรก</button></a>
    </li>
    <li class="nav-item" role="presentation">
        <a href="product.php"><button class="nav-link" id="hotel-tab" data-bs-toggle="tab" data-bs-target="#hotel" type="button" role="tab" aria-controls="hotel" aria-selected="false"><i class="bi bi-building" style="color: rgb(78 255 66);"></i>&nbsp;จองห้องพัก</button></a>
      </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false"><i class="bi bi-gift-fill" style="color: rgb(255, 114, 95);"></i>&nbsp;ข่าวสารโปรโมชั่น</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false"><i class="bi bi-telephone-fill" style="color: rgb(97, 126, 255);"></i>&nbsp;ติดต่อ</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="btn" onclick="myFunction()" type="button"><i class="bi bi-moon-fill" style="color: rgb(255, 205, 97); font-size: 13px;"></i>&nbsp;|&nbsp;<i class="bi bi-brightness-high-fill" style="color: rgb(255, 205, 97);"></i>&nbsp;สลับโหมด</button>
      </li>
  </ul>


  <script>
    feather.replace()
  </script>
  <script>
    function myFunction() {
       var element = document.body;
       element.classList.toggle("dark-mode");
    }
    </script>