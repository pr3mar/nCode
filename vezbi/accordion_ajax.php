<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
@import '../css/main.css';
@import '../css/tabs.css';
@import '../css/lightbox.css';
@import '../css/screen.css';
</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
 <script>
		$(function() {
			$( "#tabs" ).accordion({
				beforeActivate: function( event, ui ) {
					ui.jqXHR.error(function() {
					ui.panel.html(
						"Грешка во вчитувањето, ве молам пробајте повторно.");
					});
				}
			});
		});
	</script>
</head>

<body>
<div id="tabs">
    <ul>
        <li><a href="../texts/poim.html">Поим за криптографија</a></li>
        <li><a href="ajax/content1.html">Основни поими во криптографијата</a></li>
        <li><a href="ajax/content2.html">Како функционира криптографијата</a></li>
        <li><a href="ajax/content3-slow.php">Видови на криптографија</a></li>
        <li><a href="ajax/content4-broken.php">Конвенционална криптографија</a></li>
        <li><a href="ajax/content4-broken.php">Примена на криптографијата</a></li>
        <li><a href="ajax/content4-broken.php">Примена на криптографијата</a></li>
    </ul>
</div>
</body>
</html>