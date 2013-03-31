<div class="well">
            <ul class="nav nav-list">
              <li><a href="?c=<?php echo g('c')?>&b=laolin">index laolin</a></li>
              <li><a href="?c=<?php echo g('c')?>&b=anyi">index anyi</a></li>
              <li><a href="?c=<?php echo g('c')?>&b=hhxx">index hhxx</a></li>
              <li><a href="?c=<?php echo g('c')?>&b=site">index site</a></li>
            </ul>
</div>
<div id="<?php echo g('c')?>-info-box">
  <?php echo $info;
  ?>  
</div>
<div>
  <div id='output'>
  </div>
  <div >
  
  </div>
  <span class="hide" id='output-tpl'>
  <ul>
  <% _.each(data['items'], function(it) { %> 
  <li><%= it['title']+it['group']+it['text'] %></li> 
  <% }); %>
  <ul>
  </span>
</div>
 
 <script>
 $(function(){
  laolin.fnTemplateRest('#output','#output-tpl',
      '/git-root/Lazyrest-a/api/laolin_about/list/group=0');
 });
 </script>