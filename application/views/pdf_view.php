<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title></title>
	<!-- AJAX -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
	<!-- costume css -->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>mods/assets/flip/css/flipbook.style.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>mods/assets/flip/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>mods/assets/flip/css/footer.css">
	 <script src="<?= base_url() ?>mods/assets/flip/js/flipbook.min.js"></script>

	  <script type="text/javascript">

	      $(document).ready(function () {
			$("#read").flipBook({
				//Layout Setting
				pdfUrl:'<?= base_url() ?>mods/assets/book/ebook-29122022-1620070489.pdf',
				lightBox:true,
				layout:3,
				currentPage:{vAlign:"bottom", hAlign:"left"},
				// BTN SETTING
				btnShare : {enabled:false},
				btnPrint : {
				  hideOnMobile:true,
				  enabled: false,
				},
				btnDownloadPages : {
				  enabled: false,
				},
				btnDownloadPdf : {
				  enabled: false,

				},
				btnColor:'rgb(255,120,60)',
				sideBtnColor:'rgb(255,120,60)',
				sideBtnSize:60,
				sideBtnBackground:"rgba(0,0,0,.7)",
				sideBtnRadius:60,
				btnSound:{vAlign:"top", hAlign:"left"},
				btnAutoplay:{vAlign:"top", hAlign:"left"},
			});
	      })
	  </script>
</head>
<body id="read">
	<!-- <a id="read" class="btn btn-primary mt-2 text-white">Baca PDF <i class="fas fa-book-reader fa-lg"></i></a> -->
</body>
</html>