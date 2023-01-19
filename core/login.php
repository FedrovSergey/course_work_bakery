<?php
require_once 'config.php';

$email= trim($_POST['email']);
$pass = trim($_POST['pass']);

if ($email =='' OR $pass==''){
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

$sql = "SELECT name, email, admin, surname, telephone FROM user WHERE email='".$email."' and password='".$pass."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc();
	
	setcookie('email', $email, time()+1440, '/');
	setcookie('pass', $pass, time()+1440, '/');
	setcookie('name', $row['name'], time()+1440, '/');
	setcookie('admin', $row['admin'], time()+1440, '/');
	setcookie('surname', $row['surname'], time()+1440, '/');
	setcookie('telephone', $row['telephone'], time()+1440, '/');
	header('Location: /main.php');
} else {
    echo "0";
}
$conn->close();
?>