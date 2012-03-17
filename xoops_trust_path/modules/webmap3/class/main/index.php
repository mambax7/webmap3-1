<?php
// $Id: index.php,v 1.1 2012/03/17 09:28:13 ohwada Exp $

//=========================================================
// webmap3 module
// 2012-03-01 K.OHWADA
//=========================================================

if( ! defined( 'XOOPS_TRUST_PATH' ) ) die( 'not permit' ) ;

//=========================================================
// class webmap3_main_index
//=========================================================
class webmap3_main_index extends webmap3_view_map
{
	var $_ZOOM_GEOCODE_DEFAULT = 13;

	var $_ELE_ID_LIST   = "";
	var $_ELE_ID_SEARCH = "";

//---------------------------------------------------------
// constructor
//---------------------------------------------------------
function webmap3_main_index( $dirname )
{
	$this->webmap3_view_map( $dirname );

	$this->_ELE_ID_LIST   = $dirname."webmap3_map_list";
	$this->_ELE_ID_SEARCH = $dirname."webmap3_map_search";
}

function &getInstance( $dirname )
{
	static $instance;
	if (!isset($instance)) {
		$instance = new webmap3_main_index( $dirname );
	}
	return $instance;
}

//---------------------------------------------------------
// main
//---------------------------------------------------------
function main()
{
	$id = 0;

	$addr = $this->get_config('address');
	$lat  = $this->get_config('latitude');
	$lng  = $this->get_config('longitude');
	$zoom = $this->get_config('zoom');

	if ( isset($_GET['lat']) && isset($_GET['lng']) ) {
		$addr = '';
		$lat  = $_GET['lat'];
		$lng  = $_GET['lng'];
		$zoom = $this->_ZOOM_GEOCODE_DEFAULT;
		if ( isset($_GET['zoom']) ) {
			$zoom = $_GET['zoom'];
		}
	}

	$param = $this->build_main();
	$param['address_s']     = $this->sanitize( $addr ) ;
	$param['ele_id_list']   = $this->_ELE_ID_LIST;
	$param['ele_id_search'] = $this->_ELE_ID_SEARCH;

	$arr = $this->build_map( $lat, $lng, $zoom );
	$param['map_js']       = $arr['map_js'];
	$param['map_div_id']   = $this->_map_div_id ;

	return $param;
}

function build_map( $lat, $lng, $zoom, $flag_header=true )
{
	$this->init_map();
	$this->_map_class->set_latitude(  $lat );
	$this->_map_class->set_longitude( $lng );
	$this->_map_class->set_zoom(      $zoom );
	$this->_map_class->set_use_search_marker( $this->get_config('use_search_marker') );
	$this->_map_class->set_ele_id_list( $this->_ELE_ID_LIST );

	$param = $this->_map_class->build_search();
	         $this->_map_class->fetch_search_head( $param );
	$js    = $this->_map_class->fetch_body_common( $param );

	$arr = array(
		'map_js' => $js
	);

	return $arr;
}

// --- class end ---
}

?>