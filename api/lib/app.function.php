<?php
  function getAppDataDefault() {
    $aName='Laolin';
    $data['sitelink'] = './';
    $data['sitename'] = '[Laolin-Api]';
    $data['toptitle'] = 'index';
    
    $data['appname']=$aName;
    $data['nav_items']=array();
    $data['nav_items']["?c=home"]='home';
    $data['nav_items']["?c=about"]='about';
    return $data;
  }