<div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">林建萍简历</li>
              <?php  foreach($nav_items as  $item => $v) {
              echo "<li><a href='$item' class=''>$v</a></li>";
                } ?>
            </ul>   
            <ul class="nav nav-list hidden-phone">
                
              <li class="nav-header"> </li>
              <li class="nav-header">LaoLin系列</li>
              <li class=" "><a href="http://LaoLin.com/lin/" target="_blank">老林日记</a></li>
              <li class=" "><a href="http://laolin.com/t/huoxing/" target="_blank">老林火星文</a></li>
              <li class=" "><a href="http://laolin.com/t/pinyin/" target="_blank">查拼音</a></li>
              <li class=" "><a href="http://laolin.com/ssgg/cutetea/" target="_blank">CuteTEA(硕士论文时编的程序)</a></li>
              <li class=" "><a href="http://laolin.com/ssgg/tank/" target="_blank">人机坦克大战</a></li>
              
              
              <li class="nav-header">LaoLin域名</li>
              <li class=" "><a href="http://LaoLin.com/" target="_blank">LaoLin.com</a></li>
              <li class=" "><a href="http://LinJianPing.com/" target="_blank">LinJianPing.com</a></li>
              <li class=" "><a href="http://WenDaYiLiao.com/" target="_blank">WenDaYiLiao.com</a></li>
              <li class=" "><a href="http://13950773388.COM/" target="_blank">13950773388.com</a></li>
              <li class=" "><a href="http://XIANLONGSHAN.COM/" target="_blank">XianLongShan.com</a></li>
              <li class=" "><a href="http://iTongji.org/" target="_blank">iTongji.org</a></li>
              <li class=" "><a href="http://TongJiAD.com/" target="_blank">TongJiAD.com</a></li>
              <li class=" "><a href="http://PingLiPou.com/" target="_blank">PingLiPou.com</a></li>
              <li class=" "><a href="http://AnQiuXiang.com/" target="_blank">AnQiuXiang.com</a></li>
              <li class=" "><a href="http://PKPMP.com/" target="_blank">PKPMP.com</a></li>
            </ul>
</div><!--/.well -->



            
<script>
      addr=window.location.search||'?b=index';
      $('.navbar .nav a').parent().removeClass('active');//全变灰
      $('.navbar .nav a[href="'+addr+'"]').parent().addClass('active');//与当前URL相符的亮显
</script>
