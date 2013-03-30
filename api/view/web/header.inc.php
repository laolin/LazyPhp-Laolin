
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner" id="opt-navbar-inner">
      
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
          <a class="brand"href="<?php echo $sitelink; ?>"><?php echo $sitename; ?></a>
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
              <?php echo $appname ?> 
              <?php if($loginfo) echo  ' | ' . $loginfo ; ?>
            </p>
            <ul class="nav">
              <?php  foreach($nav_items as  $item => $v) {
              echo "<li><a href='$item' class=''>$v</a></li>";
                } ?>
            </ul>
          </div>     
        </div>
      
      </div>
    </div>