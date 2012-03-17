<?php
// $Id: location.php,v 1.1 2012/03/17 09:28:13 ohwada Exp $

//=========================================================
// webmap3 module
// 2012-03-01 K.OHWADA
//=========================================================

if( ! defined( 'XOOPS_TRUST_PATH' ) ) die( 'not permit' ) ;

//=========================================================
// class webmap3_main_location
//=========================================================
class webmap3_main_location extends webmap3_view_map
{

//---------------------------------------------------------
// constructor
//---------------------------------------------------------
function webmap3_main_location( $dirname )
{
	$this->webmap3_view_map( $dirname );
}

function &getInstance( $dirname )
{
	static $instance;
	if (!isset($instance)) {
		$instance = new webmap3_main_location( $dirname );
	}
	return $instance;
}

//---------------------------------------------------------
// main
//---------------------------------------------------------
function main()
{
	$param = $this->build_main();
	$param['address_s'] = $this->get_config_text('address', 's') ;
	$param['latitude']  = $this->get_config('latitude');
	$param['longitude'] = $this->get_config('longitude');
	$param['zoom']      = $this->get_config('zoom');

	$arr = $this->build_map();
	$param['map_js']     = $arr['map_js'];
	$param['map_div_id'] = $this->_map_div_id;

	return $param;
}

function build_map()
{
	$marker = array(
		'latitude'  => $this->get_config('latitude') ,
		'longitude' => $this->get_config('longitude') ,
		'info'      => $this->get_config_text('loc_marker_info', 'textarea') ,
		'icon_id'   => $this->get_config('marker_gicon') ,
	);

	$markers = array( $marker ) ;

	$this->init_map();
	$this->_map_class->assign_gicon_array_to_head();

//	$icons = $this->_map_class->get_icons();
//	$param = $this->_map_class->build_markers( $markers, $icons );

	$param = $this->_map_class->build_markers( $markers );
             $this->_map_class->fetch_markers_head( $param );
	$js    = $this->_map_class->fetch_body_common(  $param );

	$arr = array(
		'map_js' => $js
	);

	return $arr;
}

// --- class end ---
}

?>