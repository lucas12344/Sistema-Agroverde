<?php

class Validation extends Conn
{

    private $login;
    private $senha;

    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function logar()
    {
        $pdo = parent::getConn();

        $logar = $pdo->prepare("SELECT * FROM usuarios WHERE email = ? AND senha = ?");
        $logar->bindValue(1, $this->getLogin());
        $logar->bindValue(2, $this->getSenha());
        $logar->execute();
        if ($logar->rowCount() == 1) :
            $dados = $logar->fetch(PDO::FETCH_ASSOC);
            $_SESSION['userId'] = $dados['id'];
            $_SESSION['user'] = $dados['nome'];
            $_SESSION['usuario'] = $dados['email'];
            $_SESSION['senha'] = $dados['senha'];
            $_SESSION['tipo'] = $dados['tipo'];
            $_SESSION['avatar'] = $dados['avatar'];
            $_SESSION['descricao'] = $dados['descricao'];
            $_SESSION['logado'] = true;
            $_SESSION["sessiontime"] = time() +  60 * 00;
            return true;
        else :
            $_SESSION['erro'] =
                '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 align="center"><i class="fas fa-exclamation-triangle"></i> Usuário ou senha incorretos.</h5>
            </div>';
            return false;
        endif;
    }

    public static function deslogar()
    {
        if (isset($_SESSION['logado'])) :
            unset($_SESSION['logado']);
            session_destroy();
            echo '<script>window.location.href="../";</script>';
        endif;
    }

    public static function validaSession()
    {
        if (!isset($_SESSION['logado'])) :
            $_SESSION['erro'] =
                '<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 align="center"><i class="fas fa-exclamation-triangle"></i> Aréa restrita para usuários cadastrados.</h5>
                </div>';
            echo '<script>window.location.href="../";</script>';
        else :
            $pdo = parent::getConn();
            $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = ? AND senha = ?");
            $sql->bindValue(1, $_SESSION['usuario']);
            $sql->bindValue(2, $_SESSION['senha']);
            $sql->execute();
            if ($sql->rowCount() == 0) :
                unset($_SESSION['usuario']);
                unset($_SESSION['senha']);
                unset($_SESSION['logado']);
                unset($_SESSION['user']);
                unset($_SESSION['userId']);
                unset($_SESSION['avatar']);
                unset($_SESSION['descricao']);

                $_SESSION['erro'] =
                    '<div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h5 align="center"><i class="fas fa-exclamation-triangle"></i> Aréa restrita para usuários cadastrados.</h5>
                    </div>';
                echo '<script>window.location.href="../";</script>';
            endif;
        endif;
    }

    public static function expiraSession()
    {
        if (isset($_SESSION["sessiontime"])) {
            if ($_SESSION["sessiontime"] < time()) {
                session_unset();
                unset($_SESSION['usuario']);
                unset($_SESSION['senha']);
                unset($_SESSION['logado']);
                unset($_SESSION['user']);
                unset($_SESSION['tipo']);
                unset($_SESSION['userId']);
                unset($_SESSION['avatar']);
                unset($_SESSION['descricao']);
                $_SESSION['erro'] = '<div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Sua sessão expirou!</div>';
                echo '<script>window.location.href="../../";</script>';
            } else {
                $_SESSION["sessiontime"] = time() + 60 * 10;
            }
        } else {
            session_unset();
            unset($_SESSION['usuario']);
            unset($_SESSION['senha']);
            unset($_SESSION['logado']);
            unset($_SESSION['user']);
            unset($_SESSION['tipo']);
            unset($_SESSION['userId']);
            unset($_SESSION['avatar']);
            unset($_SESSION['descricao']);
            $_SESSION['erro'] = '<div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Sua sessão expirou!</div>';
            echo '<script>window.location.href="../";</script>';
        }
    }

    public static function getUser($userId)
    {
        $read = new Read();
        $read->ExeRead('usuarios', "where id = $userId");
        return $read->getResult();
    }

    public static function getNameUser($userId)
    {
        $name = null;
        $read = new Read();
        $read->ExeRead('usuarios', "where id = $userId");
        foreach ($read->getResult() as $user) :
            extract($user);
            $name = $nome;
        endforeach;
        return $name;
    }
    public static function getImageUser($userId)
    {
        $img = null;
        $read = new Read();
        $read->ExeRead('usuarios', "where id = $userId");
        foreach ($read->getResult() as $user) :
            extract($user);
            $img = $avatar;
        endforeach;
        return $img;
    }
    public static function verificaSeguidor($id_seguindo)
    {
        $id_user = $_SESSION['userId'];
        $read = new Read();
        $read->ExeRead('seguidores', 'where id_user = ' . $id_user . ' AND id_seguindo = ' . $id_seguindo . '');
        if ($read->getRowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public static function getAvalicao($idAvaliado)
    {
        $id_user = $_SESSION['userId'];
        $read = new Read();
        $read->ExeRead('avaliacao', 'WHERE id_user_avaliado=:avaliado AND id_user_avaliador=:avaliador', 'avaliado=' . $idAvaliado . '&avaliador=' . $id_user);
        if ($read->getRowCount() > 0) {
            $data = $read->getResult()[0];
            return $data['pontuacao'];
        } else {
            return 0;
        }
    }
}
