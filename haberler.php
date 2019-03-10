<?php 

session_start();

// Yetkisi yok yonlendir
if($_SESSION['tur'] != 1) {
  header("Location: index.php");
}

// Hatalari gosteren bir deger
$mesaj = "";

if(!empty($_SESSION['mesaj'])){

  $mesaj = $_SESSION['mesaj'];
  unset($_SESSION['mesaj']);

}

$sayfa = "haberler";

require("hk/haber.php");

$haber_system = new haber();

$haberler     = $haber_system->haber_listele();


?>
<?php

include("hk/header.php");


?>
  <div class="row">

        <div class="col-md-8 pb-5">

          <h1 class="my-4">Haberler</h1>

          
          <?php 

          if(!empty($mesaj)) { ?> <div class="alert alert-success" role="alert"><?php print $mesaj; ?><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><br><?php }

          ?> 

          <a href="haber_ekle.php" class="btn btn-primary btn-lg mb-2 float-right">Ekle</a>
          <br>
          <table class="table table-hover table-responsive table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Başlık</th>
                
                <th scope="col">Yazar</th>
                <th scope="col">Tarih</th>
                <th scope="col">Resim</th>
                <th scope="col">Kategori</th>
                <th scope="col">Duzenle</th>
                <th scope="col">Sil</th>
              </tr>
            </thead>
            <tbody>

            <?php

            if($haberler){

              foreach ($haberler as $haber) { ?>


              <tr>
                <th scope="row"><?php print $haber['haber_id']; ?></th>
                <td><?php print $haber['haber_baslik']; ?></td>
                <td><?php print $haber['haber_yazar']; ?></td>
                <td><?php print $haber['haber_tarih']; ?></td>
                <td><img src="<?php print $haber['haber_resim']; ?>" width="50" height="50"></td>
                <td><?php $kategori = $haber_system->kategori_by_id($haber['haber_kategori']); print $kategori['kategori_ad']; ?></td>
                <td><a href="haber_duzenle.php?id=<?php print $haber['haber_id']; ?>" class="btn btn-secondary">Düzenle</a></td>
                <td><a href="haber_sil.php?id=<?php print $haber['haber_id']; ?>" onclick="return confirm('Silinicek mi?')" class="btn btn-danger">Sil</a></td>
              </tr>

            <?php
              }


            }?>
            </tbody>
          </table>

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