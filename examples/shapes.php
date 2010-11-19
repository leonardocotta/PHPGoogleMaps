<?php

require( '../PHPGoogleMaps/PHPGoogleMaps.php' );
require( '_system/config.php' );

$map = new \GoogleMaps\Map;

$circle_options = array(
	'fillColor'	=> '#00ff00',
	'strokeWeight'	=> 1,
	'fillOpacity'	=> 0.05,
	'clickable'	=> false
);
$circle = \GoogleMaps\Overlay\Circle::createFromLocation( 'San Diego, CA', 1000, $circle_options );

$rectangle_options = array(
	'fillColor'	=> '#ff0000',
	'strokeWeight'	=> 3,
	'fillOpacity'	=> 0.05,
);
$rectangle = new \GoogleMaps\Overlay\Rectangle(
	\GoogleMaps\Service\Geocoder::getLatLng( 'San Diego, CA' ),
	\GoogleMaps\Service\Geocoder::getLatLng( 'Balboa Park San Diego, CA' ),
	$rectangle_options
);

$map->addObjects( array( $circle, $rectangle ) );
$map->setCenterByLocation( 'San Diego, CA' );
$map->setZoom( 14 );

?>

<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>Shapes - <?php echo PAGE_TITLE ?></title>
	<link rel="stylesheet" type="text/css" href="_css/style.css">
	<?php $map->printHeaderJS() ?>
	<?php $map->printMapJS() ?>
</head>
<body>

<h1>Shapes</h1>
<?php require( '_system/nav.php' ) ?>

<p>Simple map example</p>

<?php $map->printMap() ?>

</body>

</html>


