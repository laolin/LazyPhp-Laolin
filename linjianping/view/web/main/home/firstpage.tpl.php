<div class="span12"><div class=" "><!--content-->

  
<div class="row-fluid">
<?php

      echo $main_content ;
?>

</div>         
<script>

  $(".metbox").click(function () {
    colors=["blue","green","red","yellow","orange",
        "pink","purple","lime","magenta","teal",
        "white","black"];
    c_index=0;
    self=$(this);
    
    colors.forEach(function(colo,index) {//Array.some更适合，但是兼容性不好
      if(self.hasClass("metbox-"+colo)) {
        c_index=index;
      }
    });
    $(this).toggleClass("metbox-"+colors[c_index]);
    $(this).toggleClass("metbox-"+colors[(c_index+1)%12]);
    return true;
  });
</script>    
</div></div>