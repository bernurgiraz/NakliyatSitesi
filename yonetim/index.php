<?php 



include_once("assets/fonksiyon.php"); $yonetim = new yonetim();
$yonetim->kontrolet("ind");





?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8">
   
    <title> Nakliyat-Yönetim Paneli</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">    
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">   
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>



 
<div class="login-area text-center">

    <?php

     

    if(!$_POST):

      ?> 
      <div class="container">
          <div class="login-box ptb--100">

          <form action="" method="post">
          <div class="login-form-head">
              <h4>YÖNETİM PANELİ</h4>

           </div>

           <div class="login-form-body">
              <div class="form-gp">
                
                <input type="text" name="kulad" id="kuladlab" placeholder="Kullanıcı Adınızı Yazınız"/>
                <i class="ti-user"></i>
              </div>

               <div class="form-gp">
                
                <input type="password" name="sifre" id="sifrelab" placeholder="Şifrenizi Yazınız"/>
                <i class="ti-lock"></i>
              </div>

              <div class="submit-btn-area">

              <input type="submit" class="btn btn-dark" value="GİRİŞ YAP" />

             </div>

          </form>


</div>
</div>

</div>



      <?php

    else: 
        $kulad = htmlspecialchars($_POST["kulad"]);
        $sifre = htmlspecialchars($_POST["sifre"]);

             if($kulad =="" && $sifre =="") :

             



              echo '

              <div class="container-fluid bg-white">
              <div class="alert alert-primary border border-dark mt-5 col-md-5 mx-auto p-3 text-dark font-15 font-weight-bold"><img src="1491.gif" class="mr-3"> BİLGİLER BOŞ OLAMAZ! YÖNLENDİRİLİYOR...</div>
              </div>';
              
              header("Refresh:2, url=index.php");
              else:

                $yonetim->giriskontrol($kulad,$sifre,$baglanti);


              endif;


    endif;


     ?>




      



    
   
    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>  

    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>
