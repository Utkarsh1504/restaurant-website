<?php
	$U_name = $_POST['U_name'];
	 
	$email = $_POST['email'];
	$password = $_POST['password'];
	 

	// Database connection
	$conn = new mysqli('localhost','root','','test3');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into loginform(U_name,   email, password ) values(?, ?, ?)");
		$stmt->bind_param("sss", $U_name, $email, $password  );
		$execval = $stmt->execute();
		echo $execval;
		echo "Signup successfully.";
		$stmt->close();
		$conn->close();
	}
?>