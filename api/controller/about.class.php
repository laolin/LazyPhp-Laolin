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
    $data=getAppDataDefault();
    $data['js'][]=('http://lib.sinaapp.com/js/underscore/1.3.3/underscore.min.js');
    $data['js'][]=('laolin.main.js');
    $data['title'] = '关于';
    $data['top_title'] = '关于'.v('b');
    
    $abt=new about_model();
    $data['info'] =$abt->get_item(v('b'),false);
    
    return render( $data );
  }

}
  