<?php
if( !defined('IN') ) die('bad request');
include_once( AROOT . 'controller'.DS.'app.class.php' );

class pyController extends appController
{
  function __construct()
  {
    parent::__construct();
  }
  
  function index()
  {
    $data['js'][]=('http://lib.sinaapp.com/js/underscore/1.3.3/underscore.min.js');
    $data['js'][]=('laolin.main.js');
    $data['title'] = '拼音/汉字互查<small>请输入一个汉字，或一个完整的拼音(不含音调)</small>';
    $data['ques']=isset($_REQUEST['py'])?v('py'):
        isset($_REQUEST['hz'])?v('hz'):
        isset($_REQUEST['q'])?v('q'):'';
    $data['top_title'] = '查拼音'.$data['ques'];
    if($data['ques'])$data['info']=$this->req_py();
    return render( $data );
  }
  function ajax_py() {
      return ajax_echo($this->req_py());
  }
  function req_py() {
  
    $rest_server=(isset($_SERVER['HTTPS'])?'https://':'http://').$_SERVER['SERVER_NAME'];
    $rest_path=c('py_rest_uri'); 
    //如果设置文件里不是以http开关，就在地址前加上“http://当前网站”
    $url=substr_compare('http',$rest_path,0,4,true)?$rest_server.$rest_path:$rest_path;
    
    $kickchars=array( '+',  '%', '#', '=', '&', '?', '/', '\\', '<', '>', ';', ',', '.');
    $ques=str_replace($kickchars,'',t(v('q')));//删掉非法字符

    //简单检查收到的是汉字，还是拼音
    $n=mb_strlen($ques,'UTF-8');
    $key='py';
    if($n<=0) {
      return  '请输入拼音或汉字';
    } else if ($n==1) {
      if(eregi('[^\x00-\x7F]', $ques)) $key='hz'; //'有汉字'1个汉字，OK;
      else $key='py';//长=1拼音，OK
    } else if ($n>7) {
      return '【查询串太长】请输入1个汉字 或 1个字的拼音';
    } else if (eregi('[^\x00-\x7F]', $ques)) {
      return '【只能查一个汉字】请输入1个汉字 或 1个字的拼音';
    }
    
    if($key=='py') {
      $anskey='hz';
    } else {
      $anskey='pyd';
    }

    $rest=file_get_contents($url."$key=$ques");
    $res=json_decode($rest,true);
    if($res['err_code']!=0)return '['.$res['err_code'].'] '.$res['err_msg'];
    return $res['data'];
  }
}

function no_use_no_use_(){
  //用在lazyREST LIST接口 IO过滤设置中的输入过滤代码

  $q_py=t(v('py'));
  $q_hz=t(v('hz'));

  if(strlen($q_py)==0&&strlen($q_hz)==0) { //py hz两参数都不指定时，就试着采用q参数
    $kickchars=array();// '+',  '%', '#', '=', '&', '?', '/', '\\', '<', '>', ';', ',', '.',
           // '`', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '(', ')', '[', ']');
    $ques=str_replace($kickchars,'',t(v('q')));//删掉非法字符

    //简单检查收到的是汉字，还是拼音
    $n=mb_strlen($ques,'UTF-8');
    $key='py';
    if($n<=0) {
      //return $this->send_error(2100,'请输入拼音或汉字');
    } else if ($n==1) {
      if(eregi('[^\x00-\x7F]', $ques)) $key='hz'; //'有汉字'1个汉字，OK;
      else $key='py';//长=1拼音，OK
    } else if ($n>7) {
      //return $this->send_error(2101,'[TOO_LONG]输入字符太长。请输入1个汉字 或 1个字的拼音');
    } else if (eregi('[^\x00-\x7F]', $ques)) {
      //return $this->send_error(2102, '[REQ_ONE_CH_CHAR]请输入1个汉字 或 1个字的拼音');
    }
    $_REQUEST[$key]=$ques;
  }
  
  //------------------------  */
  
  //=======================================
  // LIST接口  输出过滤代码
  if(!$data){
    $data='[NO_RESULT]结果为空，请输入不带音调的拼音或一个汉字（少量实在太太偏的字除外）。';
  } else {
    $length=count($data['items']);
    
    $ques=t(v('hz'));
    if(strlen($ques)>0) {//输入的是汉字 ，则输出pyd(拼音带音调)
      $anskey='pyd';
      $ansstr=$data['items'][0][$anskey];
      for($i=1;$i<$length;$i++) {
        $ansstr.=', '.$data['items'][$i][$anskey];
      }
      $data=$ansstr;
    } else {
      $anskey='hz';
      $ansstr='';      
      for($j=0;$j<500 ;$j++) {//最多的同音字没有超过500个
        $step='';
        $eof=true;
        for($i=0;$i<$length;$i++) {
          $hz1=mb_substr($data['items'][$i][$anskey],$j,1,'UTF-8');
          if($hz1){
            $eof=false;//只要本循环还有字，就继续
            if(strpos($ansstr,$hz1)===false && strpos($step,$hz1)===false)//重复的字不要了
              $step.= $hz1.',' ;
          }
        }
        if($eof)
          break;
        $ansstr.=$step;
      }
      $data=mb_substr($ansstr,0,-1);//,'UTF-8'); //最后一个字是“,”号
    }
  }
  if(v('js')==1) { //不返回json，返回js代码 content-type: application/x-javascript
  $func=t(v('func'));
    header('Content-type: application/x-javascript; charset=utf-8');
    //header('Content-Type: text/html; charset=utf-8');
    echo "{$func}('{$data}');";
    die('//');
  }
  //END


  
}
// */