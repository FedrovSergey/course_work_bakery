<?php
require_once 'config.php';

$title = trim($_POST['title']);
$itemsInBox = trim($_POST['itemsInBox']);
$weight = trim($_POST['weight']);
$price = trim($_POST['price']);

if ($title =='' OR $itemsInBox =='' OR $weight=='' OR $price==''){
    echo 2;
    die;
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
mysqli_set_charset($conn, 'utf8');

$number = "SELECT MAX(id) FROM menu";
$number = $conn->query($number);
$number = $number->fetch_assoc();
$number['MAX(id)'] = $number['MAX(id)'] + 1;

$img_name = "menu-item-".$number['MAX(id)'].".jpeg";
		
$file = $_FILES["img"];
			
if ($file["name"] != "") {
			
	if ($file["error"] != 0) {
		header("Location: http://localhost/main.php?message=С файлом что-то не так!");
		exit;
	}
			
	$types = array("image/jpeg", "image/jpg");
	if (!in_array($file["type"], $types)) {
		header("Location: http://localhost/main.php?message=Недопустимый формат файла!");
		exit;
	}
		//@copy($file["tmp_name"], 'images/'.$img_name)	
	if (!move_uploaded_file($file["tmp_name"], "images/".$img_name)) {
		header("Location: http://localhost/main.php?message=С картинкой что-то не так!");
		exit;
	}
}

$sql = "INSERT INTO menu (title, itemsInBox, weight, price, imgSRC) VALUES ('".$title."', '".$itemsInBox."', '".$weight."', '".$price."', '".$img_name."')";

if ($conn->query($sql) === TRUE) {
    header('Location: /main.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>		
		
		
		
		
		
		