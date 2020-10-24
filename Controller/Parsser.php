<?php


class Parsser {

     // Properties
     public $itemList = array();
     public $currancy;

      // Methods
      //createCart --bill-currency=EGP T-shirt T-shirt shoes
     function Parsser($list) {
        $array = explode(" ",$list);
        if ($array[0]=="createCart" )
        {
           // $currancy = $this -> setCurrancy($array);
            $itemList = $this-> setItemList($array);
        }
        return $array;
     }
     
     public function setCurrancy($list) {
        $subArray= explode("=",$list[1]);
            return $subArray[1];
     }

     public function setItemList($list) {
        $lista = array();
        for ( $i = 2 ; $i < count($list) ; $i++)
           {
                $lista[] = $list[$i];
           }
        return $lista;
     }

}



?>