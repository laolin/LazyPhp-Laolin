<div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="./"><?=c('site_name')?></a>
          <div class="nav-collapse">
            <ul class="nav">
              <li<?php if( g('c') == 'home' ): ?> class="active"<?php endif; ?>><a href="?c=home">Home</a></li>
              <li<?php if( g('c') == 'about' ): ?> class="active"<?php endif; ?>><a href="?c=about">About</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
