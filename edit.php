<?php
include 'db.php';

$db = new db();

$id = isset($_GET["id"]) ? $_GET["id"]: null;

if( isset($_POST["submit"]) ){
  $id = $_POST["id"];
  echo "printed";
}

if(isset($id)){
    $hero = $db->query('SELECT name,last_name,occupation,wilaya,birthdate,arrested_date,court,released_date,reason,sentence,comment,id 
    FROM heroes 
    WHERE id = ?', $id
    )->fetchArray();
    if (count($hero)<=0)
      header("HTTP/1.0 404 Not Found");
      include_once("404.html");
      exit();
}else{
  die();
}




$db->close();

?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Hirak Heroes  &mdash;</title>
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
    
  </head>
  <body>
  
  <div class="site-wrap">

    <div class="site-section" data-aos="fade">
    <div class="container-fluid">
      
      <div class="row justify-content-center">
        <div class="col-md-7">
          
            <div class="container">
            <div class="row text-center justify-content-center mb-5">
                <div class="col-md-7" data-aos="fade-up">
                    <h2>
                        <a href="index.php">
                            Hirak Heroes 
                        </a> 
                    </h2>
                </div>
            </div>
          <div class="row">
            <div class="col-lg-8 mb-5">
              <form action="edit.php" method="POST">
               
                <input type="hidden" for="id" name="id" value="<?php echo $hero["id"]; ?>"/>
                <div class="row form-group">
                  <div class="col-md-6 mb-3 mb-md-0">
                    <label class="text-black" for="fname">First Name *</label>
                    <input type="text" id="fname" name="fname" name="fname" class="form-control" value="<?php echo $hero["name"]; ?>" required>
                  </div>
                  <div class="col-md-6">
                    <label class="text-black" for="lname">Last Name *</label>
                    <input type="text" id="lname" name="lname" class="form-control" value="<?php echo $hero["last_name"]; ?>"  required>
                  </div>
                </div>

                <div class="row form-group">
                <div class="col-md-6">
                    <label class="text-black" for="occupation">Occupation</label>
                    <input type="text" id="occupation" name="occupation" class="form-control" value="<?php echo $hero["occupation"]; ?>" >
                  </div>
                  <div class="col-md-6">
                    <label class="text-black" for="wilaya">Wilaya *</label>
                    <input type="text" id="wilaya" name="wilaya" class="form-control"  value="<?php echo $hero["wilaya"]; ?>" required>
                  </div>
                </div>

                <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                    <label class="text-black" for="birthdate">Birthdate</label>
                    <input type="date" id="birthdate" name="birthdate" class="form-control"  value="<?php echo $hero["birthdate"]; ?>" >
                  </div>
                  <div class="col-md-6 mb-3 mb-md-0">
                    <label class="text-black" for="arrested_date">Arrestation date *</label>
                    <input type="date" id="arrested_date" class="form-control" value="<?php echo $hero["arrested_date"]; ?>"  required>
                  </div>

                </div>

                <div class="row form-group">
                  <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-black" for="court">Court</label> 
                    <input type="text" id="court" name="court" class="form-control" value="<?php echo $hero["court"]; ?>" >

                  </div>
                  <div class="col-md-6">
                    <label class="text-black" for="released_date">Release date</label>
                    <input type="date" id="released_date" class="form-control" value="<?php echo $hero["released_date"]; ?>" >
                  </div>
                </div>


                <div class="row form-group">
                  
                  <div class="col-md-12">
                    <label class="text-black" for="charges">Charges</label> 
                    <input type="text" id="charges" name="charges" class="form-control" value="<?php echo $hero["reason"]; ?>" >
                  </div>
                </div>

                <div class="row form-group">
                  
                  <div class="col-md-12">
                  <label class="text-black" for="sentence">Sentence</label>
                    <input type="text" id="sentence" name="sentence" class="form-control" value="<?php echo $hero["sentence"]; ?>" >
                  </div>
                </div>

                <div class="row form-group">
                  <div class="col-md-12">
                    <label class="text-black" for="comments">Comments</label> 
                    <textarea name="message" id="comments" name="comments" cols="30" rows="7" class="form-control" placeholder="Any comments here"><?php echo $hero["comment"];?></textarea>
                  </div>
                </div>

                <div class="row form-group">
                  <div class="col-md-12">
                    <input type="submit" name="submit" value="Validate" class="btn btn-primary py-2 px-4 text-white">
                  </div>
                </div>
              </form>
            </div>
            <div class="col-lg-3 ml-auto">
              <div class="mb-3 bg-white">
                <?php
                  $name = $hero["name"];
                  $last_name = $hero["last_name"];
                  $filename = strtolower($name."_".$last_name.".jpg");
                  $image_files = scandir('images/detenus/');
                  if (in_array($filename, $image_files))
                    $avatar = "images/detenus/".$filename;
                  else
                    $avatar = "images/hero.jpg";
                ?>
                <img src="<?php echo $avatar; ?>" alt="" class="img-fluid">
              </div>
              
            </div>
          </div>
        </div>
    
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