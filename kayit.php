<?php 

session_start();

// Hatalari gosteren bir deger
$mesaj = "";

require("hk/haber.php");

$sayfa = "kayit";

$haber_system  = new haber();

if($_POST){


  if(!empty($_POST['eposta']) && !empty($_POST['sifre']) && !empty($_POST['ad']) &&!empty($_POST['soyad'])){

      	$eposta = $_POST['eposta'];
      	$sifre	= $_POST['sifre'];
        $ad     = $_POST['ad'];
        $soyad  = $_POST['soyad'];

      	$sonuc = $haber_system->kayit($eposta, $sifre, $ad, $soyad);

        
      	if($sonuc){

      		
          $sonuc = $haber_system->giris($eposta, $sifre);

      		$_SESSION['id']		= $sonuc['id'];
      		$_SESSION['eposta'] = $sonuc['eposta'];
      		$_SESSION['ad']	= $sonuc['ad'];
      		$_SESSION['soyad']	= $sonuc['soyad'];
      		$_SESSION['tur']	= $sonuc['tur'];


      		// Yonlendir
      		header("Location: index.php");
          
      	} else {

      		$mesaj = "Kayit yapilmadi!";
      	}

  }

}


 ?>


<?php

include("hk/header.php");


?>
  <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

          <h1 class="my-4">Kayit Sayfası</h1>

        <?php 

        if(!empty($mesaj)) { ?> <div class="alert alert-danger" role="alert"><?php print $mesaj; ?></div><?php }

        ?>
        <form action="" method="POST">
          <div class="form-group">
            <label for="eposta">Email Adresi</label>
            <input type="email" class="form-control" id="eposta" name="eposta" required>
           
          </div>
          <div class="form-group">
            <label for="sifre">Şifre</label>
            <input type="password" class="form-control" id="sifre" name="sifre" required>
          </div>

          <div class="form-group">
            <label for="ad">Ad</label>
            <input type="text" class="form-control" id="ad" name="ad" required>
          </div>

          <div class="form-group">
            <label for="soyad">Soyad</label>
            <input type="text" class="form-control" id="soyad" name="soyad" required>
          </div>

          
          <button type="submit" class="btn btn-lg btn-block btn-primary">Gönder</button>
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