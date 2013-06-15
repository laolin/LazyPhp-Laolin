<div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">林建萍</li>
              <?php  foreach($nav_items as  $item => $v) {
              echo "<li><a href='$item' class=''>$v</a></li>";
                } ?>
            </ul>  
</div><!--/.well -->



            
<script>
      addr=window.location.search||'?a=lin&b=index';
      $('.navbar .nav a').click( function(){$(this).parent().addClass('active')}) .
        parent().removeClass('active');//全变灰
      $('.navbar .nav a[href="'+addr+'"]').parent().addClass('active');//与当前URL相符的亮显
</script>
