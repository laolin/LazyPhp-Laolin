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
    //'http://api.laolin.com/rest/api/laolin_about/list/';
  
    //使用lazyRest的API，直接读wordpress的指定page的全部子页面的数据
    //我的Wordpress的简历页面的ID为4132,这个页面内容没有用
    //所有的子页面对应简历的一个内容, 这些会由LazyREST api返回给本页面JSON数据
    //（LazyRest api系统在另外的APP里实现）
    //REST api输入参数post_parent=4132&post_status=publish
    //REST api输出字段post_content, post_title, menu_order
    $url='http://api.laolin.com/rest/api/wp4_posts/list/post_parent=4132&post_status=publish';
    
    $data=getAppDataDefault();
    $data['toptitle'] = '林建萍的网站首页';
    $data['css'][]='comm-box.css';
    
    $rest=file_get_contents($url);
    $res=json_decode($rest,true);
    
    if($res['err_code']!=0) {
      $data['about_laolin'][]=
          array('post_content'=>'Error: ['.$res['err_code'].'] '.$res['err_msg']);
    } else {
      $data['about_laolin']=$res['data']['items'];
       foreach ($data['about_laolin'] as $key => $row) {
        $menu_order[$key]  = +$row['menu_order'];
        $data['about_laolin'][$key]['post_content']=nl2br($row['post_content']);
      }
      array_multisort($menu_order, SORT_ASC, $data['about_laolin']);
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
  