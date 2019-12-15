<section class="companies-info">
  <div class="container">
    <div class="company-title">
      <h3>Chat</h3>
    </div>
    <!--company-title end-->
    <div class="companies-list">
      <div class="row">
        <div class="col-sm-12 col-lg-12">
          <div class="company_profile_info">
            <!-- header -->
            <div class="con-title mg-3">
              <div class="chat-user-info">
                <img width="30px" src="<?php echo Validation::getImageUser(Url::getURL(1)) != null ? Url::getBase() . 'uplouds/users/' .Validation::getImageUser(Url::getURL(1)): Url::getBase() . '../public/images/user.png' ?>" alt="">
                <h3><?php echo Validation::getNameUser(Url::getURL(1)) ?></h3>
              </div>
              <div class="st-icons">
                <a href="#" title=""><i class="fa fa-cog"></i></a>
                <a href="#" title="" class="close-chat"><i class="fa fa-minus-square"></i></a>
                <a href="#" title="" class="close-chat"><i class="fa fa-close"></i></a>
              </div>
            </div>
            <div class="company-up-info">
              <!-- pegando as msg anteriores -->
              <?php
              $read = new Read();
              $read->getChat('WHERE ch.de = ' . Url::getURL(1) . ' AND ch.para = ' . $_SESSION['userId'] . '');
              $recebidas = $read->getResult();
              $read->getChat('WHERE ch.de = ' . $_SESSION['userId'] . ' AND ch.para = ' . Url::getURL(1) . '');
              $enviadas =  $read->getResult();
              $historico = array_merge($recebidas, $enviadas);
              foreach ($historico as $ar) {
                $irma[] = $ar['data'];
              }
              // verifica se o array possui algum valor
              if(count($historico) > 0){
                array_multisort($irma, $historico);
              }
              ?>
              <!-- mesnsagens -->
              <div id="mCSB_2_container" class="mCSB_container" style="position: relative; top: 0px; left: 0px;" dir="ltr">
                <?php foreach ($historico as $a) :
                  extract($a);
                  $data = new DateTime("$data");
                  ?>
                  <div class="chat-msg <?php echo $de == $_SESSION['userId'] ? 'st2' : '' ?>">
                    <p><?php echo $msg ?></p>
                    <span><?php echo $data->format('d/m/Y g:ia'); ?></span>
                  </div>
                <?php endforeach; ?>
              </div>
              <!-- form da mensagem -->
              <div class="post-project-fields">
                <?php
                if ($_POST && ($_POST['typeForm'] == 'chat')) :
                  $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                  unset($dados['typeForm']);
                  $create = new Create();
                  $create->ExeCreate('chat', $dados);
                  if ($create->getResult()) {
                    echo '<script>location.href="./' . Url::getURL(1) . '";</script>';
                    unset($dados);
                  }
                endif
                ?>
                <form method="post" action="" enctype="multipart/form-data">
                  <input type="hidden" name="typeForm" value="chat">
                  <input type="hidden" name="para" value="<?php echo Url::getURL(1) ?>">
                  <input type="hidden" name="de" value="<?php echo $_SESSION['userId'] ?>">
                  <div class="row">
                    <div class="col-lg-12">
                      <input type="text" name="msg" placeholder="Mensagem...." class="form-control" required>
                    </div>
                    <div class="col-lg-12">
                      <ul>
                        <li><button class="active" type="submit" value="post">Enviar</button></li>
                        <li><button type="reset" title="">Cancelar</button></li>
                      </ul>
                    </div>
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
