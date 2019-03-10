

    </div>
    <!-- /.container -->

    <!-- Bootstrap core JavaScript -->
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
	<?php if(!empty($summernote)){?>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote-bs4.js"></script>
  	
  	<script>
  	$(document).ready(function() {
		$('#haber_metin').summernote({
			  height: 400,                 // set editor height
			  minHeight: null,             // set minimum height of editor
			  maxHeight: null,             // set maximum height of editor
			  focus: true                  // set focus to editable area after initializing summernote
		});



	});
	</script>
	<?php } ?>
  </body>

</html>
