<?php
if( !defined('IN') ) die('bad request');
include_once( AROOT . 'controller'.DS.'app.class.php' );

class aboutController extends appController
{
  function __construct()
  {
    parent::__construct();
  }
  
  function index()
  {
    $data['title'] = '关于';
    $data['top_title'] = '首页标题';
    uses('about.function.php');
    $data['info'] = c_about_item(v('b'),false);
    return render( $data );
  }

}
  