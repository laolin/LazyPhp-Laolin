<div class="cbox">
<img class="close" src="../static/img/cross.png" onclick="hide_pop_box();"/>
<?php	
	$tfile = 'view' . DS  . 'ajax' . DS . g('c') . DS . g('a') . '.tpl.php' ;
	if( file_exists( AROOT . $tfile ) ) include( AROOT . $tfile );
	else echo $info;//不存在模板时不再去CROOT找模板
 ?>
</div>