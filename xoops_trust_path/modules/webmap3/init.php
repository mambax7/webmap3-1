<?php
// $Id: init.php,v 1.1 2012/03/17 09:28:10 ohwada Exp $

//=========================================================
// webmap3 module
// 2009-02-11 K.OHWADA
//=========================================================

//---------------------------------------------------------
// $MY_DIRNAME is set by caller
//---------------------------------------------------------

if ( ! defined( 'XOOPS_TRUST_PATH' ) ) die( 'not permit' ) ;

if ( !isset($MY_TRUST_DIRNAME) ) {
	$MY_TRUST_DIRNAME = basename( dirname( __FILE__ ) ) ;
}
if ( !defined("WEBMAP3_TRUST_DIRNAME") ) {
	define("WEBMAP3_TRUST_DIRNAME", $MY_TRUST_DIRNAME );
}
if ( !defined("WEBMAP3_TRUST_PATH") ) {
	define("WEBMAP3_TRUST_PATH", XOOPS_TRUST_PATH.'/modules/'.WEBMAP3_TRUST_DIRNAME );
}

include_once WEBMAP3_TRUST_PATH.'/class/d3/optional.php';
include_once WEBMAP3_TRUST_PATH.'/class/d3/preload.php';
include_once WEBMAP3_TRUST_PATH.'/include/optional.php';

?>