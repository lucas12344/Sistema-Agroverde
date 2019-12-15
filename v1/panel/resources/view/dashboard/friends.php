<section class="companies-info">
    <div class="container">
        <div class="company-title">
            <h3>Usuários</h3>
        </div>
        <!--company-title end-->
        <div class="companies-list">
            <div class="row">
                <?php
                $read = new Read();
                $search = filter_input(INPUT_GET, 'search', FILTER_SANITIZE_STRING);
                $query = 'where id <> ' . $_SESSION['userId'];
                if ($search) {
                    $query = 'WHERE id <> ' . $_SESSION['userId'] . ' AND nome LIKE "%' . $search . '%"';
                }
                $read->ExeRead('usuarios', $query);
                foreach ($read->getResult() as $users) :
                    extract($users);
                    $avaliacao = Validation::getAvalicao($id);
                    ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="company_profile_info">
                            <div class="company-up-info">
                                <img src="<?php echo $avatar != null ? Url::getBase() . 'uplouds/users/' . $avatar : Url::getBase() . '../public/images/user.png' ?>" alt="<?php echo $avatar ?>" alt="">
                                <h3><?php echo $nome ?></h3>
                                <h4><?php echo $email ?></h4>
                                <h4><?php echo $telefone ?></h4>
                                <ul>
                                    <li><a href="./chat/<?php echo $id; ?>" title="Chat" class="message-us"><i class="fa fa-comments"></i> Chat</a></li>
                                    <?php if (Validation::verificaSeguidor($id)) { ?>
                                        <li><a href="#" title="deixar de Seguir" class="hire-us seguir" alt="<?php echo $id ?>"><i class="fas fa-heart"></i> Seguindo</a></li>
                                    <?php } else { ?>
                                        <li><a href="#" title="Seguir" class="hire-us seguir" alt="<?php echo $id ?>"><i class="far fa-heart"></i> Seguir</a></li>
                                    <?php } ?>
                                    <li>
                                        <br>
                                        <div class="vote" id="vote-box-<?php echo $id; ?>">
                                            <label>
                                                <input type="radio" name="fb" alt="<?php echo $id; ?>" value="1" />
                                                <i class="fa <?php echo $avaliacao > 0 ? 'active' : '' ?>"></i>
                                            </label>
                                            <label>
                                                <input type="radio" name="fb" alt="<?php echo $id; ?>" value="2" <?php echo $avaliacao == 2 ? 'checked' : '';?> />
                                                <i class="fa <?php echo $avaliacao > 1 ? 'active' : '' ?>"></i>
                                            </label>
                                            <label>
                                                <input type="radio" name="fb" alt="<?php echo $id; ?>" value="3" <?php echo $avaliacao == 3 ? 'checked' : '';?>  />
                                                <i class="fa <?php echo $avaliacao > 2 ? 'active' : '' ?>"></i>
                                            </label>
                                            <label>
                                                <input type="radio" name="fb" alt="<?php echo $id; ?>" value="4" <?php echo $avaliacao == 4 ? 'checked' : '';?> />
                                                <i class="fa <?php echo $avaliacao > 3 ? 'active' : '' ?>"></i>
                                            </label>
                                            <label>
                                                <input type="radio" name="fb" alt="<?php echo $id; ?>" value="5" <?php echo $avaliacao == 5 ? 'checked' : '';?> />
                                                <i class="fa <?php echo $avaliacao > 4 ? 'active' : '' ?>"></i>
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</section>