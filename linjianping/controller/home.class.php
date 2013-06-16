<?php
if( !defined('IN') ) die('bad request');
include_once( AROOT . 'controller'.DS.'app.class.php' );
error_reporting(0);

class homeController extends appController
{
  private $data;
  function __construct()
  {
    parent::__construct();
    
    $this->data=getAppDataDefault();
    $this->data['nav_items']=array();
    $this->data['nav_items']["?a=lin&b=index"]='简介';
    $this->data['nav_items']["?a=lin&b=projects"]='工程项目';
    $this->data['nav_items']["?a=lin&b=awards"]='获奖情况';
    $this->data['nav_items']["?a=lin&b=publications"]='发表论文';
    $this->data['nav_items']["?a=lin&b=hobbies"]='兴趣爱好';
    $this->data['nav_items']["?a=lin&b=contact"]='联系方式';
    $this->data['nav_items']["http://laolin.com/lin/"]='LaoLin BLOG';
    
    $this->data['css'][]='comm-box.css';
    $this->data['css'][]='laolin.metro.box.css';
  }
  
  function firstpage(){
    $this->data['toptitle'] = '林建萍'.
      ($_SERVER['HTTP_HOST']=='laolin.com'?'(LaoLin)':'') . 
        ' 同济大学建筑设计研究院（集团）有限公司 高级工程师 一级注册结构工程师';
        
        /*
  OBJ：      
lineheight:1,2,3  _____\ 【DiV class='metbox-row-s1'】 
lineData: (array) 
  情况1：width, 【color, head,text,link】 ______\  【b class='span6 metbox metbox-green'】
  情况2：width, 【OBJ】  ______\  【span class='span3'】
  
    $this->data['items']=array();
    $this->data['items'][]=array(
      'title'=>'老林简介',
      'text'=>'老林简介：结构工程师技术简历。',
      'img'=>'http://files.laolin.com/images/linjp-2012.9.3-180x180.jpg',
      'link'=>'?a=lin&b=index'
      );
    $this->data['items'][]=array(
      'title'=>'老林日记',
      'text'=>'老林日记，老林平时记录的杂事。',
      'img'=>'http://files.laolin.com/images/linjp-2012.9.3-180x180.jpg',
      'link'=>'http://laolin.com/lin/'
      );
    */
    return render( $this->data );
  }
  function lin()
  {
  
    $b=v('b');
    switch($b) {
        //使用lazyRest的API，直接读wordpress的指定 页面的数据
      case 'contact':
        //我的Wordpress的联系页面的ID为4168
        $this->_showSomePost('ID=4168','联系方式');
        break;
      
      case 'projects':
        $this->_showSomePost('ID=4161','工程项目');
        break;
      case 'awards':
        $this->_showSomePost('ID=4163','获奖情况');
        break;
      case 'publications':
        $this->_showSomePost('ID=4165','发表论文');
        break;
      case 'hobbies':
        $this->_showSomePost('ID=4180','兴趣爱好');
        break;
      case 'index':
      default:      
        //使用lazyRest的API，直接读wordpress的指定page的全部子页面的数据
        //我的Wordpress的简历页面的ID为4132,这个页面内容没有用
        //所有的子页面对应简历的一个内容, 这些会由LazyREST api返回给本页面JSON数据
        $this->_showSomePost('post_parent=4132&post_status=publish','简介,简历');
    }
  }
  function _showSomePost($query,$title){
    $this->data['toptitle'] = $title;
  
    //使用lazyRest的API，直接读wordpress的指定 条件 页面或文章,
    //会由LazyREST api返回给本页面JSON数据
    //（LazyRest api系统在另外的APP里实现）
    //REST api输入参数id=4168
    //REST api输出字段post_content, post_title, menu_order
    $url='http://api.laolin.com/rest/api/wp4_posts/list/'.$query;
    
    
    $rest=file_get_contents($url);
    $res=json_decode($rest,true);
    
    if($res['err_code']!=0) {
      $this->data['about_laolin'][]=
          array('post_content'=>'Error: ['.$res['err_code'].'] '.$res['err_msg']);
    } else {
      $this->data['about_laolin']=$res['data']['items'];
       foreach ($this->data['about_laolin'] as $key => $row) {
        $menu_order[$key]  = +$row['menu_order'];
        $this->data['about_laolin'][$key]['post_content']=nl2br($row['post_content']);
      }
      array_multisort($menu_order, SORT_ASC, $this->data['about_laolin']);
    }
    return render( $this->data );
  }  
  
  
  

}
  