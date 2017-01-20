<?php
	//Dostaje w get tytuł, sprawdzam znaki, real escape, wyszukuję like wyświetlam w odpowiedni sposób
	//define("PRODUCTSPERPAGE", "12"); // Dividable by 3
	$path = $_SERVER['DOCUMENT_ROOT']."/php/";
	//if(!class_exists("Database")){
		require_once  $path."dbClass.php";
	//}
	//if(!class_exists("Product")){
		require_once  $path."productClass.php";
	//}


	global $db;
	/*
	if(isset($_GET['search'])){
		$productsQuery = $db->searchProduct($_GET['search']);
	}


	if(isset($_GET['p']) && $_GET['p'] != 0){
		$pageNr = $_GET['p'];
		$pageRange = $pageNr * PRODUCTSPERPAGE;
	}
	else{
		$pageNr = 1;
		$pageRange = PRODUCTSPERPAGE;
	}*/
	if(isset($_GET['cat'])){
		$cat = $_GET['cat'];
		$productsQuery = $db->chooseCategory($cat);
	}

	$productsArray = [];
	while($row = $productsQuery->fetch_assoc()){
    	$productsArray[] = new Product($row['productId'], $row['title'], $row['category'], $row['price'], $row['picture']);
	}
	$productsQuery->free();
	print_r($productsArray);

	/*
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
	*/
?>
