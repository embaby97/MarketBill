<?php
require 'Discounts.php';
require_once  '../Model/Items.php';

	//$itemData = itemList();
	/*id: 1 - Name: T-shirt 10.99
id: 2 - Name: Pants 14.99
id: 3 - Name: Jacket 19.99
id: 4 - Name: Shoes 24.99*/

class Bill {

	
	
	public function Subtotal ($ListItems)
	{	
		$obj = new Items();
        $subtotal=0.0;
		foreach ($ListItems as &$item) {
			$subtotal+=$obj->getItemPrice ($item);
		}
		return $subtotal;
     }

	public function Tax ($subtotal)
	{
		return number_format((float)($subtotal*.14), 2, '.', '');  
    }

	public function Total ($subtotal , $tax , $shoesDis , $jacketDis)
	{
		return number_format((float)($subtotal + $tax - $shoesDis -  $jacketDis), 2, '.', '');  
    }
}

?>