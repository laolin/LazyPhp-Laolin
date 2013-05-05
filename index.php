<?php

$path='linjianping';//linjianping.com

if(!isset($_GET['appname']))$_GET['appname']='';

//2个旧的特殊目录之1
if($_SERVER['HTTP_HOST']=='lazyphp.laolin.com'||$_GET['appname']=='lazyphp'){
//$path='_lp';//原来的lazyPHP3的页面（被我改过）
// 原_lp目录的static只能用它自己目录下的，
//故只能跳到它自己目录下，
//否则页面引用static目录的js css将都是不对的文件
header('Location: _lp/');
exit;
}

//2个旧的特殊目录之2
if($_SERVER['HTTP_HOST']=='py.laolin.com'||$_GET['appname']=='pinyin'){
//$path='py';//查拼音
// 原_lp目录的static只能用它自己目录下的，
//故只能跳到它自己目录下，
//否则页面引用static目录的js css将都是不对的文件
header('Location: py/');
exit;
}

if($_SERVER['HTTP_HOST']=='api.laolin.com'||$_GET['appname']=='api'){
  $path='api';//api
} else if($_SERVER['HTTP_HOST']=='linjianping.com'||$_GET['appname']=='linjianping'){
  $path='linjianping';//linjianping.com
}
include_once($path.'/index.php' );
