<?php
if( !defined('IN') ) die('bad request');
include_once( AROOT . 'controller'.DS.'app.class.php' );

class homeController extends appController
{
  function __construct()
  {
    parent::__construct();
  }
  
  function index()
  {
    $data['title'] = '首页';
    $data['top_title'] = '首页标题';
    $data['info'] = $this->_get_item(v('b'),false);
    return render( $data );
  }

  function _get_item($item,$disp=true) {
    $str='';
    switch($item) {
      case 'site':
        $str.= 'index site关于本站';
        break;
      case 'hhxx':
        $str.= 'index hhxx 关于 ';
        break;
      case 'anyi':
        $str.= 'index anyi关于';
        break;
      case 'laolin':
      default:
        $str.= 'index laolin 关于老林';
    }
    if($disp)echo $str;
    return $str;
  }

}
  