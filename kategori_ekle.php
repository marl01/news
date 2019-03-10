<?php 

session_start();

// Yetkisi yok yonlendir
if($_SESSION['tur'] != 1) {
  header("Location: index.php");
}

// Hatalari gosteren bir deger
$mesaj = "";

$sayfa = "kategoriler";

require("hk/haber.php");

$haber_system = new haber();

if($_POST){


  if(!empty($_POST['kategori_ad'])){

    $kategori_ad = $_POST['kategori_ad'];


    $sonuc  = $haber_system->kategori_ekle($kategori_ad);

    if($sonuc){

      $_SESSION['mesaj'] = "Kategori eklendi";

      header("Location: kategoriler.php");

    } else {
        $mesaj = "Kategori eklenemedi";
    }

  }

}



?>
<?php

include("hk/header.php");


?>
  <div class="row">

        <div class="col-md-8 pb-5">

          <h1 class="my-4">Kategori ekle</h1>

          
          <?php 

          if(!empty($mesaj)) { ?> <div class="alert alert-danger" role="alert"><?php print $mesaj; ?></div><br><?php }

          ?> 
          <form action="" class="pb-5" method="POST">
            <div class="form-group">
              <label for="kategori_ad">Kategori ad</label>
              <input type="text" class="form-control" id="kategori_ad" name="kategori_ad" required>
            </div>
            <button type="submit" class="btn btn-lg btn-block btn-primary">Kaydet</button>

          </form>

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