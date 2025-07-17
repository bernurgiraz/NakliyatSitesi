<?php ob_start();
 try {
            $baglanti = new PDO(
              'mysql:host=localhost;dbname=kurumsal;charset=utf8',
              'root',
              ''
            );
            $baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die($e->getMessage());
        }

class yonetim {



    function sorgum($vt,$sorgu,$tercih=0){

        $al = $vt->prepare($sorgu);
        $al->execute();

        if($tercih=="1"):
            return $al->fetch();

           
        elseif($tercih=="2"):
            return $al;

        endif;
    
    
    }





   function siteayar($baglanti) {

    $sonuc=$this->sorgum($baglanti,"select * from ayarlar",1); //this yerine self : de olur. mu

    if($_POST) :

    $title = htmlspecialchars($_POST["title"]);
    $metatitle = htmlspecialchars($_POST["metatitle"]);
    $metadesc = htmlspecialchars($_POST["metadesc"]);
    $metakey = htmlspecialchars($_POST["metakey"]);
    $metaaut = htmlspecialchars($_POST["metaaut"]);
    $metaown = htmlspecialchars($_POST["metaown"]);
    $metacopy = htmlspecialchars($_POST["metacopy"]);
    $logoyazi = htmlspecialchars($_POST["logoyazi"]);
    $twit = htmlspecialchars($_POST["twit"]);
    $face = htmlspecialchars($_POST["face"]);
    $inst = htmlspecialchars($_POST["inst"]);
    $telno = htmlspecialchars($_POST["telno"]);
    $adres = htmlspecialchars($_POST["adres"]);
    $mailadres = htmlspecialchars($_POST["mailadres"]);
    $slogan = htmlspecialchars($_POST["slogan"]);
    $refsayfabas = htmlspecialchars($_POST["refsayfabas"]);
    $filosayfabas = htmlspecialchars($_POST["filosayfabas"]);
    $yorumsayfabas = htmlspecialchars($_POST["yorumsayfabas"]);
    $iletisimsayfabas = htmlspecialchars($_POST["iletisimsayfabas"]);


    $guncelleme = $baglanti->prepare("UPDATE ayarlar SET title=?,metatitle=?,metadesc=?,metakey=?,metaauthor=?,metaowner=?,metacopy=?,logoyazisi=?,twit=?,face=?,ints=?,telefonno=?,adres=?,mailadres=?,slogan=?,referansbaslik=?,filobaslik=?,yorumbaslik=?,iletisimbaslik=?");
    $guncelleme->bindParam(1, $title,PDO ::PARAM_STR);
    $guncelleme->bindParam(2, $metatitle,PDO ::PARAM_STR);
    $guncelleme->bindParam(3, $metadesc,PDO ::PARAM_STR);
    $guncelleme->bindParam(4, $metakey,PDO ::PARAM_STR);
    $guncelleme->bindParam(5, $metaaut,PDO ::PARAM_STR);
    $guncelleme->bindParam(6, $metaown,PDO ::PARAM_STR);
    $guncelleme->bindParam(7, $metacopy,PDO ::PARAM_STR);
    $guncelleme->bindParam(8, $logoyazi,PDO ::PARAM_STR);
    $guncelleme->bindParam(9, $twit, PDO::PARAM_STR);
    $guncelleme->bindParam(10, $face,PDO ::PARAM_STR);
    $guncelleme->bindParam(11, $inst,PDO ::PARAM_STR);
    $guncelleme->bindParam(12, $telno,PDO ::PARAM_STR);
    $guncelleme->bindParam(13, $adres,PDO ::PARAM_STR);
    $guncelleme->bindParam(14, $mailadres,PDO ::PARAM_STR);
    $guncelleme->bindParam(15, $slogan,PDO ::PARAM_STR);
    $guncelleme->bindParam(16, $refsayfabas,PDO ::PARAM_STR);
    $guncelleme->bindParam(17, $filosayfabas,PDO ::PARAM_STR);
    $guncelleme->bindParam(18, $yorumsayfabas,PDO ::PARAM_STR);
    $guncelleme->bindParam(19, $iletisimsayfabas,PDO ::PARAM_STR);
    $guncelleme->execute();
    
    echo '<div class="alert alert-success mt-5" role = alert">
    <strong>site ayarları </strong> başarıyla güncellendi.
    </div>';

    header("Refresh:2, url=control.php");

    else:
    ?>

     <form action="control.php?sayfa=siteayar" method="post">
                    
                    <div class="row">
             <div class="col-lg-7 mx-auto mt-2">
                <h3 class="text-info">SİTE AYARLARI </h3>

                
                   
                </div>

                  <div class="col-lg-7 mx-auto mt-2 border">
                <div class="row">
                   <div class="col-lg-3 border-right pt-3 text-left">
                  <span id="siteayarfont">Title</span>
                   </div>
                   <div class="col-lg-9 p-1">
                    <input type="text" name="title" class="form-control" value="<?php echo $sonuc["title"]; ?>" />
                      </div>
                 </div>
             </div>

              <!--****************** sdf*-->

                  <div class="col-lg-7 mx-auto border">
                <div class="row">
                   <div class="col-lg-3 border-right pt-3 text-left">
                  <span id="siteayarfont">Meta Title</span>
                   </div>
                   <div class="col-lg-9 p-1">
                    <input type="text" name="metatitle" class="form-control" value="<?php echo $sonuc["metatitle"]; ?>" />
                      </div>
                 </div>
             </div>

             

              <!--*******************-->
              <!--*******************-->

                  <div class="col-lg-7 mx-auto border">
                <div class="row">
                   <div class="col-lg-3 border-right pt-3 text-left">
                  <span id="siteayarfont">Sayfa Açıklama</span>
                   </div>
                   <div class="col-lg-9 p-1">
                    <input type="text" name="metadesc" class="form-control" value="<?php echo $sonuc["metadesc"]; ?>" />
                      </div>
                 </div>
             </div>

             

              <!--*******************-->
              <!--*******************-->

                  <div class="col-lg-7 mx-auto border">
                <div class="row">
                   <div class="col-lg-3 border-right pt-3 text-left">
                  <span id="siteayarfont">Anahtar kelimeler</span>
                   </div>
                   <div class="col-lg-9 p-1">
                    <input type="text" name="metakey" class="form-control" value="<?php echo $sonuc["metakey"]; ?>" />
                      </div>
                 </div>
             </div>

             

              <!--*******************-->
              <!--*******************-->

                  <div class="col-lg-7 mx-auto border">
                <div class="row">
                   <div class="col-lg-3 border-right pt-3 text-left">
                  <span id="siteayarfont">Yapımcı</span>
                   </div>
                   <div class="col-lg-9 p-1">
                    <input type="text" name="metaaut" class="form-control" value="<?php echo $sonuc["metaauthor"]; ?>"/>
                      </div>
                 </div>
             </div>

             

              <!--*******************-->
              <!--*******************-->

                  <div class="col-lg-7 mx-auto border">
                <div class="row">
                  <div class="col-lg-3 border-right pt-3 text-left">
                  <span id="siteayarfont">Firma</span>
                   </div>
                   <div class="col-lg-9 p-1">
                    <input type="text" name="metaown" class="form-control" value="<?php echo $sonuc["metaowner"]; ?>"/>
                      </div>
                 </div>
             </div>

             

              <!--*******************-->
              <!--*******************-->

                  <div class="col-lg-7 mx-auto border">
                <div class="row">
                  <div class="col-lg-3 border-right pt-3 text-left">
                  <span id="siteayarfont">Copyright</span>
                   </div>
                   <div class="col-lg-9 p-1">
                    <input type="text" name="metacopy" class="form-control" 
                  value="<?php echo $sonuc['metacopy']; ?>" 
               
                
                  
                  pattern="\d{4}"
                  title="Lütfen 4 basamaklı bir yıl giriniz"
                  required
                     />


                
                      </div>
                 </div>
             </div>

             

              <!--*******************-->
              <!--*******************-->

                  <div class="col-lg-7 mx-auto border">
                <div class="row">
                  <div class="col-lg-3 border-right pt-3 text-left">
                  <span id="siteayarfont">Logo yazısı</span>
                   </div>
                   <div class="col-lg-9 p-1">
                    <input type="text" name="logoyazi" class="form-control"value="<?php echo $sonuc["logoyazisi"]; ?>" />
                      </div>
                 </div>
             </div>

             

              <!--*******************-->
              <!--*******************-->
              
                  <div class="col-lg-7 mx-auto border">
                <div class="row">
                   <div class="col-lg-3 border-right pt-3 text-left">
                  <span id="siteayarfont">Twitter</span>
                   </div>
                   <div class="col-lg-9 p-1">
                    <input type="text" name="twit" class="form-control" value="<?php echo $sonuc["twit"]; ?>" />
                      </div>
                 </div>
             </div>

             

              <!--*******************-->
              <!--*******************-->

                  <div class="col-lg-7 mx-auto border">
                <div class="row">
                  <div class="col-lg-3 border-right pt-3 text-left">
                  <span id="siteayarfont">Facebook</span>
                   </div>
                   <div class="col-lg-9 p-1">
                    <input type="text" name="face" class="form-control" value="<?php echo $sonuc['face']; ?>"
   />
                      </div>
                 </div>
             </div>

             

              <!--*******************-->
              <!--*******************-->

                  <div class="col-lg-7 mx-auto border">
                <div class="row">
                   <div class="col-lg-3 border-right pt-3 text-left">
                  <span id="siteayarfont">Instagram</span>
                   </div>
                   <div class="col-lg-9 p-1">
                    <input type="text" name="inst" class="form-control" value="<?php echo $sonuc['ints']; ?>"
 />
                      </div>
                 </div>
             </div>

             

              <!--*******************-->
              <!--*******************-->

                  <div class="col-lg-7 mx-auto border">
                <div class="row">
                  <div class="col-lg-3 border-right pt-3 text-left">
                  <span id="siteayarfont">Telefon Numarası</span>
                   </div>
                   <div class="col-lg-9 p-1">
                    <input type="text" name="telno" class="form-control" value="<?php echo $sonuc['telefonno']; ?>"
                     
                    
                    pattern="^\+90\s\d{3}\s\d{3}\s\d{2}\s\d{2}$" 
                    title ="Lütfen '+90 000 000 00 00' formatında bir numara gir." 
                    required 
                  
                    />  
                      </div>
                 </div>
             </div>

             

              <!--*******************-->
              <!--*******************-->

                  <div class="col-lg-7 mx-auto border">
                <div class="row">
                   <div class="col-lg-3 border-right pt-3 text-left">
                  <span id="siteayarfont">Adres</span>
                   </div>
                   <div class="col-lg-9 p-1">
                    <input type="text" name="adres" class="form-control" value="<?php echo $sonuc['adres']; ?>"
 />
                      </div>
                 </div>
             </div>

             

              <!--*******************-->
              <!--*******************-->

                  <div class="col-lg-7 mx-auto border">
                <div class="row">
                  <div class="col-lg-3 border-right pt-3 text-left">
                  <span id="siteayarfont">Mail Adresi</span>
                   </div>
                   <div class="col-lg-9 p-1">
                    <input type="text" name="mailadres" class="form-control" value="<?php echo $sonuc['mailadres']; ?>"
 />
                      </div>
                 </div>
             </div>

             

              <!--*******************-->
              <!--*******************-->

                  <div class="col-lg-7 mx-auto border">
                <div class="row">
                  <div class="col-lg-3 border-right pt-3 text-left">
                  <span id="siteayarfont">Slogan</span>
                   </div>
                   <div class="col-lg-9 p-1">
                    <input type="text" name="slogan" class="form-control" value="<?php echo $sonuc['slogan']; ?>"
 />
                      </div>
                 </div>
             </div>

             

              <!--*******************-->
              <!--*******************-->

                  <div class="col-lg-7 mx-auto border">
                <div class="row">
                   <div class="col-lg-3 border-right pt-3 text-left">
                  <span id="siteayarfont">Referans Başlık</span>
                   </div>
                   <div class="col-lg-9 p-1">
                    <input type="text" name="refsayfabas" class="form-control" value="<?php echo $sonuc['referansbaslik']; ?>"
 />
                      </div>
                 </div>
             </div>

             

              <!--*******************-->
              <!--*******************-->

                  <div class="col-lg-7 mx-auto border">
                <div class="row">
                 <div class="col-lg-3 border-right pt-3 text-left">
                  <span id="siteayarfont">Filo Başlık </span>
                   </div>
                   <div class="col-lg-9 p-1">
                    <input type="text" name="filosayfabas" class="form-control" value="<?php echo $sonuc['filobaslik']; ?>"
 />
                    
                      </div>
                 </div>
             </div>

             

              <!--*******************-->
              <!--*******************-->

                  <div class="col-lg-7 mx-auto border">
                <div class="row">
                  <div class="col-lg-3 border-right pt-3 text-left">
                  <span id="siteayarfont">Yorum Başlık</span>
                   </div>
                   <div class="col-lg-9 p-1">
                    <input type="text" name="yorumsayfabas" class="form-control" value="<?php echo $sonuc['yorumbaslik']; ?>"
 />
                      </div>
                 </div>
             </div>

             

              <!--*******************-->
              <!--*******************-->

                  <div class="col-lg-7 mx-auto border">
                <div class="row">
                   <div class="col-lg-3 border-right pt-3 text-left">
                  <span id="siteayarfont">İletişim Başlık</span>
                   </div>
                   <div class="col-lg-9 p-1">
                    <input type="text" name="iletisimsayfabas" class="form-control" value="<?php echo $sonuc['iletisimbaslik']; ?>"
 />
                      </div>
                 </div>
             </div>

             

              <!--*******************-->
                   

               <div class="col-lg-7 mx-auto mt-2 border-bottom">
                   
                  <!-- Animate.css ve WOW.js kullanıyorsan -->
<input type="submit" name="buton" 
       class="btn btn-info btn-rounded m-1 wow fadeInUp animated hover-glow" 
       value="GÜNCELLE" 
        />

               
               
                </div>  
                  
            </div>

                    
                       

                       </form>



    <?php

    endif;
}

function sifrele($veri){

  return base64_encode(gzdeflate(gzcompress(serialize($veri))));
  

}


function coz($veri){

  return unserialize(gzuncompress(gzinflate(base64_decode($veri))));


}

function kuladial($vt){
  $cookid=$_COOKIE["kulbilgi"];
  $cozduk=self::coz($cookid);

  $sorgusonuc=self::sorgum($vt,"select * from yonetim where id=$cozduk",1);
  return $sorgusonuc["kulad"];

}

function giriskontrol($kulad, $sifre, $vt) {
    $sifrelihal = md5(sha1(md5($sifre)));

    $sor = $vt->prepare("SELECT * FROM yonetim WHERE kulad=? AND sifre=?");
    $sor->execute([$kulad, $sifrelihal]);

    if ($sor->rowCount() == 0) {
         
        echo '<div class="container-fluid bg-white">
              <div class="alert alert-light border border-dark mt-5 col-md-5 mx-auto p-3 text-danger font-15 font-weight-bold"><img src="1491.gif" class="mr-3">BİLGİLER HATALI!</div>
              </div>';
    
        header("Refresh:2; url=index.php");
        exit;
    } else {
        $gelendeger = $sor->fetch();

        $id = self::sifrele($gelendeger["id"]);
        setcookie("kulbilgi", $id, time() + 60*60*24, "/");

        $sor = $vt->prepare("UPDATE yonetim SET aktif=1 WHERE kulad=? AND sifre=?");
        $sor->execute([$kulad, $sifrelihal]);

        echo '<div class="container-fluid bg-white">
              <div class="alert alert-success border border-dark mt-5 col-md-5 mx-auto p-3 text-dark font-15 font-weight-bold"><img src="1491.gif" class="mr-3">GİRİŞ YAPILIYOR</div>
              </div>';

        header("Refresh:2; url=control.php");
        echo '<div class="alert alert-info mt-5 col-md-5 mx-auto"></div>';
        exit;
    }
}


 

function cikis($vt) {
 $cookid=$_COOKIE["kulbilgi"];
 $cozduk=self::coz($cookid);


 self::sorgum($vt,"update yonetim set aktif=0 where id=$cozduk",0);
 setcookie("kulbilgi", "", time() - 3600, "/");

 echo '<div class="container-fluid bg-white">
              <div class="alert alert-success border border-dark mt-5 col-md-5 mx-auto p-3 text-dark font-15 font-weight-bold"><img src="1491.gif" class="mr-3">Çıkış yapılıyor </div>
              </div>';
 header("Refresh:2, url=index.php");


} 


function kontrolet($sayfa){

  if(isset($_COOKIE["kulbilgi"])):



          if($sayfa=="ind"):  header("Location:control.php"); 
        endif;

   
   

  else:
           if($sayfa=="cot"):  header("Location:index.php"); 
          endif;
     


 
  endif;

}

//--------------INTRO-----------------

function introayar($vt) {
    echo '
    <div class="row text-center">
        <div class="col-lg-12 border-bottom"><h3 class="float-left mt-3 text-info">İNTRO RESİMLERİ</h3>
            <a href="control.php?sayfa=introresimekle" class="btn btn-success m-2 float-right">+</a>
        </div>';
    
    

    $introbilgiler=self::sorgum($vt,"select * from intro",2);

    while ($sonbilgi=$introbilgiler->fetch(PDO::FETCH_ASSOC)) :
    echo '<div class="col-lg-4">

    <div class="row border border-light p-1 m-1">
            <div class="col-lg-12">
                <img src="../'.$sonbilgi["resimyol"].'">
            </div>
 
    <div class="col-lg-6 text-right">
        <a href="control.php?sayfa=introresimguncelle&id='.$sonbilgi["id"].'" class="fa fa-edit m-2 text-success" style="font-size:25px;"></a>
    </div>
   
   
    <div class="col-lg-6 text-left">
        <a href="control.php?sayfa=introresimsil&id='.$sonbilgi["id"].'" class="fa fa-trash m-2 text-danger" style="font-size:25px;"></a>
    </div>
 </div>
 </div>';

    endwhile;

    echo '</div>';

}
   
function introresimekleme($vt) {

    echo '<div class="row text-center">
    <div class="col-lg-12">';
        

    if ($_POST) :

      if ($_FILES["dosya"]["name"] == "") :

      
    echo '<div class="alert alert-danger mt-5">Dosya Yüklenmedi. Boş olamaz<div>';
    header("Refresh:2, url=control.php?sayfa=introresimekle");
   else: // boş değilse

    if ($_FILES["dosya"]["size"] > (1024 * 1024 * 5)) :
        echo '<div class="alert alert-danger mt-1">Dosya boyutu çok fazla<div>';
        header("Refresh:2, url=control.php?sayfa=introresimekle");
    else: // boyutta bir problem yok ise

        $izinverilen = array("image/png", "image/jpeg");

                   if (!in_array($_FILES["dosya"]["type"], $izinverilen)) :
                            echo '<div class="alert alert-danger mt-5">İzin verilen uzantı değil</div>';
                            header("Refresh:2, url=control.php?sayfa=introresimekle");
            

                   else : // artık herşey tamam

                    $dosyaminyolu= '../img/carousel/'.$_FILES["dosya"]["name"];




                move_uploaded_file($_FILES["dosya"]["tmp_name"],$dosyaminyolu);
                echo '<div class="alert alert-success mt-5">DOSYA BAŞARIYLA YÜKLENDİ<div>';
                header("Refresh:2, url=control.php?sayfa=introayar");

  //veritabanına ekliorrrrum

    $dosyaminyolu2 = str_replace('../', '', $dosyaminyolu);


   $kayitekle = self::sorgum($vt, "insert into intro (resimyol) VALUES('$dosyaminyolu2')", 0);


                  
    

   endif;


  


        // Buraya dosyanın başarılı şekilde yüklendiği işlem eklenebilir.

    endif;

     endif;

     



        
    else:
  ?>
    <div class="col-lg-4 mx-auto mt-2">
        <div class="card card-bordered">
            <div class="card-body">
                <h5 class="title border-bottom">Intro resim yükleme formu</h5>
                <form action="" method="post" enctype="multipart/form-data">
                    <p class="card-text">
                        <input type="file" name="dosya" />
                    </p>
                    <input type="submit" name="buton" value="YÜKLE" class="btn btn-primary mb-1" />
                </form>

               <p class="card-text text-left text-danger border-top">
    * İzin verilen formatlar : jpg-png<br />
    * İzin verilen max.boyut : 5 MB
   </p>




            </div>
        </div>
    </div>
  <?php
    endif;
    echo '</div></div></div>';


}

function introsil($vt) {

    $introid = $_GET["id"];

    $verial = self::sorgum($vt, "select * from intro where id=$introid", 1);

    echo '<div class="row text-center">
    <div class="col-lg-12">';

    
    unlink("../".$verial["resimyol"]);


    self::sorgum($vt, "delete from intro where id=$introid", 0);
     
  
    
    echo '<div class="alert alert-success mt-5">SİLMELER BAŞARILI<div>';
    echo '</div></div>';

    header("Refresh:2, url=control.php?sayfa=introayar");

}


function introresimguncelleme($vt) {

    $gelenintroid = $_GET["id"];

    echo '<div class="row text-center">
    <div class="col-lg-12">';
        

    if ($_POST) :

      $formdangelendid = $_POST["introid"];






      if ($_FILES["dosya"]["name"] == "") :

      
    echo '<div class="alert alert-danger mt-5">Dosya Yüklenmedi. Boş olamaz<div>';
    header("Refresh:2, url=control.php?sayfa=introayar");
   else: // boş değilse

    if ($_FILES["dosya"]["size"] > (1024 * 1024 * 5)) :
        echo '<div class="alert alert-danger mt-1">Dosya boyutu çok fazla<div>';
        header("Refresh:2, url=control.php?sayfa=introayar");
    else: // boyutta bir problem yok ise

        $izinverilen = array("image/png", "image/jpeg");

                   if (!in_array($_FILES["dosya"]["type"], $izinverilen)) :
                            echo '<div class="alert alert-danger mt-5">İzin verilen uzantı değil</div>';
                            header("Refresh:2, url=control.php?sayfa=introayar");
            

                   else : // artık herşey tamam



                    //mevcutu sil yeniyi kaydet

                    $resimyolunabak = self::sorgum($vt, "select * from intro where id=$gelenintroid", 1);
                    $dbgelenyol = '../' . $resimyolunabak["resimyol"];
                    unlink($dbgelenyol);




                    $dosyaminyolu= '../img/carousel/'.$_FILES["dosya"]["name"];




                move_uploaded_file($_FILES["dosya"]["tmp_name"],$dosyaminyolu);

                $dosyaminyolu2 = str_replace('../', '', $dosyaminyolu);


                self::sorgum($vt, "update intro set resimyol='$dosyaminyolu2' where id=$gelenintroid", 0);


                echo '<div class="alert alert-success mt-5">DOSYA BAŞARIYLA GÜNCELLENDİ<div>';
                header("Refresh:2, url=control.php?sayfa=introayar");



   endif;


        // Buraya dosyanın başarılı şekilde yüklendiği işlem eklenebilir.

    endif;

     endif;

 
    else:
  ?>
    <div class="col-lg-4 mx-auto mt-2">
        <div class="card card-bordered">
            <div class="card-body">
                <h5 class="title border-bottom">Intro resim güncelleme formu</h5>
                <form action="" method="post" enctype="multipart/form-data">
                    <p class="card-text">
                        <input type="file" name="dosya" />
                    </p>

                     <p class="card-text">
                        <input type="hidden" name="introid" value="<?php echo $gelenintroid; ?>" />
                    </p>
                    <input type="submit" name="buton" value="GÜNCELLE" class="btn btn-primary mb-1" />
                
                
                
                  </form> 

               <p class="card-text text-left text-danger border-top">
    * İzin verilen formatlar : jpg-png<br />
    * İzin verilen max.boyut : 5 MB
   </p>




            </div>
        </div>
    </div>
  <?php
    endif;
    echo '</div></div></div>';


}

//-------------------------ARAÇ FİLOSU----------------------------

function aracfilo($vt) {
    echo '
    <div class="row text-center">
        <div class="col-lg-12 border-bottom"><h3 class="float-left mt-3 text-info">ARAÇ FİLO RESİMLERİ</h3>
            <a href="control.php?sayfa=aracfiloekle" class="btn btn-success m-2 float-right">+</a>
        </div>';
    
    

    $introbilgiler=self::sorgum($vt,"select * from filomuz",2);

    while ($sonbilgi=$introbilgiler->fetch(PDO::FETCH_ASSOC)) :
    echo '<div class="col-lg-4">

    <div class="row border border-light p-1 m-1">
            <div class="col-lg-12">
                <img src="../'.$sonbilgi["resimyol"].'">
            </div>
 
    <div class="col-lg-6 text-right">
        <a href="control.php?sayfa=aracfiloguncelle&id='.$sonbilgi["id"].'" class="fa fa-edit m-2 text-success" style="font-size:25px;"></a>
    </div>
   
   
    <div class="col-lg-6 text-left">
        <a href="control.php?sayfa=aracfilosil&id='.$sonbilgi["id"].'" class="fa fa-trash m-2 text-danger" style="font-size:25px;"></a>
    </div>
 </div>
 </div>';

    endwhile;

    echo '</div>';

}
   
function aracfiloekleme($vt) {

    echo '<div class="row text-center">
    <div class="col-lg-12">';
        

    if ($_POST) :

      if ($_FILES["dosya"]["name"] == "") :

      
    echo '<div class="alert alert-danger mt-5">Dosya Yüklenmedi. Boş olamaz<div>';
    header("Refresh:2, url=control.php?sayfa=aracfiloekle");
   else: // boş değilse

    if ($_FILES["dosya"]["size"] > (1024 * 1024 * 5)) :
        echo '<div class="alert alert-danger mt-1">Dosya boyutu çok fazla<div>';
        header("Refresh:2, url=control.php?sayfa=aracfiloekle");
    else: // boyutta bir problem yok ise

        $izinverilen = array("image/png", "image/jpeg");

                   if (!in_array($_FILES["dosya"]["type"], $izinverilen)) :
                            echo '<div class="alert alert-danger mt-5">İzin verilen uzantı değil</div>';
                            header("Refresh:2, url=control.php?sayfa=aracfiloekle");
            

                   else : // artık herşey tamam

                    $dosyaminyolu= '../img/filo/'.$_FILES["dosya"]["name"];




                move_uploaded_file($_FILES["dosya"]["tmp_name"],$dosyaminyolu);
                echo '<div class="alert alert-success mt-5">DOSYA BAŞARIYLA YÜKLENDİ<div>';
                header("Refresh:2, url=control.php?sayfa=aracfilo");

  //veritabanına ekliorrrrum

    $dosyaminyolu2 = str_replace('../', '', $dosyaminyolu);


   self::sorgum($vt, "insert into filomuz (resimyol) VALUES('$dosyaminyolu2')", 0);


               
    

   endif;


  


        // Buraya dosyanın başarılı şekilde yüklendiği işlem eklenebilir.

    endif;

     endif;

     



        
    else:
  ?>
    <div class="col-lg-4 mx-auto mt-2">
        <div class="card card-bordered">
            <div class="card-body">
                <h5 class="title border-bottom">Araç Filo resim yükleme formu</h5>
                <form action="" method="post" enctype="multipart/form-data">
                    <p class="card-text">
                        <input type="file" name="dosya" />
                    </p>
                    <input type="submit" name="buton" value="YÜKLE" class="btn btn-primary mb-1" />
                </form>

               <p class="card-text text-left text-danger border-top">
    * İzin verilen formatlar : jpg-png<br />
    * İzin verilen max.boyut : 5 MB
   </p>




            </div>
        </div>
    </div>
  <?php
    endif;
    echo '</div></div></div>';


}

function aracfilosil($vt) {

    $introid = $_GET["id"];

    $verial = self::sorgum($vt, "select * from filomuz where id=$introid", 1);

    echo '<div class="row text-center">
    <div class="col-lg-12">';

    
    unlink("../".$verial["resimyol"]);


    self::sorgum($vt, "delete from filomuz where id=$introid", 0);
     
  
    
    echo '<div class="alert alert-success mt-5">SİLMELER BAŞARILI<div>';
    echo '</div></div>';

    header("Refresh:2, url=control.php?sayfa=aracfilo");

}


function aracfiloguncelleme($vt) {

    $gelenintroid = $_GET["id"];

    echo '<div class="row text-center">
    <div class="col-lg-12">';
        

    if ($_POST) :

      $formdangelendid = $_POST["introid"];






      if ($_FILES["dosya"]["name"] == "") :

      
    echo '<div class="alert alert-danger mt-5">Dosya Yüklenmedi. Boş olamaz<div>';
    header("Refresh:2, url=control.php?sayfa=aracfilo");
   else: // boş değilse

    if ($_FILES["dosya"]["size"] > (1024 * 1024 * 5)) :
        echo '<div class="alert alert-danger mt-1">Dosya boyutu çok fazla<div>';
        header("Refresh:2, url=control.php?sayfa=aracfilo");
    else: // boyutta bir problem yok ise

        $izinverilen = array("image/png", "image/jpeg");

                   if (!in_array($_FILES["dosya"]["type"], $izinverilen)) :
                            echo '<div class="alert alert-danger mt-5">İzin verilen uzantı değil</div>';
                            header("Refresh:2, url=control.php?sayfa=aracfilo");
            

                   else : // artık herşey tamam



                    //mevcutu sil yeniyi kaydet

                    $resimyolunabak = self::sorgum($vt, "select * from filomuz where id=$gelenintroid", 1);
                    $dbgelenyol = '../' . $resimyolunabak["resimyol"];
                    unlink($dbgelenyol);




                    $dosyaminyolu= '../img/filo/'.$_FILES["dosya"]["name"];




                move_uploaded_file($_FILES["dosya"]["tmp_name"],$dosyaminyolu);

                $dosyaminyolu2 = str_replace('../', '', $dosyaminyolu);


                self::sorgum($vt, "update filomuz set resimyol='$dosyaminyolu2' where id=$gelenintroid", 0);


                echo '<div class="alert alert-success mt-5">DOSYA BAŞARIYLA GÜNCELLENDİ<div>';
                header("Refresh:2, url=control.php?sayfa=aracfilo");



   endif;


        // Buraya dosyanın başarılı şekilde yüklendiği işlem eklenebilir.

    endif;

     endif;

 
    else:
  ?>
    <div class="col-lg-4 mx-auto mt-2">
        <div class="card card-bordered">
            <div class="card-body">
                <h5 class="title border-bottom">Araç Filo resim güncelleme formu</h5>
                <form action="" method="post" enctype="multipart/form-data">
                    <p class="card-text">
                        <input type="file" name="dosya" />
                    </p>

                     <p class="card-text">
                        <input type="hidden" name="introid" value="<?php echo $gelenintroid; ?>" />
                    </p>
                    <input type="submit" name="buton" value="GÜNCELLE" class="btn btn-primary mb-1" />
                
                
                
                  </form> 

               <p class="card-text text-left text-danger border-top">
    * İzin verilen formatlar : jpg-png<br />
    * İzin verilen max.boyut : 5 MB
   </p>




            </div>
        </div>
    </div>
  <?php
    endif;
    echo '</div></div></div>';


}


//----------------------HAKKIMIZDA----------------------

function hakkimizda($vt) {
    echo '
    <div class="row text-center">
        <div class="col-lg-12 border-bottom"><h3 class=" mt-3 text-info">HAKKIMIZDA AYARLARI</h3>
        </div>';

    if ($_POST):
        // Veritabanı güncelleme işlemleri (aynı)
        $baslik = isset($_POST["baslik"]) ? htmlspecialchars($_POST["baslik"]) : "";
        $icerik = isset($_POST["icerik"]) ? htmlspecialchars($_POST["icerik"]) : "";


        if (isset($_FILES["dosya"]) && $_FILES["dosya"]["name"] != "") :
            if ($_FILES["dosya"]["size"] < (1024 * 1024 * 5)) :
                $izinverilen = array("image/png", "image/jpeg");
                if (in_array($_FILES["dosya"]["type"], $izinverilen)) :
                    $dosyaminyolu = '../img/' . $_FILES["dosya"]["name"];
                    move_uploaded_file($_FILES["dosya"]["tmp_name"], $dosyaminyolu);
                    $veritabaniicin = str_replace('../', '', $dosyaminyolu);
                endif;
            endif;
        endif;

        if (isset($_FILES["dosya"]) && $_FILES["dosya"]["name"] != "" && isset($veritabaniicin)) :
            self::sorgum($vt, "update hakkimizda set baslik='$baslik',icerik='$icerik',resim='$veritabaniicin'", 0);
        else:
            self::sorgum($vt, "update hakkimizda set baslik='$baslik',icerik='$icerik'", 0);
        endif;
     
    


echo '
<script>
  document.body.innerHTML = `
    <div style="display: flex; align-items: center; justify-content: center; height: 100vh;">
      <div style="padding: 20px 40px; background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; border-radius: 8px; font-size: 18px; font-family: sans-serif;">
        ✔ Güncelleme başarılı!<br>Yönlendiriliyorsunuz...
      </div>
    </div>
  `;
  setTimeout(function() {
    window.location.href = "control.php?sayfa=hakkimiz";
  }, 2000);
</script>';
exit;

        // ❗ Güncellemeden sonra da formu yine gösterelim:
    endif;

    // Form her zaman gösterilsin (hem ilk açıldığında hem güncellemeden sonra)
    $sonbilgi = self::sorgum($vt, "select * from hakkimizda", 1);
    if (!$sonbilgi) {
        echo '<div class="alert alert-danger">Veritabanında bilgi bulunamadı.</div>';
        return;
    }

    echo '<div class="col-lg-6 mx-auto">
    <div class="row card-bordered p-1 m-1">

    <div class="col-lg-3 border-bottom bg-light" id="hakkimizdayazilar">
        Resim
    </div>

    <div class="col-lg-9 border-bottom">
        <img src="../' . $sonbilgi["resim"] . '"><br>
        <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="dosya">
    </div>

    <div class="col-lg-3 border-bottom bg-light" pt-3 id="hakkimizdayazilarn">
        Başlık
    </div>

    <div class="col-lg-9 border-bottom">
        <input type="text" name="baslik" class="form-control m-2" value="' . $sonbilgi["baslik"] . '">
    </div>

    <div class="col-lg-3 bg-light p-2" id="hakkimizdayazilar">
        İçerik
    </div>

    <div class="col-lg-9">
        <textarea name="icerik" class="form-control m-2" rows="8">' . $sonbilgi["icerik"] . '</textarea>
    </div>

    <div class="col-lg-12 border-top">
        <input type="submit" name="guncel" value="GÜNCELLE" class="btn btn-primary m-2">
        </form>
    </div>
</div></div>';
}

//----------------------HİZMETLERİMİZ----------------------
function hizmetlerhepsi($vt) {
    echo '
    <div class="row text-center">
        <div class="col-lg-12 border-bottom"><h3 class="mt-3 text-info">HİZMETLERİMİZ</h3>
            <a href="control.php?sayfa=hizmetekle" class="btn btn-success m-2 float-right">+</a>
        </div>';
    
    

  $introbilgiler=self::sorgum($vt,"select * from hizmetler",2);

while ($sonbilgi=$introbilgiler->fetch(PDO::FETCH_ASSOC)) :

echo '<div class="col-lg-6">

    <div class="row card-bordered p-1 m-1 bg-light">
        <div class="col-lg-11 pt-3">
        '.$sonbilgi["baslik"].'
        </div>

        <div class="col-lg-1 text-right">
            <a href="control.php?sayfa=hizmetguncelle&id='.$sonbilgi["id"].'" class="fa fa-edit text-success" style="font-size:25px;"></a>
            <a href="control.php?sayfa=hizmetsil&id='.$sonbilgi["id"].'" class="fa fa-trash text-danger" style="font-size:25px;"></a>
        </div>

        <div class="col-lg-12 border-top">
        '.$sonbilgi["icerik"].'
        </div>

    </div>

</div>';
endwhile;

echo '</div>';

}

function hizmetekleme($vt) {
    
   echo '<div class="row text-center">
    <div class="col-lg-12 border-bottom"><h3 class="mt-3 text-info">HİZMET EKLE</h3>
    </div>'; 
   
   
   if(!$_POST):
   
    echo '<div class="col-lg-6 mx-auto">

            <div class="row card-bordered p-1 m-1 bg-light">

                <div class="col-lg-2 pt-3">
                Başlık
                </div>
                <div class="col-lg-10 p-2">
                <form action="" method="post">
                <input type="text" name="baslik" class="form-control">
                </div>
                <div class="col-lg-12 border-top">
İçerik
</div>
<div class="col-lg-12 border-top p-2">
<textarea name="icerik" rows="5" class="form-control" ></textarea>
</div>

<div class="col-lg-12 border-top p-2">
<input type="submit" name="buton" value="HİZMET EKLE" class="btn btn-primary">
</form>
</div>
        </div>

    </div>';


    else:
    $baslik=htmlspecialchars($_POST["baslik"]);
    $icerik=htmlspecialchars($_POST["icerik"]);

    if ($baslik=="" && $icerik=="") :
        echo '<div class="col-lg-6 mx-auto">
            <div class="alert alert-danger mt-5">VERİLER BOŞ OLAMAZ<div>
        </div>';
        header("refresh:2,url=control.php?sayfa=hizmetler");
    else:
        self::sorgum($vt,"insert into hizmetler (baslik,icerik) VALUES('$baslik','$icerik')",0);
        echo '<div class="col-lg-6 mx-auto">
            <div class="alert alert-success mt-5">EKLEME BAŞARILI<div>
        </div>';
        header("refresh:2,url=control.php?sayfa=hizmetler");
    endif;
endif;


echo '</div>';
  
}

function hizmetguncelleme($vt) {
    
   echo '<div class="row text-center">
    <div class="col-lg-12 border-bottom"><h3 class="mt-3 text-info">HİZMET GÜNCELLE</h3>
    </div>'; 

    /*
ilk gelen id alınacak
id ile veritabanına çıkılıp verinin bilgileri gelecek
inputlara o verilere yazılacak
hidden ile id post için taşınacak
*/
 $kayitid=$_GET["id"];

$kayitbilgial=self::sorgum($vt,"select * from hizmetler where id=$kayitid",1);

   
   
   if(!$_POST):
   
    echo '<div class="col-lg-6 mx-auto">

            <div class="row card-bordered p-1 m-1 bg-light">

                <div class="col-lg-2 pt-3">
                Başlık
                </div>
                <div class="col-lg-10 p-2">
                <form action="" method="post">
                <input type="text" name="baslik" class="form-control" value="'.$kayitbilgial["baslik"].'">
                </div>
                <div class="col-lg-12 border-top">
İçerik
</div>
<div class="col-lg-12 border-top p-2">
<textarea name="icerik" rows="5" class="form-control" >'.$kayitbilgial["icerik"].'</textarea>
</div>

<div class="col-lg-12 border-top p-2">
<input type="hidden" name="kayitidsi" value="'.$kayitid.'">
<input type="submit" name="buton" value="HİZMET GÜNCELLE" class="btn btn-primary">
</form>
</div>
        </div>

    </div>';


    else:
    $baslik=htmlspecialchars($_POST["baslik"]);
    $icerik=htmlspecialchars($_POST["icerik"]);
    $kayitidsi=htmlspecialchars($_POST["kayitidsi"]);


    if ($baslik=="" && $icerik=="") :
        echo '<div class="col-lg-6 mx-auto">
            <div class="alert alert-danger mt-5">VERİLER BOŞ OLAMAZ<div>
        </div>';
        header("refresh:2,url=control.php?sayfa=hizmetler");
    else:
        self::sorgum($vt,"update hizmetler set baslik='$baslik',icerik='$icerik' where id=$kayitidsi",0);

        echo '<div class="col-lg-6 mx-auto">
            <div class="alert alert-success mt-5">GÜNCELLEME BAŞARILI<div>
        </div>';
        header("refresh:2,url=control.php?sayfa=hizmetler");
    endif;
endif;


echo '</div>';
  
}

function hizmetsil($vt) {

    $kayitid=$_GET["id"];

        echo '<div class="row text-center">
        <div class="col-lg-12">';

        self::sorgum($vt,"delete from hizmetler where id=$kayitid",0);

echo '<div class="alert alert-success mt-5">SİLME BAŞARILI<div>';
echo '</div></div>';

    header("refresh:2,url=control.php?sayfa=hizmetler");

} // hizmet siliyorum. 


//----------------------REFERANSLAR----------------------





}

?>

