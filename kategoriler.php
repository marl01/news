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

$sayfa = "kategoriler";

require("hk/haber.php");

$haber_system = new haber();

$kategoriler = $haber_system->kategori_listele();


?>
<?php

include("hk/header.php");


?>
  <div class="row">

        <div class="col-md-8 pb-5">

          <h1 class="my-4">Kategoriler</h1>

          
          <?php 

          if(!empty($mesaj)) { ?> <div class="alert alert-success" role="alert"><?php print $mesaj; ?><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><br><?php }

          ?> 

          <a href="kategori_ekle.php" class="btn btn-primary btn-lg mb-2 float-right">Ekle</a>
          <br>
          <table class="table table-hover table-responsive table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Ad</th>
                <th scope="col">Duzenle</th>
                <th scope="col">Sil</th>
              </tr>
            </thead>
            <tbody>

             <?php

              if($kategoriler){

                foreach ($kategoriler as $kategori) { ?>


                <tr>
                  <th scope="row"><?php print $kategori['kategori_id']; ?></th>
                  <td><?php print $kategori['kategori_ad']; ?></td>
                  <td><a href="kategori_duzenle.php?id=<?php print $kategori['kategori_id']; ?>" class="btn btn-secondary">Düzenle</a></td>
                  <td><a href="kategori_sil.php?id=<?php print $kategori['kategori_id']; ?>" onclick="return confirm('Silinicek mi?')" class="btn btn-danger">Sil</a></td>
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