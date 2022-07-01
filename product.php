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
    <style>
        
        button.nav-link:active{
            background-color:#fff;
        }

        div#wrapperHeader {
 /* width:100%;
 height:200px; */
 background:url(assets/img/hero/category2.jpg) repeat-x 0 0;
 text-align:center;
 background-size:cover;
}

div#wrapperHeader div#header {
 width:100%;
 height:200px;
 margin:0 auto;
}

div#wrapperHeader div#header img {
 width:; /* the width of the logo image */
 height:; /* the height of the logo image */
 margin:0 auto;
}
.hero-text {
  text-align: center;
  position: absolute;
  top: 30%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: #8e7abd;
}

    </style>

  </head>
  <body>
  <div class="tab-content" id="myTabContent">

    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <!--================Blog Area =================-->
    <div id="wrapperHeader">
    <div id="header">
    <div class="hero-text">
<h1 class="display-1">ห้องพัก</h1>
</div>
    </div> 
    </div>
    <?php include('category.php');?><br>
    <div class="container">
      <div class="row">
        <!-- product-->
        <div class="col-md-12">
          <div class="panel panel-info">
            <div class="panel-heading">
                <br>
         <div class="row">
  <div class="col">
    <div class="card text-white bg-primary">
      <div class="card-body">
        <h5 class="card-title">แจ้งให้ทราบ</h5>
        <p class="card-text">ทุกครั้งที่จองควรจะมีการติดต่อโรงแรมหรือรีสอร์ทนั้นๆเพื่อเป็นการป้องกันไม่ให้ผู้บริการเสียสิทธิ์ในการเข้าพัก</p>
      </div>
    </div>
  </div>

              </div>
            </div>
            <br>
            <div class="row">
            <?php
            
                  $t_id = $_GET['t_id'];
                  $q = $_GET['q'];
                  if($t_id !=''){
                    include('listprd_by_type.php');
                  }else if($q!=''){
                            include('listprd_by_q.php');
                  }else{
                    include('listprd.php');
                        }
            ?>
          </div>
        </div>
        </div>
      </div>
      
    <!--================Blog Area =================-->
<br>

</div>



</div>
    <div class="tab-pane fade" id="hotel" role="tabpanel" aria-labelledby="hotel-tab">
        

</div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"></div>
    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab"></div>
  </div>

  </body>
</html>
