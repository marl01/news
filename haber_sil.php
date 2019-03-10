<?php 

session_start();

// Yetkisi yok yonlendir
if($_SESSION['tur'] != 1) {
  header("Location: index.php");
}

// Hatalari gosteren bir deger
$mesaj = "";

require("hk/haber.php");

$haber = new haber();


if($_GET){

	if(!empty($_GET['id'])){

		$haber_id = intval($_GET['id']);

		$sonuc = $haber->haber_sil($haber_id);

		if($sonuc){

			header("Location: haberler.php");

			$_SESSION['mesaj'] = "Haber silindi!";

		} else {

			header("Location: haberler.php");

			$_SESSION['mesaj'] = "Haber silinemedi";

		}

	}

}


?>