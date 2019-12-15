<section class="cover-sec">
    <img src="<?php echo Url::getBase() ?>../public/images/cover-img.jpg" alt="">
</section>
<main>
    <div class="main-section">
        <div class="container">
            <div class="main-section-data">
                <div class="row">
                    <!-- profile -->
                    <div class="col-lg-3">
                        <div class="main-left-sidebar">
                            <div class="user_profile">
                                <div class="user-pro-img">
                                    <img src="<?php echo $_SESSION['avatar'] != null ? Url::getBase() . 'uplouds/users/' . $_SESSION['avatar'] : Url::getBase() . '../public/images/user.png' ?>" alt="<?php echo $_SESSION['avatar'] ?>">
                                </div>
                                <div class="user_pro_status">
                                    <ul class="flw-status">
                                        <li>
                                            <span>Seguindo</span>
                                            <?php
                                            $readSeguidores = new Read();
                                            $readSeguidores->getTotalSeguidores($_SESSION['userId']);
                                            ?>
                                            <b><?php echo $readSeguidores->getRowCount() ?></b>
                                        </li>
                                        <li>
                                            <span>Publicações</span>
                                            <?php
                                            $readPosts = new Read();
                                            $readPosts->getTotalPost($_SESSION['userId']);
                                            ?>
                                            <b><?php echo $readPosts->getRowCount() ?></b>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- feeds interno -->
                    <div class="col-lg-6">
                        <div class="main-ws-sec">

                            <div class="user-tab-sec">
                                <h3><?php echo $_SESSION['user'] ?></h3>
                                <div class="star-descp">
                                    <span><?php echo isset($_SESSION['descricao']) ? $_SESSION['descricao'] : 'Usuário Vendedor'; ?></span>
                                    <ul>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                         <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                                <!--star-descp end-->
                                <div class="tab-feed">
                                    <ul>
                                        <li data-tab="feed-dd" class="animated fadeIn active">
                                            <a href="#" title="">
                                                <img src="<?php echo Url::getBase() ?>../public/images/ic1.png" alt="">
                                                <span>Minhas Publicações</span>
                                            </a>
                                        <li data-tab="info-dd" class="animated fadeIn">
                                            <a href="#" title="">
                                                <img src="<?php echo Url::getBase() ?>../public/images/ic2.png" alt="">
                                                <span>Editar Perfil</span>
                                            </a>
                                        </li>
                                        </li>
                                    </ul>
                                </div><!-- tab-feed end-->
                            </div>
                            <div class="product-feed-tab animated fadeIn current" id="feed-dd">
                                <div class="posts-section">
                                    <?php include_once("myPosts.php") ?>
                                </div>
                            </div>
                            <div class="product-feed-tab animated fadeIn" id="info-dd">
                                <div class="posts-section">
                                    <div class="post-project-fields">
                                        <!-- Perfil -->
                                        <?php
                                        if ($_POST && ($_POST['typeForm'] == 'cu')) :
                                            $Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                                            $update = new Update();
                                            //verifica se o usuario enviou alguma imagem
                                            if (!empty($_FILES['img']['name'])) :
                                                $Dados['img'] = $_FILES['img']['name'];
                                                $file = $_FILES['img'];
                                                $uploud = new Uploud();
                                                $uploud->ImagemEdit($file, 'users/');
                                                //verifica se foi feito o upload
                                                if (!$uploud->getResult()) :
                                                    echo $uploud->getMsg();
                                                else :
                                                    $_SESSION['avatar'] = $Dados['img'];
                                                    $Dados = ['nome' => $Dados['nome'], 'email' => $Dados['email'], 'telefone' => $Dados['telefone'], 'sexo' => $Dados['sexo'], 'avatar' => $Dados['img'], 'descricao'=> $Dados['descricao']];
                                                    $update->ExeUpdate('usuarios', $Dados, 'WHERE id = :id', 'id=' . $_SESSION['userId'] . '');
                                                endif;
                                            else :
                                                $Dados = ['nome' => $Dados['nome'], 'email' => $Dados['email'], 'telefone' => $Dados['telefone'], 'sexo' => $Dados['sexo'], 'descricao'=> $Dados['descricao']];
                                                $update->ExeUpdate('usuarios', $Dados, 'WHERE id = :id', 'id=' . $_SESSION['userId'] . '');
                                            endif;

                                            if ($update->getResult()) :
                                                ?>
                                                <div class="alert alert-success alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h5 align="center"><i class="fa fa-warning"></i> Alterações realizadas com sucesso.</h5>
                                                </div>
                                            <?php
                                                    unset($Dados);
                                                endif;
                                            endif;

                                            $dadosUser = Validation::getUser($_SESSION['userId']);
                                            foreach ($dadosUser as $user) :
                                                extract($user)
                                                ?>
                                            <form id="formFeed" method="post" action="" enctype="multipart/form-data">
                                                <input type="hidden" name="typeForm" value="cu">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <input type="text" placeholder="Nome" name="nome" class="form-control" value="<?php echo $nome ?>" required>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <input type="email" placeholder="Email" name="email" class="form-control" value="<?php echo $email ?>" required>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <input type="text" placeholder="Telefone" name="telefone" class="form-control" value="<?php echo $telefone ?>" required>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <select name="sexo" class="form-control" required>
                                                            <option value="">Selecione</option>
                                                            <option value="M" <?php echo $sexo == 'M' ? 'selected': ''?>>Masculino</option>
                                                            <option value="F" <?php echo $sexo == 'F' ? 'selected': ''?>>Feminino</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <textarea name="descricao" placeholder="Sua descrição" rows="5" class="form-control" required><?php echo $descricao ?></textarea>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <input type="file" name="img" class="form-control">
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <ul>
                                                            <li><button class="active" type="submit" value="post">Salvar Alterações</button></li>
                                                            <li><button type="reset" title="">Cancelar</button></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </form>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 pd-right-none no-pd">
                        <?php
                        include_once('portifolio.php');
                        include_once('sidbar.php');
                        ?>
                    </div>
                </div>
            </div>
</main>
<?php include_once("footer.php") ?>