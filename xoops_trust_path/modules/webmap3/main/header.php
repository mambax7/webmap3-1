<?php
// $Id: header.php,v 1.1 2012/03/17 09:28:11 ohwada Exp $

//=========================================================
// webmap3 module
// 2009-02-11 K.OHWADA
//=========================================================

if( ! defined( 'XOOPS_TRUST_PATH' ) ) die( 'not permit' ) ;

//---------------------------------------------------------
// webmap3 files
//---------------------------------------------------------
webmap3_include_once( 'include/api_map.php' );
webmap3_include_once( 'class/xoops/param.php' );
webmap3_include_once( 'class/view/map.php' );

webmap3_include_language( 'modinfo.php' );
webmap3_include_language( 'main.php' );

webmap3_include_once_preload_trust();
webmap3_include_once_preload();

?>