<?php 

session_start();

// Hatalari gosteren bir deger
$mesaj = "";

$sayfa = "anasayfa";

require("hk/haber.php");

$haber_system = new haber();

$action = false;

$slider = false;

if($_GET){

  if(!empty($_GET['action'])){
    $action = $_GET['action'];
  }

  if($action == "kategori" && !empty($_GET['kategori_id'])){

    $kategori_id = intval($_GET['kategori_id']);

    $haberler = $haber_system->haber_listele_by_id($kategori_id);

  } else if($action == "arama" && !empty($_GET['kelime'])){
    
    $kelime = $_GET['kelime'];

    $haberler = $haber_system->haber_arama($kelime);
    
  } else if($action == "haber" && !empty($_GET['haber_id'])){
    
    $haber_id = $_GET['haber_id'];

    $haber = $haber_system->haber_by_id($haber_id);
    
  } else {
    $slider = true;
    $haberler = $haber_system->haber_listele();
  }

} else {
  $slider = true;
  $haberler = $haber_system->haber_listele();
}

?>
<?php

include("hk/header.php");


?>
  <div class="row">

        <div class="col-md-8 pb-5">

        <?php if(!$action || $action == "kategori" || $action == "arama"){ ?>
          <h1 class="my-4">Haberler</h1>

          
          <?php 

          if(!empty($mesaj)) { ?> <div class="alert alert-danger" role="alert"><?php print $mesaj; ?></div><br><?php }

          ?>

          <?php if(!empty($slider)) {

            $haber_sliders = $haber_system->haber_slider();
            // slider
            if(!empty($haber_sliders)) { ?>

            <div id="carouselExampleIndicators" class="carousel slide mb-5" data-ride="carousel">
              <div class="carousel-inner">
                <?php $one = 1; foreach ($haber_sliders as $haber_slider) { ?>
                <div class="carousel-item <?php if($one == 1){print "active";} $one = $one +1; ?>">
                  <img src="<?php print $haber_slider['haber_resim']; ?>" width="750" height="300" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <h3><?php print $haber_slider['haber_baslik']; ?></h3>
                    <p><a href="index.php?action=haber&amp;haber_id=<?php print $haber_slider['haber_id']; ?>" class="btn btn-primary">Devamını oku &rarr;</a></p>
                  </div>
                </div>
                
            <?php } ?>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
            <?php } ?>



          <?php } ?>

          <?php if(!empty($haberler)){
            // for each
            foreach ($haberler as $haber) { ?>
              
          
          <div class="card mb-4">
            <img class="card-img-top" src="<?php print $haber['haber_resim']; ?>" width="750" height="300" alt="">
            <div class="card-body">
              <h2 class="card-title"><?php print $haber['haber_baslik']; ?></h2>
              <a href="index.php?action=haber&amp;haber_id=<?php print $haber['haber_id']; ?>" class="btn btn-primary">Devamını oku &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              Tarih: <?php print $haber['haber_tarih']; ?> | Yazar <?php print $haber['haber_yazar']; ?>
            </div>
          </div>

          <?php }



          } else { ?>
          <div class="alert alert-danger" role="alert">Listenecek haberler yok</div>
          <?php } ?> 

          <?php } ?>
          <?php if($action == "haber"){ ?>

          <?php if(!empty($haber)) { ?>

          <!-- Title -->
          <h1 class="mt-4"><?php print $haber['haber_baslik']; ?></h1>

          <hr>

          <!-- Date/Time -->
          <p>Tarih: <?php print $haber['haber_tarih']; ?> | Yazar <?php print $haber['haber_yazar']; ?></p>

          <hr>

          <!-- Preview Image -->
          <img class="card-img-top rounded" src="<?php print $haber['haber_resim']; ?>" width="900" height="300" alt="">

          <hr>

          <!-- Post Content -->
          <p class="lead"><?php print htmlspecialchars_decode($haber['haber_metin'], ENT_NOQUOTES); ?></p>

          <?php } else { ?>
          <h1 class="mt-4">Haber</h1>

          <hr>
          <div class="alert alert-danger" role="alert">Haber yok</div>
          <?php } ?> 

          <?php } ?>

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

          <?php

          include("hk/left.php");


          ?>

        </div>

      </div>
      <!-- /.row -->

<?php

include("hk/footer.php");


?>