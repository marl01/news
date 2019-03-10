<?php 

session_start();

// Yetkisi yok yonlendir
if($_SESSION['tur'] != 1) {
  header("Location: index.php");
}

// Hatalari gosteren bir deger
$mesaj = "";

$sayfa = "haberler";

$summernote = "true";

require("hk/haber.php");

$haber_system = new haber();

if($_POST){


  if(!empty($_POST['haber_baslik']) && !empty($_POST['haber_id']) && !empty($_POST['haber_yazar']) && !empty($_POST['haber_metin']) && !empty($_POST['haber_resim'])  && !empty($_POST['haber_slider'])){


    $haber_id       = intval($_POST['haber_id']);
    $haber_baslik   = htmlentities($_POST['haber_baslik'], ENT_QUOTES);
    $haber_yazar    = htmlentities($_POST['haber_yazar'], ENT_QUOTES);
    $haber_metin    = htmlentities($_POST['haber_metin'], ENT_QUOTES);
    $haber_resim    = htmlentities($_POST['haber_resim'], ENT_QUOTES);
    $haber_kategori = intval($_POST['haber_kategori']);
    $haber_slider   = intval($_POST['haber_slider']);



    $sonuc  = $haber_system->haber_duzenle($haber_id, $haber_baslik, $haber_kategori, $haber_yazar, $haber_metin, $haber_resim, $haber_slider);

    if($sonuc){

      $_SESSION['mesaj'] = "Haber düzenlendi";

      header("Location: haberler.php");

    } else {

        $mesaj = "Haber düzenlenmedi";
    }


  }

}


if($_GET){


  if(!empty($_GET['id'])){

    $haber_id = intval($_GET['id']);

    $sonuc = $haber_system->haber_by_id($haber_id);

    if($sonuc){
      $haber = $sonuc;
    } else {
      $_SESSION['mesaj'] = "Boyle bir haber yok";

      header("Location: haberler.php");
    }
  }


}


$kategoriler = $haber_system->kategori_listele();

?>
<?php

include("hk/header.php");


?>
  <div class="row">

        <div class="col-md-8 pb-5">

          <h1 class="my-4">Haber düzenle</h1>

          
          <?php 

          if(!empty($mesaj)) { ?> <div class="alert alert-danger" role="alert"><?php print $mesaj; ?></div><br><?php }

          ?> 
          <form action="" class="pb-5" method="POST">
            <div class="form-group">
              <label for="haber_baslik">Haber başlık</label>
              <input type="text" class="form-control" id="haber_baslik" name="haber_baslik" value="<?php print $haber['haber_baslik']; ?>" required>
            </div>

            <div class="form-group">
              <label for="haber_kategori">Haber kategori</label>

              <select class="form-control" id="haber_kategori" name="haber_kategori">
              <?php if($kategoriler){ foreach ($kategoriler as $kategori) { ?>

                  <option value="<?php print $kategori['kategori_id'];?>" <?php if($kategori['kategori_id'] == $haber['haber_kategori']){ print "selected"; } ?>><?php print $kategori['kategori_ad'];?></option>
                
              <?php } } ?>

              </select>
            </div>
            <div class="form-group">
              <label for="haber_slider">Haber slider</label>

              <select class="form-control" id="haber_slider" name="haber_slider">

                  <option value="1" <?php if($haber['haber_slider'] == 1){ print "selected"; } ?>>Hayır</option>
                  <option value="2" <?php if($haber['haber_slider'] == 2){ print "selected"; } ?>>Evet</option>
                  
              </select>
            </div>

            <div class="form-group">
              <label for="haber_yazar">Haber yazar</label>
              <input type="text" class="form-control" id="haber_yazar" name="haber_yazar"  value="<?php print $haber['haber_yazar']; ?>"  required>
            </div>

            <div class="form-group">
              <label for="haber_resim">Haber resim</label>
              <input type="text" class="form-control" id="haber_resim" name="haber_resim" value="<?php print $haber['haber_resim']; ?>" required>
            </div>


            <div class="form-group">
              <label for="haber_metin">Haber metin</label>
              <textarea class="form-control" id="haber_metin" rows="6" name="haber_metin"><?php print $haber['haber_metin']; ?></textarea>
            </div>

            <input type="hidden" name="haber_id" value="<?php print $haber['haber_id']; ?>">
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