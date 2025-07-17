<?php
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

class kurumsal
{
    
    public $normaltitle;
    public $metatitle;
    public $metadesc;
    public $metakey;
    public $metaout;
    public $metaown;
    public $metacopy;
    public $logoyazisi;
    public $tvit;
    public $face;
    public $ints;
    public $telno;
    public $mailadres;
    public $normaladres;
    public $slogan;
    public $referansbaslik;
    public $filobaslik;
    public $yorumbaslik;
    public $iletisimbaslik;
    public $hizmetlerbaslik;




    public function __construct()
    {
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

        $ayarcek = $baglanti->prepare('SELECT * FROM ayarlar');
        $ayarcek->execute();
        $sorguson = $ayarcek->fetch(PDO::FETCH_ASSOC);

        $this->normaltitle   = $sorguson['title'];
        $this->metatitle     = $sorguson['metatitle'];
        $this->metadesc      = $sorguson['metadesc'];
        $this->metakey       = $sorguson['metakey'];
        $this->metaout       = $sorguson['metaauthor'];
        $this->metaown       = $sorguson['metaowner'];
        $this->metacopy      = $sorguson['metacopy'];
        $this->logoyazisi    = $sorguson['logoyazisi'];
        $this->tvit          = $sorguson['twit'];
        $this->face          = $sorguson['face'];
        $this->ints          = $sorguson['ints'];
        $this->telno         = $sorguson['telefonno'];
        $this->mailadres     = $sorguson['mailadres'];
        $this->normaladres   = $sorguson['adres'];
        $this->slogan        = $sorguson['slogan'];
        $this->referansbaslik = $sorguson['referansbaslik'];
        $this->filobaslik    = $sorguson['filobaslik'];
        $this->yorumbaslik   = $sorguson['yorumbaslik'];
        $this->iletisimbaslik = $sorguson['iletisimbaslik'];
        $this->hizmetlerbaslik = $sorguson['hizmetlerbaslik'];


    }

    function introbak($baglanti){

        $introal= $baglanti->prepare("select * from intro");
        $introal->execute();

        while($sonucum=$introal->fetch(PDO::FETCH_ASSOC)):
           
            

            echo '<div class="item" style="background-image:url('.$sonucum["resimyol"].');"></div>';



        endwhile;


    }

        function hakkimizda($baglanti){

        $introal= $baglanti->prepare("select * from hakkimizda");
        $introal->execute();

        $sonucum=$introal->fetch(PDO::FETCH_ASSOC);
           
            echo '<div class="row">
        
        <div class="col-lg-6 hakkimizda-img">
        <img src="'.$sonucum["resim"].'"  alt="'.$sonucum["resim"].'-Hakkında"/>
        
        </div>
        
        
        
        <div class="col-lg-6 content">
        <h2>'.$sonucum["baslik"].'</h2>
        <h3>'.$sonucum["icerik"].'</h3>
        
        
        
        </div>';

            

    }

     function hizmetler($baglanti){

        $introal= $baglanti->prepare("select * from hizmetler");
        $introal->execute();

        
           
          echo  '<div class="section-header">
        <h2>HİZMETLERİMİZ</h2>
        <p>'; echo $this-> hizmetlerbaslik; echo '</p>
   		 </div>
    
    <div class="row">';

    while($sonucum=$introal->fetch(PDO::FETCH_ASSOC)) :

    echo'<div class="col-lg-6">
            	<div class="box wow fadeInTop">
                	<div class="icon"><i class="fa fa-certificate"></i></div>
                    <h4 class="title"><a href="#">'.$sonucum["baslik"].'</a></h4>
                    <p class="description">'.$sonucum["icerik"].'</p>
                    </div> 
                  </div>';

    endwhile;

   
    
    echo'</div>';


    }

     function referans($baglanti){

        $introal= $baglanti->prepare("select * from referanslar");
        $introal->execute();
            echo'<div class="section-header">
        <h2>Referanslar</h2>
        <p>'; echo $this->referansbaslik; echo ' </p>
   		 </div>
         
         <div class="owl-carousel clients-carousel">';
      

        while($sonucum=$introal->fetch(PDO::FETCH_ASSOC)):
           
            echo'<img src="'.$sonucum["resimyol"].'" alt="Referans-'.$sonucum["id"].'" />';

       

        endwhile;

        echo'</div>';


    }


     function filomuz($baglanti){

        $introal= $baglanti->prepare("select * from filomuz");
        $introal->execute();
           
        echo'<div class="container">


		<div class="section-header">
        <h2>Araçlarımız</h2>
        <p>'; echo $this->filobaslik; echo ' </p>
   		 </div>
         </div>
         
         
         
         <div class="container-fluid">
         <div class="row no-gutters">';

          while($sonucum=$introal->fetch(PDO::FETCH_ASSOC)):

            echo'	<div class="col-lg-3 col-md-4">         
         	<div class="filo-item wow fadeInUp">            
            <a href="'.$sonucum["resimyol"].'" class="filo-popup">
            <img src="'.$sonucum["resimyol"].'" alt="Referans-'.$sonucum["id"].'" />
            <div class="filo-overlay">
            
            </div>
            </a>
            </div>
            </div>';
    
        endwhile;

        echo'</div></div>';
        
    }


        function yorumlar($baglanti){

        $introal= $baglanti->prepare("select * from yorumlar");
        $introal->execute();

       
        echo' <div class="section-header">
        <h2>Müşteri Yorumları</h2>
        <p>'; echo $this->yorumbaslik; echo ' </p>
   		 </div>
         
         <div class="owl-carousel testimonials-carousel">';

         while ($sonucum=$introal->fetch(PDO::FETCH_ASSOC)):

            echo'<div class="testimonial-item">
            
            <p>
            <img src="img/sol.png" class="quote-sign-left" />
           '.$sonucum["icerik"].'
            <img src="img/sag.png" class="quote-sign-right" />
            </p>
            <img src="img/yorum.jpg" class="testimonial-img" alt="Müşteri Yorum-'.$sonucum["id"].'" />
            <h3>'.$sonucum["isim"].'</h3>
            </div>';
    

        endwhile;
   
echo'</div>';


    }

}




?>
