<div class=" ">
  <div>
      <h3><?php echo $title; ?></h3>
      <form action="?c=py&a=ajax_py" id="theform2" class="well">
      <input type="text" name="q" value="<?php echo strlen($ques)>0?$ques:'中'; ?>" />
      <input type="button" class="btn" value="查询" onclick="get_py( 'theform2' )" />
      </form>
      <div class='alert'><span id="info-box-main" class='' style="font-size:2em"><?php echo $info;?></span></div>
   <div>
</div>

 <script>
  function get_py(name) { 
    send_form( name , function( data ){ 
          $("#info-box-main").html(  data ).parent().addClass('alert'); 
      });
    return false;
  }
  
 </script>