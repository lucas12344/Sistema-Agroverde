<div class="sign_in_sec current" id="tab-1">
  <?php
  if ($_SERVER['REQUEST_METHOD'] == "POST") :
    $valida = new Validation();
    //pegando os valores do formulario
    $login = filter_input(INPUT_POST, "login", FILTER_SANITIZE_MAGIC_QUOTES);
    $senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_MAGIC_QUOTES);
    //trantando os valores dos campos
    $senha = addslashes($senha);
    $senha = base64_encode($senha);
    //setando os valores nos metodos
    $valida->setLogin($login);
    $valida->setSenha($senha);
    //fazendo a validação
    if ($valida->logar()) :
      echo '<script>window.location.href="panel/";</script>';
    endif;
  endif;
  if (isset($_SESSION['erro'])) :
    echo $_SESSION['erro'];
    unset($_SESSION['erro']);
  endif;
  ?>
  <h3>Entrar</h3>
  <form method="post">
    <div class="row">
      <div class="col-lg-12 no-pdd">
        <div class="sn-field">
          <input type="text" name="login" placeholder="Email">
          <i class="fa fa-user"></i>
        </div>
        <!--sn-field end-->
      </div>
      <div class="col-lg-12 no-pdd">
        <div class="sn-field">
          <input type="password" name="senha" placeholder="Senha">
          <i class="fa fa-lock"></i>
        </div>
      </div>
      <div class="col-lg-12 no-pdd">
        <div class="checky-sec">
          <div class="fgt-sec">
            <input type="checkbox" name="cc" id="c1">
            <label for="c1">
              <span></span>
            </label>
            <small>Relembre-me</small>
          </div>
          <!--fgt-sec end-->
          <a href="#" title="">Esqueceu a senha?</a>
        </div>
      </div>
      <div class="col-lg-12 no-pdd">
        <button type="submit" value="submit">Entrar</button>
      </div>
    </div>
  </form>
  <div class="login-resources">
    <h4>Login via rede social</h4>
    <ul>
      <li><a href="#" title="" class="fb"><i class="fab fa-facebook-f"></i>Login Via Facebook</a></li>
      <li><a href="#" title="" class="tw"><i class="fab fa-twitter"></i>Login Via Twitter</a></li>
    </ul>
  </div>
  <!--login-resources end-->
</div>