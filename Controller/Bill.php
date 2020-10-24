<?php
require 'Discounts.php';
require '../Model/Items.php';

	//$itemData = itemList();
	/*id: 1 - Name: T-shirt 10.99
id: 2 - Name: Pants 14.99
id: 3 - Name: Jacket 19.99
id: 4 - Name: Shoes 24.99*/



	
	function Subtotal ($ListItems)
	{
        $subtotal=0.0;
        $data = [
		'Pants', 14.99,
        'Jacket', 19.99,
        'Shoes', 24.99,
		'T-shirt', 10.99
		];
		foreach ($ListItems as &$item) {
			for ($x = 0; $x < 8; $x+=2) {
			  if ($data[$x] == $item)
				$subtotal+=$data[$x+1];
			}

		}
		return $subtotal;
	    
     }

	function Tax ($subtotal)
	{
		return number_format((float)($subtotal*.14), 2, '.', '');  
    }

	function Total ($subtotal , $tax , $shoesDis , $jacketDis)
	{
		return number_format((float)($subtotal + $tax - $shoesDis -  $jacketDis), 2, '.', '');  
    }

?>