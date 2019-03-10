<?php 

session_start();

// Giris yapildi yonlendir
if(!empty($_SESSION['id'])){
	header("Location: index.php");
}

// Hatalari gosteren bir deger
$mesaj = "";

require("hk/haber.php");

$sayfa = "giris";

$haber_system  = new haber();

if($_POST){


  if(!empty($_POST['eposta']) && !empty($_POST['sifre'])){

      	$eposta = $_POST['eposta'];
      	$sifre	= $_POST['sifre'];


      	$sonuc = $haber_system->giris($eposta, $sifre);

      	if($sonuc){

      		$_SESSION['id']		= $sonuc['id'];
      		$_SESSION['eposta'] = $sonuc['eposta'];
      		$_SESSION['ad']	= $sonuc['ad'];
      		$_SESSION['soyad']	= $sonuc['soyad'];
      		$_SESSION['tur']	= $sonuc['tur'];


      		
      		header("Location: index.php");
      	} else {

      		$mesaj = "Giriş yapılmadı! Yanliş şifre!";
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

          <h1 class="my-4">Giriş Sayfası</h1>

        <?php 

        if(!empty($mesaj)) { ?> <div class="alert alert-danger" role="alert"><?php print $mesaj; ?></div><?php }

        ?>

          <form action="" method="post">
              <div class="form-group">
                <label for="eposta">Email Adresi</label>
                <input type="email" class="form-control" id="eposta" name="eposta" required>
               
              </div>
              <div class="form-group">
                <label for="sifre">Şifre</label>
                <input type="password" class="form-control" id="sifre" name="sifre" required>
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