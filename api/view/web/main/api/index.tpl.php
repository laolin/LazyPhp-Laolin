
<div id="<?php echo g('c')?>-info-box">
  <?php 
  function info() {
    $gc=g('c');
    $ga=g('a');
    $vi=v('i');
    echo "Ctroller of c= [ {$gc} ] ,a= [ {$ga} ] ,i= [ {$vi} ] ,说明: "; 
    echo "<ul>
        <li>说明</li>
        <li>说明</li>
        <li>说明</li>
      </ul>";
    }
   info();
   ?>
   
 </div>
 