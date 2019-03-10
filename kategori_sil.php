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

		$kategori_id = intval($_GET['id']);

		$sonuc = $haber->kategori_sil($kategori_id);

		if($sonuc){

			header("Location: kategoriler.php");

			$_SESSION['mesaj'] = "Kategori silindi!";
		} else {

			header("Location: kategoriler.php");

			$_SESSION['mesaj'] = "Kategori silinimedi";

		}

	}

}


?>