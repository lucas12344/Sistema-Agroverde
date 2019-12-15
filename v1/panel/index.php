<?php
require_once './app/conf.inc';
require_once './vendor/autoload.php';
if (isset($_GET['logout'])) :
    if ($_GET['logout'] == 'confirmar') :
        Validation::deslogar();
    endif;
endif;
Validation::validaSession();
?>
<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <title>Agroverdes - <?php echo $_SESSION['user']; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="<?php echo Url::getBase(); ?>../public/css/animate.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Url::getBase(); ?>../public/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Url::getBase(); ?>../public/css/line-awesome.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Url::getBase(); ?>../public/css/line-awesome-font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo Url::getBase(); ?>../public/lib/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Url::getBase(); ?>../public/lib/slick/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Url::getBase(); ?>../public/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Url::getBase(); ?>../public/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Url::getBase(); ?>../public/css/loading.css">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

</head>

<body oncontextmenu="return false;">

    <div class="loading">
        <img src="https://loading.io/spinners/eclipse/lg.ring-loading-gif.gif" alt="Aguarde..." />
        <p>Aguarde...</p>
    </div>

    <div class="wrapper">
        <?php 
        include_once("resources/view/dashboard/header.php");
        $pagina = Url::getURL(0);
        if ($pagina==null) :
            $pagina="feeds";
        endif;
        if (file_exists("resources/view/dashboard/" . $pagina . ".php")) :
            require_once("resources/view/dashboard/" . $pagina . ".php");
        endif;
        ?>

    </div>
    <script type="text/javascript" src="<?php echo Url::getBase(); ?>../public/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo Url::getBase(); ?>../public/js/popper.js"></script>
    <script type="text/javascript" src="<?php echo Url::getBase(); ?>../public/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo Url::getBase(); ?>../public/lib/slick/slick.min.js"></script>
    <script type="text/javascript" src="<?php echo Url::getBase(); ?>../public/js/scrollbar.js"></script>
    <script type="text/javascript" src="<?php echo Url::getBase(); ?>../public/js/script.js"></script>

</body>

</html>