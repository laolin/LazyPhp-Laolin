<?php
if( !defined('IN') ) die('bad request');
include_once( AROOT . 'controller'.DS.'app.class.php' );

class apiController extends appController
{
  public $appName='api';
  public $appData;
  function __construct()
  {
    parent::__construct();
    $this->appData=array_merge(getAppDataDefault(),$this->_getAppData());
  }
  
  function _getAppData() {
    $aName=$this->appName;
    $data['sitelink'] = './';
    $data['sitename'] = '[Laolin-Api]';
    $data['toptitle'] = 'index';
    
    $data['appname']=$aName;
    $data['nav_items']=array();
    $data['nav_items']["?c=$aName&a=Act1"]='Act1Item';
    $data['nav_items']["?c=$aName&a=value"]='GetValue';
    return $data;
  }
  
  function unknowItem()
  { 
    $data['err_code']=2001;
    $data['err_msg']='Unknow action';
    ajax_echo( json_encode($data));
    /*
    echo g('c').',';
    echo g('a').',';
   echo  
   "<br/>REQUEST_URI=【".$_SERVER["REQUEST_URI"]."】".
   "<br/>QUERY_STRING=【".$_SERVER["QUERY_STRING"]."】".
   "<br/>SCRIPT_NAME=【".$_SERVER["SCRIPT_NAME"]."】".
   "<br/>REDIRECT_URL=【".$_SERVER["REDIRECT_URL"]."】".
   "<br/>REDIRECT_QUERY_STRING=【".$_SERVER["REDIRECT_QUERY_STRING"]."】".
   ''; // */
  
  }
  
  //c= & a= & i=
  //c:controller=home
  //a:action=index
  //i:item (第三个参数)
  function index()
  {
    //var_dump($_SERVER);
    return render( $this->appData );
  }
  
  //
  function value()
  {
    $key=v('i');
    $data = $this->_getValueItem($key,false);
    $js=v('js');
    $callback=($js==1)?v('callback'):'';//指定回调js函数，就返回一个JS语句，而不是REST数据
    echoRestfulData($data,$callback);
    
    /*
   echo  
   "<br/>REQUEST_URI=【".$_SERVER["REQUEST_URI"]."】".
   "<br/>QUERY_STRING=【".$_SERVER["QUERY_STRING"]."】".
   "<br/>SCRIPT_NAME=【".$_SERVER["SCRIPT_NAME"]."】".
   "<br/>REDIRECT_URL=【".$_SERVER["REDIRECT_URL"]."】".
   "<br/>REDIRECT_QUERY_STRING=【".$_SERVER["REDIRECT_QUERY_STRING"]."】".
   '';// */
  }
  function act1()
  {
    $this->appData['info'] = $this->_getAct1Item(v('i'),false);
    return render( $this->appData );
  }
  //=======================================================
  function _getValueItem($item) {
    $data['err_code']=0;
    
    switch($item) {
      case 'LaoLinOnlinePocketUrl':
        $data['value']=array(
          'http://app.laolin.com/online-app-index/',
          'http://api.laolin.com/online-app-index/',
          'http://api.laolin.com/online-app-index"/',
          'http://api.laolin.com/online-app-i.,<a>ndex\'/',
          'http://laolin.com/?page=online-app-index'
        );
        break;
      case 'laolin':
        $data['value']='YMSWYTJH';
        break;
      case 'test':
        $data['value']='Test done at '.date('Y-m-d H:i:s').'.';
        break;
      default:
        $data['err_code']=1001;
        $data['err_msg']='Unknow item';
    }   
    $data['key']=$item;

    return $data;
  }  
  //=======================================================
  function _getAct1Item($item,$disp=true) {
    $str='';
    switch($item) {
      case 'anyi':
        $str.= 'Anyi Anyilalala 安逸';
        break;
      case 'laolin':
      default:
        $str.= 'Laolin  LaolinCom 老林';
    }
    if($disp)echo $str;
    return $str;
  }


}
  