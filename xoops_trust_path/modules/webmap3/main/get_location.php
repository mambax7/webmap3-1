<?php
// $Id: get_location.php,v 1.1 2012/03/17 09:28:11 ohwada Exp $

//=========================================================
// webmap3 module
// 2012-03-01 K.OHWADA
//=========================================================

if( ! defined( 'XOOPS_TRUST_PATH' ) ) die( 'not permit' ) ;

//---------------------------------------------------------
// xoops system files
//---------------------------------------------------------
include_once XOOPS_ROOT_PATH.'/class/template.php';

//---------------------------------------------------------
// webphoto files
//---------------------------------------------------------
webmap3_include_once( 'include/api_html.php' );
webmap3_include_once( 'main/header.php' );
webmap3_include_once( 'class/lib/post.php' );
webmap3_include_once( 'class/main/get_location.php' );

//=========================================================
// main
//=========================================================
$manage =& webmap3_main_get_location::getInstance( WEBMAP3_DIRNAME );
$manage->main();
exit();

?>