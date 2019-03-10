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


  if(!empty($_POST['kategori_ad']) && !empty($_POST['kategori_id'])){


    $kategori_id = intval($_POST['kategori_id']);
    $kategori_ad = $_POST['kategori_ad'];

    $sonuc  = $haber_system->kategori_duzenle($kategori_id, $kategori_ad);

    if($sonuc){

      $_SESSION['mesaj'] = "Kategori düzenlendi";

      header("Location: kategoriler.php");

    } else {

        $mesaj = "Kategori düzenlenmedi";
    }

  }

}


if($_GET){


  if(!empty($_GET['id'])){

    $kategori_id = intval($_GET['id']);

    $sonuc = $haber_system->kategori_by_id($kategori_id);

    if($sonuc){
      $kategori = $sonuc;
    } else {
      $_SESSION['mesaj'] = "Boyle bir kategori yok";
      header("Location: kategoriler.php");
    }
  }


}

?>
<?php

include("hk/header.php");


?>
  <div class="row">

        <div class="col-md-8 pb-5">

          <h1 class="my-4">Kategori düzenle</h1>

          
          <?php 

          if(!empty($mesaj)) { ?> <div class="alert alert-danger" role="alert"><?php print $mesaj; ?></div><br><?php }

          ?> 
          <form action="" class="pb-5" method="POST">
            <div class="form-group">
              <label for="kategori_ad">Kategori ad</label>
              <input type="text" class="form-control" id="kategori_ad" name="kategori_ad" value="<?php print $kategori['kategori_ad']; ?>" required>
            </div>
            <input type="hidden" name="kategori_id" value="<?php print $kategori['kategori_id']; ?>">
            
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