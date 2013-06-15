<div class=" "><!--content-->

              <?php foreach($items as    $v) {
              echo "
              <div class='comm-box'>
              <h3>{$v[title]}</h3>
              <a href='{$v[link]}'>
              <div><img src='{$v[img]}'/>
              <p>{$v[text]}</p></div>
              </a>
              </div>
              ";
                } ?>
            
</div>