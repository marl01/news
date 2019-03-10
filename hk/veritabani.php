<?php

class Veritabani
{
    public $baglanti;
    
    function __construct()
    {
        $this->baglan();
    }
    
    public function baglan()
    {
        
        $this->baglanti = new mysqli("localhost", "fatma_haber", "s123456", "fatma_haber");
        
    }
    
    
    public function sorgu_yap($sql)
    {
        
        $sonuc = $this->baglanti->query($sql);
        
        if ($sonuc->num_rows > 0) {
            
            $satir = $sonuc->fetch_assoc();
            
            return $satir;
            
        } else {
            return false;
        }
        
    }
    public function sorgu_array($sql)
    {
        
        $sonuc = $this->baglanti->query($sql);
        
        if ($sonuc->num_rows > 0) {
            
            while ($satir = $sonuc->fetch_array(MYSQLI_ASSOC)) {
                $sonuclar[] = $satir;
            }
            
            return $sonuclar;
            
        } else {
            return false;
        }
        
    }
    
    public function sorgu_insert($sql)
    {
        
        $sonuc = $this->baglanti->query($sql);
        
        if ($sonuc) {
            return true;
        } else {
            return false;
        }
        
    }
    
}


?>