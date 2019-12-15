<?php
require_once '../conf.inc';
require_once '../../vendor/autoload.php';
$create = new Create();
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$dados['senha'] = base64_encode($dados['senha']);
$create->ExeCreate('usuarios', $dados);
if ($create->getResult()) {
  $msg = '
    <div class="alert alert-success alert-dismissible" role="alert" style="margin-bottom: 40px;">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h5 align="center"><i class="fas fa-exclamation-triangle"></i>Cadastro realizado com sucesso.</h5>
    </div>
  ';
  echo json_encode(['status' => 200, 'msg' => $msg]);
} else {
  $msg = '
  <div class="alert alert-danger alert-dismissible" role="alert" style="margin-bottom: 40px;">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h5 align="center"><i class="fas fa-exclamation-triangle"></i>Erro no cadastro! Tente novamente</h5>
  </div>
';
  echo json_encode(['status' => 500, 'msg' => $msg]);
}
