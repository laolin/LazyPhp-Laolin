<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <title><?php echo $toptitle . ' | ' . $sitename ; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="LaoLin">

    <!-- Le styles -->
    <link href="static/css/bootstrap.min.css" rel="stylesheet">
    <link href="static/css/laolin.s_boxes.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }

      @media (max-width: 980px) {
        /* Enable use of floated navbar text */
        .navbar-text.pull-right {
          float: none;
          padding-left: 5px;
          padding-right: 5px;
        }
      }
    </style>
    <?php if( isset($css) && is_array( $css ) ): ?>
        <?php foreach( $css as $cfile ): ?><link rel="stylesheet" type="text/css" href="static/css/<?=$cfile?>">
        <?php endforeach; ?>
    <?php endif; ?>

    <link href="static/css/bootstrap-responsive.min.css" rel="stylesheet">

    <script src="static/js/jquery-1.8.0.min.js"></script>
    <script src="static/js/underscore-min.js"></script>
    <script src="static/js/backbone-min.js"></script>

    

    <!-- Fav and touch icons -->
  </head>

  <body>
    <?php @include_once( dirname(__FILE__) ) . DS . 'header.inc.php'; ?>  
 

    <div class="container-fluid">
      <div class="row-fluid" id="opt-main-box">
      
        <div class="span3">
      <?php  
      $tfile = 'view' . DS  . 'web' . DS . 'side' . DS . g('c') . DS . g('a') . '.tpl.php';
      if( file_exists( AROOT . $tfile ) ) include( AROOT . $tfile );
      else @include_once( dirname(__FILE__) ) . DS . 'side.inc.php';
       ?>
        </div>
        <div class="span9">
       
          <?php 
      $tfile = 'view' . DS  . 'web' . DS . 'main' . DS . g('c') . DS . g('a') . '.tpl.php';
      if( file_exists( AROOT . $tfile ) ) include( AROOT . $tfile );
      else @include_once( dirname(__FILE__) ) . DS . 'content.inc.php';
      ?> 

     
        </div>
      </div><!--/row-->
      
     <?php @include_once( dirname(__FILE__) ) . DS . 'footer.inc.php'; ?>
     
        
    </div><!--/.fluid-container-->
    
    <script src="static/js/bootstrap.min.js"></script>
    <!-- s cript src="static/js/hammer.min.js"></scrip t -->
    <script src="static/js/laolin.main.js"></script>
    <script src="static/js/laolin.router.js"></script>
    <script src="static/js/laolin.s_boxes.js"></script>
     <script>
      function set_main_box(htm) {
        $('#opt-main-box').html(htm);
      }
    </script>
    
    
    <?php if( isset($js) && is_array( $js ) ): ?>
        <?php foreach( $js as $jfile ): 

        if(strpos($jfile,'://')!=0)
          echo "<script type='text/javascript' src='$jfile' ></script>";
        else
          echo "<script type='text/javascript' src='static/js/$jfile' ></script>";
        endforeach; ?>
  <?php endif; ?>
  </body>
</html>