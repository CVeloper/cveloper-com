<?php
	$ahora = new DateTime();
	// $hoy = $ahora->format("d/m/Y");
	$entrega = new DateTime("2019-05-24");
	// $final = $entrega->format("d/m/Y");
	$diferencia = $ahora->diff($entrega);
	$dias = $diferencia->format("%a");

	$name = "CVeloper";
	$time = "$dias days to go";
	$soon = "Stay tuned!";
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Proyecto de DAW</title>
	<link rel="icon" href="images/favicon.jpg">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
	<link rel="stylesheet" href="styles/styles.css">
</head>
<body>
	<section>
		<div>
			<h3><?= $time; ?></h3>
			<a href="https://xd.adobe.com/view/52aabd6c-36f6-481a-7ad7-8ce0cfdb4d28-249b/?hints=off"><h1>{<?= $name; ?>}</h1></a>
			<h2><?= $soon; ?></h2>
		</div>
	</section>
    <nav>
        <ul>
            <li><a href="https://github.com/CVeloper" target="_blank"><i class="fab fa-github"></i></a></li>
            <li><a href="https://linkedin.com/in/CVeloper" target="_blank"><i class="fab fa-linkedin"></i></a></li>
            <li><a href="https://twitter.com/CVeloperApp" target="_blank"><i class="fab fa-twitter"></i></a></li>
            <li><a href="https://facebook.com/CVeloper" target="_blank"><i class="fab fa-facebook"></i></a></li>
            <li><a href="https://instagram.com/CVeloperApp" target="_blank"><i class="fab fa-instagram"></i></a></li>
            <li><a href="https://pinterest.com/CVeloper" target="_blank"><i class="fab fa-pinterest"></i></a></li>
        </ul>
    </nav>
</body>
</html>
