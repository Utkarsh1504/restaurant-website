<?php
	$name = $_POST['name'];
	 
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	 
	$date = $_POST['date'];
	$time = $_POST['time'];
	$people = $_POST['people'];
	$message = $_POST['message'];
	 

	// Database connection
	$conn = new mysqli('localhost','root','','test3');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into book(name, email, phone, date, time, people, message  ) values(?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssis", $name, $email, $phone, $date, $time, $people, $message  );
		$execval = $stmt->execute();
		echo $execval;
		echo "Signup successfully.";
		$stmt->close();
		$conn->close();
	}
?>