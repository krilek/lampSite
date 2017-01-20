<?php
	class Product{
		private $image;
		private $price;
		private $title;
		private $category;
		private $id;
		function __construct($productId, $productTitle, $productCategory, $productPrice,  $imgName){
			$this->image = $this->imgCheck($imgName);
			$this->price = $productPrice;
			$this->title = $productTitle;
			$this->category = $productCategory;
			$this->id = $productId;
		}
		private function imgCheck($imgName){
			if(pathinfo("/img/$imgName", PATHINFO_EXTENSION) != "") //If record in db has specified extension
				return $imgName;
			else{
				if(basename(getcwd()) != basename($_SERVER['DOCUMENT_ROOT']))
					chdir("..");
				if(isset(glob("img/$imgName.*")[0])){ //Glob checks for first file with given name, returns full path
					$imgName = glob("img/$imgName.*")[0];
					return $imgName;
				}
				else{
					return "/img/error.png";
				}
			}
		}
		function displayTile(){
			echo "<div class='col-sm-4'>
        			<div class='thumbnail'>
	        			<img src='$this->image' class='img-responsive'>
	        			<div class='caption text-center'>
	        				<h4 id='product-title'>$this->title</h4>
	        				<div class='btn-group btn-group-vertical btn-block'>
		        				<a href='#' class='btn btn-default disabled' id='product-value'>$this->price ZŁ</a>
		        				<a onclick='addToCart($this->id, \"$this->title\")' class='btn btn-danger'>Dodaj do koszyka</a>
	        				</div>
	        			</div>
        			</div>
        		</div>";
		}
		function getImg(){
			return $this->image;
		}
		function getPrice(){
			return $this->price;
		}
		function getTitle(){
			return $this->title;
		}
		function getCategory(){
			return $this->category;
		}
		function getId(){
			return $this->id;
		}
		function buyProduct(){
			echo "SOON";
		}
	}

?>