<?php
	$RecieverName = $_POST['RevieverName'];
	$Age = $_POST['Age'];
	$BloodType = $_POST['BloodType'];
	$Number = $_POST['Number'];
	$Email = $_POST['Email'];
	$Relation = $_POST['Relation'];
	

	// Database connection
	$conn = new mysqli('localhost','root','','bloodbuddy');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(RecieverName, Age, BloodType, Number, Email, Relation) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sisiss", $firstName, $lastName, $gender, $email, $password, $number);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>