<?php
// $Id: location.php,v 1.1 2012/03/17 09:28:11 ohwada Exp $

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
// webmap3 files
//---------------------------------------------------------
webmap3_include_once( 'include/api_html.php' );
webmap3_include_once( 'include/api_gicon.php' );
webmap3_include_once( 'admin/header.php' );
webmap3_include_once( 'class/lib/form.php' );
webmap3_include_once( 'class/lib/gtickets.php' );
webmap3_include_once( 'class/xoops/config_item.php' );
webmap3_include_once( 'class/admin/location.php' );

//=========================================================
// main
//=========================================================
$manager =& webmap3_admin_location::getInstance( WEBMAP3_DIRNAME, WEBMAP3_TRUST_DIRNAME );
$manager->main();
exit();

?>