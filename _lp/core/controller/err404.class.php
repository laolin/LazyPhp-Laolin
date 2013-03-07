<?php
if( !defined('IN') ) die('bad request');
include_once( CROOT . 'controller'.DS.'core.class.php' );

class err404Controller extends coreController
{
	function __construct()
	{
		parent::__construct();
	}
	
	function index404()
	{
		$data['title'] = $data['top_title'] = '404 ';
    
		$data['info'] ='没找到您所要的页面';
		render( $data,NULL,'_' );
	}
}
	