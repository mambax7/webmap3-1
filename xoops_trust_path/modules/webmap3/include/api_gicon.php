<?php
// $Id: api_gicon.php,v 1.1 2012/03/17 09:28:10 ohwada Exp $

//=========================================================
// webmap3 module
// 2012-03-01 K.OHWADA
//=========================================================

if( ! defined( 'XOOPS_TRUST_PATH' ) ) die( 'not permit' ) ;

//---------------------------------------------------------
// webmap3 files
//---------------------------------------------------------
include_once XOOPS_TRUST_PATH.'/modules/webmap3/init.php';

webmap3_include_once( 'include/constants.php',         $MY_DIRNAME );
webmap3_include_once( 'class/lib/utility.php',         $MY_DIRNAME );
webmap3_include_once( 'class/lib/handler_basic.php',   $MY_DIRNAME );
webmap3_include_once( 'class/lib/handler_dirname.php', $MY_DIRNAME );
webmap3_include_once( 'class/xoops/header_base.php',   $MY_DIRNAME );
webmap3_include_once( 'class/xoops/header.php',        $MY_DIRNAME );
webmap3_include_once( 'class/handler/gicon.php',       $MY_DIRNAME );
webmap3_include_once( 'class/api/gicon.php',           $MY_DIRNAME );

?>