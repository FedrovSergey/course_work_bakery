<?php
require_once 'config.php';

$name = trim($_POST['name']);
$surname = trim($_POST['surname']);
$email = trim($_POST['email']);
$pass = trim($_POST['pass']);
$telephone = trim($_POST['telephone']);
$admin = trim($_POST['adminpass']);

if ($name =='' OR $surname =='' OR $email=='' OR $pass=='' OR $telephone==''){
    echo 2;
    die;
}

if($admin === "yes") $admin = 1;
else $admin = 0;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
mysqli_set_charset($conn, 'utf8');

$sql = "INSERT INTO user (name, surname, email, password, telephone, admin) VALUES ('".$name."', '".$surname."', '".$email."', '".$pass."', '".$telephone."', '".$admin."')";

if ($conn->query($sql) === TRUE) {
    header('Location: /main.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>