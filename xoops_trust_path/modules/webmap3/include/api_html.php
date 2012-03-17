<?php
// $Id: api_html.php,v 1.1 2012/03/17 09:28:10 ohwada Exp $

//=========================================================
// webmap3 module
// 2009-02-11 K.OHWADA
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

webmap3_include_once( 'include/constants.php',       $MY_DIRNAME );
webmap3_include_once( 'class/lib/multibyte.php',     $MY_DIRNAME );
webmap3_include_once( 'class/lib/form.php',          $MY_DIRNAME );
webmap3_include_once( 'class/d3/language_base.php',  $MY_DIRNAME );
webmap3_include_once( 'class/d3/language.php',       $MY_DIRNAME );
webmap3_include_once( 'class/xoops/header_base.php', $MY_DIRNAME );
webmap3_include_once( 'class/xoops/header.php',      $MY_DIRNAME );
webmap3_include_once( 'class/api/html.php',          $MY_DIRNAME );
webmap3_include_language( 'main.php',                $MY_DIRNAME );

?>