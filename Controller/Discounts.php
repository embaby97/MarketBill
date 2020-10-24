

<?php


function countShose($listItem)
{
	$disTotal=0.0;
	$shoesPrice = 24.99;
	$discountPercentage = .10;
	$count = numberOfShoes($listItem);
	$disTotal += $count *  $shoesPrice * $discountPercentage;


	return $disTotal;
}

function jacketDisc ($listItem)
{
	$timesOfDisc = numberOfDixcountedJackets($listItem);
	$countJacketItems = numberOfJackets($listItem);
	$jacketPrice = 19.99;
	$discountPercentage = .50;
	if ($countJacketItems == 0)
	{
		
		return $countJacketItems;
	}
	else if ($timesOfDisc >= $countJacketItems)
	{
		// if we have a number of jakets equals to or less than the half amount of jackets 
		// will return the count
		return $countJacketItems * $discountPercentage * $jacketPrice;
	}
	else 
		return $timesOfDisc * $discountPercentage * $jacketPrice;
		

	
}

//$listItem = ["T-shirt" ,"T-shirt" ,"T-shirt","T-shirt","T-shirt" , "Shoes","Jacket"];


function numberOfDixcountedJackets($listItem)
{
	$numOfT_shirts = array_keys($listItem, "T-shirt");  // get number of T -shirts 
	$TimesOfDisc =floor (count($numOfT_shirts)/2);  //divided by 2 and floor the value to check how many times will get the discount 
	return $TimesOfDisc;   
}

function numberOfJackets($listItem)
{
	$numOfT_shirts = array_keys($listItem, "Jacket"); //get jackets in th list 
	return count($numOfT_shirts); // return count of jakets
}

function numberOfShoes($listItem)
{
	$numOfT_shirts = array_keys($listItem, "Shoes"); //get jackets in th list 
	return count($numOfT_shirts); // return count of jakets
}

?>