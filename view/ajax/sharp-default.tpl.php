<div class="cbox">
<img class="close" src="static/image/cross.png" onclick="hide_pop_box();"/>
<?php	
	$tfile = 'view' . DS  . 'ajax' . DS . g('c') . DS . g('a') . '.tpl.php' ;
	if( file_exists( AROOT . $tfile ) ) include( AROOT . $tfile );
	else echo $info;//������ģ��ʱ����ȥCROOT��ģ��
 ?>
</div>