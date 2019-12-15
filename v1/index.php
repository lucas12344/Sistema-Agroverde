<?php
require_once './panel/app/conf.inc';
require_once './panel/vendor/autoload.php';
?>
<html>

<head>
  <meta charset="UTF-8">
  <title>Agroverdes 0.0.2</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <link rel="stylesheet" type="text/css" href="<?php echo Url::getBase(); ?>public/css/animate.css">
  <link rel="stylesheet" type="text/css" href="<?php echo Url::getBase(); ?>public/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo Url::getBase(); ?>public/css/line-awesome.css">
  <link rel="stylesheet" type="text/css" href="<?php echo Url::getBase(); ?>public/css/line-awesome-font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="<?php echo Url::getBase(); ?>public/lib/slick/slick.css">
  <link rel="stylesheet" type="text/css" href="<?php echo Url::getBase(); ?>public/lib/slick/slick-theme.css">
  <link rel="stylesheet" type="text/css" href="<?php echo Url::getBase(); ?>public/css/style.css">
  <link rel="stylesheet" type="text/css" href="<?php echo Url::getBase(); ?>public/css/responsive.css">
  <link rel="stylesheet" type="text/css" href="<?php echo Url::getBase(); ?>public/css/loading.css">
</head>

<body class="sign-in" oncontextmenu="return false;">
  <!-- loading page -->
  <div class="loading">
    <img src="https://loading.io/spinners/eclipse/lg.ring-loading-gif.gif" alt="Aguarde..." />
    <p>Aguarde...</p>
  </div>

  <div class="wrapper">

    <div class="sign-in-page">
      <div class="signin-popup">
        <div class="signin-pop">
          <div class="row">
            <div class="col-lg-6">
              <div class="cmp-info">
                <div class="cm-logo">
                  <img src="<?php echo Url::getBase(); ?>public/images/logo-agro.png" alt="">
                  <p>Rede social criada para a divulgação e interação dos trabalhadores de zonas rurais.</p>
                </div>
                <!--cm-logo end-->
                <img src="<?php echo Url::getBase(); ?>public/images/cm-main-img.png" alt="">
              </div>
              <!--cmp-info end-->
            </div>
            <div class="col-lg-6">
              <div class="login-sec">
                <ul class="sign-control">
                  <li data-tab="tab-1" class="current"><a href="#" title="">Entrar</a></li>
                  <li data-tab="tab-2"><a href="#" title="">Cadastre-se</a></li>
                </ul>
                <?php include_once("resources/view/sign/sign-in.php"); ?>
                <!--sign_in_sec end-->
                <div class="sign_in_sec" id="tab-2">
                  <div class="signup-tab">
                    <ul>
                      <li data-tab="tab-3" class="current"><a href="#" title=""> <i class="fa fa-user"></i> Consumidor</a></li>
                      <li data-tab="tab-4"><a href="#" title=""> <i class="fa fa-building"></i> Vendedor</a></li>
                    </ul>
                  </div>
                  <!--signup-tab end-->
                  <?php include_once("resources/view/sign/sign-up-user.php"); ?>
                  <!--dff-tab end-->
                  <?php include_once("resources/view/sign/sign-up-company.php"); ?>
                  <!--dff-tab end-->
                </div>
              </div>
              <!--login-sec end-->
            </div>
          </div>
        </div>
        <!--signin-pop end-->
      </div>
      <!--signin-popup end-->
      <?php include_once("/resources/view/sign/footer.php") ?>
      <!--footy-sec end-->
    </div>
    <!--sign-in-page end-->
  </div>
  <!--theme-layout end-->

  <script type="text/javascript" src="<?php echo Url::getBase(); ?>public/js/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo Url::getBase(); ?>public/js/popper.js"></script>
  <script type="text/javascript" src="<?php echo Url::getBase(); ?>public/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo Url::getBase(); ?>public/lib/slick/slick.min.js"></script>
  <script type="text/javascript" src="<?php echo Url::getBase(); ?>public/js/script.js"></script>

</body>

</html>