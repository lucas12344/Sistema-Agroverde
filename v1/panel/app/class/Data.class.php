<?php
class Data {

    public static function DataFormat($data) {
        if (count(explode("/", $data)) > 1) {
            return implode("-", array_reverse(explode("/", $data)));
        } elseif (count(explode("-", $data)) > 1) {
            return implode("/", array_reverse(explode("-", $data)));
        }
    }
    
    function getMes(){
        $mes = date('n');
        $Mes[1]  = 'Janeiro';
        $Mes[2]  = 'Fevereiro';
        $Mes[3]  = 'Março';
        $Mes[4]  = 'Abril';
        $Mes[5]  = 'Maio';
        $Mes[6]  = 'Junho';
        $Mes[7]  = 'Julho';
        $Mes[8]  = 'Agosto';
        $Mes[9]  = 'Setembro';
        $Mes[10] = 'Outubro';
        $Mes[11] = 'Novembro';
        $Mes[12] = 'Dezembro';
        return $Mes[$mes];
    }

    function getDia(){
      $dia = date('w');
      $Dia[0] = 'Domingo';
      $Dia[1] = 'Segunda-feira';
      $Dia[2] = 'Terça-feira';
      $Dia[3] = 'Quarta-feira';
      $Dia[4] = 'Quinta-feira';
      $Dia[5] = 'Sexta-feira';
      $Dia[6] = 'Sábado';
      return $Dia[$dia];
    }
    
    function getData($string = ''){
        $dia = $this->getDia();
        $mes = $this->getMes();
        $ano = date('Y');
        $Dia = date('d');
        $data = $dia." ".$Dia." de ".$mes." de ".$ano;
    return $data;
    }
    
}
