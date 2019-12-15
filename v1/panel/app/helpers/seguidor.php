<?php
require_once '../conf.inc';
require_once '../../vendor/autoload.php';
if(duplycate()){
   seguir(); 
}
function seguir(){
    $data['id_user'] =  $_SESSION['userId'];
    $data['id_seguindo'] =  $_POST['id_seguidor'];
    $create = new Create();
    $create->ExeCreate('seguidores', $data);
    if($create->getResult()){
        echo json_encode($_POST);
        exit;
    }else{
        $array = ['error'=>'500'];
        echo json_encode($array);
        exit;
    }
}
function deixar_de_seguir(){
    $data['id_user'] =  $_SESSION['userId'];
    $data['id_seguindo'] =  $_POST['id_seguidor'];
    $delete = new Delete();
    $delete->ExeDelete('seguidores', 'where id_user = '. $data['id_user'].' AND id_seguindo = '. $data['id_seguindo']);
    if($delete->getResult()){
        echo json_encode($_POST);
        exit;
    }else{
        $array = ['error'=>'500'];
        echo json_encode($array);
        exit;
    }
}
function duplycate(){
    $data['id_user'] =  $_SESSION['userId'];
    $data['id_seguindo'] =  $_POST['id_seguidor'];
    $read = new Read();
    $read->ExeRead('seguidores', 'where id_user = '.$data['id_user'].' AND id_seguindo = '.$data['id_seguindo'].'');
    if($read->getRowCount() > 0){
        deixar_de_seguir();
        return false;
    }else{
        return true;
    }
}
