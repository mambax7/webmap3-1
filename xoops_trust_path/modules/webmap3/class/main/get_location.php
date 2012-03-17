<?php
// $Id: get_location.php,v 1.1 2012/03/17 09:28:13 ohwada Exp $

//=========================================================
// webmap3 module
// 2012-03-01 K.OHWADA
//=========================================================

if( ! defined( 'XOOPS_TRUST_PATH' ) ) die( 'not permit' ) ;

//---------------------------------------------------------
// myself:     default
// new window: mode=opener
// inline:     mode=parent
//---------------------------------------------------------

//=========================================================
// class webmap3_main_get_location
//=========================================================
class webmap3_main_get_location
{
	var $_xoops_param ;
	var $_map_class;
	var $_language_class;
	var $_header_class;

	var $_DIRNAME;

	var $_multibyte_class;
	var $_html_class;

	var $_map_div_id = '' ;
	var $_map_func   = '' ;

	var $_OPENER_MODE_DEFAULT = 'parent';

	var $_ELE_ID_LIST   = "";
	var $_ELE_ID_SEARCH = "";
	var $_ELE_ID_CURRENT_LOCATION = "";
	var $_ELE_ID_CURRENT_ADDRESS  = "";

// config field
	var $_ELE_ID_PARENT_LATITUDE  = "webmap3_latitude";
	var $_ELE_ID_PARENT_LONGITUDE = "webmap3_longitude";
	var $_ELE_ID_PARENT_ZOOM      = "webmap3_zoom";
	var $_ELE_ID_PARENT_ADDRESS   = "webmap3_address";

//---------------------------------------------------------
// constructor
//---------------------------------------------------------
function webmap3_main_get_location( $dirname )
{
	$this->_xoops_param    =& webmap3_xoops_param::getInstance();
	$this->_map_class      =& webmap3_api_map::getSingleton( $dirname );
	$this->_language_class =& webmap3_d3_language::getSingleton(  $dirname );
	$this->_header_class   =& webmap3_xoops_header::getSingleton( $dirname );

	$this->_post_class  =& webmap3_lib_post::getInstance();
	$this->_html_class  =& webmap3_api_html::getSingleton( $dirname );

	$this->_ELE_ID_LIST             = $dirname."_map_list";
	$this->_ELE_ID_SEARCH           = $dirname."_map_search";
	$this->_ELE_ID_CURRENT_LOCATION = $dirname."_map_current_location";
	$this->_ELE_ID_CURRENT_ADDRESS  = $dirname."_map_current_address";

	$this->_map_div_id = $dirname.'_map_get_location' ;
	$this->_map_func   = $dirname.'_load_map_get_location' ;

}

function &getInstance( $dirname )
{
	static $instance;
	if (!isset($instance)) {
		$instance = new webmap3_main_get_location( $dirname );
	}
	return $instance;
}

//---------------------------------------------------------
// main
//---------------------------------------------------------
function main()
{
	$this->_opener_mode = $this->_post_class->get_get( 'mode', $this->_OPENER_MODE_DEFAULT );

	$param = $this->build_param();

	$this->_html_class->http_output();
	$this->_html_class->header_content_type();
	echo $this->_html_class->fetch_get_location( $param );
}

function build_param()
{
	$latitude  = $this->get_config('latitude') ;
	$longitude = $this->get_config('longitude') ;
	$zoom      = $this->get_config('zoom') ;
	$addr      = $this->get_config('address') ;

	$param = $this->build_map( $latitude, $longitude, $zoom );
	$head_js = $param['head_js'];

	$this->_html_class->set_head_js( $head_js );
	$this->_html_class->set_map_div_id( $this->_map_div_id );
	$this->_html_class->set_map_func(   $this->_map_func ) ;
	$this->_html_class->set_address( $addr );
	$this->_html_class->set_show_set_address(     true );
	$this->_html_class->set_show_current_address( true );
	$this->_html_class->set_map_ele_id_list(             $this->_ELE_ID_LIST );
	$this->_html_class->set_map_ele_id_search(           $this->_ELE_ID_SEARCH );
	$this->_html_class->set_map_ele_id_current_location( $this->_ELE_ID_CURRENT_LOCATION );
	$this->_html_class->set_map_ele_id_current_address(  $this->_ELE_ID_CURRENT_ADDRESS );

	if ( $this->_opener_mode == 'opener' ) {
		$this->_html_class->set_show_close( true );
	}

	return $this->_html_class->build_param_get_location();
}

function build_map( $lat, $lng, $zoom )
{
	$this->_map_class->init();

	$this->_map_class->set_map_div_id( $this->_map_div_id ) ;
	$this->_map_class->set_map_func(   $this->_map_func ) ;

	$this->_map_class->set_map_type_control(            $this->get_config('map_type_control') );	
	$this->_map_class->set_zoom_control(                $this->get_config('zoom_control') );	
	$this->_map_class->set_pan_control(                 $this->get_config('pan_control') );
	$this->_map_class->set_street_view_control(         $this->get_config('street_view_control') );
	$this->_map_class->set_scale_control(               $this->get_config('scale_control') );
	$this->_map_class->set_overview_map_control(        $this->get_config('overview_map_control') );
	$this->_map_class->set_overview_map_control_opened( $this->get_config('overview_map_opened') );
	$this->_map_class->set_map_type_control_style(      $this->get_config('map_type_control_style') );
	$this->_map_class->set_zoom_control_style(          $this->get_config('zoom_control_style') );
	$this->_map_class->set_map_type(                    $this->get_config('map_type') );

	$this->_map_class->set_latitude(  $lat );
	$this->_map_class->set_longitude( $lng );
	$this->_map_class->set_zoom(      $zoom );
	$this->_map_class->set_opener_mode( $this->_opener_mode );

	$this->_map_class->set_ele_id_list(             $this->_ELE_ID_LIST );
	$this->_map_class->set_ele_id_search(           $this->_ELE_ID_SEARCH );
	$this->_map_class->set_ele_id_current_location( $this->_ELE_ID_CURRENT_LOCATION );
	$this->_map_class->set_ele_id_current_address(  $this->_ELE_ID_CURRENT_ADDRESS );
	$this->_map_class->set_ele_id_parent_latitude(  $this->_ELE_ID_PARENT_LATITUDE );
	$this->_map_class->set_ele_id_parent_longitude( $this->_ELE_ID_PARENT_LONGITUDE );
	$this->_map_class->set_ele_id_parent_zoom(      $this->_ELE_ID_PARENT_ZOOM );
	$this->_map_class->set_ele_id_parent_address(   $this->_ELE_ID_PARENT_ADDRESS );

	$this->_map_class->set_use_draggable_marker( true );
	$this->_map_class->set_use_search_marker(    true );
	$this->_map_class->set_use_current_location( true );
	$this->_map_class->set_use_current_address(  true );

	$param   = $this->_map_class->build_get_location();
	$head_js = $this->_map_class->fetch_get_location_head( $param, false );

	$arr = array(
		'head_js' => $head_js ,
	);

	return $arr;
}

//---------------------------------------------------------
// config
//---------------------------------------------------------
function get_config( $name )
{
	return $this->_xoops_param->get_module_config_by_name( $name );
}

function get_config_text( $name )
{
	return $this->_xoops_param->get_module_config_text_by_name( $name );
}

// --- class end ---
}

?>