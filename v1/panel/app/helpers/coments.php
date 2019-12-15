<?php
require_once '../conf.inc';
require_once '../../vendor/autoload.php';
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$create = new Create();
$create->ExeCreate('comentarios', $dados);
if ($create->getResult()) {
  unset($dados);
  echo json_encode(['status' => 200, 'data' => $create->getResult()]);
} else {
  echo json_encode(['status' => 500, 'data' => $create->getResult()]);
}