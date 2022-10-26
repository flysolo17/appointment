<?php
   include "connect.php";
  
   $array = array();
   $postdata= file_get_contents("php://input");
	$request = json_decode($postdata);

    $sql = "SELECT id FROM patient WHERE email = '$request->email' AND password = sha1('$request->password')";
    $result = mysqli_query($conn,$sql);
	if($result -> num_rows != 0){
		 while($row = $result->fetch_assoc())
        {
            $array['id'] = $row['id'];
        }
          echo json_encode($array);
	}else{
        $msg = 0;
    }
  
?>