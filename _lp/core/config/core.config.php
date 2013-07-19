<?php

$GLOBALS['config']['default_controller'] = 'default';
$GLOBALS['config']['default_action'] = 'index';
$GLOBALS['config']['default_language'] = 'zh_cn';

//增加一个不存在的controller或不存在的action的默认处理，采用die太没腔调了
//在CROOT里默认一个简单的err404 Controller
//app config里可以重定义，然后在AROOT定义自己的随便什么名字的Controller和action
$GLOBALS['config']['404_controller'] = 'err404';
$GLOBALS['config']['404_action'] = 'index404';
