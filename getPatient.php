<?php
   include "connect.php";
  
$array = array();
$postdata= file_get_contents("php://input");
$request = json_decode($postdata);

$sql = "SELECT * FROM patient WHERE id = '$request->id'";

$result = mysqli_query($conn,$sql);
 if ($result-> num_rows > 0) 
    {
        // OUTPUT DATA OF EACH ROW
        while($row = $result->fetch_assoc())
        {
            $array['id'] = $row['id'];
            $array['firstName'] = $row['firstName'];
            $array['middleName'] = $row['middleName'];
            $array['lastName'] = $row['lastName'];
            $array['birthDate'] = $row['birthDate'];
            $array['age'] = $row['age'];
            $array['email'] = $row['email'];
            
        }
        echo json_encode($array);
    } 
    else {
        echo "0 results";
    }
 
$conn->close();
?>

