<?php
// $Id: demo.php,v 1.1 2012/03/17 09:28:52 ohwada Exp $

//=========================================================
// webmap3 module
// 2012-03-01 K.OHWADA
//=========================================================

require '../../mainfile.php' ;

include XOOPS_ROOT_PATH . '/header.php' ;
echo "<h3 align='center'>Google Maps V3</h3>\n";
echo "<a href='index.php'>[Webmap3 Top]</a>\n"; 
echo "<h4>Demonstration of Fucntion Call</h4>\n";

// === map start ===
$dirname = 'webmap3';
require XOOPS_ROOT_PATH . '/modules/'.$dirname.'/include/api_map.php';
$map_class =& webmap3_api_map::getSingleton( $dirname );
$map_class->init();
$map_class->set_map_size( 640, 480 );

// Yokohama Station
$map_class->set_map_center( 35.4661880, 139.6227150, 11 );

$map_class->add_marker( 35.5334203, 139.7078576, 'Kawasaki Station' );
$map_class->add_marker( 35.4661880, 139.6227150, 'Yokohama Station' );
$map_class->add_marker( 35.4005823, 139.5339342, 'Totsuka Station' );
echo $map_class->build_simple_map();
// === ,ap end ===

include( XOOPS_ROOT_PATH . '/footer.php' ) ;

?>