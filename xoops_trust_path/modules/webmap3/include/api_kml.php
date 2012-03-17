<?php
// $Id: api_kml.php,v 1.1 2012/03/17 09:28:10 ohwada Exp $

//=========================================================
// webmap3 module
// 2009-02-11 K.OHWADA
//=========================================================

if( ! defined( 'XOOPS_TRUST_PATH' ) ) die( 'not permit' ) ;

//---------------------------------------------------------
// webmap3 files
//---------------------------------------------------------
include_once XOOPS_TRUST_PATH.'/modules/webmap3/init.php';

webmap3_include_once( 'include/constants.php',    $MY_DIRNAME );
webmap3_include_once( 'class/lib/xml.php',        $MY_DIRNAME );
webmap3_include_once( 'class/lib/multibyte.php',  $MY_DIRNAME );
webmap3_include_once( 'class/lib/xml_build.php',  $MY_DIRNAME );
webmap3_include_once( 'class/lib/kml_build.php',  $MY_DIRNAME );
webmap3_include_once( 'class/api/kml.php',        $MY_DIRNAME );

?>