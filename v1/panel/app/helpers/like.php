<?php
require_once '../conf.inc';
require_once '../../vendor/autoload.php';
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$read = new Read();
$read->verificaLike($dados['id_usuario'], $dados['id_post']);
if ($read->getResult()) {
  $update = new Update();
  foreach ($read->getResult() as $like) :
    extract($like);
    if ($curtiu == 'SIM') {
      $data = ['curtiu' => 'NAO'];
      $update->ExeUpdate('likes', $data, "where id= :id", "id=$id");
      echo json_encode(['status'=>200,'msg'=>'descurtiu']);
    } else {
      $data = ['curtiu' => 'SIM'];
      $update->ExeUpdate('likes', $data, "where id= :id", "id=$id");
      echo json_encode(['status'=>200,'msg'=>'curtiu']);
    }
  endforeach;
} else {
  $dados['curtiu'] = 'SIM';
  $create = new Create();
  $create->ExeCreate('likes', $dados);
  if ($create->getResult()) {
    unset($dados);
    echo json_encode(['status'=>200,'msg'=>'curtiu']);
  }
}
