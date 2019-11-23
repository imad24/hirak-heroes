<?php
include 'db.php';

$db = new db();

$heroes = $db->query('SELECT name,last_name,arrested_date,special,wilaya,released,comment,id FROM heroes ORDER BY special desc,last_name asc'  )->fetchAll();

$db->close();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Hirak-Heroes &mdash; Hommage aux détenu(e)s d'opinion Algériens </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300i,400,700" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/lightgallery.min.css">    
    
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    
    <link rel="stylesheet" href="css/swiper.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-153197177-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-153197177-1');
    </script>

    
  </head>
  <body>
  
  <div class="site-wrap">

    <div class="site-blocks-cover overlay inner-page-cover" style="background-image: url('images/cover.jpg');" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7 text-center" data-aos="fade-up">
            <h1>Hirak Heroes</h1>
          </div>
        </div>
      </div>
    </div>

    <div class="site-block-profile-pic" data-aos="fade" data-aos-delay="200">
      <a href="#" onclick="return false;"><img src="images/profile.jpg" alt="Image"></a>
    </div>

    <div class="site-section border-bottom">
      <div class="container">
        <div class="row text-center justify-content-center mb-5">
            <div class="col-md-7" data-aos="fade-up">
              <h2>حنا هوما الابتلاء اه يا حكومة</h2>
              <h2>والنارهادي متطفاش </h2>
            </div>
          </div>    

        <div class="row">
          <?php 
          $delay = 0;
          $files = scandir('images/detenus/');
              foreach ($heroes as $hero){
                  $name = $hero["name"];
                  $last_name = $hero["last_name"];
                  $filename = strtolower($name."_".$last_name.".jpg");
                  $image_files = scandir('images/detenus/');
                  if (in_array($filename, $image_files))
                    $avatar = "images/detenus/".$filename;
                  else
                    $avatar = "images/hero.jpg";
                ?>
              <div  class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay=<?php echo $delay; ?>>
                  <div class="image-gradient">
                    <figure>
                      <img src="<?php echo $avatar; ?>" alt="" class="img-fluid">
                    </figure>
                    <div class="text">
                      <h3><?php 
                          $arrested_date = strtotime($hero["arrested_date"]);
                          $arrested_fdate = date('d-m-Y',$arrested_date);
                          echo $name;
                          echo " ";
                          echo $last_name;
                          $delay=$delay+0;
                        ?></h3>
                      <span><?php 
                        echo "Arrêté(e) à ".$hero["wilaya"]." le ".$arrested_fdate;
                      ?></span>
                    </div>
                      <span style="font-size:8px; position:absolute; right:5px; bottom:0px; color:#eee; z-index:3">
                        <a href="edit.php?id=<?php echo $hero["id"];?>" target="_blank">edit</a>
                      </span>
                  </div>
              </div>


            <?php }?>
        </div>
      </div>
    </div>




  <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="mb-5">
              <h3 class="footer-heading mb-4">Hirak Heroes</h3>
              <p>Sources: Comité National pour la Libération des Détenus. Le CNLD a comme mission d’assurer la solidarité entre et avec toutes les familles des détenus d’opinion et politiques, d’informer l’opinion publique nationale et internationale des actions à mener pour la libération de ces détenus.</p>
            </div>
          </div>
          <div class="col-lg-4 mb-5 mb-lg-0">
    


          </div>

          <div class="col-lg-4 mb-5 mb-lg-0">
            <h3 class="footer-heading mb-4">Contactez-Nous</h3>

                <div>
                  <a href="https://www.facebook.com/comitenationalpourlaliberationdesdetenusCNLD/" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                  <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                  <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                  <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
                </div>

            

          </div>
          
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>
          
        </div>
      </div>
    </footer>


    
    
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/swiper.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/picturefill.min.js"></script>
  <script src="js/lightgallery-all.min.js"></script>
  <script src="js/jquery.mousewheel.min.js"></script>

  <script src="js/main.js"></script>
  
  <script>
    $(document).ready(function(){
      $('#lightgallery').lightGallery();
    });
  </script>
    
  </body>
</html>