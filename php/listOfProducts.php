<?php
	define("PRODUCTSPERPAGE", "12"); // Dividable by 3
	$path = $_SERVER['DOCUMENT_ROOT']."/php/";
	if(!class_exists("Database")){
		require  $path."dbClass.php";
	}
	if(!class_exists("Product")){
		require  $path."productClass.php";
	}
	global $db;
	if(isset($_GET['cat']))
		$productsQuery = $db->chooseCategory($_GET['cat']);
	else
		$productsQuery = $db->chooseCategory(0);
	if(isset($_GET['p']) && $_GET['p'] != 0){
		$pageNr = $_GET['p'];
		$pageRange = $pageNr * PRODUCTSPERPAGE;
	}
	else{
		$pageNr = 1;
		$pageRange = PRODUCTSPERPAGE;
	}
	$productsArray = [];
	while($row = $productsQuery->fetch_assoc()){
    	$productsArray[] = new Product($row['productId'], $row['title'], $row['category'], $row['price'], $row['picture']);
	}
	$productsQuery->free();
	$productsAmount = count($productsArray);
	echo $productsAmount."\$\$";//For correct page calculations
	if(count($productsArray) < $pageRange)
		$loopEnd = $productsAmount;
	else
		$loopEnd = $pageRange;
	for($i=$pageRange-PRODUCTSPERPAGE;$i<$loopEnd;$i+=3){
		//echo $i;
		echo "<div class='row'>";
		if(isset($productsArray[$i]))
			$productsArray[$i]->displayTile();
		if(isset($productsArray[$i+1]))
			$productsArray[$i+1]->displayTile();
		if(isset($productsArray[$i+2]))
			$productsArray[$i+2]->displayTile();
		echo "</div>";
	}
?>
