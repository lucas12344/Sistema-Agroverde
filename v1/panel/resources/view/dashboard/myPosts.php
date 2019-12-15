<?php
$posts = new Read();
$idUser = $_SESSION['userId'];
$posts->getPosts("WHERE u.id = $idUser ORDER BY p.id DESC");
foreach ($posts->getResult() as $post) :
  extract($post);
  ?>
  <div class="posty">
    <div class="post-bar no-margin">
      <!-- header post -->
      <div class="post_topbar">
        <div class="usy-dt">
          <img src="<?php echo $_SESSION['avatar'] != null ? Url::getBase() . 'uplouds/users/' . $avatar : Url::getBase() . '../public/images/user.png' ?>" alt="<?php echo $avatar ?>">
          <div class="usy-name">
            <h3><?php echo $nome ?></h3>
            <span>
              <i class="fa fa-clock"></i>
              <?php
                $data = new DateTime("$dataPublicacao");
                echo $data->format('d/m/Y H:i:s');
                ?>
            </span>
          </div>
        </div>
      </div>
      <!-- description post -->
      <img src="<?php echo Url::getBase() . 'uplouds/posts/' . $idPost . '/' . $img ?>" alt="<?php echo $img ?>" />
      <div class="job_descp">
        <p><?php echo $legenda ?></p>
        <ul class="skill-tags">
          <li><a href="#" title="">TAG1</a></li>
          <li><a href="#" title="">TAG2</a></li>
          <li><a href="#" title="">TAG3</a></li>
        </ul>
      </div>
      <!-- status pos -->
      <div class="job-status-bar">
        <ul class="like-com">
          <!-- likes -->
          <li>
            <?php
              $readLikes = new Read();
              $readLikes->verificaLike($_SESSION['userId'], $idPost);
              ?>
            <input type="hidden" name="idUser_<?php echo $idPost ?>" value="<?php echo $_SESSION['userId'] ?>">
            <a href="#" class="setLike <?php echo $readLikes->getRowCount() > 0 && $readLikes->getResult()[0]['curtiu'] == 'SIM' ? 'curtiu' : '' ?>" alt="<?php echo $idPost ?>">
              <i class="fas fa-heart"></i> Curti
            </a>
          </li>
          <!-- comentarios -->
          <li>
            <?php
              $readComentarios = new Read();
              $readComentarios->getTotalComentariosPost($idPost);
              ?>
            <a href="#" class="com"><i class="fas fa-comment-alt"></i> Comentaios <?php echo $readComentarios->getRowCount() ?></a>
          </li>
        </ul>
      </div>
      <!-- comentarios -->
      <div class="comment-section">
        <a href="#" class="plus-ic">
          <i class="fa fa-plus"></i>
        </a>
        <div class="comment-sec">
          <ul>
            <?php
              $comentarios = new Read();
              $comentarios->getComentarios("WHERE p.id = $idPost ORDER BY c.id ASC");
              foreach ($comentarios->getResult() as $comentario) :
                extract($comentario);
                ?>
              <li>
                <div class="comment-list">
                  <div class="bg-img">
                    <img src="<?php echo Url::getBase() . 'uplouds/users/' . $avatarUserComentario ?>" alt="">
                  </div>
                  <div class="comment">
                    <h3> <?php echo $nomeUserComentario ?></h3>
                    <span>
                      <i class="fa fa-calendar"></i>
                      <?php
                          $data = new DateTime("$dataComentario");
                          echo $data->format('d/m/Y');
                      ?>
                      <i class="fa fa-clock"></i>
                      <?php
                          $data = new DateTime("$dataComentario");
                          echo $data->format('g:ia');
                      ?>
                    </span>
                    <p> <?php echo $comentario ?></p>
                  </div>
                </div>
              </li>
            <?php endforeach ?>
          </ul>
        </div>
        <!--comment-sec end-->
        <div class="post-comment">
          <div class="cm_img">
            <img src="<?php echo $_SESSION['avatar'] != null ? Url::getBase() . 'uplouds/users/' . $avatar : Url::getBase() . '../public/images/user.png' ?>" alt="<?php echo $avatar ?>">
          </div>
          <div class="comment_box">
            <form method="post">
              <input type="text" name="comentario_<?php echo $idPost ?>"placeholder="Comentario" required>
              <button class="setComentario" alt="<?php echo $idPost ?>">Comentar</button>
            </form>
          </div>
        </div>
      </div>
      <!--post-comment end-->
    </div>
  </div>
<?php endforeach ?>