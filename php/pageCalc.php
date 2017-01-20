<?php
	define("PRODUCTSPERPAGE", "12"); // Dividable by 3
	//print_r($_GET);
	if(isset($_GET['productsAmount'])){
		calcPager($_GET['productsAmount']);
	}
	function calcPager($productsAmount){
		$pageAmount = $productsAmount/PRODUCTSPERPAGE;
		if($productsAmount%PRODUCTSPERPAGE != 0) $pageAmount++;
		for($i=1;$i<=$pageAmount;$i++){
			echo "<li><a onclick='choosePage(this)'>$i</a></li>";
		}
	}
 ?>