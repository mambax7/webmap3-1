<?php
// $Id: georss.php,v 1.1 2012/03/17 09:28:13 ohwada Exp $

//=========================================================
// webmap3 module
// 2012-03-01 K.OHWADA
//=========================================================

if( ! defined( 'XOOPS_TRUST_PATH' ) ) die( 'not permit' ) ;

//=========================================================
// class webmap3_main_georss
//=========================================================
class webmap3_main_georss extends webmap3_view_map
{

//---------------------------------------------------------
// constructor
//---------------------------------------------------------
function webmap3_main_georss( $dirname )
{
	$this->webmap3_view_map( $dirname );
}

function &getInstance( $dirname )
{
	static $instance;
	if (!isset($instance)) {
		$instance = new webmap3_main_georss( $dirname );
	}
	return $instance;
}

//---------------------------------------------------------
// main
//---------------------------------------------------------
function main()
{
	$param = $this->build_main();
	$param['geo_url_s']   = $this->get_config_text('geo_url',   's');
	$param['geo_title_s'] = $this->get_config_text('geo_title', 's');

	$arr = $this->build_map();
	$param['map_js']     = $arr['map_js'];
	$param['map_div_id'] = $this->_map_div_id;

	return $param;
}

function build_map( $flag_header=true )
{
	$arr = $this->init_map();

	$param = $this->_map_class->build_geoxml( $this->get_config_text('geo_url'), true );
	         $this->_map_class->fetch_geoxml_head( $param );
	$js    = $this->_map_class->fetch_body_common( $param );

	$arr = array(
		'map_js' => $js
	);

	return $arr;
}

// --- class end ---
}

?>