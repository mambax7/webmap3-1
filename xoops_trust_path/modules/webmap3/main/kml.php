<?php
// $Id: kml.php,v 1.1 2012/03/17 09:28:11 ohwada Exp $

//=========================================================
// webmap3 module
// 2009-02-11 K.OHWADA
//=========================================================

if( ! defined( 'XOOPS_TRUST_PATH' ) ) die( 'not permit' ) ;

//---------------------------------------------------------
// webmap3 files
//---------------------------------------------------------
webmap3_include_once( 'main/header.php' );
webmap3_include_once( 'include/api_kml.php' );
webmap3_include_once( 'class/view/kml.php' );
webmap3_include_once( 'class/main/kml.php' );

//=========================================================
// main
//=========================================================
$builder =& webmap3_main_kml::getInstance( WEBMAP3_DIRNAME );
$builder->main();

exit();

?>