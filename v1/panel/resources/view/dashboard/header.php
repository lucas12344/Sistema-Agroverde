<header>
    <div class="container">
        <div class="header-data">
            <div class="logo">
                <a href="<?php echo Url::getBase() ?>" title=""><img src="<?php echo Url::getBase() ?>../public/images/logo-agro.png" alt=""></a>
            </div>
            <!--logo end-->
            <div class="search-bar">
                <form method="GET" action="<?php echo Url::getBase() ?>friends">
                    <input type="text" name="search" placeholder="Buscar...">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <!--search-bar end-->
            <nav class="">
                <ul>
                    <li>
                        <a href="<?php echo Url::getBase() ?>" title="">
                        <i class="fa fa-rss-square"></i>
                            Feed
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo Url::getBase() ?>friends" title="">
                        <i class="fa fa-users"></i>
                            Amigos
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo Url::getBase() ?>profile" title="">
                        <i class="fa fa-user"></i>
                            Perfil
                        </a>
                    </li>
                </ul>
            </nav>
            <!--nav end-->
            <div class="menu-btn">
                <a href="#" title=""><i class="fa fa-bars"></i></a>
            </div>
            <!--menu-btn end-->
            <div class="user-account">
                <div class="user-info">
                    <img 
                        src="<?php echo $_SESSION['avatar']!=null ? Url::getBase() . 'uplouds/users/' . $_SESSION['avatar'] : Url::getBase().'../public/images/user.png' ?>" alt="<?php echo $_SESSION['user'] ?>">
                    <a href="#" title=""><?php echo $_SESSION['user']; ?></a>
                    <i class="fa fa-sort-down"></i>
                </div>
                <div class="user-account-settingss" id="users">
                    <h3>Ferramentas</h3>
                    <ul class="us-links">
                        <li>
                            <a href="<?php echo Url::getBase() ?>profile" title="">
                                <i class="fas fa-id-badge"></i> Ver Perfil
                            </a>
                        </li>
                    </ul>
                    <h3 class="tc">
                        <a href="?logout=confirmar" title="">
                            <i class="fa fa-sign-out-alt"></i> Sair
                        </a>
                    </h3>
                </div>
                <!--user-account-settingss end-->
            </div>
        </div>
        <!--header-data end-->
    </div>
</header>