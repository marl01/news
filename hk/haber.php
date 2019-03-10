<?php

require("veritabani.php");

class Haber {
	
	private $vt;

	function __construct(){

		$this->vt = new veritabani();

	}

	public function giris($eposta, $sifre){	

		$sql = "SELECT * FROM `kullanici` WHERE `eposta` = '"  . $eposta .   "' AND `sifre` = '" . $sifre.  "';";

		$sonuc = $this->vt->sorgu_yap($sql);

		if ($sonuc){
			return $sonuc;
		} else {
			return false;
		}

	}

	public function kayit($eposta, $sifre, $ad, $soyad){

		$sql = "INSERT INTO `kullanici` ( `eposta`, `sifre`, `ad`, `soyad`) VALUES ('".$eposta."', '".$sifre."', '".$ad."', '".$soyad."');"  ;

		$sonuc = $this->vt->sorgu_insert($sql);


		if ($sonuc){
			return $sonuc;
		} else {
			return false;
		}

	}


    public function haber_ekle($haber_baslik, $haber_metin, $haber_yazar, $haber_resim, $haber_kategori, $haber_slider){


    	$sql= "INSERT INTO `haberler` ( `haber_baslik`, `haber_metin`, `haber_yazar`, `haber_tarih`, `haber_resim`, `haber_kategori`, `haber_slider`) VALUES ( '".$haber_baslik."', '".$haber_metin."', '".$haber_yazar."', CURRENT_TIMESTAMP, '".$haber_resim."', '".$haber_kategori."', '".$haber_slider."'); " ;

    	// anlamak icin yukaradai sql sorguyu geri gonderiyiorumz.
    	//return $sql;
    	$sonuc = $this->vt->sorgu_insert($sql);

    	if ($sonuc){
			return $sonuc;
		} else {
			return false;
		}
	}

 	public function kategori_ekle($kategori_ad){


 		$sql= " INSERT INTO `kategoriler` ( `kategori_ad`) VALUES ( '".$kategori_ad."'); " ;

 		$sonuc = $this->vt->sorgu_insert($sql);

 		if ($sonuc){
			return $sonuc;
		} else {
			return false;
		}
	}

 	public function haber_sil($haber_id){

 		$sql="DELETE FROM `haberler` WHERE `haberler`.`haber_id` = " . $haber_id .";";

 		$sonuc = $this->vt->sorgu_insert($sql);


 		if ($sonuc){
			return $sonuc;
		} else {
			return false;
		}

	}

 	public function kategori_sil($kategori_id){

 		$sql="DELETE FROM `kategoriler` WHERE `kategoriler`.`kategori_id` =  '".$kategori_id."';";

 		$sonuc = $this->vt->sorgu_insert($sql);

 		if ($sonuc){
			return $sonuc;
		} else {
			return false;
		}
	}

 	public function haber_duzenle($haber_id, $haber_baslik, $haber_kategori, $haber_yazar, $haber_metin, $haber_resim, $haber_slider){

 		$sql=" UPDATE `haberler` SET `haber_baslik` = '".$haber_baslik."', `haber_kategori` = '".$haber_kategori."', `haber_yazar` = '".$haber_yazar."', `haber_metin` = '".$haber_metin."', `haber_slider` = '".$haber_slider."', `haber_resim` = '".$haber_resim."' WHERE `haberler`.`haber_id` = '".$haber_id."'; ";

 		$sonuc = $this->vt->sorgu_insert($sql);

 		if ($sonuc){
			return $sonuc;
		} else {
			return false;
		}
	}


 	public function kategori_duzenle($kategori_id, $kategori_ad){

 		$sql="UPDATE `kategoriler` SET `kategori_ad` = '".$kategori_ad."' WHERE `kategoriler`.`kategori_id` = '".$kategori_id."';";

 		$sonuc = $this->vt->sorgu_insert($sql);

 		if ($sonuc){
			return $sonuc;
		} else {
			return false;
		}

 	}

	public function haber_listele(){	

		$sql = "SELECT * FROM `haberler` ";

		$sonuc = $this->vt->sorgu_array($sql);

		if ($sonuc){
			return $sonuc;
		} else {
			return false;
		}

	}

	public function kategori_listele(){	

		$sql = "SELECT * FROM `kategoriler` " ;
		$sonuc = $this->vt->sorgu_array($sql);

		if ($sonuc){
			return $sonuc;
		} else {
			return false;
		}

	}

	public function haber_listele_by_id($haber_kategori_id){	

		$sql = "SELECT * FROM `haberler` WHERE `haber_kategori` = '"  . $haber_kategori_id .   "'; " ;

		$sonuc = $this->vt->sorgu_array($sql);

		if ($sonuc){
			return $sonuc;
		} else {
			return false;
		}

	}

	public function haber_slider(){	

		$sql = "SELECT * FROM `haberler` WHERE `haber_slider` = '2'; " ;

		$sonuc = $this->vt->sorgu_array($sql);

		if ($sonuc){
			return $sonuc;
		} else {
			return false;
		}

	}

	public function haber_arama($kelime){

		$sql = "SELECT * FROM `haberler` WHERE `haber_baslik` LIKE '%" . $kelime . "%'";

		$sonuc = $this->vt->sorgu_array($sql);

		if ($sonuc){
			return $sonuc;
		} else {
			return false;
		}
	}

	public function kategori_by_id($kategori_id){	

		$sql = "SELECT * FROM `kategoriler` WHERE `kategori_id` = '"  . $kategori_id .   "'; " ;

		$sonuc = $this->vt->sorgu_yap($sql);

		if ($sonuc){
			return $sonuc;
		} else {
			return false;
		}

	}
	public function haber_by_id($haber_id){	

		$sql = "SELECT * FROM `haberler` WHERE `haber_id` = '"  . $haber_id .   "'; " ;

		$sonuc = $this->vt->sorgu_yap($sql);

		if ($sonuc){
			return $sonuc;
		} else {
			return false;
		}

	}


}