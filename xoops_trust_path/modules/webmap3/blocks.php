<?php
// $Id: blocks.php,v 1.1 2012/03/17 09:28:10 ohwada Exp $

//=========================================================
// webmap3 module
// 2012-03-01 K.OHWADA
//=========================================================

//---------------------------------------------------------
// $MY_DIRNAME WEBPHOTO_TRUST_PATH are set by caller
//---------------------------------------------------------

if ( ! defined( 'WEBMAP3_TRUST_PATH' ) ) die( 'not permit' ) ;

//---------------------------------------------------------
// xoops system files
//---------------------------------------------------------
include_once XOOPS_ROOT_PATH.'/class/template.php' ;

//---------------------------------------------------------
// webmap3 files
//---------------------------------------------------------
include_once WEBMAP3_TRUST_PATH.'/class/d3/optional.php';
include_once WEBMAP3_TRUST_PATH.'/include/optional.php';

webmap3_include_once( 'include/api_map.php',            $MY_DIRNAME );
webmap3_include_once( 'class/inc/config.php',           $MY_DIRNAME );
webmap3_include_once( 'class/inc/blocks.php',           $MY_DIRNAME );
webmap3_include_once( 'blocks/functions.php',           $MY_DIRNAME );

webmap3_include_language( 'main.php',   $MY_DIRNAME );
webmap3_include_language( 'blocks.php', $MY_DIRNAME );

webmap3_include_once_preload_trust();

?>