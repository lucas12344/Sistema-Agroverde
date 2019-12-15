<?php
require_once '../conf.inc';
require_once '../../vendor/autoload.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$read = new Read();
$read->ExeRead('avaliacao', 'WHERE id_user_avaliado=:avaliado AND id_user_avaliador=:avaliador', 'avaliado=' . $dados['id'] . '&avaliador=' . $_SESSION['userId']);

if ($read->getRowCount() > 0) {
  $update = new Update();
  $data = [
    'pontuacao' => $dados['val']
  ];
  $update->ExeUpdate('avaliacao', $data, 'WHERE id_user_avaliado=:avaliado AND id_user_avaliador=:avaliador', 'avaliado=' . $dados['id'] . '&avaliador=' . $_SESSION['userId']);
  if ($update->getResult()) {
    echo json_encode(['status' => 200, 'data' => $update->getResult()]);
  } else {
    echo json_encode(['status' => 500, 'data' => $update->getResult()]);
  }
} else {
  $save = new Create();
  $data = [
    'id_user_avaliado' => $dados['id'],
    'id_user_avaliador' => $_SESSION['userId'],
    'pontuacao' => $dados['val']
  ];
  $save->ExeCreate('avaliacao', $data);
  if ($save->getResult()) {
    echo json_encode(['status' => 200, 'data' => $save->getResult()]);
  } else {
    echo json_encode(['status' => 500, 'data' => $save->getResult()]);
  }
}
