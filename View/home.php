
<?php

require '..//Controller/Bill.php';
require_once  '..//Controller/Discounts.php';
require_once  '..//Controller/Parsser.php';


$EGP="createCart --bill-currency=EGP T-shirt T-shirt Shoes";
$USD="createCart --bill-currency=USD T-shirt T-shirt Shoes Jacket";
$quiry;
if(isset($_POST['stmt'])) {

   $quiry=$_POST['stmt'];
   PrintBill ($quiry);
}

 function PrintBill($s)
 {
	$cart = new Parsser($s);
		echo "<br>";
	$obj = new Bill();

	$array = $cart->Parsser($s);

	if ($array[0] == "createCart")
	{
		$currancy = $cart->setCurrancy($array);

		$items = $cart->setItemList($array);
		$subtotal = $obj->Subtotal($items);
		$tax = $obj->Tax ($subtotal);
		$shoseDiscount = countShose($items);
		$jacketDiscount = jacketDisc ($items);
		$total = $obj->Total ($subtotal , $tax , $shoseDiscount , $jacketDiscount);
		echo $currancy;

		if ($currancy == "EGP")
		{
		EGPbill ($subtotal , $tax , $shoseDiscount , $jacketDiscount , $total);
		}
		else if ($currancy == "USD")
		{
			USDbill ($subtotal , $tax , $shoseDiscount , $jacketDiscount , $total);
		}
	}
	else 
		echo "<br>Invalid command<br>";
	

	}

function EGPbill ($subtotal , $tax , $shoseDiscount , $jacketDiscount , $total)
{
/*Subtotal: 409 e£
Taxes: 57 e£
Total: 467 e£
*/
	//subtotal 
		echo "Subtotal : ".$subtotal." e£";
		echo "<br>";
	//taxes
		echo "Taxes : ".$tax." e£";
		echo "<br>";
	//Discounts
	if ($shoseDiscount > 0 || $jacketDiscount > 0)
	{
		echo "Discounts:";
		echo "<br>";
		if ($shoseDiscount > 0)
		{	 
			echo "	&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 10% off shoes: -".$shoseDiscount." e£";
			echo "<br>";
		}
		if ($jacketDiscount > 0)
		{
			echo "	&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 	50% off jacket: -".$jacketDiscount." e£";
			echo "<br>";
		}
	}

	// Total
		echo "Total: ".$total." e£";
		echo "<br>";

}


function USDbill ($subtotal , $tax , $shoseDiscount , $jacketDiscount , $total)
{
/*
Subtotal: $66.96
Taxes: $9.37
Discounts:
	10% off shoes: -$2.499
	50% off jacket: -$9.995
Total: $63.8404
*/
	//subtotal 
		echo "Subtotal : $".$subtotal;
		echo "<br>";
	//taxes
		echo "Taxes : $".$tax;
		echo "<br>";
	//Discounts
	if ($shoseDiscount > 0 || $jacketDiscount > 0)
	{
		echo "Discounts:";
		echo "<br>";
		if ($shoseDiscount > 0)
		{	 
			echo "	&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 10% off shoes: -$".$shoseDiscount;
			echo "<br>";
		}
		if ($jacketDiscount > 0)
		{
			echo "	&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 	50% off jacket: -$".$jacketDiscount;
			echo "<br>";
		}
	}

	// Total
		echo "Total: $".$total;
		echo "<br>";

}
?>