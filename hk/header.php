<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Haber Sitesi</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/haber.css" rel="stylesheet">
    <?php if(!empty($summernote)){ ?>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote-bs4.css" rel="stylesheet">
    <?php } ?>
  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="http://habercim.ml/index.php">Habercim</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item <?php if($sayfa == "anasayfa"){ print "active"; } ?>">
              <a class="nav-link" href="http://habercim.ml/index.php">Ana sayfa
              </a>
            </li>
            <?php if(empty($_SESSION['id'])){ ?>
            <li class="nav-item <?php if($sayfa == "kayit"){ print "active"; } ?>">
              <a class="nav-link" href="kayit.php">Üye ol</a>
            </li>
            <li class="nav-item <?php if($sayfa == "giris"){ print "active"; } ?>">
              <a class="nav-link" href="giris.php">Giriş Yap</a>
            </li>
            <?php } else { ?>

            <?php if($_SESSION['tur'] == 1) { ?>
              <li class="nav-item <?php if($sayfa == "haberler"){ print "active"; } ?>">
                <a class="nav-link" href="haberler.php">Haberler</a>
              </li>
              <li class="nav-item <?php if($sayfa == "kategoriler"){ print "active"; } ?>">
                <a class="nav-link" href="kategoriler.php">Kategoriler</a>
              </li>
            <?php } ?>
              <li class="nav-item">
                <a class="nav-link" href="cikis.php">Çıkış yap</a>
              </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">