Dynamic Inserts With PDO

s20.php

<?php

	  try
	   {
		$conn = new PDO("mysql:host=127.0.0.1;dbname=laracasts", 'root', '');

		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo "Connected successfully done"."<br>";
	  }
	  catch(PDOException $e)
	  {
		  echo "Connection failed: " . $e->getMessage();
	  }
	$sql = "INSERT INTO user
	(name,city)
	VALUES
	(:name,:city)";
	$query = $conn -> prepare($sql);
	$query->bindParam(':name',$name,PDO::PARAM_STR);
	$query->bindParam(':city',$city,PDO::PARAM_STR);

	$name = "Dhwani";
	$city = "Rajkot";
	$query -> execute();
	if($query==true)
	{
	  echo "Data inserted";
	}
	else {
	  echo "Data not inserted";
	}
?>
