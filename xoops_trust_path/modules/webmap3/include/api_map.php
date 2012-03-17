<?php
// $Id: api_map.php,v 1.1 2012/03/17 09:28:10 ohwada Exp $

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
include_once XOOPS_TRUST_PATH.'/modules/webmap3/init.php';

webmap3_include_once( 'include/constants.php',          $MY_DIRNAME );
webmap3_include_once( 'class/lib/handler_basic.php',    $MY_DIRNAME );
webmap3_include_once( 'class/lib/handler_dirname.php',  $MY_DIRNAME );
webmap3_include_once( 'class/lib/utility.php',          $MY_DIRNAME );
webmap3_include_once( 'class/lib/multibyte.php',        $MY_DIRNAME );
webmap3_include_once( 'class/xoops/config_base.php',    $MY_DIRNAME );
webmap3_include_once( 'class/xoops/config_dirname.php', $MY_DIRNAME );
webmap3_include_once( 'class/xoops/config.php',         $MY_DIRNAME );
webmap3_include_once( 'class/xoops/header_base.php',    $MY_DIRNAME );
webmap3_include_once( 'class/xoops/header.php',         $MY_DIRNAME );
webmap3_include_once( 'class/d3/language_base.php',     $MY_DIRNAME );
webmap3_include_once( 'class/d3/language.php',          $MY_DIRNAME );
webmap3_include_once( 'class/handler/gicon.php',        $MY_DIRNAME );
webmap3_include_once( 'class/api/map.php',              $MY_DIRNAME );

?>