<?php

  function c_about_item($item,$disp=true) {
    $str='';
    switch($item) {
      case 'site':
        $str.= '关于About:  site关于本站';
        break;
      case 'hhxx':
        $str.= '关于About:  hhxx 关于 ';
        break;
      case 'anyi':
        $str.= '关于About:  anyi关于';
        break;
      case 'laolin':
      default:
        $str.= '关于About:  laolin 关于老林';
    }
    if($disp)echo $str;
    return $str;
  }
