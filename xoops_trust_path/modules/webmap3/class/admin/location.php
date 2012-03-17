<?php
// $Id: location.php,v 1.1 2012/03/17 09:28:12 ohwada Exp $

//=========================================================
// webmap3 module
// 2012-03-01 K.OHWADA
//=========================================================

//=========================================================
// class webmap3_admin_location
//=========================================================
class webmap3_admin_location extends webmap3_admin_base
{
	var $_config_item_class;
	var $_gicon_class;
	var $_html_class;
	var $_header_class;

	var $_THIS_FCT = 'location';
	var $_THIS_URL = null;

//---------------------------------------------------------
// constructor
//---------------------------------------------------------
function webmap3_admin_location( $dirname, $trust_dirname )
{
	$this->webmap3_admin_base( $dirname, $trust_dirname );

	$this->_config_item_class =& webmap3_xoops_config_item::getInstance( $dirname );
	$this->_gicon_class  =& webmap3_api_gicon::getSingleton( $dirname );
	$this->_html_class   =& webmap3_api_html::getSingleton( $dirname );
	$this->_header_class =& webmap3_xoops_header::getSingleton( $dirname );

	$this->_THIS_URL = $this->build_this_url( $this->_THIS_FCT ) ;
}

function &getInstance( $dirname, $trust_dirname )
{
	static $instance;
	if (!isset($instance)) {
		$instance = new webmap3_admin_location( $dirname, $trust_dirname );
	}
	return $instance;
}

//---------------------------------------------------------
// function
//---------------------------------------------------------
function main()
{
	$op = isset($_POST['op']) ? $_POST['op'] : null ;

	if ( $op == 'edit' ) {
		if ( $this->check_token() ) {
			$this->save();
			redirect_header( $this->_THIS_URL, 1, _EDIT );
		}
	}

	xoops_cp_header();

	echo $this->build_admin_menu();
	echo $this->build_admin_title( 'location' );

	if ( $this->_token_error_flag ) {
		xoops_error('Ticket Error');
	}

	echo $this->build_content();

	xoops_cp_footer();
	exit();
}

function save()
{
	$this->_config_item_class->get_objects();
	if ( isset($_POST['webmap3_address']) ) {
		$this->_config_item_class->save( 'address', $_POST['webmap3_address'] );
	}
	if ( isset($_POST['webmap3_latitude']) ) {
		$this->_config_item_class->save( 'latitude', floatval($_POST['webmap3_latitude']) );
	}
	if ( isset($_POST['webmap3_longitude']) ) {
		$this->_config_item_class->save( 'longitude', floatval($_POST['webmap3_longitude']) );
	}
	if ( isset($_POST['webmap3_zoom']) ) {
		$this->_config_item_class->save( 'zoom', intval($_POST['webmap3_zoom']) );
	}
	if ( isset($_POST['webmap3_gicon_id']) ) {
		$this->_config_item_class->save( 'marker_gicon', intval($_POST['webmap3_gicon_id']) );
	}
}

function build_content()
{
	$template = 'db:'. $this->_DIRNAME .'_admin_location.html' ;
	$param   = $this->build_param();

	$tpl = new XoopsTpl();
	$tpl->assign( $param );
	return $tpl->fetch( $template );
}

function build_param( $flag_header=false )
{
	list( $show_default_css, $default_css ) = 
		$this->_header_class->assign_or_get_default_css( $flag_header ) ;

	list( $show_gicon_js, $gicon_js ) = 
		$this->_gicon_class->assign_gicon_js_to_head( $flag_header );

	$arr = array(
		'xoops_dirname'    => $this->_DIRNAME ,
		'show_default_css' => $show_default_css ,
		'default_css'      => $default_css ,
		'show_gicon_js'    => $show_gicon_js ,
		'gicon_js'         => $gicon_js ,
		'gicons_js'        => $this->_gicon_class->get_gicons_js() ,
		'display_js'       => $this->_html_class->build_display_js() ,
		'map_display'      => $this->build_display() ,
		'form_location'    => $this->build_form_location(),
	);

	return $arr;
}

function build_form_location()
{
	$template = 'db:'. $this->_DIRNAME .'_inc_set_location_form.html' ;
	$param = $this->build_param_form();

	$tpl = new XoopsTpl();
	$tpl->assign( $param );
	return $tpl->fetch( $template );
}

function build_param_form()
{
	$arr = array(
		'ticket'          => $this->get_token() ,
		'address'         => $this->get_config('address') ,
		'latitude'        => $this->get_config('latitude') ,
		'longitude'       => $this->get_config('longitude') ,
		'zoom'            => $this->get_config('zoom') ,
		'icon_content'    => $this->build_icon_content() ,
		'lang_address'    => $this->get_lang('ADDRESS') ,
		'lang_latitude'   => $this->get_lang('LATITUDE') ,
		'lang_longitude'  => $this->get_lang('LONGITUDE') ,
		'lang_zoom'       => $this->get_lang('ZOOM') ,
		'lang_title'      => _AM_WEBMAP3_LOCATION ,
		'lang_icon'       => _AM_WEBMAP3_ICON ,
		'lang_edit'       => _EDIT ,
	);

	return $arr;
}

function build_display()
{
	$this->_html_class->set_display_div_style_display( true );

	$text  = $this->_html_class->build_display_anchor();
	$text .= $this->_html_class->build_display_logo();
	$text .= " &nbsp; ";
	$text .= $this->_html_class->build_display_desc();
	$text .= "<br />\n";
	$text .= $this->_html_class->build_display_new();
	$text .= "<br />\n";
	$text .= $this->_html_class->build_display_popup();
	$text .= "<br />\n";
	$text .= $this->_html_class->build_display_inline();
	$text .= " &nbsp; ";
	$text .= $this->_html_class->build_display_hide();
	$text .= "<br />\n";
	$text .= $this->_html_class->build_display_div_begin();
	$text .= $this->_html_class->build_display_iframe();
	$text .= $this->_html_class->build_display_div_end();

	return $text;
}

function build_icon_content()
{
	$id      = $this->get_config('marker_gicon');
	$options = $this->_gicon_class->get_sel_options( true );
	$img_src = $this->_gicon_class->get_image_url( $id ) ;

	$this->_html_class->set_gicon_id( $id );
	$this->_html_class->set_gicon_options( $options );
	$this->_html_class->set_gicon_img_src( $img_src );
	$this->_html_class->set_gicon_select_name( 'webmap3_gicon_id' );
	$this->_html_class->set_gicon_select_id(   'webmap3_gicon_id' );
	$this->_html_class->set_gicon_img_id(      'webmap3_gicon_img' );

	$text  = $this->_html_class->build_gicon_icon();
	$text .= "<br />\n";
	$text .= $this->_html_class->build_gicon_select();
	$text .= "<br />\n";
	$text .= $this->_html_class->build_gicon_img();

	return $text;
}

// --- class end ---
}

?>