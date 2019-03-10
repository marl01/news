		<!-- Search Widget -->
          <div class="card my-4">
            <h5 class="card-header">Arama</h5>
            <div class="card-body">

            <form method="get" action="index.php">
              <div class="input-group">
	              	<input type="hidden" name="action" value="arama"/>
	                <input type="text" class="form-control" name="kelime" placeholder="Kelime..." required>
	                <span class="input-group-btn">
	                  <button class="btn btn-secondary" type="submit">Ara!</button>
	                </span>
              </div>
            </form>
            </div>
          </div>

          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header">Kategoriler</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                  	<?php 

                  	$kategoriler = $haber_system->kategori_listele();

                  	if(!empty($kategoriler)){

                  		foreach ($kategoriler as $kategori) {
                  	?>

                  	<li>
                      <a href="index.php?action=kategori&amp;kategori_id=<?php print $kategori['kategori_id']; ?>"><?php print $kategori['kategori_ad']; ?></a>
                    </li>

                  	<?php
                  		} // for
                    } // kategori
                    ?>
                    
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header">Bilgi</h5>
            <div class="card-body">
              Sitemizde yayınlanan haberlerin telif hakları haber kaynaklarına aittir, haberleri kopyalamayınız.
            </div>
          </div>