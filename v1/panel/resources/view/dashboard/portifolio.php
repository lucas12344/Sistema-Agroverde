 <!-- <div class="widget widget-portfolio">
  <div class="wd-heady">
    <h3>Portifolio</h3>
    <img src="<?php echo Url::getBase() ?>../public/images/photo-icon.png" alt="">
  </div>
  <div class="pf-gallery">
    <ul>
      <?php
      $posts = new Read();
      $idUser = $_SESSION['userId'];
      $posts->getPosts("WHERE u.id = $idUser ORDER BY p.id DESC");
      foreach ($posts->getResult() as $post) :
        extract($post);
        ?>
      <li><a href="#" title=""><img src="<?php echo Url::getBase() . 'uplouds/posts/' . $idPost . '/' . $img ?>" alt="<?php echo $img ?>"></a></li>
      <?php endforeach ?>
    </ul>
  </div>
  <!--pf-gallery end
</div>

-->