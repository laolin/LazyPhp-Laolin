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
  
  
  
  
  
  
  //
  function id18th(){
      $data['err_code']=0;
      /*
      中华人民共和国国家标准 GB 11643-1999
      
      第十八位数字的计算方法为：
      
      1.将前面的身份证号码17位数分别乘以不同的系数。
      从第一      位到第十七位的系数分别为：
      7 9 10 5 8 4 2 1 6 3 7 9 10 5 8 4 2  
      
      2.将这17位数字和系数相乘的结果相加。  
      
      3.用加出来和除以11，看余数是多少？ 
      
      4余数只可能有0 1 2 3 4 5 6 7 8 9 10这11个数字。
      其分别对应的最后一位身份证的号码为
      1 0 X 9 8 7 6 5 4 3 2。  
      
      5.通过上面得知如果余数是2，就会在身份证的第18位数字上出现罗马数字的Ⅹ。
      如果余数是10，身份证的最后一位号码就是2
      */
      $idn=v('i');
      $n18=$this->_id18th($idn);
      $data['18th']=$n18;
      $data['idn']=$idn;
      $data['id_all']=$idn.$n18;
      
      echoRestfulData($data);
  }
  // 计算身份证最后一位
  function _id18th($n){
    //$i = strlen($n);
    $c = substr($n,0,17);
    $ns = substr($c,0,1) * 7;
    $ns+= substr($c,1,1) * 9;
    $ns+= substr($c,2,1) * 10;
    $ns+= substr($c,3,1) * 5;
    $ns+= substr($c,4,1) * 8;
    $ns+= substr($c,5,1) * 4;
    $ns+= substr($c,6,1) * 2;
    $ns+= substr($c,7,1) * 1;
    $ns+= substr($c,8,1) * 6;
    $ns+= substr($c,9,1) * 3;
    $ns+= substr($c,10,1) * 7;
    $ns+= substr($c,11,1) * 9;
    $ns+= substr($c,12,1) * 10;
    $ns+= substr($c,13,1) * 5;
    $ns+= substr($c,14,1) * 8;
    $ns+= substr($c,15,1) * 4;
    $ns+= substr($c,16,1) * 2;
    $cn = 12 - $ns % 11;
    if ($cn==10) {
      return 'X';
    } elseif ($cn==12) {
      return '1';
    } elseif ($cn==11) {
      return '0';
    }
    return $cn;
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
  