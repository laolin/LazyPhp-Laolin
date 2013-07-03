<div class="span12"><div class=" "><!--content-->

<div class="row-fluid">
<?php
      echo $main_content ;
?>

</div>         
<script>

  color_names=["blue","green","red","yellow","orange",
        "pink","purple","lime","magenta","teal",
        "white","black"];
  mat_color_indexes=[];
  mat_color_init=[];
  mat_obj=[];
  
$(function(){
  initMat();
  cc=getColorsFromCookie();
  if(cc.length==mat_color_init.length) {//数量一样多，就认定cookie的数据可用了
    setColors(cc);
    console.log('cookie colors:'+cc);
  } else {
    saveColorsToCookie();
  }
  
  $(".metbox").click(function () {
    i=$(this).attr('mat_id');
    oldColor=getColor(i);
    ln=color_names.length;
    n=(oldColor+1)%ln;
    setColor(i,n);
    saveColorsToCookie();
    return true;
  });
  
});    
        
  
  function initMat() {
    mat_obj=$(".metbox");
    mat_obj.each(function (index) {
      self=$(this);
      c_index=0;
      color_names.forEach(function(colo,index) {//Array.some更适合，但是兼容性不好
        if(self.hasClass("metbox-"+colo)) {
          c_index=index;
          return false;
        }
      });
      mat_color_init[index]=c_index;
      self.attr('mat_id',index);
    });
    mat_color_indexes=mat_color_init;
  };
  
  function saveColorsToCookie() {
    $.cookie('mat_color_indexes',mat_color_indexes.join('_'),{ expires: 365 });
  }
  function getColorsFromCookie() {
    c=$.cookie('mat_color_indexes');
    return c ? c.split('_') : [];
  }
  
  
  function getColor(i){
    return mat_color_indexes[i];
  }
  function setColor(i,c){
    oldColor=mat_color_indexes[i];
    $(mat_obj.get(i)).removeClass("metbox-"+color_names[oldColor]);
    mat_color_indexes[i]=+c;
    $(mat_obj.get(i)).addClass("metbox-"+color_names[c]);
  }
  function setColors(cc) {
    cc.forEach(function(colo,index){
      setColor(index,colo);
    });
  };
  
  
</script>    
</div></div>