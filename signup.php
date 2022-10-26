<?php

    include 'connect.php';

	$postdata= file_get_contents("php://input");
	$request = json_decode($postdata);
    
    $q = "INSERT INTO patient (firstName,middleName,lastName,birthDate,age,email,password) values('$request->firstName','$request->middleName','$request->lastName','$request->birthDate',$request->age,'$request->email',sha1('$request->password'))";
    
if (mysqli_query($conn, $q)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $q . "<br>" . mysqli_error($conn);
}
	
$conn->close();
?>