<!DOCTYPE html>
<html>

<head>
	<title>Insert Page page</title>
</head>

<body>
	<center>
		<?php

		$conn = mysqli_connect("localhost", "root", "", "food");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		$name = $_REQUEST['name'];
		$calories = $_REQUEST['calories'];
        $quantity=$_REQUEST['quantity'];
		$date = $_REQUEST['date'];
        $appt=$_REQUEST['appt'];
		// Performing insert query execution
		$sql = "INSERT INTO DATA VALUES ('$name',
			'$calories','$quantity','$date','$appt')";
            if(mysqli_query($conn, $sql)){
                header("Location: Calories.html");
     
            } else{
                echo "ERROR: Hush! Sorry $sql. "
                    . mysqli_error($conn);
            }
		mysqli_close($conn);
		?>
	</center>
</body>

</html>
