<?php 
$GLOBALS['config']['site_name'] = '查拼音';
$GLOBALS['config']['site_domain'] = 'laolin.com';


$GLOBALS['config']['default_controller'] = 'py';
$GLOBALS['config']['default_action'] = 'index';

$GLOBALS['config']['404_controller'] = 'py';
$GLOBALS['config']['404_action'] = 'index';

//查拼音REST服务器地址，后面会直接加py=xx&hz=xx之类的条件
//以“http”开头时：为完整URI地址，
//否则应该以“/”开头，表示同一网站下的绝对URI路径
$GLOBALS['config']['py_rest_uri']='/git-root/Lazyrest-a/api/pinyin/list/';