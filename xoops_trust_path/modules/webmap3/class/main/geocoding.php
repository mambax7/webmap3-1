<?php
// $Id: geocoding.php,v 1.1 2012/04/09 11:55:33 ohwada Exp $

//=========================================================
// webmap3 module
// 2012-04-02 K.OHWADA
//=========================================================

if( ! defined( 'XOOPS_TRUST_PATH' ) ) die( 'not permit' ) ;

//=========================================================
// class webmap3_main_geocoding
//=========================================================
class webmap3_main_geocoding extends webmap3_view_base
{
	var $_api_class;

//---------------------------------------------------------
// constructor
//---------------------------------------------------------
function webmap3_main_geocoding( $dirname )
{
	$this->webmap3_view_base( $dirname );
	$this->_api_class =& webmap3_api_geocoding::getSingleton( $dirname );
}

function &getInstance( $dirname )
{
	static $instance;
	if (!isset($instance)) {
		$instance = new webmap3_main_geocoding( $dirname );
	}
	return $instance;
}

//---------------------------------------------------------
// main
//---------------------------------------------------------
function main()
{
	$arr1 = $this->build_base();

	if ( isset($_GET['address']) ) {
		$arr2 = $this->fetch( $_GET['address'] );
		$arr  = $arr1 + $arr2;

	} else {
		$arr = $arr1;
	}

	return $arr;
}

function fetch( $address )
{
	$this->_api_class->set_search_address( $address );
	$ret = $this->_api_class->fetch();
	if ( !$ret ) {
		$arr = array(
			'address' => $address,
			'error'   => $this->_api_class->get_error(),
		);
		return $arr;
	}

	$results = $this->_api_class->get_results();
	if ( !is_array($results) || !count($results) ) {
		$arr = array(
			'address' => $address,
			'error'   => 'No results',
		);
		return $arr;
	}

	$arr = array(
		'address'   => $address,
		'results'   => $results,
		'latitude'  => $results[0]['lat'],
		'longitude' => $results[0]['lng'],
	);
	return $arr;
}

// --- class end ---
}

?>