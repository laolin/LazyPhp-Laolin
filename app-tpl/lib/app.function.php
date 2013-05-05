<?php
  function getAppDataDefault() {
    $aName='Laolin';
    $data['sitelink'] = './';
    $data['sitename'] = c('site_name');
    $data['toptitle'] = '欢迎光临';
    
    $data['appname']=$aName;
    $data['nav_items']=array();
    $data['nav_items']["?c=home"]='home';
    $data['nav_items']["?c=about"]='about';
    return $data;
  }

  function echoRestfulData($data,$js_callback='') {
    if( !headers_sent() ) {
      if(strlen($js_callback)>0) {
        header('Content-type: application/x-javascript; charset=utf-8');
      } else {
        header("Content-Type:text/html;charset=utf-8");
      }
      header("Expires: Thu, 01 Jan 1970 00:00:01 GMT");
      header("Cache-Control: no-cache, must-revalidate");
      header("Pragma: no-cache");
    }
    
    if(strlen($js_callback)>0) {
      echo $js_callback.' ( ';
    }
    
    echo json_encode($data);
    
    if(strlen($js_callback)>0) {
      echo ' ); ';
    }
  }