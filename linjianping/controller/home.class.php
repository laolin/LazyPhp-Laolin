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
    $data=getAppDataDefault();
    $data['toptitle'] = '林建萍的网站首页';
    
    $rest_server=(isset($_SERVER['HTTPS'])?'https://':'http://').$_SERVER['SERVER_NAME'];
    $rest_path=c('laolin_about_api_url'); 
    //如果设置文件里不是以http开关，就在地址前加上“http://当前网站”
    $url=substr_compare('http',$rest_path,0,4,true)?$rest_server.$rest_path:$rest_path;

    
    $rest=file_get_contents($url."group=about-laolin");
    $res=json_decode($rest,true);
    
    if($res['err_code']!=0) {
      $data['about_laolin'][]=
          array('text'=>'Error: ['.$res['err_code'].'] '.$res['err_msg']);
    } else {
      $data['about_laolin']=$res['data']['items'];
      foreach ($data['about_laolin'] as $key => $row) {
        $data_id[$key]  = $row['id'];
      }
      array_multisort($data_id, SORT_ASC, $data['about_laolin']);
    }
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
  