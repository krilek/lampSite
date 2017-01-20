<?php
	$db = new Database("localhost", "root", "", "lampShop");
	//$db = new Database();
	class Database{
		//SELECT z wyborem kategorii
		//SELECT wyszukujący po tytule
		//DODAWANIE USUWANIE
		private $database;
		private $lastQuery;
		private $category;

		function __construct($host = "localhost", $login = "root", $password = "", $dbName = "lampShop"){
			$db = new mysqli($host, $login, $password);
			if($db->connect_error){
				die("Połączenie z bazą nie udane: ".$db->connect_error);
			}else{
				$this->database = $db;
				if(!$this->database->select_db($dbName)){
					echo "Nie udało się wybrać bazy  $dbName: ". $this->database->error;
				}else{
					if(!$this->database->set_charset("utf8")){
						echo "Problem z wybraniem systemu znaków: ". $this->database->error;
					}
				}
			}
		}
		function __destruct(){
			//echo "Dekonstrukcja bazy";
		}
		function searchProduct($title){
			$title = $this->database->escape_string(htmlspecialchars($title));
			$query = "SELECT * FROM products WHERE title LIKE '%$title%'";
			$result = $this->database->query($query);
			if(!$result){
				echo "Błąd zapytania: ".$this->database->error;
				$this->lastQuery = null;
				return null;
			}
			else{
				$this->lastQuery = $result;
				return $result;
			}
		}
		function getCategoryList(){
			$query = "SELECT * FROM categories";
			$result = $this->database->query($query);
			if(!$result){
				echo "Błąd zapytania: ".$this->database->error;
				$this->lastQuery = null;
				return null;
			}
			else{
				$this->lastQuery = $result;
				return $result;
			}
		}
		function getCategoryName($category = 0){
			if($category > 0){
				$query = "SELECT category FROM categories WHERE id=$category;";
				$result = $this->database->query($query);
				if(!$result){
					echo "Błąd zapytania: ".$this->database->error;
					$this->lastQuery = null;
					return null;
				}
				else{
					$this->lastQuery = $result;
					return $result;
				}
			}
			else{
				echo "";
				return null;
			}
		}
		function chooseCategory($category = 0){
			if($category != 0)
				$query = "SELECT * FROM products WHERE category=$category;";
			else
				$query = "SELECT * FROM products;";
			$result = $this->database->query($query);
			if(!$result){
				echo "Błąd zapytania: ".$this->database->error;
				$this->lastQuery = null;
				return null;
			}
			else{
				$this->lastQuery = $result;
				return $result;
			}
		}
		function selectQuery($condition = '', $what = "*"){
			$query = "SELECT $what FROM products WHERE $condition";
			if($condition == ''){
				$query = "SELECT $what FROM products";
			}
			$result = $this->database->query($query);
			if(!$result){
				echo "Błąd zapytania: ". $this->database->error;
				$this->lastQuery = null;
				return null;
			}else{
				$this->lastQuery = $result;
				return $result;
			}
		}
	}
?>