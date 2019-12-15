<?php

class Read extends Conn{
    private $Select;
    private $Places;
    private $Result;
    private $Read;
    
    private $Conn;
    
    public function ExeRead($Tabela, $Termos = null, $ParseString = null) {
        if(!empty($ParseString)){
            parse_str($ParseString, $this->Places);
        }
        
        $this->Select = "SELECT * FROM {$Tabela} {$Termos}";
        $this->Execute();
    }

    public function verificaLike($user, $post) {
        if(empty($Termos)):
            $Termos = '';
        endif;
        $this->Select = "SELECT l.id, l.curtiu FROM likes AS l WHERE l.id_usuario = $user AND l.id_post = $post";
        $this->ExecuteSQL();
    }

    public function getPosts($Termos = null) {
        if(empty($Termos)):
            $Termos = '';
        endif;
        $this->Select = "SELECT p.id AS idPost, p.legenda, p.img, p.data_created AS dataPublicacao, u.nome, u.avatar FROM posts AS p INNER JOIN usuarios AS u ON p.id_usuario = u.id $Termos";
        $this->ExecuteSQL();
    }

    public function getTotalComentariosPost($idPost) {
        $this->Select = "SELECT * FROM comentarios WHERE id_post = $idPost";
        $this->ExecuteSQL();
    } 
    
    public function getTotalPost($idUser) {
        $this->Select = "SELECT * FROM posts WHERE id_usuario = $idUser";
        $this->ExecuteSQL();
    }

    public function getTotalSeguidores($idUser) {
        $this->Select = "SELECT * FROM seguidores WHERE id_user = $idUser";
        $this->ExecuteSQL();
    }

    public function getChat($Termos = null) {
        if(empty($Termos)):
            $Termos = '';
        endif;
        $this->Select = "SELECT ch.id, ch.de, us.nome AS para, us.avatar, ch.msg, ch.`status`, ch.created as data FROM chat AS ch  INNER JOIN usuarios AS us ON ch.para = us.id $Termos";
        $this->ExecuteSQL();
    }

    public function getLike($Termos = null) {
        if(empty($Termos)):
            $Termos = '';
        endif;
        $this->Select = "SELECT COUNT(DISTINCT l.id) AS curtidas FROM likes AS l INNER JOIN posts AS p ON l.id_post = p.id AND l.curtiu = 'SIM' AND p.id=$Termos";
        $this->ExecuteSQL();
    }

    public function getComentarios($Termos = null) {
        if(empty($Termos)):
            $Termos = '';
        endif;
        $this->Select = "SELECT c.id, c.comentario, p.id AS idPost, u.nome as nomeUserComentario, u.avatar AS avatarUserComentario, c.data_created as dataComentario FROM comentarios AS c INNER JOIN  posts AS p ON c.id_post = p.id INNER JOIN usuarios AS u ON c.id_usuario = u.id $Termos";
        $this->ExecuteSQL();
    }  
    
    public function getResult() {
        return $this->Result;        
    }
    
    public function getRowCount(){
        return $this->Read->rowCount();
    }
    
    private function Connect() {
        $this->Conn = parent::getConn();
        $this->Read = $this->Conn->prepare($this->Select);
        $this->Read->setFetchMode(PDO::FETCH_ASSOC);
    }
    
    private function getSyntax() {
        if($this->Places):
            foreach ($this->Places as $Vinculo => $Valor):
                if($Vinculo == 'limit' || $Vinculo == 'offset'):
                    $Valor = (int)$Valor;
                endif;
                $this->Read->bindValue(":{$Vinculo}", $Valor, (is_int($Valor)? PDO::PARAM_INT : PDO::PARAM_STR));
            endforeach;
        endif;
    }
    
    private function Execute() {
        $this->Connect();
        try {
            $this->getSyntax();
            $this->Read->execute();
            $this->Result = $this->Read->fetchAll();
        } catch (PDOException $e) {
            $this->Result = null;
            echo 'Message: ' .$e->getMessage();            
        }
    }
    
    private function ExecuteSQl() {
        $this->Connect();
        try {
            $this->Read->execute();
            $this->Result = $this->Read->fetchAll();
        } catch (PDOException $e) {
            $this->Result = null;
            echo 'Message: ' .$e->getMessage();            
        }
    }
    
}
