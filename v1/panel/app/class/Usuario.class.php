<?php

class Usuario {

    public $Titulo;
    public $Conteudo;
    public $Dados;

    const Entity = 'usuarios';

    function CreateUser(array $Dados) {
        $this->Dados = $Dados;
        $this->Dados['img'] = $this->Dados['img']['name'];

        $create = new Create();
        $create->ExeCreate(self::Entity, $this->Dados);
        if ($create->getResult()):
            $this->Result = $create->getResult();
            $this->Msg = "<div class='alert alert-success alert-dismissible' role='alert'>
                    <i class='glyphicon glyphicon-check'></i> usuário cadastrado com sucesso.
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true' style='cursor: pointer;'>&times;</span>
                    </button>
                </div>";
        else:
            $this->Result = $create->getResult();
            $this->Msg = "<div class='alert alert-danger alert-dismissible' role='alert'>
                    <i class='glyphicon glyphicon-check'></i> Erro no cadastro de usuário.
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true' style='cursor: pointer;'>&times;</span>
                    </button>
                </div>";
        endif;
    }

    function getResult() {
        return $this->Result;
    }

    function getMsg() {
        return $this->Msg;
    }

}